<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMailPresidentFieldFederations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('federations', function (Blueprint $table) {
            $table->string("president_name")->after('website')->nullable();
            $table->string("email")->after('president_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('federations', function (Blueprint $table) {
            $table->dropColumn('president_name');
            $table->dropColumn('email');
        });
    }
}