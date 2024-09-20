<?php 
/**
 * Single book template
 */

get_header();

$get_static_text = [
    'ro' => [
        'modules' => 'Module',
        'explore_modules' => 'Explorează Modulele',
        'partners_title' => 'Partenerii Noștri',
    ],
    'ru' => [
        'modules' => 'Модули',
        'explore_modules' => 'Исследуйте Модули',
        'partners_title' => 'Наши Партнеры',
    ]
];
?>

<div class="section py-40px md:py-48px bg-faded-gray rounded-48px mx-8px mt-16px manual-intro-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="max-w-[590px]">
                    <h1 class="text-36px sm:text-50px lg:text-87px font-700 leading-110"><?php echo get_field('book_title'); ?></h1>

                    <div class="my-16px text-16px">
                        <?php echo get_field('book_short_description'); ?>
                    </div>

                    <div class="mb-32px">
                        <a href="#modules" class="btn"><?php echo $get_static_text[get_lang()]['explore_modules']; ?></a>
                    </div>
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="manual-cover lg:text-right">
                    <?php if ( get_field('book_cover_image') ) : ?>
                        <img class="max-w-[467px] w-100% inline-block" src="<?php echo get_field('book_cover_image'); ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modules" class="section py-40px md:py-72px bg-white">
    <div class="container">
        <div class="mb-32px">
            <h2 class="text-32px md:text-56px font-700"><?php echo $get_static_text[get_lang()]['modules']; ?></h2>
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
                    ?>

                    <?php if ( $modules->have_posts() ) : ?>
                        <?php while ($modules->have_posts()) : $modules->the_post(); ?>

                            <div class="col-lg-3 col-md-6">
                                <a href="<?php the_permalink(); ?>" class="block book-module p-24px bg-faded-white font-500 mb-20px rounded-24px">
                                    <h3 class="text-28px leading-110 mb-24px min-h-[62px]"><?php the_title(); ?></h3>

                                    <?php if ( has_post_thumbnail() ) : $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                                        <div class="post-thumbnail">
                                            <img class="rounded-16px" src="<?php echo $thumbnail_url; ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                        
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php else : ?>

                        <div class="col-md-12">
                            <strong><?php _e('No modules found', 'education'); ?>.</strong>
                        </div>    

                    <?php endif; ?>    
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<div id="partners" class="section pb-40px md:pb-72px bg-white">
    <div class="container">
        <div class="mb-32px text-center">
            <h2 class="text-32px md:text-52px font-700"><?php echo $get_static_text[get_lang()]['partners_title']; ?></h2>
        </div>

        <div class="text-center hidden md:block">
            <img class="inline-block" src="<?php echo get_template_directory_uri() . '/assets/images/logos.svg'; ?>" alt="">
        </div>

        <div class="logo-container block md:hidden">
            <div class="logo-strip"></div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
