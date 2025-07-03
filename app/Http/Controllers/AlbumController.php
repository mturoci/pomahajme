<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    /**
     * Display a listing of albums for admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin(Request $request)
    {
        return view('admin-albums', ['albums' => Album::orderByDesc('created_at')->get()]);
    }

    /**
     * Display the form for creating a new album.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-album-form', [
            'title' => 'Pridať album',
            'btn' => 'Vytvoriť',
            'album' => new Album(),
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created album in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'campaign_date' => 'required|date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $album = new Album();
        $album->title = $request->title;
        $album->description = $request->description;
        $album->campaign_date = $request->campaign_date;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Store the image
            $image->move(public_path('img'), $imageName);
            $album->thumbnail = 'img/' . $imageName;
        }

        if ($album->save()) {
            return redirect('/admin/albums')->with('message', 'Album "' . $album->title . '" bol úspešne vytvorený.');
        }

        return back()->withErrors(['save_error' => 'Nepodarilo sa uložiť album.']);
    }

    /**
     * Update an album in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $album = Album::findOrFail($request->id);

        if ($request->isMethod('get')) {
            return view('admin-album-form', [
                'album' => $album,
                'title' => 'Upraviť album',
                'btn' => 'Upraviť',
                'method' => 'PUT',
            ]);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'campaign_date' => 'required|date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $album->title = $request->title;
        $album->description = $request->description;
        $album->campaign_date = $request->campaign_date;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            // Remove old thumbnail if it exists
            if ($album->thumbnail && File::exists(public_path($album->thumbnail))) {
                File::delete(public_path($album->thumbnail));
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Store the image
            $image->move(public_path('img'), $imageName);
            $album->thumbnail = 'img/' . $imageName;
        }

        if ($album->save()) {
            return redirect('/admin/albums')->with('message', 'Album "' . $album->title . '" bol úspešne upravený.');
        }

        return back()->withErrors(['save_error' => 'Nepodarilo sa upraviť album.']);
    }

    /**
     * Remove the specified album from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $album = Album::find($id);
        $message = null;

        if ($album && $album->delete()) {
            // Delete thumbnail if it exists
            if ($album->thumbnail && File::exists(public_path($album->thumbnail))) {
                File::delete(public_path($album->thumbnail));
            }

            // Delete related gallery images
            $images = GalleryImage::where('album_id', $id)->get();
            foreach ($images as $image) {
                if (File::exists(public_path($image->image_path))) {
                    File::delete(public_path($image->image_path));
                }
                $image->delete();
            }

            $message = 'Album "' . $album->title . '" bol úspešne vymazaný.';
        }
        
        $albums = Album::orderByDesc('created_at')->get();
        return view('admin-albums', ['albums' => $albums, 'message' => $message]);
    }

    /**
     * Show album images management page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showImages($id)
    {
        $album = Album::with('galleryImages')->findOrFail($id);
        return view('admin-album-images', ['album' => $album]);
    }

    /**
     * Upload new images to an album
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadImages(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $uploadedCount = 0;
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $uploadedCount . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img'), $imageName);
                
                $galleryImage = new GalleryImage();
                $galleryImage->album_id = $album->id;
                $galleryImage->image_path = 'img/' . $imageName;
                $galleryImage->title = $album->title . ' - ' . ($uploadedCount + 1);
                $galleryImage->save();
                
                $uploadedCount++;
            }
        }

        return redirect('/admin/albums/'.$album->id.'/images')->with('message', 'Bolo pridaných ' . $uploadedCount . ' fotografií do albumu "' . $album->title . '".');
    }

    /**
     * Delete an image from an album
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function deleteImage(Request $request, $id, $imageId)
    {
        $album = Album::findOrFail($id);
        $image = GalleryImage::where('album_id', $id)->findOrFail($imageId);
        
        // Delete image file
        if (File::exists(public_path($image->image_path))) {
            File::delete(public_path($image->image_path));
        }
        
        // Delete record
        $image->delete();
        
        return redirect('/admin/albums/'.$album->id.'/images')->with('message', 'Fotografia bola odstránená z albumu "' . $album->title . '".');
    }

    /**
     * Update image details
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, $id, $imageId)
    {
        $album = Album::findOrFail($id);
        $image = GalleryImage::where('album_id', $id)->findOrFail($imageId);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $image->title = $request->title;
        $image->description = $request->description;
        $image->save();
        
        return redirect('/admin/albums/'.$album->id.'/images')->with('message', 'Informácie o fotografii boli aktualizované.');
    }
}