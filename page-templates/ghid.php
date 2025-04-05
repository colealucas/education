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
            <div class="mb-40px">
                <h1 class="text-48px font-700 leading-130 text-center"><?php the_title();  ?></h1>
            </div>

            <div class="book-selector">
                <div class="flex gap-30px flex-wrap md:flex-nowrap">
                    <div class="primary-book-guide w-full md:flex-1 bg-light-gray py-40px px-20px rounded-20px">
                        <div class="primary-book-guide__title mb-20px">
                            <h2 class="text-36px font-600 leading-130 text-center">
                                <a href="<?php the_field('guide1_link'); ?>">
                                    <?php the_field('book1_guide_title'); ?>
                                </a>
                            </h2>
                        </div>

                        <div class="primary-book-guide__image text-center">
                            <?php if ( get_field('book1_cover_image') ): ?>
                                <div class="inline-block">
                                    <a href="<?php the_field('guide1_link'); ?>">
                                        <img class="h-[350px] object-cover" src="<?php the_field('book1_cover_image'); ?>" alt="">
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="primary-book-guide § bg-light-gray py-40px px-20px rounded-20px">
                        <div class="primary-book-guide__title mb-20px">
                            <h2 class="text-36px font-600 leading-130 text-center">
                                <a href="<?php the_field('guide2_link'); ?>">
                                    <?php the_field('book2_guide'); ?>
                                </a>
                            </h2>
                        </div>

                        <div class="primary-book-guide__image text-center">
                            <?php if ( get_field('book2_cover_image') ): ?>
                                <div class="inline-block">
                                    <a href="<?php the_field('guide2_link'); ?>">
                                        <img class="h-[350px] object-cover" src="<?php the_field('book2_cover_image'); ?>" alt="">
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="primary-book-guide w-full md:flex-1 bg-light-gray py-40px px-20px rounded-20px">
                        <div class="primary-book-guide__title mb-20px">
                            <h2 class="text-36px font-600 leading-130 text-center">
                                <a href="<?php the_field('guide3_link'); ?>">
                                    <?php the_field('book3_guide_title'); ?>
                                </a>
                            </h2>
                        </div>

                        <div class="primary-book-guide__image text-center">
                            <?php if ( get_field('book3_cover_image') ): ?>
                                <div class="inline-block">
                                    <a href="<?php the_field('guide3_link'); ?>">
                                        <img class="h-[350px] object-cover" src="<?php the_field('book3_cover_image'); ?>" alt="">
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
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

