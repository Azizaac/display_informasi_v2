<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'video_file' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,mkv|max:102400',
            'video_url' => 'nullable|string|max:500',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_file' => 'nullable|image|max:5120',
            'thumbnail_url' => 'nullable|string|max:500'
        ]);

        // Handle video file upload
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $path = $file->store('videos', 'public');
            $validated['video_url'] = $path;
        } elseif (empty($validated['video_url'])) {
            return back()->withErrors(['video_url' => 'Video atau URL harus diisi']);
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_file')) {
            $file = $request->file('thumbnail_file');
            $path = $file->store('video-thumbnails', 'public');
            $validated['thumbnail_url'] = $path;
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        Video::create($validated);
        return redirect()->route('admin.video.index')->with('success', 'Video berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('admin.video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'video_file' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,mkv|max:102400',
            'video_url' => 'nullable|string|max:500',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_file' => 'nullable|image|max:5120',
            'thumbnail_url' => 'nullable|string|max:500'
        ]);

        // Handle video file upload
        if ($request->hasFile('video_file')) {
            // Delete old file if it was local
            if ($video->video_url && !filter_var($video->video_url, FILTER_VALIDATE_URL)) {
                $oldPath = str_replace('/storage/', '', $video->video_url);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('video_file');
            $path = $file->store('videos', 'public');
            $validated['video_url'] = $path;
        } elseif (empty($validated['video_url'])) {
            $validated['video_url'] = $video->video_url;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_file')) {
            // Delete old thumbnail if it was local
            if ($video->thumbnail_url && !filter_var($video->thumbnail_url, FILTER_VALIDATE_URL)) {
                $oldPath = str_replace('/storage/', '', $video->thumbnail_url);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('thumbnail_file');
            $path = $file->store('video-thumbnails', 'public');
            $validated['thumbnail_url'] = $path;
        } elseif (empty($validated['thumbnail_url'])) {
            $validated['thumbnail_url'] = $video->thumbnail_url;
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $video->update($validated);
        return redirect()->route('admin.video.index')->with('success', 'Video berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        // Delete video file if it was local
        if ($video->video_url && !filter_var($video->video_url, FILTER_VALIDATE_URL)) {
            $path = str_replace('/storage/', '', $video->video_url);
            Storage::disk('public')->delete($path);
        }

        // Delete thumbnail if it was local
        if ($video->thumbnail_url && !filter_var($video->thumbnail_url, FILTER_VALIDATE_URL)) {
            $path = str_replace('/storage/', '', $video->thumbnail_url);
            Storage::disk('public')->delete($path);
        }

        $video->delete();
        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus');
    }
}
