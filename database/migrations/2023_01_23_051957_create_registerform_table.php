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
        Schema::create('registerform', function (Blueprint $table) {
            $table->id();
            $table->string('receive_vaccine_dose');
            $table->foreignIdFor(App\Models\Vaccine::class, 'first_vaccine_type');
            $table->foreignIdFor(App\Models\Vaccine::class, 'interested_vaccine');
            $table->string('citizen_id');
            $table->string('vaccine_location');
            $table->string('vaccine_date');
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
        Schema::dropIfExists('registerform');
    }
};
