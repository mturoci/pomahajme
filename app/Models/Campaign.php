<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'campaign_date',
    ];

    protected $casts = [
        'campaign_date' => 'date',
    ];

    /**
     * Get the gallery images for the campaign.
     */
    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }
}