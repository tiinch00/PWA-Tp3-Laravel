<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->after('id_post');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });
    }
};
