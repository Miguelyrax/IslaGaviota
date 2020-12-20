<?php

use App\Models\Specie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('status',[Specie::BORRADOR, Specie::REVISION, Specie::PUBLICADO])->default(Specie::BORRADOR);
            $table->string('slug');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('kind_id')->nullable();
            $table->unsignedBigInteger('habitat_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('kind_id')->references('id')->on('kinds')->onDelete('set null');
            $table->foreign('habitat_id')->references('id')->on('habitats')->onDelete('set null');
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
        Schema::dropIfExists('species');
    }
}
