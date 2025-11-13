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
        $this->call(TDocumentoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(ArlSeeder::class);
        $this->call(CajaSeeder::class);
        $this->call(AfpSeeder::class);
        $this->call(EpsSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SalarioSeeder::class);
        $this->call(EmpresalSeeder::class);

        User::factory()->create([
            'name' => 'German Alberto Ortiz',
            'email' => 'kronos1624@yahoo.es',
            'password' => bcrypt('12345678'),
            'empresa_id' => 1,
        ])->assignRole('Administrador');
    }
}
