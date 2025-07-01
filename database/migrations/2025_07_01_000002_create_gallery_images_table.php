<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Add some dummy data using existing images from the img directory
        DB::table('gallery_images')->insert([
            [
                'campaign_id' => 1,
                'image_path' => 'img/1.jpg',
                'title' => 'Letný tábor - Aktivity',
                'description' => 'Deti sa zúčastňujú letných aktivít v tábore.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campaign_id' => 1,
                'image_path' => 'img/2.jpg',
                'title' => 'Letný tábor - Výlet',
                'description' => 'Spoločný výlet do prírody.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campaign_id' => 1,
                'image_path' => 'img/3.jpg',
                'title' => 'Letný tábor - Športové hry',
                'description' => 'Športové aktivity pre deti.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campaign_id' => 2,
                'image_path' => 'img/1.jpg',
                'title' => 'Vianočná besiedka',
                'description' => 'Spoločné zdobenie stromčeka.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campaign_id' => 2,
                'image_path' => 'img/2.jpg',
                'title' => 'Rozdávanie darčekov',
                'description' => 'Odovzdávanie darčekov deťom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campaign_id' => 3,
                'image_path' => 'img/3.jpg',
                'title' => 'Jarný piknik',
                'description' => 'Piknik v parku s rodinami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campaign_id' => 3,
                'image_path' => 'img/1.jpg',
                'title' => 'Sadenie stromčekov',
                'description' => 'Environmentálna aktivita.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_images');
    }
}