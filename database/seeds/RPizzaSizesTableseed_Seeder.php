<?php

use Illuminate\Database\Seeder;

class RPizzaSizesTableseed_Seeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('r_pizza_sizes')->delete();
        
        \DB::table('r_pizza_sizes')->insert(array (
            0 => 
            array (
                'ps_id' => 1,
                'ps_size' => 10.0,
                'ps_desc' => '10 Inches',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'ps_id' => 2,
                'ps_size' => 14.0,
                'ps_desc' => '14 Inches',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'ps_id' => 3,
                'ps_size' => 18.0,
                'ps_desc' => '18 Inches',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}