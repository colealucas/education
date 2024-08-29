<?php
/**
 * Theme flexible content
 * 
 */

 ?>

<?php if( get_row_layout() == 'text_content' ) :  // text_content section
    $css_classes = [];
    $section_title = get_sub_field('title');
    $section_content = get_sub_field('content');
    $full_with_images = get_sub_field('full_with_images');
    $check_paragraphs = get_sub_field('check_paragraphs');

    if ($full_with_images) {
        $css_classes[] = 'full-width-images';
    }

    if ($check_paragraphs) {
        $css_classes[] = 'check-paragraphs';
    }

    // convert array of classes to string
    $addition_classes = implode(' ', $css_classes);
?>

    <div class="flexible-content-section text-content-section my-12px">
        <?php if ( $section_title ) : ?>
            <div class="tcs-heading mb-16px bg-green text-white py-20px px-24px rounded-16px">
                <h2 class="text-22px font-500 leading-120 flex items-center gap-12px">
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

        <div class="tcs-content phase-content entry-content content-spacing text-16px <?php echo $addition_classes; ?>">
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
            <h2 class="text-22px font-500 leading-120 flex items-center gap-12px">
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

        <div class="tcs-content phase-content entry-content content-spacing text-16px">
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
?>

    <div class="flexible-content-section match-definitions my-24px">
        <div class="theme-heading bg-green text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-22px font-500 leading-120 flex items-center gap-12px">
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

        <div class="tcs-content phase-content entry-content content-spacing text-16px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="square-table-wrap my-24px">
            <style>
                .words-row {
                    display: flex;
                    width: 100%;
                }

                .letter {
                    flex-grow: 1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 30px;
                    height: 30px;
                    border: 1px solid #ccc;
                    cursor: pointer;
                    user-select: none;
                }

                .letter.selected {
                    background-color: yellow;
                }

                .letter.found {
                    background-color: green;
                    color: white;
                }

            </style>

            <?php
               $grid = [
                    ['G', 'T', 'B', 'T', 'A', 'O', 'X', 'S', 'M', 'U', 'L', 'T', 'I', 'M', 'E', 'D', 'I', 'A'],
                    ['P', 'R', 'Y', 'O', 'M', 'P', 'R', 'E', 'S', 'A', 'S', 'C', 'R', 'I', 'S', 'Ă', 'U', 'K'],
                    ['R', 'K', 'N', 'Y', 'W', 'Q', 'U', 'S', 'Ă', 'I', 'Z', 'X', 'S', 'A', 'X', 'Ă', 'V', 'X'],
                    ['E', 'P', 'R', 'E', 'S', 'A', 'A', 'U', 'D', 'I', 'O', 'V', 'I', 'Z', 'U', 'A', 'L', 'Ă'],
                    ['S', 'Ă', 'D', 'J', 'V', 'P', 'A', 'H', 'T', 'L', 'O', 'B', 'T', 'T', 'Z', 'J', 'H', 'I'],
                    ['A', 'N', 'V', 'X', 'F', 'K', 'S', 'G', 'Ă', 'A', 'D', 'R', 'E', 'V', 'I', 'S', 'T', 'E'],
                    ['O', 'F', 'V', 'T', 'E', 'L', 'E', 'F', 'O', 'N', 'O', 'K', 'N', 'K', 'I', 'P', 'F', 'J'],
                    ['N', 'C', 'O', 'N', 'S', 'O', 'L', 'Ă', 'R', 'I', 'N', 'G', 'E', 'B', 'J', 'F', 'Z', 'O'],
                    ['L', 'C', 'O', 'I', 'J', 'W', 'W', 'Ă', 'D', 'T', 'X', 'M', 'N', 'X', 'A', 'B', 'O', 'C'],
                    ['I', 'Î', 'Z', 'C', 'X', 'V', 'E', 'A', 'T', 'E', 'L', 'E', 'V', 'I', 'Z', 'O', 'R', 'U'],
                    ['N', 'Â', 'J', 'C', 'Q', 'R', 'R', 'X', 'Ă', 'G', 'Z', 'C', 'W', 'X', 'C', 'Y', 'Î', 'R'],
                    ['E', 'N', 'O', 'O', 'A', 'H', 'N', 'T', 'X', 'A', 'E', 'G', 'X', 'Y', 'B', 'U', 'V', 'I'],
                    ['A', 'J', 'P', 'I', 'M', 'Ș', 'P', 'J', 'D', 'L', 'V', 'C', 'X', 'R', 'G', 'Ș', 'T', 'V'],
                    ['P', 'D', 'Z', 'H', 'T', 'M', 'A', 'E', 'V', 'I', 'E', 'Ă', 'Y', 'R', 'Y', 'Ș', 'Y', 'I'],
                    ['Y', 'H', 'C', 'V', 'Q', 'Ș', 'V', 'V', 'K', 'Z', 'H', 'C', 'E', 'B', 'Ă', 'T', 'L', 'D'],
                    ['B', 'S', 'H', 'Â', 'O', 'S', 'D', 'B', 'L', 'Z', 'S', 'K', 'G', 'L', 'I', 'X', 'T', 'E'],
                    ['T', 'V', 'T', 'Î', 'N', 'I', 'N', 'T', 'E', 'R', 'N', 'E', 'T', 'L', 'T', 'L', 'Y', 'O'],
                    ['D', 'L', 'B', 'E', 'X', 'X', 'J', 'Q', 'K', 'X', 'O', 'C', 'K', 'T', 'T', 'Y', 'X', 'T']
                ];            

                echo '<div id="word-grid">';
                foreach ($grid as $row) {
                    echo '<div class="words-row">';
                    foreach ($row as $letter) {
                        echo "<span class='letter'>$letter</span>";
                    }
                    echo '</div>';
                }
                echo '</div>';
            ?>

            <div id="found-words" class="mt-24px"></div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const letters = document.querySelectorAll('.letter');
                    let selectedLetters = [];
                    let selectedElements = [];

                    // Words to be found (all lowercase, spaces removed)
                    const words = [
                        'presa online',
                        'presa scrisă',
                        'presa audiovizuală',
                        'televizor',
                        'radio',
                        'ziare',
                        'reviste',
                        'internet',
                        'multimedia',
                        'consolă',
                        'telefon',
                        'jocuri',
                        'video'
                    ];

                    function removeSpaces(str) {
                        return str.replace(/\s+/g, ''); // Replace all whitespace characters with an empty string
                    }

                    letters.forEach((letter, index) => {
                        letter.addEventListener('click', function () {
                            const letterIndex = selectedElements.indexOf(this);

                            if (letterIndex === -1) {
                                // If the letter is not already selected, select it
                                this.classList.add('selected');
                                selectedLetters.push(this.innerText.toLowerCase()); // Ensure lowercase
                                selectedElements.push(this);
                            } else {
                                // If the letter is already selected, deselect it
                                this.classList.remove('selected');
                                selectedLetters.splice(letterIndex, 1);
                                selectedElements.splice(letterIndex, 1);
                            }

                            checkWord();
                        });
                    });

                    function checkWord() {
                        const currentWord = selectedLetters.join(''); // No need to convert to lowercase again

                        // Check if the selected letters exactly match any word in the list
                        words.forEach(word => {
                            // if (isExactMatch(currentWord, word)) { // old version here
                            if (isExactMatch(currentWord, removeSpaces(word))) {
                                selectedElements.forEach(letter => {
                                    letter.classList.remove('selected');
                                    letter.classList.add('found');
                                });

                                // Display found word in a separate div
                                const foundWordsDiv = document.getElementById('found-words');
                                foundWordsDiv.innerHTML += `<p>${word}</p>`;

                                // Clear selection
                                selectedLetters = [];
                                selectedElements = [];
                            }
                        });
                    }

                    function isExactMatch(selected, word) {
                        if (selected.length !== word.length) {
                            return false;
                        }

                        // Create frequency counts for selected letters and the word
                        const countLetters = (str) => {
                            return str.split('').reduce((acc, char) => {
                                acc[char] = (acc[char] || 0) + 1;
                                return acc;
                            }, {});
                        };

                        const selectedCount = countLetters(selected);
                        const wordCount = countLetters(word);

                        // Compare the frequency counts
                        return Object.keys(wordCount).every(char => wordCount[char] === selectedCount[char]);
                    }
                });
            </script>
        </div>
    </div>


<?php 
endif;
