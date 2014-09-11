<?php

return array(

    'set_2' => array(
//1
	array(
        	'title' => 'A girl ’A’ told to her friend about the size and color of a snake she has seen in the beach.<br/>
             It is one of the colors brown/black/green and one of the sizes 35/45/55.<br/>
             If it were not green or if it were not of length 35 it is 55.<br/>   
             If it were not black or if it were not of length 45 it is 55.<br/>
             f it were not black or if it were not of length 35 it is 55.<br/>
            What is the color and length of the snake?',
            'answer' => 3,
            'options' => serialize(array(array('id' => 0, 'title' => 'Black ,45'),
                                        array('id' => 1, 'title' => 'Brown,35'),
                                        array('id' => 2, 'title' => 'Green,55'),
                                        array('id' => 3, 'title' => 'Brown,55')
                                    )),
            'image_path' => false
        ),
//2
	array(
        	'title' => 'A little girl counts from 1 to 1000 using the fingers of her left hand as follows.<br/>
             She starts by calling her thumb 1, the first finger 2, middle finger 3, ring finger 4, and little finger 5.<br/>
             Then she reverses direction, calling the ring finger 6, middle finger 7, the first finger 8, and her thumb 9,<br/>
              after which she calls her first finger 10, and so on. If she continues to count in this manner, on which finger will she stop? ',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => 'Thumb'),
                                        array('id' => 1, 'title' => 'First'),
                                        array('id' => 2, 'title' => 'Second'),
                                        array('id' => 3, 'title' => 'Third ')
                                    )),
            'image_path' => false
        ),
        
//3
array(
            'title' => 'You have 20 black balls and 16 white balls in a bag. You repeat the following operation until a single ball is left in the bag.<br/>
             You remove two balls at a time. If they are of the same colour, you add a black ball to the bag;<br/>
             if they are of different colours, you add a white ball to the bag. Can you predict the colour of the last ball left in the bag??',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => ' White '),
                                        array('id' => 1, 'title' => '  Black'),
                                        array('id' => 2, 'title' => ' Both'),
                                        array('id' => 3, 'title' => ' none of above')
                                    )),
            'image_path' => false
        ),
//4
array(
            'title' => 'There are 20 gloves in a drawer: 5 pairs of black gloves, 3 pairs of brown and 2 pairs of grey.<br/>
             You select the gloves in the dark and can check them only after a selection has been made.<br/>
              What is the smallest number of gloves you need to select to guarantee getting the following?<br/>
                (a) At least one matching pair<br/>
                (b) At least one matching pair of each colour',
            'answer' => 0,
            'options' => serialize(array(array('id' => 0, 'title' => ' 11 and 19 gloves '),
                                        array('id' => 1, 'title' => '  19 and 11 gloves'),
                                        array('id' => 2, 'title' => ' 11 and 12 gloves'),
                                        array('id' => 3, 'title' => ' 19 and 10 gloves')
                                    )),
            'image_path' => false
        ),
//5
array(
            'title' => 'A car odometer can display any six-digit combination from 000,000 to 999,999, inclusive.<br/>
                        If it runs through its entire range,<br/>
                        a)  How many such combinations will have at least one digit 1 in them? <br/>
                        b)  What is the total number of times the digit 1 will be displayed? <br/>
                        (For example, 101,111 contribute five toward the total count of 1’s, and the next reading of 101,112 ads four more.)',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => ' 465,555 and 600,000 '),
                                        array('id' => 1, 'title' => '  468,559 and 600,000'),
                                        array('id' => 2, 'title' => ' 465,555 and 601,000'),
                                        array('id' => 3, 'title' => ' 468,559 and 601,000')
                                    )),
            'image_path' => false
        ),
//6
array(
            'title' => 'Shuffle a 52-card deck and lay the cards face up on a table to form an array of 4 rows and 13 columns.<br/>
            Sort each row by the cards’ rank that is in non-decreasing order of their numerical value<br/>
             (where the Ace is 1, and the Jack, Queen, and King are 11, 12, and 13, respectively).<br/>
              Resolve ties among cards of the same rank by some predefined rule, say, clubs (lowest), and followed by diamonds, hearts, and spades (highest). <br/>
              Then sort each column of the new array. If you decide to sort each row again, what is the largest number of card pairs that will have to be swapped to do this?',
            'answer' => 0,
            'options' => serialize(array(array('id' => 0, 'title' => ' 0 '),
                                        array('id' => 1, 'title' => '  1'),
                                        array('id' => 2, 'title' => ' 2'),
                                        array('id' => 3, 'title' => ' 3')
                                    )),
            'image_path' => false
        ),
