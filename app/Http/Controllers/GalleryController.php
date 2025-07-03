<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    /**
     * Display a listing of all albums.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('campaign_date', 'desc')->paginate(9);
        return view('gallery.index', compact('albums'));
    }

    /**
     * Display the specified album with its gallery images.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('galleryImages')->findOrFail($id);
        return view('gallery.show', compact('album'));
    }

    /**
     * Display the specified image detail.
     *
     * @param  int  $albumId
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function showImage($albumId, $imageId)
    {
        $album = Album::findOrFail($albumId);
        $image = GalleryImage::where('album_id', $albumId)->findOrFail($imageId);
        
        // Get all images from this album for carousel navigation
        $albumImages = GalleryImage::where('album_id', $albumId)
            ->orderBy('id', 'asc')
            ->get();
        
        // Find current image position and calculate previous/next
        $currentIndex = $albumImages->search(function($item) use ($imageId) {
            return $item->id == $imageId;
        });
        
        // Get previous and next image IDs
        $prevImage = ($currentIndex > 0) ? $albumImages[$currentIndex - 1] : null;
        $nextImage = ($currentIndex < $albumImages->count() - 1) ? $albumImages[$currentIndex + 1] : null;
        
        return view('gallery.image', compact('album', 'image', 'prevImage', 'nextImage'));
    }
}