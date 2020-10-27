<?php
use App\Publicaciones;
use Illuminate\Database\Seeder;

class PublicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publicaciones::class,20)->create();
    }
}