//7
array(
            'title' => 'What is the minimum number of moves needed for a chess knight to go From one corner of a 100 × 100 board to the diagonally opposite corner?',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => '65'),
                                        array('id' => 1, 'title' => '66'),
                                        array('id' => 2, 'title' => '67'),
                                        array('id' => 3, 'title' => '68')
                                    )),
            'image_path' => false
        ),
//8
array(
            'title' => 'The squares of an 8×8 chessboard are mistakenly coloured in blocks of two Colours as shown in given Figure.<br/> 
                You need to cut this board along some lines separating its rows and columns so that the standard 8 × 8 chessboard can be reassembled <br/>
                from the pieces obtained. What is the minimum number of pieces into which the board needs to be cut? ',
            'answer' => 2,
            'options' => serialize(array(array('id' => 0, 'title' => '20 pieces'),
                                        array('id' => 1, 'title' => '24 pieces'),
                                        array('id' => 2, 'title' => '25 pieces'),
                                        array('id' => 3, 'title' => '26 pieces')
                                    )),
            'image_path' => true
        ),
//9
array(
            'title' => 'The object of this puzzle is to place the largest possible number of coins at points of the eight-pointed star depicted in Figure. <br/>
                    The coins should be placed one after another, with the following restrictions: <br/>
                 (i) a coin needs to be placed first on an unoccupied point and then moved along a line to another unoccupied point, and <br/>
                (ii) Once a coin has been positioned in this manner, it cannot be moved again. For example, we can start by placing the first coin on point 6 and then moving it to point 1 (denoted 6→1), Where the coin will have to remain. <br/>
                    We can continue, say, with the following sequence of moves: 7→2, 8→3, 7→4, 8→5, which places five coins.<br/>
                    The largest number of coins that can be placed is:',
            'answer' => 2,
            'options' => serialize(array(array('id' => 0, 'title' => '5'),
                                        array('id' => 1, 'title' => '6'),
                                        array('id' => 2, 'title' => '7'),
                                        array('id' => 3, 'title' => '8')
                                    )),
            'image_path' => true
        ),
//10
array(
            'title' => 'A 10 × 10 table is filled with repeating numbers on its diagonals as shown in Figure.<br/> 
            Calculate the total sum of the table’s numbers in your head',
            'answer' => 0,
            'options' => serialize(array(array('id' => 0, 'title' => '1000'),
                                        array('id' => 1, 'title' => '1520'),
                                        array('id' => 2, 'title' => '1500'),
                                        array('id' => 3, 'title' => '1200')
                                    )),
            'image_path' => true
        ),
//11
array(
            'title' => 'Find the number of different shortest paths from point A to point B in a city with perfectly horizontal streets and vertical <br/>
                        avenues as shown in Figure. No path can cross the fenced off area shown in grey in the figure.',
            'answer' => 0,
            'options' => serialize(array(array('id' => 0, 'title' => '17'),
                                        array('id' => 1, 'title' => '16'),
                                        array('id' => 2, 'title' => '15'),
                                        array('id' => 3, 'title' => '20')
                                    )),
            'image_path' => true
        ),
//12
array(
            'title' => 'Which number replaces the question mark?',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => '0'),
                                        array('id' => 1, 'title' => '1'),
                                        array('id' => 2, 'title' => '4'),
                                        array('id' => 3, 'title' => '2')
                                    )),
            'image_path' => true
        ),
//13
array(
            'title' => 'A jigsaw puzzle contains 500 pieces. A “section” of the puzzle is a set of one or more pieces that have been connected to each other. <br/>
            A “move” consists of connecting two sections. What is the minimum number of moves in which the puzzle can be completed?',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => '498'),
                                        array('id' => 1, 'title' => '499'),
                                        array('id' => 2, 'title' => '497'),
                                        array('id' => 3, 'title' => '496')
                                    )),
            'image_path' => false
        ),
//14
array(
            'title' => 'Pages of a book are numbered sequentially starting with 1.<br/> 
            If the total number of decimal digits used is equal to 1578, how many pages are there in the book?',
            'answer' => 0,
            'options' => serialize(array(array('id' => 0, 'title' => '562 pages.'),
                                        array('id' => 1, 'title' => '563 pages'),
                                        array('id' => 2, 'title' => '565 pages'),
                                        array('id' => 3, 'title' => '566 pages')
                                    )),
            'image_path' => false
        ),
