<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'campaign_id',
        'image_path',
        'title',
        'description',
    ];

    /**
     * Get the campaign that owns the image.
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}