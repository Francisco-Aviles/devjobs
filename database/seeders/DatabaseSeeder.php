<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // agregamos esta linea para que se puedan agregar los datos del seeder al momento de correr la migration
        // php artisan db:seed para ejecutarlo
        $this->call(SalarioSeeder::class);
        $this->call(CategoriasSeeder::class);
        
    }
}
