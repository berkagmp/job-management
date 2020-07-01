<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['admin', 'Derek', 'Park', 'Derek', 'Derek', 'berkagmp@gmail.com', '02102982776', 'password'];
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
            'created_at'    => \Carbon\Carbon::now(),
        ]);
    }
}
