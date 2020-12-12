<?php

use Illuminate\Database\Seeder;
use App\Crud;
class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Crud::class,100)->create();
    }
}
