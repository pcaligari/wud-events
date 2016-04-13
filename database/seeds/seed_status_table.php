<?php

use Illuminate\Database\Seeder;

class seed_status_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'code' => 'AP',
            'description' => 'Awaiting review panel'
        ]);
        DB::table('status')->insert([
            'code' => 'OR',
            'description' => 'Panel opinion rendered'
        ]);
        DB::table('status')->insert([
            'code' => 'SF',
            'description' => 'Suit filed'
        ]);
        DB::table('status')->insert([
            'code' => 'CL',
            'description' => 'Closed'
        ]);
    }
}
