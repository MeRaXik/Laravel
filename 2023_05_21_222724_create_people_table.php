<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('street');
            $table->string('city_country');
            $table->timestamps();
        });

        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            DB::table('people')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'street' => $faker->streetAddress,
                'city_country' => $faker->city . ', ' . $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
