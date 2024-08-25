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
            <div class="tcs-heading mb-16px">
                <h2 class="text-28px font-600"><?php echo $section_title; ?></h2>
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
        <div class="theme-heading">
            <h2><?php echo $section_title; ?></h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-16px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="match-definitions-wrap my-24px">
            <?php if( have_rows('definitions') ): ?>
                <?php while( have_rows('definitions') ): the_row(); 
                    $word = get_sub_field('word');
                    $def = get_sub_field('definition');
                ?>
                
                    <div class="flex flex-nowrap gap-24px">
                        <div class="w-50% definitions-column">
                            <div class="definition rounded-8px py-16px px-20px mb-16px bg-light-gray font-600 text-16px" data-word="<?php echo $word; ?>">
                                <?php echo $def; ?>
                            </div>
                        </div>

                        <div class="w-50% placeholders-column flex items-center">
                            <div class="placeholder rounded-8px mb-16px text-16px font-600 flex items-center justify-center w-full min-h-[40px]" data-word="<?php echo $word; ?>"></div>
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
                                <?php echo $the_word; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>
    </div>


<?php 
endif;
