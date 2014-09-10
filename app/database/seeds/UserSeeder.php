<?php


class UserSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        $total_users = Config::get('crazyquery.total_users');

        DB::transaction(function() use($total_users) {
            for($i = 1; $i <= $total_users; $i++) {
                User::create(array('username' => 'user_'.$i, 'password' => Hash::make('pass_'.$i)));
            }
        });
    }

}