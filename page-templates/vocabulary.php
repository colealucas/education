<?php
/**
 * Template name: Vocabular 
 * 
 */

 get_header();
?>

<section class="team-section py-40px md:py-50px">
    <div class="container">
        <div class="mb-30px">
            <h1 class="text-48px font-700 leading-130 text-center"><?php the_title();  ?></h1>
        </div>

        <div class="book-selector max-w-[1150px] mx-auto">
            <?php if (have_rows('guides')): ?>
                <div class="flex gap-30px flex-wrap md:flex-nowrap">
                    <?php while (have_rows('guides')): the_row(); ?>
                        <div class="book-selector-item flex-1 bg-light-gray p-20px rounded-20px">
                            <div class="mb-20px">
                                <a href="<?php the_sub_field('guide_page_link'); ?>">
                                    <h2 class="text-24px font-600 leading-130 text-center"><?php the_sub_field('title'); ?></h2>
                                </a>
                            </div>

                            <div class="text-center">
                                <a href="<?php the_sub_field('guide_page_link'); ?>">
                                    <img class="max-h-[450px] object-cover rounded-20px inline-block" src="<?php the_sub_field('cover_image'); ?>" alt="">
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php
get_footer();

