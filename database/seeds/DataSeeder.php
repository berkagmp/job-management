<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['admin', 'Derek', 'Park', 'Derek', 'Derek', 'berkagmp@gmail.com', '02102982776', 'password']
        ];
        foreach ($users as $data) {
            $idx = 0;

            DB::table('users')->insert([
                'uid'           => $data[$idx++],
                'firstname'     => $data[$idx++],
                'lastname'      => $data[$idx++],
                'name'          => $data[$idx++],
                'username'      => $data[$idx++],
                'email'         => $data[$idx++],
                'phone'         => $data[$idx++],
                'password'      => bcrypt($data[$idx++]),
                'created_at'    => Carbon::now(),
            ]);
        }

        $types = ['Meth Testing', 'Asbestos Testing', 'Smoke Alarm', 'Healthy Homes Assessment'];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type,
            ]);
        }

        $jobs = [
            [1, 2, '2020-07-10', '16:20:00', '9H Veneto Avenue', 150.00],
            [1, 1, '2020-07-15', '10:10:00', '9H Veneto Avenue', 50.00],
            [1, 3, '2020-07-20', '12:09:00', '9H Veneto Avenue', 350.00],
            [1, 1, '2020-07-30', '14:11:00', '9H Veneto Avenue', 950.00],
            [1, 2, '2020-07-05', '20:14:00', '9H Veneto Avenue', 220.00]
        ];
        foreach ($jobs as $data) {
            $idx = 0;

            DB::table('jobs')->insert([
                'user_id'       => $data[$idx++],
                'type_id'       => $data[$idx++],
                'date'          => $data[$idx++],
                'time'          => $data[$idx++],
                'location'      => $data[$idx++],
                'price'         => $data[$idx++],
                'created_at'    => Carbon::now(),
            ]);
        }
    }
}
