<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::orderBy('waktu_mulai', 'asc')->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'agenda' => 'required|string|max:500',
            'lokasi' => 'required|string|max:255',
            'pic' => 'nullable|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:100',
            'jumlah_peserta' => 'nullable|integer',
            'no_surat' => 'nullable|string|max:255',
        ]);

        Jadwal::create($validated);
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'agenda' => 'required|string|max:500',
            'lokasi' => 'required|string|max:255',
            'pic' => 'nullable|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:100',
            'jumlah_peserta' => 'nullable|integer',
            'no_surat' => 'nullable|string|max:255',
        ]);

        $jadwal->update($validated);
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }

    /**
     * Sync jadwal data from Google Spreadsheet.
     * Only imports rows with Status = 'Completed'.
     */
    public function syncFromSpreadsheet(Request $request)
    {
        $spreadsheetUrl = 'https://docs.google.com/spreadsheets/d/1aMlArIv2r6h7evDIJrpTsY2YMrE1NCtQUmf0Q4yZyoI/export?format=csv&gid=0';

        try {
            // Fetch CSV data using file_get_contents with context
            $context = stream_context_create([
                'http' => [
                    'timeout' => 30,
                    'follow_location' => true,
                    'user_agent' => 'Mozilla/5.0 (compatible; Laravel/10)',
                ]
            ]);

            $csvContent = @file_get_contents($spreadsheetUrl, false, $context);

            if ($csvContent === false) {
                return redirect()->route('admin.jadwal.index')
                    ->with('error', 'Gagal mengambil data dari spreadsheet. Pastikan spreadsheet dapat diakses publik.');
            }

            $lines = explode("\n", $csvContent);

            // Find the header row (row containing "Tanggal dan Waktu")
            $headerRowIndex = -1;
            foreach ($lines as $i => $line) {
                if (stripos($line, 'Tanggal dan Waktu') !== false || stripos($line, 'Nama Kegiatan') !== false) {
                    $headerRowIndex = $i;
                    break;
                }
            }

            if ($headerRowIndex === -1) {
                return redirect()->route('admin.jadwal.index')
                    ->with('error', 'Format spreadsheet tidak dikenali. Header tidak ditemukan.');
            }

            // Parse header to get column indices
            $headerLine = $lines[$headerRowIndex];
            $headers = $this->parseCsvLine($headerLine);

            $colTanggalWaktu = $this->findColumnIndex($headers, ['Tanggal dan Waktu', 'Tanggal']);
            $colNamaKegiatan = $this->findColumnIndex($headers, ['Nama Kegiatan', 'Agenda']);
            $colInstansi     = $this->findColumnIndex($headers, ['Instansi']);
            $colStatus       = $this->findColumnIndex($headers, ['Status']);
            $colPIC          = $this->findColumnIndex($headers, ['PIC']);
            $colJumlah       = $this->findColumnIndex($headers, ['Jumlah Peserta', 'Jumlah']);
            $colTempat       = $this->findColumnIndex($headers, ['Tempat', 'Lokasi']);
            $colNoSurat      = $this->findColumnIndex($headers, ['No Surat', 'No. Surat']);

            // Clear existing data
            Jadwal::truncate();

            $importedCount = 0;
            $skippedCount = 0;

            // Process data rows
            for ($i = $headerRowIndex + 1; $i < count($lines); $i++) {
                $line = trim($lines[$i]);
                if (empty($line)) continue;

                $row = $this->parseCsvLine($line);

                // Get status - only import if 'Completed'
                $status = isset($row[$colStatus]) ? trim($row[$colStatus]) : '';
                if (strtolower($status) !== 'completed') {
                    $skippedCount++;
                    continue;
                }

                // Get and parse date/time column: "11/1/2024 08:00 - Selesai"
                $tanggalWaktu = isset($row[$colTanggalWaktu]) ? trim($row[$colTanggalWaktu]) : '';
                if (empty($tanggalWaktu)) {
                    $skippedCount++;
                    continue;
                }

                $parsed = $this->parseTanggalWaktu($tanggalWaktu);
                if (!$parsed) {
                    $skippedCount++;
                    continue;
                }

                $agenda = isset($row[$colNamaKegiatan]) ? trim($row[$colNamaKegiatan]) : '';
                if (empty($agenda)) {
                    $skippedCount++;
                    continue;
                }

                // Build data row
                $data = [
                    'waktu_mulai'    => $parsed['mulai'],
                    'waktu_selesai'  => $parsed['selesai'],
                    'agenda'         => $agenda,
                    'lokasi'         => isset($row[$colTempat]) ? trim($row[$colTempat]) : '-',
                    'pic'            => isset($row[$colPIC]) ? trim($row[$colPIC]) : null,
                    'instansi'       => isset($row[$colInstansi]) ? trim($row[$colInstansi]) : null,
                    'status'         => $status,
                    'jumlah_peserta' => isset($row[$colJumlah]) && is_numeric(trim($row[$colJumlah])) ? (int) trim($row[$colJumlah]) : null,
                    'no_surat'       => isset($row[$colNoSurat]) ? trim($row[$colNoSurat]) : null,
                ];

                Jadwal::create($data);
                $importedCount++;
            }

            return redirect()->route('admin.jadwal.index')
                ->with('success', "Sinkronisasi berhasil! {$importedCount} jadwal diimport, {$skippedCount} baris dilewati (bukan Completed).");
        } catch (\Exception $e) {
            return redirect()->route('admin.jadwal.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Parse a CSV line respecting quoted fields.
     */
    private function parseCsvLine(string $line): array
    {
        $result = [];
        $line = rtrim($line, "\r");
        $line = str_getcsv($line);
        foreach ($line as $field) {
            $result[] = trim($field);
        }
        return $result;
    }

    /**
     * Find column index by possible header names.
     */
    private function findColumnIndex(array $headers, array $possibleNames): int
    {
        foreach ($possibleNames as $name) {
            foreach ($headers as $i => $header) {
                if (stripos(trim($header), $name) !== false) {
                    return $i;
                }
            }
        }
        return -1;
    }

    /**
     * Parse "Tanggal dan Waktu" column value.
     * Format examples:
     *   "11/1/2024 08:00 - Selesai"
     *   "11/1/2024 08:00 - 16:00"
     *   "11/4/2024 09:00 - Selesai"
     */
    private function parseTanggalWaktu(string $value): ?array
    {
        // Try to parse "M/D/Y H:i - H:i" or "M/D/Y H:i - Selesai" etc.
        $pattern = '/(\d{1,2}\/\d{1,2}\/\d{4})\s+(\d{1,2}:\d{2})\s*-\s*([\d:]+|Selesai|Selsai|selesai)/i';

        if (!preg_match($pattern, $value, $matches)) {
            // Try just "M/D/Y" with no time
            if (preg_match('/(\d{1,2}\/\d{1,2}\/\d{4})/', $value, $m)) {
                try {
                    $date = Carbon::createFromFormat('n/j/Y', $m[1]);
                    return [
                        'mulai'   => $date->copy()->setTime(8, 0)->format('Y-m-d H:i:s'),
                        'selesai' => $date->copy()->setTime(23, 59)->format('Y-m-d H:i:s'),
                    ];
                } catch (\Exception $e) {
                    return null;
                }
            }
            return null;
        }

        $datePart  = $matches[1]; // "11/1/2024"
        $startTime = $matches[2]; // "08:00"
        $endTime   = $matches[3]; // "Selesai" or "16:00"

        try {
            $date = Carbon::createFromFormat('n/j/Y', $datePart);

            [$startH, $startM] = explode(':', $startTime);
            $mulai = $date->copy()->setTime((int)$startH, (int)$startM, 0);

            if (preg_match('/^\d{1,2}:\d{2}$/', $endTime)) {
                [$endH, $endM] = explode(':', $endTime);
                $selesai = $date->copy()->setTime((int)$endH, (int)$endM, 0);
            } else {
                // "Selesai" means end of day
                $selesai = $date->copy()->setTime(23, 59, 0);
            }

            return [
                'mulai'   => $mulai->format('Y-m-d H:i:s'),
                'selesai' => $selesai->format('Y-m-d H:i:s'),
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}
