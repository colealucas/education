<?php
/**
 * Theme flexible content
 * 
 */

 $get_static_text = [
    'ro' => [
        'print' => 'Printează',
        'true' => 'Adevărat',
        'false' => 'Fals',
        'true_initial' => 'A',
        'false_initial' => 'F',
        'write_here' => 'scrie aici...',
        'add_field' => '+ Adaugă câmp',
        'founded_words' => 'Cuvinte găsite:',
    ],
    'ru' => [
        'print' => 'Распечатать',
        'true' => 'Правда',
        'false' => 'Ложь',
        'true_initial' => 'П',
        'false_initial' => 'Л',
        'write_here' => 'пиши здесь...',
        'add_field' => '+ Добавить поле',
        'founded_words' => 'Найденные слова',
    ]
];

?>

<?php if( get_row_layout() == 'text_content' ) :  // text_content section
    $css_classes      = [];
    $section_title    = get_sub_field('title');
    $section_content  = get_sub_field('content');
    $full_with_images = get_sub_field('full_with_images');
    $check_paragraphs = get_sub_field('check_paragraphs');
    $enable_words_hunt = get_sub_field('enable_words_hunt');
    $add_plus         = get_sub_field('add_plus');
    $add_cards        = get_sub_field('add_cards');
    $add_exclamation  = get_sub_field('add_exclamation');
    $add_four_options = get_sub_field('add_four_options');
    $split_variants   = get_sub_field('split_variants');
    $click_words      = get_sub_field('click_words');
    $add_table_boders = get_sub_field('add_table_boders');
    $background_color = (get_sub_field('background_color') ? get_sub_field('background_color') : 'transparent');

    if ($full_with_images) {
        $css_classes[] = 'full-width-images';
    }

    if ($check_paragraphs) {
        $css_classes[] = 'check-paragraphs';
    }

    if ($add_plus) {
        $css_classes[] = 'add-plus';
    }

    if ($add_cards) {
        $css_classes[] = 'add-cards';
    }

    if ($add_exclamation) {
        $css_classes[] = 'add-exclamation';
    }
    
    if ($add_four_options) {
        $css_classes[] = 'add-four-options';
    }

    if ($split_variants) {
        $css_classes[] = 'split-variants';
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

    <div class="flexible-content-section text-content-section my-20px">
        <?php if (strlen(trim($section_title))) : ?>
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
                        <?php echo ($enable_words_hunt ? replaceBracketsWithSpans($section_title) : $section_title); ?>
                    </span>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($enable_words_hunt) : ?>
            <div class="words-hunt-stats">
                <?php echo $get_static_text[get_lang()]['founded_words']; ?> <strong class="words-hunt-total">1/1</strong>
            </div>
        <?php endif; ?>

        <?php if ( strlen(trim($section_content)) ) : ?>
            <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video <?php echo $addition_classes; ?> <?php if (strlen($background_color) && strtolower($background_color) != 'rgb(255,255,255)') :  ?> p-20px rounded-16px <?php endif; ?>" <?php if (strlen($background_color) && strtolower($background_color) != 'rgb(255,255,255)') :  ?>style="background-color: <?php echo $background_color; ?>"<?php endif; ?>>
                <?php echo ($enable_words_hunt ? replaceBracketsWithSpans($section_content) : $section_content); ?>
            </div>
        <?php endif; ?>
    </div>


<?php elseif( get_row_layout() == 'video_section' ) : // video_section
    $video_link = get_sub_field('video_code');
?>

    <div class="flexible-content-section video-section my-20px">
        <?php if ( $video_link ) : ?>
            <div class="video-container">
                <?php echo $video_link; ?>
            </div>
        <?php endif; ?>
    </div>

<?php elseif( get_row_layout() == 'options_with_feedback' ) : // options_with_feedback
    $options_repeater = get_sub_field('options');
?>

    <div class="flexible-content-section options-with-feedback my-20px">
        <?php if ( $options_repeater ) : ?>
            <div class="options-container flex flex-wrap gap-16px">
                <?php foreach( $options_repeater as $option ) : ?>
                    <div class="option-item-wrap flex-1">
                        <div class="option-item p-12px bg-light-gray text-center select-none rounded-8px text-15px font-600 border-solid border-transparent cursor-pointer border-1px hover:border-green hover:text-green" data-toggle-class="active">
                            <?php echo $option['option']; ?>
                        </div>

                        <div class="option-item-feedback text-center mt-12px text-15px p-12px bg-green text-white rounded-8px font-600 border-solid border-transparent cursor-pointer border-1px">
                            <?php echo $option['feedback']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

<?php elseif( get_row_layout() == 'video_section' ) : // video_section
    $video_link = get_sub_field('video_code');
?>

    <div class="flexible-content-section video-section my-20px">
        <?php if ( $video_link ) : ?>
            <div class="video-container">
                <?php echo $video_link; ?>
            </div>
        <?php endif; ?>
    </div>

<?php elseif( get_row_layout() == 't_graphic' ) : // t_graphic
    $left_title = get_sub_field('title_left');
    $right_title = get_sub_field('title_right');
    $textarea_rows = get_sub_field('textarea_rows') ? get_sub_field('textarea_rows') : 10;
    $print = get_sub_field('print');
    $placeholder = get_sub_field('placeholder');
?>

    <div class="flexible-content-section t-graphic my-20px">
        <div class="print-div">
            <?php if ($print) : ?>
                <div class="print-trigger-wrap flex justify-end mb-8px">
                    <a href="#" class="inline-flex leading-1 bg-light-gray py-4px px-20px rounded-8px text-15px font-600 items-center gap-4px print-trigger" data-print-trigger>
                        <span>
                            <svg fill="#000000" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.656 6.938l-0.344 2.688h11.781l-0.344-2.688c0-0.813-0.656-1.438-1.469-1.438h-8.188c-0.813 0-1.438 0.625-1.438 1.438zM1.438 11.094h19.531c0.813 0 1.438 0.625 1.438 1.438v8.563c0 0.813-0.625 1.438-1.438 1.438h-2.656v3.969h-14.219v-3.969h-2.656c-0.813 0-1.438-0.625-1.438-1.438v-8.563c0-0.813 0.625-1.438 1.438-1.438zM16.875 25.063v-9.281h-11.344v9.281h11.344zM15.188 18.469h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 21.063h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 23.656h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375z"></path>
                            </svg>
                        </span>
                        <?php echo $get_static_text[get_lang()]['print']; ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="t-graphic-wrap flex gap-12px p-12px bg-light-gray rounded-16px">
                <div class="t-graphic-left w-50%">
                    <h3 class="text-16px font-600 leading-130 bg-orange text-white py-20px px-24px rounded-16px">
                        <?php echo $left_title; ?>
                    </h3>

                    <div class="t-graphic-left-content mt-12px border-t-2px border-solid border-dark pt-12px">
                        <textarea name="t-graphic-left-textarea[]" class="w-full bg-white border-none rounded-12px text-15px p-12px outline-orange" rows="<?php echo $textarea_rows; ?>" placeholder="<?php echo $placeholder; ?>"></textarea>
                    </div>
                </div>

                <div style="width: 2px;" class="bg-dark"></div>

                <div class="t-graphic-right w-50%">
                    <h3 class="text-16px font-600 leading-130 bg-red text-white py-20px px-24px rounded-16px">
                        <?php echo $right_title; ?>
                    </h3>

                    <div class="t-graphic-right-content mt-12px border-t-2px border-solid border-dark pt-12px">
                        <textarea name="t-graphic-right-textarea[]" class="w-full bg-white border-none rounded-12px text-15px p-12px outline-red" rows="<?php echo $textarea_rows; ?>" placeholder="<?php echo $placeholder; ?>"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php elseif( get_row_layout() == 'match_words_with_definition' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');
?>

    <div class="flexible-content-section match-definitions my-20px">
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

        <div class="match-definitions-wrap my-20px flex flex-col gap-16px">
            <?php if( have_rows('definitions') ): ?>
                <?php while( have_rows('definitions') ): the_row();
                    $word = get_sub_field('word');
                    $def = get_sub_field('definition');
                ?>
                
                    <div class="flex flex-nowrap gap-24px">
                        <div class="w-50% placeholders-column flex items-center">
                            <div class="placeholder h-full rounded-8px text-16px font-600 flex items-center justify-center w-full min-h-[40px]" data-word="<?php echo $word; ?>"></div>
                        </div>

                        <div class="w-50% definitions-column">
                            <div class="definition rounded-8px py-16px px-20px bg-light-gray font-600 text-16px" data-word="<?php echo $word; ?>">
                                - <?php echo $def; ?>
                            </div>
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
            $words_to_discover[] = mb_strtolower($word_array['word']);
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
        $jsonString = json_encode($words_to_discover, JSON_UNESCAPED_UNICODE); // Convert PHP array to a JSON string

        // Escape single quotes, double quotes, and HTML special characters
        $escaped_json_string = htmlspecialchars($jsonString, ENT_QUOTES, 'UTF-8');
        $words_js_object = $escaped_json_string;
    }
?>

    <div class="flexible-content-section match-definitions my-20px">
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

    <div class="flexible-content-section match-arrows my-20px">
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

        <div class="match-arrows-game my-20px flex flex-col gap-16px">

            <div class="ma-container">
                <div class="ma-column left">
                    <?php if( have_rows('left_column_terms') ) : $i=0; ?>
                        <?php while( have_rows('left_column_terms') ): the_row(); $i++;
                            $term = get_sub_field('term');
                        ?>
                        
                        <div class="ma-item ma-item-left" data-id="<?php echo $i; ?>">
                            <?php echo $term; ?>
                        </div>
                        
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
            $title_markup = (!empty($the_title) ? '<div class="crono-item-title text-center leading-110 text-15px font-500">' . $the_title . '</div>': '');

            $items_array[] = '<div class="item min-h-[100px]" data-target="placeholder'. $k .'"><div class="crono-item-image">' . $the_image . '</div>'. $title_markup .'</div>';
        endwhile;
    endif;

    if ( $items_array ) {
        // Shuffle the array
        shuffle($items_array);
    }
?>

    <div class="flexible-content-section crono-game my-20px">
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

    <div class="flexible-content-section spot-correct-game my-20px">
        
        <div class="mt-30px text-20px font-600 text-green">
            <?php echo $section_title; ?>
        </div>
        
        <?php if ( have_rows('content') ) : ?>
            <?php while ( have_rows('content') ) : the_row();
                $section_text_content = get_sub_field('section_text_content');
                $section_description = get_sub_field('description');
            ?>
                <div class="spot-correct-wrap py-12px mb-24px">
                    <div class="tcs-content phase-content entry-content content-spacing text-17px mb-20px">
                        <?php echo $section_description; ?>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-12px spot-correct-inner bg-light-gray rounded-8px h-full">
                                <?php if ( have_rows('items') ) : ?>
                                    <ul class="spot-correct-list pl-0">
                                        <?php while ( have_rows('items') ) : the_row(); 
                                            $item = get_sub_field('item');
                                            $correct = get_sub_field('correct');
                                        ?>

                                        <li data-correct="<?php echo ($correct ? '1' : '0'); ?>"><?php echo $item; ?></li>

                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
                                <?php echo $section_text_content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>


<?php elseif( get_row_layout() == 'write_in_table' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('description');
    $text_fields = get_sub_field('text_fields');
?>

    <div class="flexible-content-section table-game my-20px">
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

        <div class="table-game-wrap my-20px">
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

    <div class="flexible-content-section curiosity-section my-20px">
        <?php if (strlen(trim($section_title))) : ?>
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
        <?php endif; ?>

        <div class="curiosity-wrap my-20px">
            <?php if ( $type == 'rich' ) : // animated curiosity ?>

                <?php if ( have_rows('animated_curiosities') ) : $counter = 0; $k=0; ?>
                    <div class="curiosites-tooltips">
                        <?php while ( have_rows('animated_curiosities') ) : the_row(); 
                            $k++;
                            $content = get_sub_field('content');
                        ?>

                            <div class="curiosity-content bg-orange p-20px border-medium-gray mb-16px rounded-16px hide" data-index="<?php echo $k; ?>">
                                <?php echo $content; ?>
                            </div>

                        <?php endwhile; ?>
                    </div>

                    <div class="flex gap-20px justify-center p-30px bg-faded-gray rounded-16px mb-16px">
                        <?php while ( have_rows('animated_curiosities') ) : the_row(); 
                            $counter++; 
                            $image = get_sub_field('featured_image');
                        ?>

                            <div class="curiosity-item relative flex flex-col gap-30px items-center" data-curiosity-item="<?php echo $counter; ?>">
                                <?php if ( $image ) : ?>
                                    <div class="curiosity-image bg-white p-16px rounded-8px">
                                        <img class="max-h-[150px] cursor-pointer select-none curiosity-img rounded-8px" src="<?php echo $image; ?>" alt="">
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

    <div class="flexible-content-section curiosity-section my-20px">
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

        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <?php echo $section_content; ?>
        </div>

        <div class="py-20px">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-red p-20px rounded-16px text-center">
                        <h3 class="text-18px font-600 leading-130"><?php echo $col_a_title; ?></h3>
                    </div>

                    <div class="mt-20px">
                        <?php if ( have_rows('column_a_items') ) : $counter = 0; ?>
                            <div class="flex flex-col gap-16px">
                                <?php while ( have_rows('column_a_items') ) : the_row(); $counter++;
                                    $item = get_sub_field('item');
                                ?>

                                    <div class="flex items-center gap-16px">
                                        <div class="w-30px">
                                            <svg width="30" height="30" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                <path stroke="#E18067" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.5 17l6 6 13-13"/>
                                            </svg>
                                            <!-- <input type="text" class="size-32px text-center font-700 text-18px text-dark uppercase border-solid border-2px border-red focus:outline-none classification_input" name="classification_input" placeholder="?" /> -->
                                        </div>

                                        <div class="flex-1">
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
                                        <div class="w-30px">
                                            <svg width="30" height="30" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="none">
                                                <path stroke="#FFC36B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.5 17l6 6 13-13"/>
                                            </svg>
                                            <!-- <input type="text" class="size-32px text-center font-700 text-18px text-dark uppercase border-solid border-2px border-orange focus:outline-none classification_input" name="classification_input" placeholder="?" /> -->
                                        </div>

                                        <div class="flex-1">
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
    $rows = (get_sub_field('rows') ? get_sub_field('rows') : 10);
    $text_color = get_sub_field('text_color'); // default to black
?>

<?php if ( $text_color ) : ?>
    <style>
        .user-textarea::placeholder {
            color: inherit !important;
        }
    </style>
<?php endif; ?>

    <div class="flexible-content-section curiosity-section my-20px">
        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <form action="#" method="POST">
                <textarea <?php echo ($text_color ? 'style="color:' . $text_color .' !important;"' : ''); ?> rows="<?php echo $rows; ?>" class="w-full p-16px border-2px border-solid border-medium-gray bg-light-gray focus:bg-white rounded-8px focus:outline-none user-textarea" name="text_area" placeholder="<?php echo $placeholder; ?>"></textarea>
            </form>
        </div>
    </div>


<?php elseif( get_row_layout() == 'remember' ) : // remember
    $content = get_sub_field('content');
    $title = get_sub_field('title');
?>

    <div class="flexible-content-section remeber-section my-20px">
        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
        
            <div class="remember-wrap flex gap-4px">
                <div class="flex rounded-12px overflow-hidden w-full">
                    <div class="text-22px font-700 text-white bg-blue p-20px min-w-[160px]">
                        <div class="flex h-full items-center justify-center">
                            <div>
                                <?php echo $title; ?>
                            </div>
                        </div>
                    </div>

                    <div class="bg-orange text-dark flex-1 p-20px font-600 italic">
                        <div class="flex h-full items-center">
                            <div class="flex-1 last-no-margin">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php elseif( get_row_layout() == 'text_section_with_background' ) : // text_section_with_background
    $content = get_sub_field('text_content');
    $title = get_sub_field('section_title');
    $text_color = (get_sub_field('text_color') ? get_sub_field('text_color') : '#ffffff');
    $background_color = (get_sub_field('background_color') ? get_sub_field('background_color') : '#F78D1E');
?>

    <div class="flexible-content-section color-section my-20px">
        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <div class="flex flex-col gap-12px p-20px text-<?php echo $text_color; ?> rounded-16px" style="background-color: <?php echo $background_color; ?>; color: <?php echo $text_color; ?>;">
                <?php if ($title): ?>
                    <div class="text-20px font-600 leading-130">
                       <?php echo $title; ?>
                    </div>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="color-section-content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php elseif( get_row_layout() == 'choose_one' ) : // choose_one
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('content');
    $image_height = (get_sub_field('image_height') ? get_sub_field('image_height') : 200);
    $columns = (get_sub_field('columns') ? get_sub_field('columns') : 'col-md-4'); // default to 3 columns
?>

    <div class="flexible-content-section my-16px">
        <?php if ($section_title) : ?>
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
        <?php endif; ?>

        <div class="pt-20px">
            <?php if ( have_rows('items') ) : $counter = 0; ?>
                <div class="row">
                    <?php while ( have_rows('items') ) : the_row(); $counter++;
                        $item_image = get_sub_field('image');
                    ?>

                        <div class="<?php echo $columns; ?>">
                            <div class="flex flex-col gap-16px rounded-images mb-16px">
                                <div class="select-one-content text-center">
                                    <?php if ($item_image) : ?>
                                        <img src="<?php echo $item_image; ?>" class="w-auto inline-block" style="height: <?php echo $image_height; ?>px" alt="">
                                    <?php endif; ?>
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

        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <?php echo $section_content; ?>
        </div>

    </div>


<?php elseif( get_row_layout() == 'choose_multiple' ) : // choose_one
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('description');
    $columns = (get_sub_field('columns') ? get_sub_field('columns') : 'col-md-6'); // default to 2 columns
?>

    <div class="flexible-content-section curiosity-section my-20px">
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

        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <?php echo $section_content; ?>
        </div>

        <div class="relative"> 
            <?php if ( have_rows('items') ) : ?>
                <div class="flex gap-20px flex-wrap">
                    <?php while ( have_rows('items') ) : the_row();
                        $question = get_sub_field('question');
                    ?>

                        <div class="w-full">
                            <div class="bg-orange p-16px rounded-16px text-17px font-700 mb-20px mt-30px">
                                <?php echo $question; ?>
                            </div>

                            <div>
                                <?php if ( have_rows('variants') ) : ?>
                                    <div class="variants-wrap flex flex-wrap gap-16px" data-select-multiple-wrap>
                                        <?php while ( have_rows('variants') ) : the_row();
                                            $variant = get_sub_field('variant');
                                        ?>

                                            <div class="variant-item w-[23%]">
                                                <div class="bg-light-gray p-16px rounded-16px text-16px font-500 cursor-pointer select-none hover:bg-medium-gray" data-select-multiple-variant>
                                                    <?php echo $variant; ?>
                                                </div>
                                            </div>

                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>


<?php elseif( get_row_layout() == 'editable_template' ) : // editable_template
    $template = get_sub_field('template');
    $template_title = get_sub_field('title');
    $print = get_sub_field('print');
?>

    <div class="flexible-content-section curiosity-section my-30px">
        <div class="print-div">
            <?php if ($print) : ?>
                <div class="print-trigger-wrap flex justify-end mb-8px">
                    <a href="#" class="inline-flex leading-1 bg-light-gray py-4px px-20px rounded-8px text-15px font-600 items-center gap-4px print-trigger" data-print-trigger>
                        <span>
                            <svg fill="#000000" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.656 6.938l-0.344 2.688h11.781l-0.344-2.688c0-0.813-0.656-1.438-1.469-1.438h-8.188c-0.813 0-1.438 0.625-1.438 1.438zM1.438 11.094h19.531c0.813 0 1.438 0.625 1.438 1.438v8.563c0 0.813-0.625 1.438-1.438 1.438h-2.656v3.969h-14.219v-3.969h-2.656c-0.813 0-1.438-0.625-1.438-1.438v-8.563c0-0.813 0.625-1.438 1.438-1.438zM16.875 25.063v-9.281h-11.344v9.281h11.344zM15.188 18.469h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 21.063h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 23.656h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375z"></path>
                            </svg>
                        </span>
                        <?php echo $get_static_text[get_lang()]['print']; ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="p-16px bg-papirus rounded-8px">
                <?php if ($template_title) : ?>
                <div class="editable-template-title text-center text-24px font-600 leading-130 text-green mb-12px">
                    <?php echo $template_title; ?>
                </div>
                <?php endif; ?>
            
                <div class="relative break-words  editable-template-wrapper" contenteditable="true">
                    <?php echo $template; ?>
                </div>
            </div>

        </div>
    </div>


<?php elseif( get_row_layout() == 'match_text_with_image' ) : // editable_template
    $columns = (get_sub_field('columns') ? get_sub_field('columns') : 'col-md-4'); // default to 3 columns
    $image_height = (get_sub_field('image_height') ? get_sub_field('image_height') : 200); // default to 200px image height
?>

    <div class="flexible-content-section match-image-with-text-section my-20px">
        <div class="relative">
            <?php if ( have_rows('items') ) : $index = 0; $k = 0; ?>
                <div class="mit-wrap">

                    <div class="row" data-select-multiple-wrap>
                        <?php while ( have_rows('items') ) : the_row(); $index++;
                            $image = get_sub_field('image');
                        ?>
                        
                        <div class="<?php echo $columns; ?>">
                            <div class="mit-item mb-24px">
                                <div class="mit-image text-center">
                                    <?php if ($image) : ?>
                                        <img src="<?php echo $image; ?>" class="rounded-8px inline-block" style="height: <?php echo $image_height; ?>px" alt="">
                                    <?php endif; ?>
                                </div>

                                <div class="mit-target p-4px mt-12px rounded-8px min-h-50px" data-mit-target id="placeholder<?php echo $index; ?>"></div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="mit-elements flex flex-wrap justify-center gap-20px mt-30px bg-faded-white p-20px rounded-8px">
                        <?php while ( have_rows('items') ) : the_row(); $k++;
                            $coresponding_text = get_sub_field('coresponding_text');
                        ?>
                        
                        <div class="mit-element leading-130 flex items-center justify-center select-none cursor-pointer py-12px px-16px bg-white text-15px font-500 border-1px border-solid border-medium-gray rounded-8px" data-mit-element data-target="placeholder<?php echo $k; ?>">
                            <?php echo $coresponding_text; ?>
                        </div>

                        <?php endwhile; ?>
                    </div>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>



<?php elseif( get_row_layout() == 'select_correct_number' ) : // select_correct_number ?>

    <div class="flexible-content-section numbers-game-section my-20px">
        <div class="relative">
            <?php if ( have_rows('numbers') ) : $index = 0; $k = 0; ?>
                <div class="numbers-wrap bg-faded-gray rounded-16px p-20px">

                    <div class="numbers-flex flex gap-30px justify-center flex-wrap" data-select-multiple-wrap>
                        <?php while ( have_rows('numbers') ) : the_row(); $index++;
                            $number = get_sub_field('number');
                            $correct = get_sub_field('correct');
                        ?>
                        
                        <div>
                            <div class="text-17px font-600 text-center">
                                <div class="numbers-item inline-block leading-1 px-24px py-12px rounded-8px bg-white border-1px border-solid border-medium-gray cursor-pointer select-none <?php echo ($correct ? 'correct' : '') ?>"><?php echo $number; ?></div>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    </div>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>



<?php elseif( get_row_layout() == 'image_with_text_field' ) : // image_with_text_field 
$columns = (get_sub_field('columns') ? get_sub_field('columns') : 'col-md-4'); // default to 3 columns
$images_height_pixels = (get_sub_field('images_height_pixels') ? get_sub_field('images_height_pixels') : 150); // default to 3 columns
$placeholder_text = get_sub_field('placeholder_text');
?>

<div class="flexible-content-section numbers-game-section my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : $index = 0; $k = 0; ?>
            <div class="imgtxt-wrap py-20px">

                <div class="row" data-select-multiple-wrap>
                    <?php while ( have_rows('items') ) : the_row(); $index++;
                        $image = get_sub_field('image');
                    ?>
                    
                    <div class="<?php echo $columns; ?>">
                        <?php if ($image) : ?>
                            <div class="flex flex-col gap-12px mb-20px">
                                <div>
                                    <img class="object-cover w-full rounded-8px" style="height: <?php echo $images_height_pixels; ?>px" src="<?php echo $image;  ?>" alt="">
                                </div>
                                <div>
                                    <input type="text" class="border-2px text-15px font-500 border-solid border-medium-gray h-40px w-full py-0 px-12px focus:outline-none focus:border-orange" name="user-input[]" placeholder="<?php echo $placeholder_text; ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php endwhile; ?>
                </div>
                
            </div>
        <?php endif; ?>
    </div>
</div>


<?php elseif( get_row_layout() == 'axa' ) : // axa
$images_height_pixels = (get_sub_field('images_height') ? get_sub_field('images_height') : 100);
?>

<div class="flexible-content-section axa-game-section my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : $i=0; $k=0; ?>
            <div class="axa-wrap pt-140px">
                <div class="axa-row flex border-t-2px border-solid border-black relative">
                    <?php while ( have_rows('items') ) : the_row(); $i++;
                        $image = get_sub_field('image');
                        $text_label = get_sub_field('text_label');
                    ?>
                    
                    <div class="axa-col flex-grow relative w-[16.6%]">
                        <div id="axa-placeholder<?php echo $i; ?>" class="axa-placeholder axa-target mt-[-140px] flex items-center justify-center h-120px border-2px border-dashed border-medium-gray max-w-90% mx-auto"></div>
                        <div class="text-center mt-30px axa-label font-15px font-600 text-green"><?php echo $text_label; ?></div>
                    </div>

                    <?php endwhile; ?>
                </div>
                
                <div class="axa-darg-items axa-elements flex items-center justify-center gap-20px p-20px bg-light-gray rounded-16px mt-16px">
                    <?php while ( have_rows('items') ) : the_row(); $k++;
                        $image = get_sub_field('image');
                    ?>
                    
                    <?php if ($image) : ?>
                        <div class="p-8px bg-white rounded-8px select-none" data-target="axa-placeholder<?php echo $k; ?>">
                            <img class="inline-block w-full rounded-8px" style="height: <?php echo $images_height_pixels; ?>px" src="<?php echo $image; ?>" alt="">
                        </div>
                    <?php endif; ?>

                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php elseif( get_row_layout() == 'acrostih_game' ) : // acrostih_game
$key_word = get_sub_field('key_word');
$placeholder_text = get_sub_field('placeholder_text');
?>

<div class="flexible-content-section acrostih-game my-20px">
    <div class="relative">
        <?php if ($key_word) : 
            $letters = str_split($key_word);
        ?>

        <?php if (count($letters) ) : ?>
            <div class="acrostih-wrap flex flex-col gap-6px">
                <?php foreach($letters as $letter) : ?>

                    <div class="acrostih-letter flex items-center gap-6px">
                        <div class="size-30px text-center leading-1 uppercase text-18px font-700 bg-light-gray flex items-center justify-center select-none cursor-pointer">
                            <?php echo $letter; ?>
                        </div>
                        <div class="w-[calc(100%-36px)]">
                            <input type="text" class="h-30px px-8px font-700 text-15px border-2px w-full border-solid border-light-gray focus:outline-none focus:border-orange" type="text" name="letter[]" placeholder="<?php echo $placeholder_text; ?>" />
                        </div>
                    </div>
                    
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php endif; ?>
    </div>
</div>


<?php elseif( get_row_layout() == 'reorder_aliniate' ) : // reorder_aliniate ?>

<div class="flexible-content-section ra-game my-20px">
    <div class="relative">

        <?php if ( have_rows('aliniate') ) : 

        // Store all rows in an array
        $aliniate = [];
            
        ?>
            <div class="ra-wrap py-20px">

                <div class="ra-row list-group flex flex-col gap-16px bg-light-gray p-20px rounded-16px">
                    <?php while ( have_rows('aliniate') ) : the_row();
                        $aliniat = get_sub_field('aliniat');
                        $aliniate[] = $aliniat;
                    ?>

                    <?php endwhile; ?>

                    <?php 
                        // Reverse the array
                        $aliniate = array_reverse($aliniate);
                        $index = count($aliniate);
                    ?>

                    <?php 
                         // Output the reversed rows
                        foreach ( $aliniate as $aliniat ) : ?>
                            <?php $index--; ?>
                            <div class="list-group-item border-1px border-solid border-transparent p-20px bg-white rounded-16px cursor-move select-none" data-order="<?php echo $index; ?>">
                                <?php echo $aliniat; ?>
                            </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
        <?php endif; ?>

    </div>
</div>


<?php elseif( get_row_layout() == 'top_3' ) : // top_3
    $image_height = (get_sub_field('image_height') ? get_sub_field('image_height') : 100);
    $top_items_amount = (get_sub_field('top_items_amount') ? get_sub_field('top_items_amount') : 3);
?>

<style>
    .top3-item img {
        width: auto;
        height: <?php echo $image_height; ?>px;
        border-radius: 4px;
        object-fit: cover;
    }
</style>
<div class="flexible-content-section top3-game my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : $z=0; ?>
            <div class="top3-wrap p-20px bg-light-gray rounded-8px">

                <div class="flex-col">
                    <div class="w-full">
                        <?php if ($top_items_amount) : ?>
                            <div class="top-placeholders flex gap-20px">
                                <?php for ($i=1; $i<=$top_items_amount; $i++) : ?>

                                    <div class="top-placeholder-inner flex-1">
                                        <span class="top-placeholder-inner-number"><?php echo $i; ?></span>
                                        <div class="bg-white min-h-[80px] flex items-center justify-center rounded-8px border-2px border-medium-gray border-dashed top-placeholder"></div>
                                    </div>
                                    
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="w-full bg-white rounded-16px mt-20px">
                        <div class="flex flex-wrap items-center justify-center mixed-items p-8px rounded-16px">
                            <?php while ( have_rows('items') ) : the_row();
                                $content = get_sub_field('imagetext_description');
                            ?>

                            <div class="p-8px rounded-8px bg-white text-16px font-500">
                                <div class="top3-item cursor-move"><?php echo $content; ?></div>
                            </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php endif; ?>

    </div>
</div>


<?php elseif( get_row_layout() == 'restore_text' ) : // restore_text ?>

<div class="flexible-content-section resore-text-game my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : ?>
            <div class="resore-text-wrap">
                <?php while ( have_rows('items') ) : the_row();
                    $text_content = get_sub_field('text_content');
                    $variants = get_sub_field('variants');

                    $variantsHTML = '<span class="resore-text-options">';

                    if ($variants) {
                        foreach( $variants as $variant ) {
                            $the_variant = $variant['variant'];
                            $correct = $variant['correct'];

                            $variantsHTML .= "<span data-restore-text-variant ". ($correct ? 'data-correct': '') .">". $the_variant ."</span>";
                        }
                    }

                    $variantsHTML .= '</span>';

                    // Use preg_replace to find the [] and replace it with the span tag
                    $text_content = preg_replace('/\[\]/', "<span>{$variantsHTML}</span>", $text_content);
                ?>

                <div class="resore-text-item tcs-content rounded-8px phase-content entry-content content-spacing text-17px responsive-video mb-16px">
                    <?php echo $text_content; ?>
                </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</div>



<?php elseif( get_row_layout() == 'drag_items_to_list' ) : // drag_items_to_list
    $type = get_sub_field('type');
    $images_height = (get_sub_field('images_height') ? get_sub_field('images_height') : 150);
    $mixed_elements = [];
?>

    <div class="flexible-content-section dit-section my-20px">
        <div class="relative">
            <?php if ( have_rows('target_items') ) : $index = 0; $y=0; ?>
                <div class="dit-wrap">

                    <div class="dit-row flex justify-center gap-24px bg-light-gray p-20px rounded-16px" data-dit-row>
                        <?php while ( have_rows('target_items') ) : the_row(); $index++;
                            $title = get_sub_field('title');
                            $image = get_sub_field('image');
                            $elements = get_sub_field('elements');
                            $elements_count = count($elements);
                        ?>
                        
                        <div class="w-35%">
                            <div class="dit-item">
                                <?php if ($title) : ?>
                                    <div class="dit-title text-center text-16px font-600 leading-130 bg-green text-white rounded-8px p-12px mb-12px">
                                        <?php echo $title; ?>
                                    </div>
                                <?php endif; ?>

                                
                                <?php if ($image) : ?>
                                    <div class="dit-image text-center bg-white rounded-8px p-12px">
                                        <img src="<?php echo $image; ?>" class="rounded-8px inline-block" style="height: <?php echo $images_height; ?>px" alt="">
                                    </div>
                                <?php endif; ?>

                                <div class="dit-target flex flex-col gap-4px p-4px mt-12px rounded-8px min-h-50px border-2px border-dashed border-medium-gray bg-white" data-dit-target data-col-num="<?php echo $index; ?>" data-elements-count="<?php echo $elements_count; ?>"></div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>


                    <?php while ( have_rows('target_items') ) : the_row(); $y++;
                        $elements = get_sub_field('elements');
                    ?>
                        
                        <?php if ($elements) : ?>
                            <?php foreach( $elements as $element ) :
                                $text_item = $element['text_item'];
                                $element_image = ($element['image'] && $element['image']['url'] ? $element['image']['url'] : null);

                                // print_r($element_image);

                                if ($type == 'images') {
                                    $mixed_elements[] = '<div class="dit-element cursor-move leading-100 flex items-center justify-center select-none p-8px bg-white text-15px font-500 border-1px border-solid border-medium-gray rounded-8px" data-dit-element data-col-target="'. $y .'">
                                    <img src="'.$element_image.'" style="height:60px; width: auto;" alt="" />
                                </div>';
                                } else {
                                    $mixed_elements[] = '<div class="dit-element cursor-move leading-130 flex items-center justify-center select-none py-12px px-16px bg-white text-15px font-500 border-1px border-solid border-medium-gray rounded-8px" data-dit-element data-col-target="'. $y .'">
                                    '. $text_item .'
                                </div>';
                                }
                            ?>
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                    <?php if ( count($mixed_elements) ) : ?>
                        <div class="dit-elements flex flex-wrap justify-center gap-20px mt-20px bg-light-gray p-20px rounded-8px">
                            <?php foreach( $mixed_elements as $el ) : ?>

                                <?php echo $el; ?>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>


<?php elseif( get_row_layout() == 'true_false' ) : // true_false ?>

<div class="flexible-content-section tf-game my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : ?>
            <div class="tf-wrap">
                <table class="border table-spacing">
                    <tr>
                        <th></th>
                        <th><?php echo $get_static_text[get_lang()]['true']; ?></th>
                        <th><?php echo $get_static_text[get_lang()]['false']; ?></th>
                    </tr>

                    <?php while ( have_rows('items') ) : the_row();
                        $item_text = get_sub_field('item_text');
                        $correct = get_sub_field('correct');
                    ?>

                    <tr>
                        <td>
                            <div class="tf-item">
                                <?php echo $item_text; ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="tf-inline-btn true-btn text-15px font-700 cursor-pointer select-none inline-block leading-1 py-6px px-16px bg-light-gray hover:bg-light-green border-1px border-solid border-medium-gray hover:border-green rounded-8px" <?php echo ($correct ? 'data-correct' : ''); ?>><?php echo $get_static_text[get_lang()]['true_initial']; ?></span>
                        </td>
                        <td class="text-center">
                            <span class="tf-inline-btn false-btn text-15px font-700 cursor-pointer select-none inline-block leading-1 py-6px px-16px bg-light-gray hover:bg-light-red border-1px border-solid border-medium-gray hover:border-red rounded-8px" <?php echo (!$correct ? 'data-correct' : ''); ?>><?php echo $get_static_text[get_lang()]['false_initial']; ?></span>
                        </td>
                    </tr>

                <?php endwhile; ?>
                </table>
            </div>
        <?php endif; ?>

    </div>
</div>


<?php elseif( get_row_layout() == 'pyramid' ) : // pyramid ?>

<div class="flexible-content-section pyramid-game my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : ?>
            <div class="pyramid-wrap flex items-center gap-20px bg-orange p-20px rounded-16px">
                <div class="pyramid-left w-40%">
                    <div class="pyramid-mixed-items overflow-y-auto max-h-[416px] p-16px flex flex-col gap-16px border-solid border-1px border-light-gray rounded-8px">
                        <?php while ( have_rows('items') ) : the_row();
                            $text_item = get_sub_field('text_item');
                        ?>

                            <div class="pyramid-text-item py-8px select-none cursor-move px-16px text-14px leading-130 bg-white rounded-8px">
                                <?php echo $text_item; ?>
                            </div>

                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="pyramid-rirght w-[calc(60%-20px)]">
                    <div class="pyramid-wrapper relative">
                        <div class="pyramid"></div>

                        <div class="pyramid-overlay flex flex-col justify-end gap-8px items-center">
                           <div class="pyramid-overlay-placeholder" data-index="1"></div>
                           <div class="pyramid-overlay-placeholder" data-index="2"></div>
                           <div class="pyramid-overlay-placeholder" data-index="3"></div>
                           <div class="pyramid-overlay-placeholder" data-index="4"></div>
                           <div class="pyramid-overlay-placeholder" data-index="5"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>


<?php elseif( get_row_layout() == 'agenda' ) : // agenda ?>

<div class="flexible-content-section resore-text-game my-20px">
    <div class="relative">
        <?php if ( have_rows('items') ) : $k=0; ?>
            <div class="agenda-wrap">
                <table class="agenda-table">
                    <?php while ( have_rows('items') ) : the_row();
                        $item = get_sub_field('item');
                        $k++;
                    ?>

                    <tr style="background-color:<?php echo (($k % 2 == 0) ? 'rgba(253,161,114, 0.15)' : 'rgba(250,129,40, 0.2)') ?>">
                        <td style="width: 50%">
                            <div class="agenda-item">
                                <?php echo $item; ?>
                            </div>
                        </td>
                        <td style="width: 50%">
                            <form action="#" method="POST" data-add-fields-form>
                                <div class="add-fields-wrap flex flex-col gap-4px" data-add-fields-wrap>
                                    <input type="text" class="h-36px w-full border-solid border-2px border-medium-gray py-0 px-12px focus:outline-none focus:border-green" name="the_source[]" value="" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">
                                    <input type="text" class="h-36px w-full border-solid border-2px border-medium-gray py-0 px-12px focus:outline-none focus:border-green" name="the_source[]" value="" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">
                                </div>
                                
                                <div class="p-6px mt-6px leading-130 bg-green transition-all rounded-8px text-white font-500 text-14px text-center cursor-pointer select-none" data-add-field-btn><?php echo $get_static_text[get_lang()]['add_field']; ?></div>
                            </form>
                        </td>
                    </tr>

                    <?php endwhile; ?>
                </table>
            </div>
        <?php endif; ?>

    </div>
</div>


<?php elseif( get_row_layout() == 'hexagon' ) : // hexagon ?>

<div class="flexible-content-section hexagon-game my-20px">
    <div class="relative">
        <?php if ( have_rows('questions') ) : ?>
            <div class="hexagon-wrap">

                <div class="row items-center">
                    <div class="col-md-4">
                        <ul class="list-none flex flex-col gap-8px">
                            <?php while ( have_rows('questions') ) : the_row();
                                $question = get_sub_field('question');
                            ?>

                            <li class="text-16px font-500 leading-130 bg-light-gray rounded-8px p-16px">
                                <?php echo $question; ?>
                            </li>

                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="hexagon-inner relative">
                            <svg class="hexagon-shape" viewBox="0 0 100 100">
                                <polygon points="50,1 93,25 93,75 50,99 7,75 7,25" fill="#FFC36B"/>
                            </svg>

                            <div class="hexagon-overlay flex items-center justify-center absolute top-0 right-0 bottom-0 left-0 z-2">
                                <textarea class="hexagon-textarea" name="hexagon_answers" placeholder="1. <?php echo $get_static_text[get_lang()]['write_here']; ?>"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>



<?php elseif( get_row_layout() == 'computer_parts' ) : // computer_parts 
$display_feedback = get_sub_field('');    
?>

<div class="flexible-content-section comp-game my-20px">
    <div class="relative">
        <div class="comp-wrap w-[740px] mx-auto relative border-solid border-1px border-transparent">
            <div class="pc-game-wrap">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pc.png" alt="">
            </div>

            <span style="transform: rotate(-8deg) scaleY(-1);" class="comp-arrow absolute right-[340px] top-[80px] z-2 w-[70px] h-[70px]">
                <img class="w-auto h-full" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/long-arrow.png" alt="">
            </span>
            <input class="absolute right-[178px] top-[66px] w-[160px] bg-white h-30px focus:outline-none border-2px border-solid border-medium-gray focus:border-orange rounded-8px py-0 px-8px text-15px font-500 text-dark" type="text" name="comp-field[]" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">


            <span style="transform: rotate(85deg)" class="comp-arrow absolute left-[80px] bottom-[110px] z-2 w-[80px] h-[80px]">
                <img class="w-auto h-full" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/long-arrow.png" alt="">
            </span>
            <input class="absolute left-[10px] bottom-[74px] w-[160px] bg-white h-30px focus:outline-none border-2px border-solid border-medium-gray focus:border-orange rounded-8px py-0 px-8px text-15px font-500 text-dark" type="text" name="comp-field[]" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">


            <span style="transform: rotate(92deg) scaleY(-1);" class="comp-arrow absolute right-[90px] bottom-[112px] z-2 w-[80px] h-[80px]">
                <img class="w-auto h-full" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/long-arrow.png" alt="">
            </span>
            <input class="absolute right-[10px] bottom-[74px] w-[160px] bg-white h-30px focus:outline-none border-2px border-solid border-medium-gray focus:border-orange rounded-8px py-0 px-8px text-15px font-500 text-dark" type="text" name="comp-field[]" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">


            <span style="transform: rotate(85deg)" class="comp-arrow absolute left-[232px] bottom-[48px] z-2 w-[60px] h-[60px]">
                <img class="w-auto h-full" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/long-arrow.png" alt="">
            </span>
            <input class="absolute left-[180px] bottom-[12px] w-[160px] bg-white h-30px focus:outline-none border-2px border-solid border-medium-gray focus:border-orange rounded-8px py-0 px-8px text-15px font-500 text-dark" type="text" name="comp-field[]" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">


            <span style="transform: rotate(95deg) scaleY(-1);" class="comp-arrow absolute left-[465px] bottom-[48px] z-2 w-[60px] h-[60px]">
                <img class="w-auto h-full" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/long-arrow.png" alt="">
            </span>
            <input class="absolute left-[464px] bottom-[12px] w-[160px] bg-white h-30px focus:outline-none border-2px border-solid border-medium-gray focus:border-orange rounded-8px py-0 px-8px text-15px font-500 text-dark" type="text" name="comp-field[]" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>">

        </div>
    </div>
</div>


<?php elseif( get_row_layout() == 'boxes_with_text_game' ) : 
    $cols = get_sub_field('columns');
    $placeholder_text = get_sub_field('placeholder_text');
    $cols_count = count($cols);
    $print = get_sub_field('print');
?>

<div class="flexible-content-section boxes-with-text my-20px">
    <div class="relative print-div">
        <?php if ($print) : ?>
            <div class="print-trigger-wrap flex justify-end mb-8px">
                <a href="#" class="inline-flex leading-1 bg-light-gray py-4px px-20px rounded-8px text-15px font-600 items-center gap-4px print-trigger" data-print-trigger>
                    <span>
                        <svg fill="#000000" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.656 6.938l-0.344 2.688h11.781l-0.344-2.688c0-0.813-0.656-1.438-1.469-1.438h-8.188c-0.813 0-1.438 0.625-1.438 1.438zM1.438 11.094h19.531c0.813 0 1.438 0.625 1.438 1.438v8.563c0 0.813-0.625 1.438-1.438 1.438h-2.656v3.969h-14.219v-3.969h-2.656c-0.813 0-1.438-0.625-1.438-1.438v-8.563c0-0.813 0.625-1.438 1.438-1.438zM16.875 25.063v-9.281h-11.344v9.281h11.344zM15.188 18.469h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 21.063h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 23.656h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375z"></path>
                        </svg>
                    </span>
                    <?php echo $get_static_text[get_lang()]['print']; ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="comp-wrap">
            <div class="boxes-with-text-wrap">
                <?php if ( have_rows('columns') ) : $i=0; ?>
                    <div class="bwt-wrap flex flex-wrap gap-12px">

                        <?php while ( have_rows('columns') ) : the_row(); $i++;
                            $text_content = get_sub_field('text_content');
                        ?>

                        <div class="bwt-col-<?php echo $i; ?> flex flex-col gap-12px rounded-12px p-12px flex-1 min-w-200px">
                            <div class="md:min-h-[130px]">
                                <?php echo $text_content; ?>
                            </div>
                            <div>
                                <textarea class="border-2px border-none rounded-8px p-12px text-14px w-full min-h-[156px] outline-none hover:outline-none" name="bwt_textarea[]" placeholder="<?php echo $placeholder_text; ?>"></textarea>
                            </div>
                        </div>

                        <?php endwhile; ?>
                        
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php elseif( get_row_layout() == 'printable_table' ) : // printable_table
    $cols = get_sub_field('column_headers');
    $rows = get_sub_field('rows_headers');
    $cols_count = count($cols);
    $placeholder_text = get_sub_field('placeholder_text');
?>

<div class="flexible-content-section editble-table my-20px">
    <div class="relative">
        <div class="et-wrap print-div">
            <div class="flex justify-end">
                <div>
                    <div class="print-trigger-wrap flex justify-end mb-8px">
                        <a href="#" class="inline-flex leading-1 bg-light-gray py-4px px-20px rounded-8px text-15px font-600 items-center gap-4px print-trigger" data-print-trigger>
                            <span>
                                <svg fill="#000000" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.656 6.938l-0.344 2.688h11.781l-0.344-2.688c0-0.813-0.656-1.438-1.469-1.438h-8.188c-0.813 0-1.438 0.625-1.438 1.438zM1.438 11.094h19.531c0.813 0 1.438 0.625 1.438 1.438v8.563c0 0.813-0.625 1.438-1.438 1.438h-2.656v3.969h-14.219v-3.969h-2.656c-0.813 0-1.438-0.625-1.438-1.438v-8.563c0-0.813 0.625-1.438 1.438-1.438zM16.875 25.063v-9.281h-11.344v9.281h11.344zM15.188 18.469h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 21.063h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 23.656h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375z"></path>
                                    </svg>
                                </span>
                                <?php echo $get_static_text[get_lang()]['print']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($cols) : ?>
                <form action="#" method="post">
                    <table class="et-table table-stripped border-solid border-1px border-orange">
                        <tr class="border-solid border-1px border-orange">
                            <?php while ( have_rows('column_headers') ) : the_row();
                                $col_title = get_sub_field('col_title');
                            ?>
                            <th class="p-8px text-15px text-left"><?php echo $col_title; ?></th>
                            <?php endwhile; ?>
                        </tr>

                        <?php if ($rows) : ?>
                            <?php while ( have_rows('rows_headers') ) : the_row();
                                $row_title = get_sub_field('row_title');
                            ?>

                            <tr>
                                <td class="p-8px text-15px font-600"><?php echo $row_title; ?></td>
                                <?php if ($cols_count) : ?>
                                    <?php for ($i=0; $i<$cols_count - 1; $i++) : ?>
                                        <td class="align-top p-8px text-15px text-left">
                                            <textarea name="et-textarea[]" class="et-textarea w-full p-12px border-2px border-solid border-medium-gray rounded-8px text-14px leading-140 text-dark outline-none focus:border-orange" placeholder="<?php echo $placeholder_text; ?>"></textarea>
                                        </td>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </table>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php elseif( get_row_layout() == 'functions_box' ) : // functions_box
    $columns = (get_sub_field('columns') ? get_sub_field('columns') : 'col-md-12');
    $items = get_sub_field('items');
?>

<div class="flexible-content-section functions-box my-20px">
    <div class="relative">
        <div class="fb-wrap print-div">
            <div class="row">
                <?php if ( have_rows('items') ) : ?>
                    <?php while ( have_rows('items') ) : the_row();
                        $content = get_sub_field('content');
                        $functions = get_sub_field('functions');
                    ?>

                    <div class="<?php echo $columns; ?>">
                        <div class="fb-entry-content">
                            <?php echo $content; ?>
                        </div>

                        <div class="mt-24px">
                            <?php if ( have_rows('functions') ) : ?>
                                <?php while ( have_rows('functions') ) : the_row(); 
                                    $title = get_sub_field('title');
                                ?>

                                <div class="p-8px"><?php echo $title; ?></div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php elseif( get_row_layout() == 'fill_table' ) : // fill_table 
    $header_count = count(get_sub_field('table_headers'));
?>

    <div class="flexible-content-section table-characteristics my-20px">
        <div class="table-characteristics-wrap my-20px">
            <?php if ( have_rows('table_headers') ) : $counter = 0; ?>
                <table class="table-characteristics-table border-1px border-solid border-medium-gray">
                    <tr>
                        <?php while ( have_rows('table_headers') ) : the_row(); $counter++;
                            $table_header = get_sub_field('table_header');
                        ?>
                        
                            <td class="p-8px text-15px font-600 text-center border-1px border-solid border-medium-gray">
                                <?php echo $table_header; ?>
                            </td>

                        <?php endwhile; ?>
                    </tr>

                    <?php if ( have_rows('table_rows') && $header_count > 0 ) : ?>
                        <?php while ( have_rows('table_rows') ) : the_row();
                            $row_title = get_sub_field('row_title');
                        ?>

                        <tr>
                            <td class="p-8px text-15px font-600 text-center border-1px border-solid border-medium-gray">
                                <?php echo $row_title; ?>
                            </td>

                            <?php for ($i=1; $i < $header_count; $i++) : ?>
                                <td class="p-8px text-15px text-center border-1px border-solid border-medium-gray">
                                    <textarea type="text" class="w-100% border-1px border-medium-gray rounded-8px p-8px text-14px focus:outline-none focus:border-orange" name="table_characteristics_field[]" placeholder="<?php echo $get_static_text[get_lang()]['write_here']; ?>" rows="1"></textarea>
                                </td>
                            <?php endfor; ?>
                        </tr>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>

<?php 
endif;
