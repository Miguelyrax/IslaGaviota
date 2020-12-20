<?php

use App\Models\Blog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status',[Blog::BORRADOR, Blog::REVISION, Blog::PUBLICADO])->default(Blog::BORRADOR);
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
          
            $table->unsignedBigInteger('category_id')->nullable();
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
         
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
