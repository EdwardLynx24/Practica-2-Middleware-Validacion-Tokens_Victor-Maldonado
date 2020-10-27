<?php
use App\Comentarios;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comentarios::class,20)->create();
    }
}
