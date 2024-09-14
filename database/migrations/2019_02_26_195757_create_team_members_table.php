<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('member_id');
            $table->string('member_name');
            $table->string('member_degi')->nullable();
            $table->char('member_position')->nullable();
            $table->text('member_image')->nullable();
            $table->text('social_link')->nullable();
            $table->char('member_status')->nullable()->default('A')->comment('A=Active, I=Inactive, D=Delete');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Adding foreign key constraints if needed
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
        Schema::table('team_members', function (Blueprint $table) {
            // Drop foreign key constraints if they were added
            // $table->dropForeign(['created_by']);
            // $table->dropForeign(['updated_by']);
        });

        Schema::dropIfExists('team_members');
    }
}
