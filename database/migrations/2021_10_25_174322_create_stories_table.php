<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->string('serializedImageLocations');
            $table->timestamps();
        });
        $content = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur ad, nesciunt dolor vero perferendis a. Assumenda ab magni repellendus excepturi ratione dolore earum quaerat cupiditate officiis qui voluptatibus voluptatem quae unde nisi, illo quos, non, ipsa vitae corporis. Reprehenderit dolorem ad natus suscipit, exercitationem atque commodi ullam consectetur consequatur omnis provident illo incidunt ab aperiam doloribus iusto enim facilis? Nesciunt harum quae soluta a adipisci nobis unde, temporibus modi omnis earum cumque nulla id cupiditate laboriosam facilis, dolorum necessitatibus asperiores reiciendis? Iste nostrum, vel temporibus in et deleniti inventore iusto. Cupiditate a earum placeat autem maxime, quisquam impedit. Ullam, optio.";
        DB::table('stories')->insert([
            ['title' => 'Pribeh 1', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 2', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 3', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 4', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 5', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 6', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 7', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 8', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 9', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
            ['title' => 'Pribeh 10', 'content' => $content, 'serializedImageLocations' => '1.jpg|2.jpg|3.jpg'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
}
