<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = Informasi::all();
        return view('admin.informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.informasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,mkv|max:102400'
        ]);

        // Handle image upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('informasi-images', 'public');
            $validated['image'] = $path;
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $path = $file->store('informasi-videos', 'public');
            $validated['video'] = $path;
        }

        Informasi::create($validated);
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        return view('admin.informasi.show', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori' => 'nullable|string|max:100',
            'penulis' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,mkv|max:102400'
        ]);

        // Handle image upload
        if ($request->hasFile('image_file')) {
            // Delete old image if it was local
            if ($informasi->image && !filter_var($informasi->image, FILTER_VALIDATE_URL)) {
                $oldPath = str_replace('/storage/', '', $informasi->image);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('image_file');
            $path = $file->store('informasi-images', 'public');
            $validated['image'] = $path;
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            // Delete old video if it was local
            if ($informasi->video && !filter_var($informasi->video, FILTER_VALIDATE_URL)) {
                $oldPath = str_replace('/storage/', '', $informasi->video);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('video_file');
            $path = $file->store('informasi-videos', 'public');
            $validated['video'] = $path;
        }

        $informasi->update($validated);
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        // Delete image if it was local
        if ($informasi->image && !filter_var($informasi->image, FILTER_VALIDATE_URL)) {
            $path = str_replace('/storage/', '', $informasi->image);
            Storage::disk('public')->delete($path);
        }

        // Delete video if it was local
        if ($informasi->video && !filter_var($informasi->video, FILTER_VALIDATE_URL)) {
            $path = str_replace('/storage/', '', $informasi->video);
            Storage::disk('public')->delete($path);
        }

        $informasi->delete();
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus');
    }
}
