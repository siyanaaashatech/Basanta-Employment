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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('office_name_ne')->nullable()->after('office_name');
            $table->string('office_address_ne')->nullable()->after('office_address');
            $table->string('office_contact_ne')->nullable()->after('office_contact');
            $table->string('whatsapp_number_ne')->nullable()->after('whatsapp_number');
            $table->string('company_registered_date_ne')->nullable()->after('company_registered_date');
            $table->string('slogan_ne')->nullable()->after('slogan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn('office_name_ne');
            $table->dropColumn('office_address_ne');
            $table->dropColumn('office_contact_ne');
            $table->dropColumn('whatsapp_number_ne');
            $table->dropColumn('slogan_ne');
            $table->dropColumn('company_registered_date_ne');
        });
    }
};
