<?php 
/**
 * Single book template
 */

get_header(); 
?>

<div class="section py-48px bg-faded-gray rounded-48px mx-8px mt-16px manual-intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="max-w-[590px]">
                    <h1 class="text-87px font-700 leading-110"><?php echo get_field('book_title'); ?></h1>

                    <div class="my-16px text-16px">
                        <?php echo get_field('book_short_description'); ?>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="manual-cover md:text-right">
                    <?php if ( get_field('book_cover_image') ) : ?>
                        <img class="max-w-[467px] inline-block" src="<?php echo get_field('book_cover_image'); ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section py-48px md:py-72px bg-white">
    <div class="container">
        <div class="mb-32px">
            <h2 class="text-32px md:text-56px font-700">Module</h2>
        </div>

        <?php while (have_posts()) : the_post(); ?>
            <div class="book-modules">
                <div class="row">
                    <?php
                    $modules = new WP_Query(array(
                        'post_type' => 'module',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'parent_book',
                                'value' => '"' . get_the_ID() . '"',
                                'compare' => 'LIKE'
                            ),
                        ),
                        'orderby' => 'id',
                        'order' => 'ASC'
                    ));

                    while ($modules->have_posts()) : $modules->the_post();
                    ?>

                        <div class="col-lg-3 col-md-6">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endwhile; ?>
        
        <div class="book-modules">
            <div class="row">
                <div class="col-lg-3 col-md-6">ss</div>
                <div class="col-lg-3 col-md-6">ss</div>
                <div class="col-lg-3 col-md-6">ss</div>
                <div class="col-lg-3 col-md-6">ss</div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
