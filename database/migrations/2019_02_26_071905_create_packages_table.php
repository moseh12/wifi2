<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('package_id');
            $table->string('package_name');
            $table->string('package_heading')->nullable();
            $table->string('package_tag')->nullable();
            $table->unsignedSmallInteger('package_price')->nullable();
            $table->string('package_time')->nullable()->default('monthly');
            $table->text('package_details')->nullable();
            $table->char('package_status')->nullable()->default('A')->comment('A=Active, I=Inactive, D=Delete');

            // Correct column definitions for created_by and updated_by
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Adding foreign key constraints if necessary
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

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
        Schema::table('packages', function (Blueprint $table) {
            // Drop foreign key constraints before dropping columns
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('packages');
    }
}
