<?php
/**
 * Template Name: Pagina Principala
 */

 get_header();

 $get_static_text = [
    'ro' => [
        'partners_title' => 'Partenerii Noștri',
    ],
    'ru' => [
        'partners_title' => 'Наши Партнеры',
    ]
];
?>

<div class="section py-64px pb-35px">
    <div class="container">
        <div class="text-center mx-auto max-w-[870px]">
            <h1 class="text-28px md:text-48px font-900 uppercase">
                <?php echo get_field('intro_title'); ?>
            </h1>
        </div>

        <div class="text-16px text-gray text-center leading-150 mt-12px">
            <?php echo get_field('intro_subtitle'); ?>
        </div>

        <?php $books = get_field('book'); if ($books) :  ?>

            <div class="books-grid-wrap mt-48px">
                <div class="row">
                    <?php foreach($books as $post) :
                        setup_postdata($post);
                    ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="book-wrap rounded-56px p-36px pb-0 bg-light-gray mx-auto mb-36px lg:mb-0 max-w-[415px] md:max-w-auto overflow-hidden">
                                <h2 class="text-28px md:text-40px font-600 min-h-[110px]">
                                    <a href="<?php the_permalink(); ?>" class="text-inherit hover:text-primary block"><?php the_title(); ?></a>
                                </h2>

                                <div class="mt-20px">
                                    <?php if (has_post_thumbnail()) : 
                                        $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                    ?>
                                        <a href="<?php the_permalink(); ?>" class="home-book-link">
                                            <img class="rounded-16px" src="<?php echo $thumbnail_url; ?>" alt="">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
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

<?php
get_footer();
