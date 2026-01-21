<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $backgrounds = BackgroundImage::get();
        return view('admin.background.index', compact('backgrounds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.background.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
            'position' => 'nullable|string|max:50'
        ]);

        // Handle file upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('backgrounds', 'public');
            $validated['image_url'] = $path;
        } elseif (empty($validated['image_url'])) {
            return back()->withErrors(['image_url' => 'Gambar atau URL harus diisi']);
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        BackgroundImage::create($validated);
        return redirect()->route('admin.background.index')->with('success', 'Background berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BackgroundImage $background)
    {
        return view('admin.background.show', compact('background'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BackgroundImage $background)
    {
        return view('admin.background.edit', compact('background'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BackgroundImage $background)
    {
        $validated = $request->validate([
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
            'position' => 'nullable|string|max:50'
        ]);

        // Handle file upload
        if ($request->hasFile('image_file')) {
            // Delete old file if it was local
            if ($background->image_url && !filter_var($background->image_url, FILTER_VALIDATE_URL)) {
                $oldPath = str_replace('/storage/', '', $background->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('image_file');
            $path = $file->store('backgrounds', 'public');
            $validated['image_url'] = $path;
        } elseif (empty($validated['image_url'])) {
            $validated['image_url'] = $background->image_url;
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $background->update($validated);
        return redirect()->route('admin.background.index')->with('success', 'Background berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BackgroundImage $background)
    {
        // Delete file if it was local
        if ($background->image_url && !filter_var($background->image_url, FILTER_VALIDATE_URL)) {
            $path = str_replace('/storage/', '', $background->image_url);
            Storage::disk('public')->delete($path);
        }
        $background->delete();
        return redirect()->route('admin.background.index')->with('success', 'Background berhasil dihapus');
    }
}
