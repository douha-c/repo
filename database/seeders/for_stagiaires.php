<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stagiaire;
use App\Models\Groupe;
use Database\Factories\UserFactory;
use Database\Factories\StagiaireFactory;
class for_stagiaires extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Groupe::factory(10)->create();
        Stagiaire::factory(10)->create();
        // DB::table('stagiaires')->insert([
        //     'nom' => 'Doe',
        //     'prenom' => 'John',
        //     'email' => 'John3@gmail.com',
        //     'date_naissance' => '1990-01-01',
        //     'note' => 10,
        //     'ville' => 'Paris',
        // ]);
    }
}
