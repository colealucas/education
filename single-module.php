<?php 
/**
 * Single book template
 */

get_header();

$get_static_text = [
    'ro' => [
        'subjects' => 'Subiecte',
        'go_back' => 'Inapoi la Module',
        'access_theme' => 'Acceseaza Tema',
    ],
    'ru' => [
        'subjects' => 'Предметы',
        'go_back' => 'Назад к модулям',
        'access_theme' => 'Открыть Тему',
    ]
];

$back_link = get_post_type_archive_link( 'module' );
$parent_book = get_field('parent_book');
$parent_book_url = (is_array( $parent_book ) && $parent_book[0] ? get_permalink($parent_book[0]->ID) : '#');

$all_themes = new WP_Query(array(
    'post_type' => 'theme',
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => 'parent_module',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
        ),
    ),
    'orderby' => 'id',
    'order' => 'DESC',
    'fields' => 'ids', // This retrieves only post IDs instead of full post objects
));

// Get the count of posts
$themes_count = $all_themes->found_posts;
?>

<div class="section py-40px bg-medium-green rounded-24px mx-8px mt-34px module-intro-section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                    
            <div class="row min-h-[325px] items-center">
                <div class="col-lg-6">
                    <div class="max-w-[539px]">
                        <div class="go-back">
                            <a href="<?php echo $parent_book_url ; ?>" class="flex items-center gap-8px text-green hover:text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                    <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <?php echo $get_static_text[get_lang()]['go_back']; ?>
                            </a>
                        </div>

                        <h1 class="text-36px md:text-48px font-500 leading-120 mt-8px text-green">
                            <?php the_title(); ?>
                        </h1>

                        <div class="mt-16px text-16px text-content-spacing">
                            <?php the_content(); ?>
                        </div>

                        <div class="module-subjects-count mt-16px text-green">
                            <?php echo $themes_count . " " . $get_static_text[get_lang()]['subjects']; ?>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="module-illustration lg:text-right">
                        <?php if ( has_post_thumbnail() ) : $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                            <div class="module-thumbnail">
                                <img src="<?php echo $thumbnail_url; ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<div id="modules" class="section py-40px md:py-72px bg-white">
    <div class="container">
        <div class="mb-32px">
            <h2 class="text-32px font-700"><?php echo $get_static_text[get_lang()]['subjects']; ?></h2>
        </div>

        <?php while (have_posts()) : the_post(); ?>
            <div class="book-themes">
                <?php
                    $themes = new WP_Query(array(
                        'post_type' => 'theme',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'parent_module',
                                'value' => '"' . get_the_ID() . '"',
                                'compare' => 'LIKE'
                            ),
                        ),
                        'orderby' => 'id',
                        'order' => 'ASC'
                    ));
                ?>

                <?php if ( $themes->have_posts() ) : $i=0; ?>
                    <?php while ($themes->have_posts()) : $themes->the_post(); $i++; ?>

                        <div class="p-24px bg-faded-white border-1px border-solid border-border-gray mb-16px flex flex-nowrap items-center justify-between rounded-24px">
                            <div>
                                <div class="flex flex-nowrap items-center">
                                    <div>
                                        <div class="subject-num flex items-center justify-center leading-1 size-78px bg-light-green text-green text-40px rounded-16px">
                                            <?php echo $i; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?php the_permalink(); ?>" class="block hover:text-green font-500">
                                            <h3 class="text-30px leading-110 pl-16px"><?php the_title(); ?></h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="<?php the_permalink(); ?>" class="btn">
                                    <?php echo $get_static_text[get_lang()]['access_theme']; ?>
                                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.5 11L6.5 6L1.5 1" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
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
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
