<?php

namespace Database\Seeders;


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
       //inserts planes
        DB::table('planes')->insert([
            [
                'nombre'=>'platino',
                'precio'=>10,
                'citas'=>800,
                'clientes'=>40,
                'tipos_reportes'=>'limitados'
            ],
            
            [
                'nombre'=>'premiun',
                'precio'=>20,
                'citas'=>-1,
                'clientes'=>60,
                'tipos_reportes'=>'limitados'
            ],

            [
                'nombre'=>'Ultra',
                'precio'=>30,
                'citas'=>-1,
                'clientes'=>-1,
                'tipos_reportes'=>'ilimitados'
            ],
        ]);

        //inserts roles
        DB::table('roles')->insert([
            [
               'nombre'=>'admin' 
            ],
            [
                'nombre'=>'empleado'
            ]
        ]);

    }
}
