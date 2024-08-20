<?php 
/**
 * Single book template
 */

get_header();

$get_static_text = [
    'ro' => [
        'subjects' => 'Subiecte',
        'go_back' => 'Inapoi la Module',
    ],
    'ru' => [
        'subjects' => 'Предметы',
        'go_back' => 'Назад к модулям',
    ]
];
?>

<div class="section py-40px bg-medium-green rounded-24px mx-8px mt-34px module-intro-section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                    
            <div class="row min-h-[325px] items-center">
                <div class="col-lg-6">
                    <div class="max-w-[539px]">
                        <div class="go-back">
                            <a href="#" class="flex items-center gap-8px text-green hover:text-dark">
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
                            <?php echo "5 Subiecte";  ?>
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
            <h2 class="text-32px md:text-56px font-700"><?php echo $get_static_text[get_lang()]['subjects']; ?></h2>
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
                                <a href="<?php the_permalink(); ?>" class="block p-24px bg-faded-white hover:bg-green hover:text-white font-500 hover:font-700 mb-20px rounded-24px">
                                    <h3 class="text-28px leading-110 mb-24px min-h-[62px]"><?php the_title(); ?></h3>

                                    <?php if ( has_post_thumbnail() ) : $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                                        <div class="post-thumbnail">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="">
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

<?php get_footer(); ?>
