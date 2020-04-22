<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name')->nullable()->change();
            $table->string('family_name_kana')->nullable()->change();
            $table->string('first_name')->nullable()->change();
            $table->string('first_name_kana')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->integer('birthday')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name')->nullable(false)->change();
            $table->string('family_name_kana')->nullable(false)->change();
            $table->string('first_name')->nullable(false)->change();
            $table->string('first_name_kana')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->integer('age')->nullable(false)->change();
            $table->intger('birthday')->nullable(false)->change();
        });
    }
}
