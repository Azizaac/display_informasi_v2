<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::orderBy('order_index', 'asc')->get();
        return view('admin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
            'caption' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer'
        ]);

        // Handle file upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = $file->store('carousel', 'public');
            // Store relative path
            $validated['image_url'] = $path;
        } elseif (empty($validated['image_url'])) {
            return back()->withErrors(['image_url' => 'Gambar atau URL harus diisi']);
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        Carousel::create($validated);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        return view('admin.carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $validated = $request->validate([
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string|max:500',
            'caption' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer'
        ]);

        // Handle file upload
        if ($request->hasFile('image_file')) {
            // Delete old file if it was local (not a URL)
            if ($carousel->image_url && !filter_var($carousel->image_url, FILTER_VALIDATE_URL)) {
                // If path starts with /storage/, strip it (backward compatibility)
                $oldPath = str_replace('/storage/', '', $carousel->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('image_file');
            $path = $file->store('carousel', 'public');
            $validated['image_url'] = $path;
        } elseif (empty($validated['image_url'])) {
            $validated['image_url'] = $carousel->image_url;
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $carousel->update($validated);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        // Delete file if it was local
        if ($carousel->image_url && !filter_var($carousel->image_url, FILTER_VALIDATE_URL)) {
            $path = str_replace('/storage/', '', $carousel->image_url);
            Storage::disk('public')->delete($path);
        }

        $carousel->delete();
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil dihapus');
    }
}
