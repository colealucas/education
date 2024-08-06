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
                        <img src="<?php echo get_field('book_cover_image'); ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="book-content">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
        <h2>Module</h2>
        <ul>
            <?php
            $modules = new WP_Query(array(
                'post_type' => 'module',
                'meta_query' => array(
                    array(
                        'key' => 'parent_book',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE'
                    ),
                ),
            ));
            while ($modules->have_posts()) : $modules->the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
