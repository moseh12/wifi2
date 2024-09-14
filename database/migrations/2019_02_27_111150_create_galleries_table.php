<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('gallery_id');
            $table->string('gallery_title')->nullable();
            $table->text('gallery_url');
            $table->char('gallery_type')->nullable()->default('Image')->comment('Image, Video');
            $table->char('gallery_status')->nullable()->default('A')->comment('A=Active, I=Inactive, D=Delete');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // If you want to add foreign key constraints, uncomment these lines
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            // Drop foreign key constraints if added
            // $table->dropForeign(['created_by']);
            // $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('galleries');
    }
}
