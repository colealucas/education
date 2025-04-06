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
            <div class="mb-30px">
                <h1 class="text-48px font-700 leading-130 text-center"><?php the_title();  ?></h1>
            </div>

            <div class="book-selector max-w-[1000px] mx-auto">
                <?php if (have_rows('guides')): ?>
                    <div class="flex gap-30px flex-wrap md:flex-nowrap">
                        <?php while (have_rows('guides')): the_row(); ?>
                            <div class="book-selector-item flex-1 text-center bg-light-gray p-20px rounded-20px">
                                <div class="text-center mb-20px">
                                    <h2 class="text-24px font-600 leading-130"><?php the_sub_field('title'); ?></h2>
                                </div>

                                <a href="<?php the_sub_field('guide_page_link'); ?>">
                                    <img class="max-h-[350px] object-cover rounded-20px inline-block" src="<?php the_sub_field('cover_image'); ?>" alt="">
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="ghid-content special-headings max-w-[930px] mx-auto mt-20px">
                <?php if (get_the_content()): ?>
                    <div class="entry-content content-spacing style-content content-clearfix clearfix responsive-video">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

