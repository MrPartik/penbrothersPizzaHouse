<?php

use Illuminate\Database\Seeder;

class RPizzaInformationTableseed_Seeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('r_pizza_information')->delete();
        
        \DB::table('r_pizza_information')->insert(array (
            0 => 
            array (
                'pi_id' => 1,
                'pt_id' => 1,
                'pi_title' => 'Cheese',
                'pi_desc' => 'Cheese Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'cheese-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'pi_id' => 2,
                'pt_id' => 1,
                'pi_title' => 'New York Classic',
                'pi_desc' => 'New York Classic on 10, 14, and 18 inches Crust',
                'pi_img' => 'newyork-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'pi_id' => 3,
                'pt_id' => 1,
                'pi_title' => 'Pepperoni and Mushroom',
                'pi_desc' => 'Pepperoni and Mushroom Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'pepperonimushroom-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'pi_id' => 4,
                'pt_id' => 1,
                'pi_title' => 'Manhattan',
                'pi_desc' => 'Manhattan Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'manhattan-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'pi_id' => 5,
                'pt_id' => 1,
                'pi_title' => 'Garden Special',
                'pi_desc' => 'Garden Special Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'gardenspecial-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'pi_id' => 6,
                'pt_id' => 1,
                'pi_title' => 'Hawaiian',
                'pi_desc' => 'Hawaiian Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'hawaiian-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'pi_id' => 7,
                'pt_id' => 1,
                'pi_title' => 'New York Finest',
                'pi_desc' => 'New York Finest Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'newyorkfinest-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'pi_id' => 8,
                'pt_id' => 2,
                'pi_title' => 'Tribeca Mushroom',
                'pi_desc' => 'Tribeca Mushroom Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'tribecamushroom-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'pi_id' => 9,
                'pt_id' => 2,
                'pi_title' => 'Anchovy Lovers',
                'pi_desc' => 'Anchovy Lovers Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'anchovyspecial-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'pi_id' => 10,
                'pt_id' => 2,
                'pi_title' => '#4 Cheese',
                'pi_desc' => '#4 Cheese Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => '4Cheese-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'pi_id' => 11,
                'pt_id' => 2,
                'pi_title' => 'Corona Chicken',
                'pi_desc' => 'Corona Chicken Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'coronachicken-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'pi_id' => 12,
                'pt_id' => 2,
                'pi_title' => 'Gourmet Garden',
                'pi_desc' => 'Gourmet Garden Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'gourmetgarden-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'pi_id' => 13,
                'pt_id' => 2,
                'pi_title' => 'Roasted Garlic',
                'pi_desc' => 'Roasted Garlic Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => 'roastedgarlic-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'pi_id' => 14,
                'pt_id' => 2,
                'pi_title' => 'Four Seasons',
                'pi_desc' => 'Four Seasons Pizza on 10, 14, and 18 inches Crust',
                'pi_img' => '4season-pizza.png',
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:27',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}