//15
array(
            'title' => 'If we generate a list of all “words” made of letters G, I, N, R, T, and U in lexicographic order starting with GINRTU and<br/>
             ending with UTRNIG, what position in the list will be occupied by TURING? ',
            'answer' => 0,
            'options' => serialize(array(array('id' => 0, 'title' => '598'),
                                        array('id' => 1, 'title' => '597'),
                                        array('id' => 2, 'title' => '596'),
                                        array('id' => 3, 'title' => '595')
                                    )),
            'image_path' => false
        ),
//16
array(
            'title' => 'If you\'re a fitness walker, there is no need for a commute to a health club.<br/>
             Your neighborhood can be your health club. You don\'t need a lot of fancy equipment to get a good workout either.<br/>
              All you need is a well-designed pair of athletic shoes.This paragraph best supports the statement that',
            'answer' => 3,
            'options' => serialize(array(array('id' => 0, 'title' => 'fitness walking is a better form of exercise than weight lifting.'),
                                        array('id' => 1, 'title' => 'walking outdoors provides a better workout than walking indoors.'),
                                        array('id' => 2, 'title' => 'fitness walking is a convenient and valuable form of exercise.'),
                                        array('id' => 3, 'title' => 'poorly designed athletic shoes can cause major foot injuries.')
                                    )),
            'image_path' => false
        ),
//17
array(
            'title' => 'In a soap company soap is manufactured with 11 parts.For making one soap you will get 1 part as scrap.<br/> 
            At the end of the day u have 251 such scraps.From that how much soap can be manufactured?',
            'answer' => 3,
            'options' => serialize(array(array('id' => 0, 'title' => '22'),
                                        array('id' => 1, 'title' => '24'),
                                        array('id' => 2, 'title' => '23'),
                                        array('id' => 3, 'title' => '25')
                                    )),
            'image_path' => false
        ),
//18
array(
            'title' => 'What day comes three days after the day which comes two days after the day which comes immediately after the day<br/>
                     which comes two days after Monday?',
            'answer' => 1,
            'options' => serialize(array(array('id' => 0, 'title' => 'WEDNESDAY'),
                                        array('id' => 1, 'title' => 'TUESDAY'),
                                        array('id' => 2, 'title' => 'THURSDAY'),
                                        array('id' => 3, 'title' => 'SATURDAY')
                                    )),
            'image_path' => false
        ),
//19
array(
            'title' => 'Four defensive football players are chasing the opposing wide receiver,<br/>
             who has the ball. Calvin is directly behind the ball carrier. Jenkins and Burton are side by side behind Calvin. <br/>
             Zeller is behind Jenkins and Burton. Calvin tries for the tackle but misses and falls. <br/>
             Burton trips. Which defensive player tackles the receiver?',
            'answer' => 2,
            'options' => serialize(array(array('id' => 0, 'title' => 'Burton'),
                                        array('id' => 1, 'title' => 'Zeller'),
                                        array('id' => 2, 'title' => 'Jenkins'),
                                        array('id' => 3, 'title' => 'Calvin')
                                    )),
            'image_path' => false
        ),
//20
array(
            'title' => 'Eileen is planning a special birthday dinner for her husband\'s 35th birthday.<br/> 
            She wants the evening to be memorable, but her husband is a simple man who would rather be in jeans at a baseball game <br/>
            than in a suit at a fancy restaurant. Which restaurant below should Eileen choose?',
            'answer' => 3,
            'options' => serialize(array(array('id' => 0, 'title' => 'Alfredo\'s offers fine Italian cuisine and an elegant Tuscan decor. Patrons will feel as though they\'ve spent the evening in a luxurious Italian villa. '),
                                        array('id' => 1, 'title' => 'Pancho\'s Mexican Buffet is an all-you-can-eat family style smorgasbord with the best tacos in town'),
                                        array('id' => 2, 'title' => 'The Parisian Bistro is a four-star French restaurant where guests are treated like royalty. Chef Dilbert Olay is famous for his beef bourguignon.'),
                                        array('id' => 3, 'title' => 'Marty\'s serves delicious, hearty meals in a charming setting reminiscent of a baseball clubhouse in honor of the owner, Marty Lester, a former major league baseball all-star.')
                                    )),
            'image_path' => false
        )
    )

);