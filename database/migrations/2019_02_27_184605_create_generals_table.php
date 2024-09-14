<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->longText('details')->nullable();
            $table->longText('image_path')->nullable();
            $table->char('status')->nullable()->default('A')->comment('A=Active, D=Delete');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Optionally, you can add foreign key constraints if you have a users table
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
        Schema::table('generals', function (Blueprint $table) {
            // Drop foreign key constraints if you added them
            // $table->dropForeign(['created_by']);
            // $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('generals');
    }
}
