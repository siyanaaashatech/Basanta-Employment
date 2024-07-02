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
        Schema::table('blog_posts_categories', function (Blueprint $table) {
            $table->string('title_ne')->nullable()->after('title');
            $table->string('content_ne')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_posts_categories', function (Blueprint $table) {
            $table->dropColumn('title_ne');
            $table->dropColumn('content_ne');
        });
    }
};
