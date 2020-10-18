<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    const TABLE_NAME = 'users_students';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table(self::TABLE_NAME)->count() == 0) {
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'user_uuid' => Str::uuid(),
                'facility_uuid' => Str::uuid(),
                'specialization_uuid' => Str::uuid(),
                'first_name' => "mohamed",
                'second_name' => "khaled",
                'third_name' => "mohammad",
                'family_name' => "altamimi",
                'year_of_study' => "1",
                'status' => "active",
            ]);
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'user_uuid' => Str::uuid(),
                'facility_uuid' => Str::uuid(),
                'specialization_uuid' => Str::uuid(),
                'first_name' => "ahmad",
                'second_name' => "salah",
                'third_name' => "mohammad",
                'family_name' => "alwadi",
                'year_of_study' => "1",
                'status' => "active",
            ]);
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'user_uuid' => Str::uuid(),
                'facility_uuid' => Str::uuid(),
                'specialization_uuid' => Str::uuid(),
                'first_name' => "mohammad",
                'second_name' => "adnan",
                'third_name' => "alomar",
                'family_name' => "altamimi",
                'year_of_study' => "1",
                'status' => "active",
            ]);
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'user_uuid' => Str::uuid(),
                'facility_uuid' => Str::uuid(),
                'specialization_uuid' => Str::uuid(),
                'first_name' => "hazem",
                'second_name' => "khaled",
                'third_name' => "mohammad",
                'family_name' => "alqasem",
                'year_of_study' => "1",
                'status' => "active",
            ]);
            DB::table(self::TABLE_NAME)->insert([
                'uuid' => Str::uuid(),
                'user_uuid' => Str::uuid(),
                'facility_uuid' => Str::uuid(),
                'specialization_uuid' => Str::uuid(),
                'first_name' => "bader",
                'second_name' => "khaled",
                'third_name' => "mohammad",
                'family_name' => "alzetawi",
                'year_of_study' => "1",
                'status' => "active",
            ]);
        }
    }
}
