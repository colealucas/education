<?php
/**
 * Template name: Ghid
 * 
 * Placeholder image api url https://via.placeholder.com/685x503
 */

 get_header();
 ?>

<section class="ghid-section py-40px">
    <div class="container">        
        <div class="relative">
            <h1 class="text-48px font-700 leading-130 text-center"><?php the_title();  ?></h1>

            <div class="ghid-content special-headings max-w-[930px] mx-auto mt-20px">
                <div class="entry-content content-spacing style-content content-clearfix clearfix responsive-video">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

