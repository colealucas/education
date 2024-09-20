<?php
/**
 * Theme flexible content
 * 
 */

 ?>

<?php if( get_row_layout() == 'text_content' ) :  // text_content section
    $css_classes      = [];
    $section_title    = get_sub_field('title');
    $section_content  = get_sub_field('content');
    $full_with_images = get_sub_field('full_with_images');
    $check_paragraphs = get_sub_field('check_paragraphs');
    $click_words      = get_sub_field('click_words');
    $add_table_boders = get_sub_field('add_table_boders');

    if ($full_with_images) {
        $css_classes[] = 'full-width-images';
    }

    if ($check_paragraphs) {
        $css_classes[] = 'check-paragraphs';
    }

    if ($click_words) {
        $css_classes[] = 'click-words';
    }

    if ($add_table_boders) {
        $css_classes[] = 'table-borders';
    }

    // convert array of classes to string
    $addition_classes = implode(' ', $css_classes);
?>

    <div class="flexible-content-section text-content-section my-24px">
        <?php if ( $section_title ) : ?>
            <div class="tcs-heading mb-16px bg-green text-white py-20px px-24px rounded-16px">
                <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                    <span class="w-30px block">
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                            <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="w-[calc(100%-42px)] block">
                        <?php echo $section_title; ?>
                    </span>
                </h2>
            </div>
        <?php endif; ?>

        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video <?php echo $addition_classes; ?>">
            <?php echo $section_content; ?>
        </div>
    </div>


<?php elseif( get_row_layout() == 'video_section' ) : // video_section
    $video_link = get_sub_field('video_code');
?>

    <div class="flexible-content-section video-section my-24px">
        <?php if ( $video_link ) : ?>
            <div class="video-container">
                <?php echo $video_link; ?>
            </div>
        <?php endif; ?>
    </div>


