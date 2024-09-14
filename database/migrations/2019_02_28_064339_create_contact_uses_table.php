<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('address')->nullable();
            $table->text('phone_no')->nullable();
            $table->text('email')->nullable();
            $table->text('maps')->nullable();
            $table->text('image_path')->nullable();
            $table->text('details')->nullable();
            $table->char('status')->nullable()->default('A')->comment('A=Active, I=Inactive, D=Delete');
            $table->unsignedBigInteger('created_by')->nullable(); // Added column for creator
            $table->unsignedBigInteger('updated_by')->nullable(); // Added column for updater
            $table->timestamps();

            // Optionally, you can add foreign key constraints if there is a `users` table
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
        Schema::table('contact_uses', function (Blueprint $table) {
            // Drop foreign key constraints if they were added
            // $table->dropForeign(['created_by']);
            // $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('contact_uses');
    }
}
