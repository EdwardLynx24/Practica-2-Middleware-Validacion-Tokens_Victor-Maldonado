<?php

use Illuminate\Database\Seeder;
use App\Personas;
use App\Publicaciones;
use App\Comentarios;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(PersonasSeeder::class);
        $this->call(PublicacionesSeeder::class);
        $this->call(ComentariosSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
