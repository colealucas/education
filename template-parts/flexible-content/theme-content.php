<?php
/**
 * Theme flexible content
 * 
 */

 ?>

<?php if( have_rows('add_steps') ): ?>
    <?php while ( have_rows('add_steps') ) : the_row(); ?>

        <?php
        // Check the layout of the main flexible content
        if( get_row_layout() == 'share_experience' ): 
            // Get the cloned flexible content field
            $cloned_content = get_sub_field('add_content'); // This field clones 'global_content_sections'

            print_r( $cloned_content );

            if( $cloned_content ):
                foreach( $cloned_content as $section ): // Loop through the cloned flexible content
                    if( have_rows('global_content_sections', 'option') ): // Access the global content from the options page
                        while ( have_rows('global_content_sections', 'option') ) : the_row();

                            // Output fields from the global content sections
                            if( get_row_layout() == 'text_block' ): // Replace 'text_block' with actual layout names
                                echo '<p>' . get_sub_field('text') . '</p>';

                            elseif( get_row_layout() == 'image_block' ): // Replace 'image_block' with actual layout names
                                echo '<img src="' . get_sub_field('image') . '" alt="">';

                            // Handle other layouts in the global content sections
                            endif;

                        endwhile;
                    endif;
                endforeach;
            endif;

        endif;
        ?>

    <?php endwhile; ?>
<?php endif; ?>


<? if( have_rows('add_steps') ):
    while ( have_rows('add_steps') ) : the_row();
        //echo get_row_layout() . "<br>";

        if( get_row_layout() == 'share_experience' ) : //echo " share_experience ";
            print_r( get_sub_field('add_content') );
            
            if( have_rows('add_content') ): 
                while ( have_rows('add_content') ) : the_row();
            
                    if( get_row_layout() == 'text_content' ) :
                        echo '<p>' . get_sub_field('title') . '</p>';
            
                    elseif( get_row_layout() == 'youtube_video' ) :
                        echo get_sub_field('youtube_video_link');
            
                    // Add more layouts as needed
            
                    endif;
                endwhile;
            endif;

        endif;
    endwhile;
endif;
?>