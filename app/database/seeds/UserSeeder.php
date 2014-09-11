<?php


class UserSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        $total_users = Config::get('crazyquery.total_users');
        $total_questions = Config::get('crazyquery.total_questions');
        $question_set = Config::get('crazyquery.question_selector');

        $questions = Config::get($question_set);
        $question_count = count($questions);

        DB::transaction(function() use($total_users, $total_questions, $question_count) {
            for($i = 1; $i <= $total_users; $i++) {
                User::create(array('username' => 'user_'.$i, 'password' => Hash::make('pass_'.$i), 'random_questions' => self::randomRange(1, $question_count, $total_questions)));
            }
        });
    }

    private static function randomRange($min, $max, $count){
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $count);
    }

}