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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('title_ne')->nullable()->after('title'); 
            $table->string('content_ne')->nullable()->after('content');
            $table->string('description_image')->nullable()->after('description_ne');  
            $table->string('scope')->nullable()->after('content_ne'); 
            $table->string('scope_ne')->nullable()->after('scope'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            //
        });
    }
};
