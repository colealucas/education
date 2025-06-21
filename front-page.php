<?php
/**
 * Template Name: Pagina Principala
 */

 get_header();

 $get_static_text = [
    'ro' => [
        'partners_title' => 'Partenerii Noștri',
        'disclaimer' => 'Această platformă digitală este parte a proiectului „Avansarea educației mediatice și sprijinirea
mass-media din Republica Moldova”, susținut de Suedia și implementat de Internews. Programul își
propune să contribuie la creșterea unui sector media divers, independent și viabil financiar, și la
abilitarea tinerilor din Moldova de a naviga în siguranță în mediul complex de informare.',
    ],
    'ru' => [
        'partners_title' => 'Наши Партнеры',
        'disclaimer' => 'Платформа реализованна в рамках проекта “Развитие медиаобразования и поддержка СМИ в
Республике Молдова” реализуемого Интерньюс при финансовой поддержке Швеции. Проект
направлен на содействие развитию разнообразного, независимого и финансово устойчивого
медийного сектора, а также на предоставление молодым гражданам Молдовы возможности
безопасно ориентироваться в сложной информационной среде.'
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

<div id="partners" class="section pb-40px md:pb-72px bg-white mt-40px md:mt-60px">
    <div class="container">
        <div class="mb-32px text-center">
            <h2 class="text-32px md:text-52px font-700"><?php echo $get_static_text[get_lang()]['partners_title']; ?></h2>
        </div>

        <div class="text-center max-w-[1000px] mx-auto">
            <?php if (have_rows('partner_logos')) : ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-24px md:gap-32px items-center justify-items-center">
                    <?php while (have_rows('partner_logos')) : the_row(); 
                        $logo = get_sub_field('logo');
                        $link = get_sub_field('link');
                    ?>
                        <?php if ($logo) : ?>
                            <div class="partner-logo-item flex items-center justify-center">
                                <?php if ($link) : ?>
                                    <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer" class="block">
                                        <img src="<?php echo esc_url($logo); ?>" alt="Partner Logo" class="max-h-[80px] md:max-h-[100px] w-auto">
                                    </a>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($logo); ?>" alt="Partner Logo" class="max-h-[80px] md:max-h-[100px] w-auto">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="max-w-[1000px] mx-auto mt-60px">
            <div class="text-12px text-gray">
                <?php echo $get_static_text[get_lang()]['disclaimer']; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
