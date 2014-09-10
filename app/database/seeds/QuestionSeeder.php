<?php


class QuestionSeeder extends Seeder {

    public function run() {
        DB::table('questions')->delete();

        // $total_questions = Config::get('crazyquery.total_questions');

        // $options = serialize(array(array('id' => 0, 'title' => 'Option 0'),
        //                             array('id' => 1, 'title' => 'Option 1'),
        //                             array('id' => 2, 'title' => 'Option 2'),
        //                             array('id' => 3, 'title' => 'Option 3')
        //                             ));

        // $image = "/images/1.png";

        // $img_arr = array(1,4,6,32,9,12);

        // DB::transaction(function() use($total_questions, $options, $image, $img_arr) {
        //     for($i = 1; $i <= $total_questions; $i++) {
        //         if(in_array($i, $img_arr)) {
        //             Question::create(array('title' => 'Question number '.$i.', another dummy question', 'answer' => 1, 'options' => $options, 'image_path' => $image));
        //         }
        //         else {
        //             Question::create(array('title' => 'Question number '.$i.', another dummy question', 'answer' => 1, 'options' => $options));
        //         }
        //     }
        // });

        $questions = Config::get('questions.set_1');
        $count = count($questions);

        DB::transaction(function() use($questions, $count) {
            for($i = 0; $i < $count; $i++) {
                if($questions[$i]['image_path']) {
                    $questions[$i]['image_path'] = '/images/'.($i + 1).'.png';
                } else {
                    $questions[$i]['image_path'] = NULL;
                }
                Question::create($questions[$i]);
            }
        });
    }

}