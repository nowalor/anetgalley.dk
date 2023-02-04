<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homepage_information', function (Blueprint $table) {
            $table->string('title_en')->default('Title coming soon');
            $table->string('title_dk')->default('Title coming soon');
            $table->string('tagline_en')->default('Tagline coming soon');
            $table->string('tagline_dk')->default('Tagline coming soon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homepage_information', function (Blueprint $table) {
            $table->dropColumn('title_en');
            $table->dropColumn('title_dk');
            $table->dropColumn('tagline_en');
            $table->dropColumn('tagline_dk');
        });
    }
};