<?php elseif( get_row_layout() == 'match_words_with_definition' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');
?>

    <div class="flexible-content-section match-definitions my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="match-definitions-wrap my-24px flex flex-col gap-16px">
            <?php if( have_rows('definitions') ): ?>
                <?php while( have_rows('definitions') ): the_row();
                    $word = get_sub_field('word');
                    $def = get_sub_field('definition');
                ?>
                
                    <div class="flex flex-nowrap gap-24px">
                        <div class="w-50% definitions-column">
                            <div class="definition rounded-8px py-16px px-20px bg-light-gray font-600 text-16px" data-word="<?php echo $word; ?>">
                                <?php echo $def; ?>
                            </div>
                        </div>

                        <div class="w-50% placeholders-column flex items-center">
                            <div class="placeholder h-full rounded-8px text-16px font-600 flex items-center justify-center w-full min-h-[40px]" data-word="<?php echo $word; ?>"></div>
                        </div>
                    </div>

                <?php endwhile; ?>

                <div class="words mt-20px bg-light-green p-24px flex gap-10px flex-wrap justify-center rounded-8px">
                    <?php 
                        $words_data = [];

                        while( have_rows('definitions') ): the_row();
                            $word = get_sub_field('word');
                            $words_data[] = $word;
                        endwhile; 
                    ?>

                    <?php 
                        if( !empty($words_data) ) {
                            shuffle($words_data);
                        }
                    ?>
                    
                    <?php if( !empty($words_data) ) : 
                        foreach( $words_data as $the_word ) : ?>
                            <div class="word inline-flex items-center justify-center max-w-[50%] p-8px text-center rounded-8px text-16px font-600 leading-120 border-medium-gray border-2px border-solid bg-white" draggable="true" data-word="<?php echo $the_word; ?>">
                                <span class="inline-block mr-6px text-gray">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 2.89331L8.81809 6.07529L9.87875 7.13595L11.2501 5.76463V11.2499H5.7649L7.13619 9.8786L6.07553 8.81794L2.89355 11.9999L6.07553 15.1819L7.13619 14.1212L5.76485 12.7499H11.2501V18.2352L9.87875 16.8639L8.81809 17.9245L12.0001 21.1065L15.182 17.9245L14.1214 16.8639L12.7501 18.2352V12.7499H18.2353L16.8639 14.1213L17.9246 15.1819L21.1066 11.9999L17.9246 8.81796L16.8639 9.87862L18.2352 11.2499H12.7501V5.76463L14.1214 7.13595L15.182 6.07529L12.0001 2.89331Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <?php echo $the_word; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>
    </div>


<?php elseif( get_row_layout() == 'square_table_find_words' ) : // video_section
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');
    $grid_total_rows = get_sub_field('grid_total_rows');
    $grid_total_cols = get_sub_field('grid_total_cols');

    $words_repeater = get_sub_field('words');
    $words_to_discover = [];
    $words_js_object = '[]'; // empty js array by default
    $game_words = [];

    if( $words_repeater ) : 
        foreach( $words_repeater as $word_array ) :
            $words_to_discover[] = $word_array['word'];
            $the_word = $word_array['word'];
            $direction = $word_array['direction'];
            $row_number = ($direction == 'horizontal' ? intval($word_array['horizontal_row_number']) - 1 : 0);
            $col_number = ($direction == 'vertical' ? intval($word_array['vertical_column_number']) - 1 : 0);
            $start = ($direction == 'horizontal' ? intval($word_array['horizontal_start']) - 1 : intval($word_array['vertical_row_start']) - 1 );
            $end = ($direction == 'horizontal' ? intval($word_array['horizontal_end']) - 1 : intval($word_array['vertical_row_end']) -1 );

            if ( isset($the_word) && isset($direction) && isset($start) && isset($end) && $end > 0 ) {
                $tem_array = [];
                $tem_array['word'] = $the_word;
                $tem_array['direction'] = $direction;

                if ( $direction == 'horizontal' ) {
                    $tem_array['row'] = $row_number;
                } else {
                    $tem_array['col'] = $col_number;
                }

                $tem_array['start'] = $start;
                $tem_array['end'] = $end;

                $game_words[] = $tem_array;

                // ['word' => 'multimedia', 'direction' => 'horizontal', 'row' => 0, 'start' => 8, 'end' => 17],
                // ['word' => 'TELEFON', 'direction' => 'vertical', 'col' => 10, 'start' => 5, 'end' => 11],
            }

            //echo "word: $the_word | direction: $direction  | row: $row_number |  col: $col_number | start: $start | end: $end <br>";
        endforeach;
    endif;

    // debug
    // print_r( $game_words );
    // echo "<br><br>";

    if ( count( $words_to_discover ) ) {
        $jsonString = json_encode($words_to_discover, JSON_UNESCAPED_UNICODE); // Convert the PHP array to a JSON string

        // Escape single quotes, double quotes, and HTML special characters
        $escaped_json_string = htmlspecialchars($jsonString, ENT_QUOTES, 'UTF-8');
        $words_js_object = $escaped_json_string;
    }
?>

    <div class="flexible-content-section match-definitions my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="square-table-game square-table-wrap my-36px" data-words='<?php echo $words_js_object; ?>'>
            <?php
            //    $grid = [
            //         ['G', 'T', 'B', 'T', 'A', 'O', 'X', 'S', 'M', 'U', 'L', 'T', 'I', 'M', 'E', 'D', 'I', 'A'],
            //         ['P', 'R', 'Y', 'O', 'M', 'P', 'R', 'E', 'S', 'A', 'S', 'C', 'R', 'I', 'S', 'Ă', 'U', 'K'],
            //         ['R', 'K', 'N', 'Y', 'W', 'Q', 'U', 'S', 'Ă', 'I', 'Z', 'X', 'S', 'A', 'X', 'Ă', 'V', 'X'],
            //         ['E', 'P', 'R', 'E', 'S', 'A', 'A', 'U', 'D', 'I', 'O', 'V', 'I', 'Z', 'U', 'A', 'L', 'Ă'],
            //         ['S', 'Ă', 'D', 'J', 'V', 'P', 'A', 'H', 'T', 'L', 'O', 'B', 'T', 'T', 'Z', 'J', 'H', 'I'],
            //         ['A', 'N', 'V', 'X', 'F', 'K', 'S', 'G', 'Ă', 'A', 'D', 'R', 'E', 'V', 'I', 'S', 'T', 'E'],
            //         ['O', 'F', 'V', 'T', 'E', 'L', 'E', 'F', 'O', 'N', 'O', 'K', 'N', 'K', 'I', 'P', 'F', 'J'],
            //         ['N', 'C', 'O', 'N', 'S', 'O', 'L', 'Ă', 'R', 'I', 'N', 'G', 'E', 'B', 'J', 'F', 'Z', 'O'],
            //         ['L', 'C', 'O', 'I', 'J', 'W', 'W', 'Ă', 'D', 'T', 'X', 'M', 'N', 'X', 'A', 'B', 'O', 'C'],
            //         ['I', 'Î', 'Z', 'C', 'X', 'V', 'E', 'A', 'T', 'E', 'L', 'E', 'V', 'I', 'Z', 'O', 'R', 'U'],
            //         ['N', 'Â', 'J', 'C', 'Q', 'R', 'R', 'X', 'Ă', 'G', 'Z', 'C', 'W', 'X', 'C', 'Y', 'Î', 'R'],
            //         ['E', 'N', 'O', 'O', 'R', 'H', 'N', 'T', 'X', 'A', 'E', 'G', 'X', 'Y', 'B', 'U', 'V', 'I'],
            //         ['A', 'J', 'P', 'I', 'A', 'Ș', 'P', 'J', 'D', 'L', 'V', 'C', 'X', 'R', 'G', 'Ș', 'T', 'V'],
            //         ['P', 'D', 'Z', 'H', 'D', 'M', 'A', 'E', 'V', 'I', 'E', 'Ă', 'Y', 'R', 'Y', 'Ș', 'Y', 'I'],
            //         ['Y', 'H', 'C', 'V', 'I', 'Ș', 'V', 'V', 'K', 'Z', 'H', 'C', 'E', 'B', 'Ă', 'T', 'L', 'D'],
            //         ['B', 'S', 'H', 'Â', 'O', 'S', 'D', 'B', 'L', 'Z', 'S', 'K', 'G', 'L', 'I', 'X', 'T', 'E'],
            //         ['T', 'V', 'T', 'Î', 'N', 'I', 'N', 'T', 'E', 'R', 'N', 'E', 'T', 'L', 'T', 'L', 'Y', 'O'],
            //         ['D', 'L', 'B', 'E', 'X', 'X', 'J', 'Q', 'K', 'X', 'O', 'C', 'Z', 'I', 'A', 'R', 'E', 'T']
            //     ];

                // $test_words = [
                //     ['word' => 'multimedia', 'direction' => 'horizontal', 'row' => 0, 'start' => 8, 'end' => 17],
                //     ['word' => 'hello', 'direction' => 'horizontal', 'row' => 1, 'start' => 2, 'end' => 6],
                //     ['word' => 'presa', 'direction' => 'horizontal', 'row' => 2, 'start' => 2, 'end' => 6],
                //     ['word' => 'presa audiovizuala', 'direction' => 'horizontal', 'row' => 3, 'start' => 0, 'end' => 16],
                //     ['word' => 'jocuri', 'direction' => 'vertical', 'col' => 17, 'start' => 6, 'end' => 11],
                //     ['word' => 'video', 'direction' => 'vertical', 'col' => 17, 'start' => 12, 'end' => 16],
                //    // ['word' => 'TELEFON', 'direction' => 'vertical', 'col' => 10, 'start' => 5, 'end' => 11],
                // ];

                generateGrid($grid_total_rows, $grid_total_cols, $game_words);

                // echo '<div class="word-grid">';
                // $x=0;
                // foreach ($grid as $row) {
                //     $x++;
                //     echo '<div class="words-row" data-row="' . $x .'">';

                //     $y=0;
                //     foreach ($row as $letter) {
                //         $y++;
                //         $index_left = ($y == 1 ? $x : '');
                //         $index_top = ($x == 1 ? $y : '');
                //         echo "<span class='letter' data-column='$y'>$letter <i class='left-index'>$index_left</i> <i class='top-index'>$index_top</i></span>";
                //     }
                //     echo '</div>';
                // }
                // echo '</div>';
            ?>

            <div class="mt-24px p-20px bg-light-green text-16px font-500 rounded-16px">
                <div class="game-status mb-10px font-600"></div>
                <div class="found-words flex gap-20px"></div>
            </div>
        </div>
    </div>


<?php elseif( get_row_layout() == 'match_using_arrows' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');
    $left_column_terms = get_sub_field('left_column_terms');
    $right_column_items = get_sub_field('right_column_items');

    $right_col_html_items_array = [];

    if( have_rows('right_column_items') ) : $k=0;
        while( have_rows('right_column_items') ): the_row(); $k++;
            $item = get_sub_field('item');
            $right_col_html_items_array[] = '<div class="ma-item ma-item-right" data-id="' . $k . '">' . $item . '</div>';
        endwhile;
    endif;

    if ( $right_col_html_items_array ) {
        // Shuffle the array
        shuffle($right_col_html_items_array);
    }
?>

    <div class="flexible-content-section match-arrows my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="match-arrows-game my-24px flex flex-col gap-16px">

            <div class="ma-container">
                <div class="ma-column left">
                    <?php if( have_rows('left_column_terms') ) : $i=0; ?>
                        <?php while( have_rows('left_column_terms') ): the_row(); $i++;
                            $term = get_sub_field('term');
                        ?>
                        
                        <div class="ma-item ma-item-left" data-id="<?php echo $i; ?>"><?php echo $term; ?></div>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="ma-column right">
                    <?php if( $right_col_html_items_array ) : ?>
                        <?php foreach( $right_col_html_items_array as $item ) : ?>
                        
                            <?php echo $item; ?>
                        
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <svg class="ma-arrows"></svg>
            </div>

        </div>
    </div>


<?php elseif( get_row_layout() == 'chronological_order' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');

    $items_array = [];

    if( have_rows('items') ) : $k=0;
        while( have_rows('items') ): the_row(); $k++;
            $item_title = get_sub_field('title');
            $item_image = get_sub_field('image');

            $the_title = ($item_title ? $item_title : '');
            $the_image = ($item_image ? '<img style="' . (empty($the_title) ? 'height: auto; max-height: 78px' : 'height: 55px;') . '" src="' . $item_image . '" />' : '');
            $title_markup = (!empty($the_title) ? '<div class="crono-item-title leading-110 text-15px font-500">' . $the_title . '</div>': '');

            $items_array[] = '<div class="item min-h-[100px]" data-target="placeholder'. $k .'"><div class="crono-item-image">' . $the_image . '</div>'. $title_markup .'</div>';
        endwhile;
    endif;

    if ( $items_array ) {
        // Shuffle the array
        shuffle($items_array);
    }
?>

    <div class="flexible-content-section crono-game my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="crono-game-wrap pt-20px mb-24px">
            <div class="crono-container">
                <div class="flex flex-wrap gap-20px crono-flex justify-center">

                    <?php if ($items_array) : $j=0; ?>
                        <?php foreach( $items_array as $item ) : $j++; ?>

                        <div class="w-[calc(25%-30px)]">
                            <div id="placeholder<?php echo $j; ?>" class="crono-placeholder" data-id="<?php echo $j; ?>"></div>
                        </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <div class="crono-mixed-items flex flex-wrap justify-center gap-20px mt-30px bg-light-green p-20px rounded-16px">
                    <?php if ($items_array) : ?>
                        <?php foreach( $items_array as $item ) : ?>
                            <?php echo $item; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_description; // optional ?>
        </div>
    </div>


<?php elseif( get_row_layout() == 'select_corect_variant' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('content');

?>

    <div class="flexible-content-section spot-correct-game my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="spot-correct-wrap py-20px mb-24px">
            <?php if ( have_rows('content') ) : ?>
                <?php while ( have_rows('content') ) : the_row();
                    $section_text_content = get_sub_field('section_text_content');
                    $section_description = get_sub_field('description');
                ?>

                <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
                    <?php echo $section_text_content; ?>
                </div>

                <div class="tcs-content phase-content entry-content content-spacing text-17px mt-24px">
                    <?php echo $section_description; ?>
                </div>

                <div class="py-20px spot-correct-inner">
                    <?php if ( have_rows('items') ) : ?>
                        <ul class="spot-correct-list">
                            <?php while ( have_rows('items') ) : the_row(); 
                                $item = get_sub_field('item');
                                $correct = get_sub_field('correct');
                            ?>

                            <li data-correct="<?php echo ($correct ? '1' : '0'); ?>"><?php echo $item; ?></li>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>


<?php elseif( get_row_layout() == 'write_in_table' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('description');
    $text_fields = get_sub_field('text_fields');
?>

    <div class="flexible-content-section table-game my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_content; ?>
        </div>

        <div class="table-game-wrap my-24px">
            <?php if ( have_rows('items') ) : $counter = 0; ?>
                <table>
                    <tr>
                        <?php while ( have_rows('items') ) : the_row(); $counter++;
                            $title = get_sub_field('title');
                            $image = get_sub_field('image');
                        ?>
                        
                            <td>
                                <div class="text-center">
                                    <div class="text-15px font-500 mb-8px leading-110 min-h-[36px]"><?php echo $title; ?></div>

                                    <div class="mb-10px">
                                        <?php if ($image) : ?>
                                            <img style="height: 50px;" class="inline-block" src="<?php echo $image; ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                        <?php endwhile; ?>
                    </tr>

                    <?php if ( $counter > 0 ) : ?>
                        <tr>
                            <?php for($i=0; $i < $counter; $i++) : ?>
                                <td>

                                    <?php if ( intval($text_fields) > 0 ) : ?>
                                        <?php for($j=0; $j<intval($text_fields); $j++) : ?>
                                            <div class="py-2px">
                                                <input type="text" class="w-100% h-30px border-1px border-solid border-medium-gray px-8px text-14px focus:outline-none" name="table_game_text_field[]" placeholder="<?php echo $j+1; ?>.">
                                            </div>
                                        <?php endfor; ?>
                                    <?php endif; ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                    <?php endif; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>



<?php elseif( get_row_layout() == 'curiosities' ) : // curiosities
    $section_title = get_sub_field('title');
    $type = (get_sub_field('type') ? get_sub_field('type') : '');
    $section_content = get_sub_field('content');
?>

    <div class="flexible-content-section curiosity-section my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="curiosity-wrap my-24px">
            <?php if ( $type == 'rich' ) : // animated curiosity ?>

                <?php if ( have_rows('animated_curiosities') ) : $counter = 0; ?>
                    <div class="flex flex-wrap gap-20px justify-between py-40px">
                        <?php while ( have_rows('animated_curiosities') ) : the_row(); $counter++;
                            $content = get_sub_field('content');
                            $image = get_sub_field('featured_image');
                        ?>

                            <div class="curiosity-item flex flex-col gap-30px items-center w-[calc(33.3%-20px)]">
                                <?php if ( $image ) : ?>
                                    <div class="curiosity-image">
                                        <img class="h-[100px] cursor-pointer select-none curiosity-img" src="<?php echo $image; ?>" alt="">
                                    </div>
                                    <div class="curiosity-content bg-light-gray p-16px rounded-16px text-17px hide">
                                        <?php echo $content; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            <?php else : // display curiosities as default text content block ?>

                <div class="tcs-content phase-content entry-content content-spacing text-17px">
                    <?php echo $section_content; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>


<?php elseif( get_row_layout() == 'clasification_two_columns' ) : // clasification_two_columns
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('content');
    $col_a_title = get_sub_field('column_a_title');
    $col_b_title = get_sub_field('column_b_title');
?>

    <div class="flexible-content-section curiosity-section my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video <?php echo $addition_classes; ?>">
            <?php echo $section_content; ?>
        </div>

        <div class="py-20px">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-light-yellow p-20px rounded-16px text-center">
                        <h3 class="text-18px font-600 leading-130"><?php echo $col_a_title; ?></h3>
                    </div>

                    <div class="mt-20px">
                        <?php if ( have_rows('column_a_items') ) : $counter = 0; ?>
                            <div class="flex flex-col gap-16px">
                                <?php while ( have_rows('column_a_items') ) : the_row(); $counter++;
                                    $item = get_sub_field('item');
                                ?>

                                    <div class="flex items-center gap-16px">
                                        <div>
                                            <input type="text" class="size-32px text-center font-700 text-18px text-dark uppercase border-solid border-2px border-light-yellow focus:outline-none classification_input" name="classification_input" />
                                        </div>
                                        <div>
                                            <p class="leading-140"><?php echo $item; ?></p>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-orange p-20px rounded-16px text-center">
                        <h3 class="text-18px font-600 leading-130"><?php echo $col_b_title; ?></h3>
                    </div>

                    <div class="mt-20px">
                        <?php if ( have_rows('column_b_items') ) : $counter = 0; ?>
                            <div class="flex flex-col gap-16px">
                                <?php while ( have_rows('column_b_items') ) : the_row(); $counter++;
                                    $item = get_sub_field('item');
                                ?>

                                    <div class="flex items-center gap-16px">
                                        <div>
                                            <input type="text" class="size-32px text-center font-700 text-18px text-dark uppercase border-solid border-2px border-orange focus:outline-none classification_input" name="classification_input" />
                                        </div>
                                        <div>
                                            <p class="leading-140"><?php echo $item; ?></p>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php elseif( get_row_layout() == 'text_area' ) : // text_area
    $placeholder = get_sub_field('placeholder');
?>

    <div class="flexible-content-section curiosity-section my-24px">


        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video <?php echo $addition_classes; ?>">
            <form action="#" method="POST">
                <textarea class="w-full p-16px border-2px border-solid border-medium-gray rounded-8px focus:outline-none min-h-[250px]" name="text_area" placeholder="<?php echo $placeholder; ?>"></textarea>
            </form>
        </div>
    </div>



<?php elseif( get_row_layout() == 'choose_one' ) : // choose_one
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('content');
    $columns = (get_sub_field('columns') ? get_sub_field('columns') : 'col-md-4'); // default to 3 columns
?>

    <div class="flexible-content-section curiosity-section my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video <?php echo $addition_classes; ?>">
            <?php echo $section_content; ?>
        </div>

        <div class="py-30px"> 
            <?php if ( have_rows('items') ) : $counter = 0; ?>
                <div class="row">
                    <?php while ( have_rows('items') ) : the_row(); $counter++;
                        $item_content = get_sub_field('item_content');
                    ?>

                        <div class="<?php echo $columns; ?>">
                            <div class="flex flex-col gap-16px rounded-images mb-16px">
                                <div class="select-one-content text-center">
                                    <?php echo $item_content; ?>
                                </div>
                                <div class="text-center">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="choose_one_<?php echo $counter; ?>">
                                        <span class="checkbox-mark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>


<?php 
endif;
