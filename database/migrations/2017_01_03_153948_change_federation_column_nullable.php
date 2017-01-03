<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFederationColumnNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('federations', function (Blueprint $table) {
            $table->mediumText('address')->nullable()->change();
            $table->mediumText('website')->nullable()->change();
            $table->date('established_date')->nullable()->change();
            $table->text('phone')->nullable()->change();
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
            //
        });
    }
}
