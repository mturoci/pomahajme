<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->date('campaign_date');
            $table->timestamps();
        });

        DB::table('albums')->insert([
            [
                'title' => 'Letná pomoc 2024',
                'description' => 'Fotografická zbierka z letných aktivít na pomoc deťom.',
                'thumbnail' => 'img/1.jpg',
                'campaign_date' => '2024-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Vianočná zbierka 2023',
                'description' => 'Vianočná fotografická zbierka na podporu rodín v núdzi.',
                'thumbnail' => 'img/2.jpg',
                'campaign_date' => '2023-12-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Jarné aktivity 2023',
                'description' => 'Fotografická dokumentácia z jarných aktivít pre deti.',
                'thumbnail' => 'img/3.jpg',
                'campaign_date' => '2023-04-05',
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
        Schema::dropIfExists('albums');
    }
}