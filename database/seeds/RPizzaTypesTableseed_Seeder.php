<?php

use Illuminate\Database\Seeder;

class RPizzaTypesTableseed_Seeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('r_pizza_types')->delete();
        
        \DB::table('r_pizza_types')->insert(array (
            0 => 
            array (
                'pt_id' => 1,
                'pt_title' => 'Classic Pizza',
                'pt_desc' => 'Classic Pizza',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:28',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'pt_id' => 2,
                'pt_title' => 'Specialty Pizza',
                'pt_desc' => 'Specialty Pizza',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:28',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}