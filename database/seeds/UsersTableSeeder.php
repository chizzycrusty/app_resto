<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\User::truncate(); // Vide la base de données

 		factory(\App\Models\User::class, 20)->create(); // Créer 20 utilisateurs
    }
}
