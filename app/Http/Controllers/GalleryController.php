<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    /**
     * Display a listing of all campaigns.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::orderBy('campaign_date', 'desc')->paginate(9);
        return view('gallery.index', compact('campaigns'));
    }

    /**
     * Display the specified campaign with its gallery images.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = Campaign::with('galleryImages')->findOrFail($id);
        return view('gallery.show', compact('campaign'));
    }

    /**
     * Display the specified image detail.
     *
     * @param  int  $campaignId
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function showImage($campaignId, $imageId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        $image = GalleryImage::where('campaign_id', $campaignId)->findOrFail($imageId);
        
        return view('gallery.image', compact('campaign', 'image'));
    }
}