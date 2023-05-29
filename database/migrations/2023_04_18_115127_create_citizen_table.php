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
        Schema::create('citizen', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("DOF");
            $table->string("sex");
            $table->string("age");
            $table->string("indigenous");
            $table->string("region");
            $table->string("province");
            $table->string("city_municipality");
            $table->string("barangay");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen');
    }
};
