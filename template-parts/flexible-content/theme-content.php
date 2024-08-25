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

<?php 
endif;
