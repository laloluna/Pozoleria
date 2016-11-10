<?php

use Illuminate\Database\Seeder;

class SeedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => 1,
        	'name' => 'pozolero1',
        	'email' => 'p1@gmail.com',
        	'password' => bcrypt('secret'),
        ]);
    }
}
