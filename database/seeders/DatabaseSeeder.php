<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('recipes')->insert([
            'creator_id' => 1,
            'name'=> 'Prvi recept',
            'description' => 'Opis prvog recepta',
            'created_at'=>now(),
            'updated_at'=>now(),
            'image' => 'random/putanja/jebiga'
        ]);

        DB::table('recipes')->insert([
            'creator_id' => 1,
            'name'=> 'Drugi recept',
            'description' => 'Opis drugog recepta',
            'created_at'=>now(),
            'updated_at'=>now(),
            'image' => 'random/putanja/jebiga2'
        ]);

        DB::table('ingredients')->insert([
            'recipe_id' => 1,
            'name'=> 'Prvi sastojak',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('ingredients')->insert([
            'recipe_id' => 1,
            'name'=> 'Drugi sastojak',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('ingredients')->insert([
            'recipe_id' => 2,
            'name'=> 'Prvi sastojak',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('ingredients')->insert([
            'recipe_id' => 2,
            'name'=> 'Drugi sastojak',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
