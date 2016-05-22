<?php

use Illuminate\Database\Seeder;
;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	$this->call('UserTableSeeder');
    	$this->call('TiposLeituraSeeder');
        $this->call('ExploracaoTableSeeder');
        $this->call('EstufaTableSeeder');   
        $this->call('SensorTableSeeder'); 
        $this->call('LeiturasSeed');
    }
}
