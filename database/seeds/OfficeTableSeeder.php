<?php

use Illuminate\Database\Seeder;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            [
                'name' => 'Handico Office',
                'address' => 'Handico - Ha Noi',
                'wsm_workspace_id' => '1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Tran Khat Chan',
                'address' => 'Tran Khat Chan',
                'wsm_workspace_id' => '2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => '	HCMC Office',
                'address' => 'HCM',
                'wsm_workspace_id' => '3',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Da Nang Office',
                'address' => 'Da Nang',
                'wsm_workspace_id' => '4',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Hanoi Office',
                'address' => 'Hanoi Office',
                'wsm_workspace_id' => '5',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
