<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMobileNullableInUsersTable extends Migration
{
   public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('mobile')->nullable()->change();  // unique() हटा दिया गया है
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('mobile')->nullable(false)->change();
    });
}

}
