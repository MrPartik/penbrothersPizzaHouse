<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableseed_Seeder::class);
        $this->call(RPizzaSizesTableseed_Seeder::class);
        $this->call(RPizzaToppingsTableseed_Seeder::class);
        $this->call(RPizzaTypesTableseed_Seeder::class);
        $this->call(RPizzaInformationTableseed_Seeder::class);
        $this->call(TToppingsTableseed_Seeder::class);
    }
}
