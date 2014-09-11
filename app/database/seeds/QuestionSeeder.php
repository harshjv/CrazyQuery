<?php


class QuestionSeeder extends Seeder {

    public function run() {
        DB::table('questions')->delete();

        $question_set = Config::get('crazyquery.question_selector');
        $image_dir = Config::get('crazyquery.image_dir');
        $questions = Config::get($question_set);

        $count = count($questions);

        DB::transaction(function() use($questions, $count, $image_dir) {
            for($i = 0; $i < $count; $i++) {
                if($questions[$i]['image_path']) {
                    $questions[$i]['image_path'] = '/images/'.$image_dir.'/'.($i + 1).'.png';
                } else {
                    $questions[$i]['image_path'] = NULL;
                }
                Question::create($questions[$i]);
            }
        });
    }

}