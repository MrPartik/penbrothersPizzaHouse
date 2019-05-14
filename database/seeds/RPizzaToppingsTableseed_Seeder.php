<?php

use Illuminate\Database\Seeder;

class RPizzaToppingsTableseed_Seeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('r_pizza_toppings')->delete();
        
        \DB::table('r_pizza_toppings')->insert(array (
            0 => 
            array (
                'pts_id' => 1,
                'pts_title' => 'Cheese',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'pts_id' => 2,
                'pts_title' => 'Bacon',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'pts_id' => 3,
                'pts_title' => 'Ground Beef',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'pts_id' => 4,
                'pts_title' => 'Ham',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'pts_id' => 5,
                'pts_title' => 'Italian Sausage',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'pts_id' => 6,
                'pts_title' => 'Pepperoni',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'pts_id' => 7,
                'pts_title' => 'Salami',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'pts_id' => 8,
                'pts_title' => 'Capers',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'pts_id' => 9,
                'pts_title' => 'Roasted Garlic',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'pts_id' => 10,
                'pts_title' => 'Bell Pepper',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'pts_id' => 11,
                'pts_title' => 'Mushrooms',
                'pts_desc' => 'None',
                'pts_img' => NULL,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}