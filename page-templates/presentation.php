<?php
/**
 * Template name: Prezentare
 * 
 * Placeholder image api url https://via.placeholder.com/685x503
 */

 get_header(); 
 ?>

<section class="team-section py-40px bg-primary-light rounded-24px mx-8px mt-16px">
    <div class="container">        
        <div class="row items-center">
            <div class="col-md-6">
                <h1 class="text-36px md:text-50px lg:text-64px xl:text-[80px] font-700 leading-110 text-primary"><?php echo get_field('page_title'); ?></h1>

                <div class="text-16px mt-16px mb-30px">
                    <?php echo get_field('page_description'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php if ( get_field('featured_image') ) : ?>
                    <div>
                        <img class="rounded-32px" src="<?php echo get_field('featured_image'); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="team-section py-32px">
    <div class="container">
        <?php if( have_rows('info_boxes') ): ?>
            <?php while( have_rows('info_boxes') ): the_row(); 
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
            ?>
                
                <div class="bg-faded-gray rounded-24px p-24px mb-16px">
                    <h3 class="flex items-center text-18px mb-8px">
                        <?php if ($icon) : ?>
                            <img src="<?php echo $icon; ?>" alt="">
                        <?php endif; ?>
                        
                        <span class="ml-4px inline-block text-18px font-600">
                            <?php echo $title; ?>
                        </span>
                    </h3>

                    <div class="text-16px text-dark text-content">
                        <?php echo $content; ?>
                    </div>
                </div>
                
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();

