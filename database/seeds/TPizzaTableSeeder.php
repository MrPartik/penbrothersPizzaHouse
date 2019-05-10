<?php

use Illuminate\Database\Seeder;

class TPizzaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('t_pizza')->delete();
        
        \DB::table('t_pizza')->insert(array (
            0 => 
            array (
                'p_id' => 1,
                'pi_id' => 1,
                'ps_id' => 1,
                'p_price' => 175.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'p_id' => 2,
                'pi_id' => 1,
                'ps_id' => 2,
                'p_price' => 285.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'p_id' => 3,
                'pi_id' => 1,
                'ps_id' => 3,
                'p_price' => 440.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'p_id' => 4,
                'pi_id' => 2,
                'ps_id' => 1,
                'p_price' => 210.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'p_id' => 5,
                'pi_id' => 2,
                'ps_id' => 2,
                'p_price' => 340.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'p_id' => 6,
                'pi_id' => 2,
                'ps_id' => 3,
                'p_price' => 530.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'p_id' => 7,
                'pi_id' => 3,
                'ps_id' => 1,
                'p_price' => 220.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'p_id' => 8,
                'pi_id' => 3,
                'ps_id' => 2,
                'p_price' => 250.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'p_id' => 9,
                'pi_id' => 3,
                'ps_id' => 3,
                'p_price' => 540.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'p_id' => 10,
                'pi_id' => 4,
                'ps_id' => 1,
                'p_price' => 250.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'p_id' => 11,
                'pi_id' => 4,
                'ps_id' => 2,
                'p_price' => 295.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'p_id' => 12,
                'pi_id' => 4,
                'ps_id' => 3,
                'p_price' => 565.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'p_id' => 13,
                'pi_id' => 5,
                'ps_id' => 1,
                'p_price' => 210.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'p_id' => 14,
                'pi_id' => 5,
                'ps_id' => 2,
                'p_price' => 340.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'p_id' => 15,
                'pi_id' => 5,
                'ps_id' => 3,
                'p_price' => 530.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'p_id' => 16,
                'pi_id' => 6,
                'ps_id' => 1,
                'p_price' => 210.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'p_id' => 17,
                'pi_id' => 6,
                'ps_id' => 2,
                'p_price' => 340.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'p_id' => 18,
                'pi_id' => 6,
                'ps_id' => 3,
                'p_price' => 530.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'p_id' => 19,
                'pi_id' => 7,
                'ps_id' => 1,
                'p_price' => 260.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'p_id' => 20,
                'pi_id' => 7,
                'ps_id' => 2,
                'p_price' => 420.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'p_id' => 21,
                'pi_id' => 7,
                'ps_id' => 3,
                'p_price' => 575.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'p_id' => 22,
                'pi_id' => 8,
                'ps_id' => 1,
                'p_price' => 245.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'p_id' => 23,
                'pi_id' => 8,
                'ps_id' => 2,
                'p_price' => 390.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'p_id' => 24,
                'pi_id' => 8,
                'ps_id' => 3,
                'p_price' => 560.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'p_id' => 25,
                'pi_id' => 9,
                'ps_id' => 1,
                'p_price' => 275.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'p_id' => 26,
                'pi_id' => 9,
                'ps_id' => 2,
                'p_price' => 450.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'p_id' => 27,
                'pi_id' => 9,
                'ps_id' => 3,
                'p_price' => 595.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'p_id' => 28,
                'pi_id' => 10,
                'ps_id' => 1,
                'p_price' => 250.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'p_id' => 29,
                'pi_id' => 10,
                'ps_id' => 2,
                'p_price' => 400.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'p_id' => 30,
                'pi_id' => 10,
                'ps_id' => 3,
                'p_price' => 560.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'p_id' => 31,
                'pi_id' => 11,
                'ps_id' => 1,
                'p_price' => 250.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'p_id' => 32,
                'pi_id' => 11,
                'ps_id' => 2,
                'p_price' => 420.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'p_id' => 33,
                'pi_id' => 11,
                'ps_id' => 3,
                'p_price' => 575.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'p_id' => 34,
                'pi_id' => 12,
                'ps_id' => 1,
                'p_price' => 250.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'p_id' => 35,
                'pi_id' => 12,
                'ps_id' => 2,
                'p_price' => 410.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'p_id' => 36,
                'pi_id' => 12,
                'ps_id' => 3,
                'p_price' => 585.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'p_id' => 37,
                'pi_id' => 13,
                'ps_id' => 1,
                'p_price' => 240.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'p_id' => 38,
                'pi_id' => 13,
                'ps_id' => 2,
                'p_price' => 405.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'p_id' => 39,
                'pi_id' => 13,
                'ps_id' => 3,
                'p_price' => 505.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'p_id' => 40,
                'pi_id' => 14,
                'ps_id' => 1,
                'p_price' => 275.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'p_id' => 41,
                'pi_id' => 14,
                'ps_id' => 2,
                'p_price' => 430.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'p_id' => 42,
                'pi_id' => 14,
                'ps_id' => 3,
                'p_price' => 590.0,
                'stats' => 1,
                'created_at' => '2019-05-11 04:05:32',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}