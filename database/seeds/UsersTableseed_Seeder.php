<?php

use Illuminate\Database\Seeder;

class UsersTableseed_Seeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'John Patrick Loyola',
                'email' => 'loyolapat04@gmail.com',
                'role' => 'user',
                'phone' => '09309758130',
                'address' => 'Sa bahay ko',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0XKsCbrUQS0tFrBssDLNBO0ZcU5g65BVbFrSD3m4dASOHTapw3N1a',
                'remember_token' => NULL,
                'created_at' => '2019-05-11 04:47:23',
                'updated_at' => '2019-05-11 04:47:23',
            ),
        ));
        
        
    }
}