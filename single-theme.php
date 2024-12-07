<?php get_header(); 
/**
 * Single Theme Template
 * 
 */

$get_static_text = [
    'ro' => [
        'subjects' => 'Subiecte',
        'go_back' => 'Înapoi la Teme',
        'pagination_back' => 'Înapoi',
        'pagination_next' => 'Înainte',
        'concepts' => 'Concepte cheie',
        'step1' => 'Știu deja și împărtășesc altora experiența mea!',
        'step2' => 'Sunt curios/curioasă să aflu mai mult!',
        'step3' => 'Consum și creez produse media cu responsabilitate',
        'step4' => 'Aventura mea media continuă!',
        'step5' => 'Vorbesc cult',
        'step6' => 'Știai că...',

        // gimnaziu
        'gimnaziu' => [
            'subjects' => 'Subiecte',
            'go_back' => 'Inapoi la Teme',
            'concepts' => 'Concepte cheie',
            'step1' => 'Evocare',
            'step2' => 'Realizarea sensului',
            'step3' => 'Exercițiu practic',
            'step4' => 'Reflecție',
            'step5' => 'Extindere',
            'step6' => 'Știai că...',
        ],

        // liceu
        'liceu' => [
            'subjects' => 'Subiecte',
            'go_back' => 'Inapoi la Teme',
            'concepts' => 'Concepte Cheie',
            'step1' => 'Step name',
            'step2' => 'Step name',
            'step3' => 'Step name',
            'step4' => 'Step name',
            'step5' => 'Step name',
            'step6' => 'Step name',
        ],
    ],
    'ru' => [
        'subjects' => 'Предметы',
        'go_back' => 'Назад к Темам',
        'pagination_back' => 'Назад',
        'pagination_next' => 'Вперед',
        'concepts' => 'Ключевые Понятия',
        'step1' => 'Я уже знаю и делюсь своим опытом с другими!',
        'step2' => 'Мне интересно узнать больше!',
        'step3' => 'Я потребляю и создаю медиа-продукты ответственно',
        'step4' => 'Мое медийное приключение продолжается!',
        'step5' => 'Я говорю на культурном языке!',
        'step6' => 'Удивительные факты',
    ]
];

$parent_module = get_field('parent_module');
$parent_module_url = (is_array( $parent_module ) && $parent_module[0] ? get_permalink($parent_module[0]->ID) : '#');
$parent_book = get_field('parent_book');
$parent_book_id = (is_array( $parent_book ) && $parent_book[0] ? $parent_book[0]->ID : false);
$book_target = get_field('choose_book_target', $parent_book_id); // tragets: primar, gimnaziu, liceu

function get_theme_translated_text($step_name) {
    global $get_static_text, $parent_book, $parent_book_id, $book_target;

    if ($book_target && $book_target != 'primar') {
        return $get_static_text[get_lang()][$book_target][$step_name];
    } else {
       return $get_static_text[get_lang()][$step_name];
    }
}

// hide steps settings
$hide_step_1 = false;
$hide_step_2 = false;
$hide_step_3 = false;
$hide_step_4 = false;
$hide_step_5 = false;
$hide_step_6 = false;
?>

<?php if( have_rows('theme_steps') ) : // read hide step fields ?>
    <?php while( have_rows('theme_steps') ): the_row(); ?>

        <?php if ( get_sub_field('step') == 'one' ) : ?>
            <?php $hide_step_1 = get_sub_field('hide_this_step'); ?>
        <?php endif; ?>

        <?php if ( get_sub_field('step') == 'two' ) : ?>
            <?php $hide_step_2 = get_sub_field('hide_this_step'); ?>
        <?php endif; ?>

        <?php if ( get_sub_field('step') == 'three' ) : ?>
            <?php $hide_step_3 = get_sub_field('hide_this_step'); ?>
        <?php endif; ?>

        <?php if ( get_sub_field('step') == 'four' ) : ?>
            <?php $hide_step_4 = get_sub_field('hide_this_step'); ?>
        <?php endif; ?>

        <?php if ( get_sub_field('step') == 'five' ) : ?>
            <?php $hide_step_5 = get_sub_field('hide_this_step'); ?>
        <?php endif; ?>

        <?php if ( get_sub_field('step') == 'six' ) : ?>
            <?php $hide_step_6 = get_sub_field('hide_this_step'); ?>
        <?php endif; ?>
        
    <?php endwhile; ?>
<?php endif; ?>

<?php if ( isset($_GET['print']) ) : ?>

    <script>
        setTimeout(function() {
            window.print();
        }, 500);
    </script>

<?php endif; ?>

<?php if ( isset($_GET['print']) && intval($_GET['step']) == 1 ) : ?>

    <div class="max-w-[833px] mx-auto">
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step1'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#00665E"/>
                        <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'one' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php elseif ( isset($_GET['print']) && intval($_GET['step']) == 2 ) : ?>

    <div class="max-w-[833px] mx-auto">
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step2'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#00665E"/>
                        <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'two' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php elseif ( isset($_GET['print']) && intval($_GET['step']) == 3 ) : ?>

    <div class="max-w-[833px] mx-auto">
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step3'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#00665E"/>
                        <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'three' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php elseif ( isset($_GET['print']) && intval($_GET['step']) == 4 ) : ?>

    <div class="max-w-[833px] mx-auto">
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step4'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#00665E"/>
                        <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'four' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php elseif ( isset($_GET['print']) && intval($_GET['step']) == 5 ) : ?>

    <div class="max-w-[833px] mx-auto">
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step5'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#00665E"/>
                        <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'five' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php elseif ( isset($_GET['print']) && intval($_GET['step']) == 6 ) : ?>

    <div class="max-w-[833px] mx-auto">
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step6'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="#00665E"/>
                        <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'six' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php else : ?>

<!-- normal content start -->

<!-- Key concepts -->
<div style="display: none;" id="key-concepts" class="w-[833px] p-24px rounded-24px">
    <div class="concept-bar mt-30px mb-20px bg-green p-16px rounded-16px text-white text-24px font-500 leading-120">
        <div class="flex items-center gap-16px">
            <div>
                <div class="size-48px rounded-50 bg-white flex items-center justify-center">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/cuvinte_cheie.svg'; ?>" width="30" height="30" alt="">
                </div>
            </div>
            <div>
                <?php echo get_theme_translated_text('concepts'); ?>
            </div>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('key_concepts') ) : ?>
            <div class="relative">
                <ol class="flex flex-wrap pl-20px">
                    <?php while( have_rows('key_concepts') ): the_row(); 
                        $concept = get_sub_field('concept'); 
                    ?>

                        <li class="list-none text-dark font-500">
                            <span class="inline-block mr-20px mb-12px mb-8px border-b-2px border-solid border-orange"><?php echo acf_esc_html($concept); ?></span>
                        </li>
                        
                    <?php endwhile; ?>
                </ol>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Share experience -->
<div style="display: none;" id="share-experience" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/stiu_deja.svg'; ?>" width="40" height="40" alt="">
            <?php echo get_theme_translated_text('step1'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=1" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#00665E"/>
                    <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'one' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="mt-12px pagination-wrapper bg-light-gray rounded-16px">
        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-left hide" data-fancybox data-src="#share-experience">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#am-curious">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- am_curious -->
<div style="display: none;" id="am-curious" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/sunt_curios.svg'; ?>" width="40" height="40" alt="">
            <?php echo get_theme_translated_text('step2'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=2" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#00665E"/>
                    <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'two' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="mt-12px pagination-wrapper bg-light-gray rounded-16px">
        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#share-experience">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#am-begining">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- am_begining -->
<div style="display: none;" id="am-begining" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/aventura_continua.svg'; ?>" width="40" height="40" alt="">
            <?php echo get_theme_translated_text('step3'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=3" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#00665E"/>
                    <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'three' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="mt-12px pagination-wrapper bg-light-gray rounded-16px">
        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#am-curious">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#am-responsable">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- am_responsable -->
<div style="display: none;" id="am-responsable" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/consum_responsabil.svg'; ?>" width="40" height="40" alt="">
            <?php echo get_theme_translated_text('step4'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=4" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#00665E"/>
                    <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'four' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="mt-12px pagination-wrapper bg-light-gray rounded-16px">
        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#am-begining">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-right" data-fancybox data-src="<?php echo ($hide_step_5 ? '#curiosities' : '#am-cult'); ?>">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- am_cult -->
<div style="display: none;" id="am-cult" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/vorbesc_cult.svg'; ?>" width="40" height="40" alt="">
            <?php echo get_theme_translated_text('step5'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=5" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#00665E"/>
                    <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'five' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="mt-12px pagination-wrapper bg-light-gray rounded-16px">
        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#am-responsable">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#curiosities">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- curiosities -->
<div style="display: none;" id="curiosities" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px bg-light-green p-16px py-20px rounded-16px text-green text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/curiozitati.svg'; ?>" width="40" height="40" alt="">
            <?php echo get_theme_translated_text('step6'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=6" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="#00665E"/>
                    <path d="M14 17V10H26V17M14 26H12C11.4696 26 10.9609 25.7893 10.5858 25.4142C10.2107 25.0391 10 24.5304 10 24V19C10 18.4696 10.2107 17.9609 10.5858 17.5858C10.9609 17.2107 11.4696 17 12 17H28C28.5304 17 29.0391 17.2107 29.4142 17.5858C29.7893 17.9609 30 18.4696 30 19V24C30 24.5304 29.7893 25.0391 29.4142 25.4142C29.0391 25.7893 28.5304 26 28 26H26M14 22H26V30H14V22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="relative">
        <?php if( have_rows('theme_steps') ): ?>
            <?php while( have_rows('theme_steps') ): the_row(); ?>
                <?php if ( get_sub_field('step') == 'six' ) : ?>
                    
                    <?php if( have_rows('theme_content_sections') ): ?>
                        <?php while ( have_rows('theme_content_sections') ) : the_row(); ?>

                            <?php get_template_part('template-parts/flexible-content/theme' , 'content'); // get flexible content sections ?>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="mt-12px pagination-wrapper bg-light-gray rounded-16px">
        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#am-cult">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="http://education.local/modules/initiere-in-mass-media/" class="theme-pagination-btn tp-button-right hide" data-fancybox data-src="#share-experience">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>


<div class="section mt-34px theme-intro-section">
    <div class="container">
        <div class="section-inner p-40px bg-green text-white rounded-24px">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                        
                <div class="row items-center">
                    <div class="col-lg-9">
                        <div class="relative">
                            <div class="go-back">
                                <a href="<?php echo $parent_module_url; ?>" class="flex items-center gap-8px text-white hover:text-white focus:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                        <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <?php echo $get_static_text[get_lang()]['go_back']; ?>
                                </a>
                            </div>

                            <h1 class="text-36px md:text-48px font-500 leading-120 mt-8px text-white">
                                <?php the_title(); ?>
                            </h1>

                            <div class="mt-16px text-16px text-content-spacing">
                                <?php the_content(); ?>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-3">
                        <div class="keey-concepts">
                            <div class="flex justify-end">
                                <a data-fancybox data-src="#key-concepts" href="javascript:;" class="inline-flex items-center gap-8px text-green text-14px rounded-24px bg-light-green hover:bg-white px-10px py-6px leading-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 13.3333V10M10 6.66667H10.0084M18.3334 10C18.3334 14.6024 14.6024 18.3333 10 18.3333C5.39765 18.3333 1.66669 14.6024 1.66669 10C1.66669 5.39763 5.39765 1.66667 10 1.66667C14.6024 1.66667 18.3334 5.39763 18.3334 10Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <?php echo $get_static_text[get_lang()]['concepts']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Theme steps -->

<?php if ($book_target == 'primar') : ?>
    
<div class="section py-32px theme-steps">
    <div class="container">
        <div class="parts flex flex-wrap gap-20px">

            <!-- Step 1 -->
            <?php if ( !$hide_step_1 ) : ?>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#share-experience" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                            <path d="M38.5703 0.352024C38.4816 0.227077 38.358 0.13114 38.215 0.0762815C38.0719 0.021423 37.9158 0.0100936 37.7664 0.0437186C37.6169 0.0773436 37.4807 0.154421 37.375 0.265254C37.2692 0.376088 37.1986 0.515726 37.172 0.666603C37.1454 0.81748 37.164 0.972856 37.2254 1.11318C37.2869 1.25351 37.3885 1.37252 37.5175 1.45525C37.6464 1.53797 37.797 1.58072 37.9501 1.5781C38.1033 1.57548 38.2523 1.52762 38.3784 1.44054C38.463 1.38209 38.5351 1.30743 38.5906 1.22089C38.6461 1.13435 38.6839 1.03765 38.7018 0.936389C38.7196 0.835132 38.7172 0.731337 38.6946 0.631025C38.6721 0.530712 38.6298 0.435879 38.5703 0.352024Z" fill="#496F76"/>
                            <path d="M38.3784 25.1837C38.2523 25.0966 38.1033 25.0488 37.9501 25.0461C37.797 25.0435 37.6464 25.0863 37.5175 25.169C37.3885 25.2517 37.2869 25.3707 37.2254 25.5111C37.164 25.6514 37.1454 25.8068 37.172 25.9576C37.1986 26.1085 37.2692 26.2481 37.375 26.359C37.4807 26.4698 37.6169 26.5469 37.7664 26.5805C37.9158 26.6142 38.0719 26.6028 38.215 26.548C38.358 26.4931 38.4816 26.3972 38.5703 26.2722C38.6298 26.1884 38.6721 26.0935 38.6946 25.9932C38.7172 25.8929 38.7196 25.7891 38.7018 25.6879C38.6839 25.5866 38.6461 25.4899 38.5906 25.4033C38.5351 25.3168 38.463 25.2421 38.3784 25.1837Z" fill="#496F76"/>
                            <path d="M2.52928 0.160075C2.40325 0.0728499 2.25423 0.0248626 2.10098 0.0221549C1.94774 0.0194473 1.79711 0.0621403 1.66808 0.144859C1.53905 0.227577 1.43737 0.346623 1.37585 0.487007C1.31434 0.627391 1.29573 0.782838 1.32237 0.933775C1.34902 1.08471 1.41973 1.22439 1.52559 1.33523C1.63146 1.44607 1.76775 1.5231 1.9173 1.55664C2.06686 1.59018 2.223 1.57872 2.36605 1.52371C2.50911 1.46869 2.63269 1.37258 2.72124 1.24748C2.78057 1.16366 2.82268 1.06891 2.84515 0.968709C2.86762 0.868509 2.87 0.764848 2.85215 0.663723C2.8343 0.562598 2.79657 0.466016 2.74115 0.379566C2.68573 0.293116 2.61372 0.218514 2.52928 0.160075Z" fill="#496F76"/>
                            <path d="M2.72124 25.3711C2.63269 25.246 2.50911 25.1499 2.36605 25.0949C2.223 25.0398 2.06686 25.0284 1.9173 25.0619C1.76775 25.0954 1.63146 25.1725 1.52559 25.2833C1.41973 25.3942 1.34902 25.5338 1.32237 25.6848C1.29573 25.8357 1.31434 25.9912 1.37585 26.1315C1.43737 26.2719 1.53905 26.391 1.66808 26.4737C1.79711 26.5564 1.94774 26.5991 2.10098 26.5964C2.25423 26.5937 2.40325 26.5457 2.52928 26.4585C2.61372 26.4 2.68573 26.3254 2.74115 26.239C2.79657 26.1525 2.8343 26.0559 2.85215 25.9548C2.87 25.8537 2.86762 25.7501 2.84515 25.6499C2.82268 25.5497 2.78057 25.4549 2.72124 25.3711Z" fill="#496F76"/>
                            <path d="M28.8658 3.37349C27.0876 1.78804 24.9164 0.709219 22.5788 0.249748C20.2412 -0.209723 17.8231 -0.0329817 15.5772 0.761504C13.3313 1.55599 11.3399 2.93906 9.81125 4.76621C8.28256 6.59336 7.27261 8.79752 6.88695 11.1484C6.49986 13.5418 6.77616 15.9954 7.68582 18.2428C8.59548 20.4901 10.1037 22.4451 12.0466 23.8954C12.3336 24.112 12.5666 24.3921 12.7273 24.7138C12.8881 25.0355 12.9722 25.39 12.9731 25.7495V32.8987C12.9737 33.4107 13.1371 33.9092 13.4397 34.3223C13.7423 34.7354 14.1683 35.0416 14.6563 35.1966C14.8195 36.5271 15.4656 37.7513 16.4719 38.6367C17.4782 39.5222 18.7746 40.0073 20.115 39.9999C21.4554 39.9925 22.7464 39.4931 23.7428 38.5966C24.7393 37.7001 25.3719 36.4689 25.5203 35.1367C25.9669 34.9563 26.3498 34.6472 26.6202 34.2487C26.8907 33.8502 27.0366 33.3803 27.0394 32.8987V25.7495C27.0393 25.3913 27.1224 25.0379 27.282 24.7171C27.4416 24.3964 27.6734 24.117 27.9592 23.901C29.582 22.6838 30.9079 21.1148 31.8373 19.3117C32.7988 17.4441 33.2973 15.3727 33.2908 13.2722C33.2894 11.404 32.8947 9.55714 32.1323 7.85166C31.3699 6.14618 30.2569 4.62036 28.8658 3.37349ZM20.0845 38.4366C19.1837 38.4367 18.3107 38.1256 17.6129 37.5561C16.9151 36.9865 16.4355 36.1934 16.2552 35.3109H23.9114C23.73 36.1923 23.2504 36.9843 22.5533 37.5534C21.8563 38.1226 20.9844 38.4352 20.0845 38.4366ZM25.4771 32.8998C25.476 33.1118 25.3957 33.3158 25.252 33.4718C25.1084 33.6278 24.9116 33.7245 24.7004 33.7431H24.6915C24.6693 33.7431 24.6471 33.7431 24.6238 33.7431H15.3842C15.1595 33.7428 14.944 33.6534 14.7851 33.4944C14.6262 33.3355 14.5368 33.1201 14.5365 32.8953V31.9455H25.4771V32.8953V32.8998ZM25.4771 30.3876H14.5365V28.5901H25.4771V30.3899V30.3876ZM20.0123 16.9094C20.8264 16.91 21.6294 16.72 22.3569 16.3546V27.0289H17.6622V16.3546C18.3914 16.7209 19.1963 16.9109 20.0123 16.9094ZM17.8564 14.6425L20.0123 10.3317L22.1683 14.6425C21.5424 15.1021 20.7861 15.35 20.0096 15.35C19.233 15.35 18.4768 15.1021 17.8508 14.6425H17.8564ZM27.0283 22.6504C26.5481 23.0122 26.1584 23.4805 25.89 24.0185C25.6216 24.5565 25.4818 25.1494 25.4815 25.7507V27.0278H23.9181V14.8356C23.9196 14.8075 23.9196 14.7793 23.9181 14.7513C23.9181 14.7435 23.9181 14.7357 23.9181 14.728C23.9181 14.7202 23.9114 14.688 23.907 14.668L23.9003 14.6425C23.8952 14.6225 23.8892 14.6029 23.8826 14.5837L23.8748 14.5604C23.8671 14.5393 23.8582 14.5182 23.8482 14.4983V14.4861L23.8426 14.4739L20.7247 8.23683C20.6611 8.10551 20.5618 7.99476 20.4381 7.91727C20.3145 7.83978 20.1716 7.79868 20.0256 7.79868C19.8797 7.79868 19.7368 7.83978 19.6131 7.91727C19.4895 7.99476 19.3902 8.10551 19.3266 8.23683L16.2086 14.4739L16.2031 14.4861V14.4983C16.1931 14.5182 16.1842 14.5393 16.1765 14.5604L16.1687 14.5837C16.162 14.6029 16.1561 14.6225 16.1509 14.6425L16.1443 14.668C16.1443 14.688 16.1365 14.708 16.1332 14.728C16.1299 14.7479 16.1332 14.7435 16.1332 14.7513C16.1317 14.7793 16.1317 14.8075 16.1332 14.8356V27.0267H14.5365V25.7495C14.5353 25.1469 14.3944 24.5526 14.1249 24.0136C13.8553 23.4745 13.4645 23.0053 12.9831 22.6427C11.1028 21.2385 9.68775 19.3018 8.92135 17.0838C8.15494 14.8658 8.07253 12.4686 8.68481 10.2032C9.29709 7.93778 10.5758 5.90852 12.3552 4.37853C14.1346 2.84855 16.3326 1.88839 18.6642 1.62255C21.2232 1.32683 23.8084 1.88278 26.0197 3.20437C28.231 4.52595 29.945 6.53949 30.8966 8.9334C31.8482 11.3273 31.9843 13.9681 31.2838 16.4471C30.5834 18.9262 29.0853 21.1052 27.0216 22.6471L27.0283 22.6504Z" fill="#496F76"/>
                            <path d="M26.7795 5.70143C26.6252 5.56312 26.4222 5.49178 26.2153 5.50313C26.0083 5.51447 25.8143 5.60755 25.676 5.7619C25.5377 5.91625 25.4664 6.11922 25.4777 6.32617C25.4891 6.53311 25.5822 6.72708 25.7365 6.86539C26.637 7.67239 27.3575 8.65994 27.8511 9.76377C28.3447 10.8676 28.6004 12.063 28.6015 13.2722C28.6015 13.4795 28.6838 13.6783 28.8304 13.8249C28.977 13.9715 29.1759 14.0539 29.3832 14.0539C29.5905 14.0539 29.7893 13.9715 29.9359 13.8249C30.0825 13.6783 30.1649 13.4795 30.1649 13.2722C30.1636 11.8433 29.8615 10.4308 29.2782 9.12638C28.695 7.822 27.8436 6.65504 26.7795 5.70143Z" fill="#496F76"/>
                            <path d="M4.37679 12.491H0.781708C0.574386 12.491 0.375556 12.5734 0.228957 12.72C0.0823583 12.8666 0 13.0654 0 13.2727C0 13.4801 0.0823583 13.6789 0.228957 13.8255C0.375556 13.9721 0.574386 14.0544 0.781708 14.0544H4.37679C4.58411 14.0544 4.78294 13.9721 4.92954 13.8255C5.07614 13.6789 5.1585 13.4801 5.1585 13.2727C5.1585 13.0654 5.07614 12.8666 4.92954 12.72C4.78294 12.5734 4.58411 12.491 4.37679 12.491Z" fill="#496F76"/>
                            <path d="M39.2303 12.491H35.6352C35.4279 12.491 35.2291 12.5734 35.0825 12.72C34.9359 12.8666 34.8535 13.0654 34.8535 13.2727C34.8535 13.4801 34.9359 13.6789 35.0825 13.8255C35.2291 13.9721 35.4279 14.0544 35.6352 14.0544H39.2303C39.4376 14.0544 39.6365 13.9721 39.7831 13.8255C39.9297 13.6789 40.012 13.4801 40.012 13.2727C40.012 13.0654 39.9297 12.8666 39.7831 12.72C39.6365 12.5734 39.4376 12.491 39.2303 12.491Z" fill="#496F76"/>
                            <path d="M7.8435 21.7905C7.78506 21.7059 7.7104 21.6337 7.62386 21.5782C7.53731 21.5227 7.44061 21.4849 7.33935 21.4671C7.23809 21.4492 7.1343 21.4516 7.03399 21.4742C6.93368 21.4968 6.83884 21.539 6.75499 21.5985L4.19072 23.3905C4.10664 23.4494 4.03498 23.5242 3.97983 23.6108C3.92468 23.6974 3.88712 23.7939 3.8693 23.895C3.85147 23.9961 3.85373 24.0997 3.87594 24.1999C3.89816 24.3001 3.93989 24.3949 3.99876 24.479C4.05763 24.5631 4.13248 24.6348 4.21904 24.6899C4.3056 24.7451 4.40218 24.7826 4.50326 24.8004C4.60433 24.8183 4.70793 24.816 4.80814 24.7938C4.90834 24.7716 5.00319 24.7299 5.08727 24.671L7.64821 22.8779C7.73291 22.8197 7.80522 22.7453 7.86096 22.659C7.9167 22.5726 7.95475 22.4761 7.97291 22.375C7.99108 22.2738 7.98899 22.1701 7.96678 22.0697C7.94456 21.9694 7.90266 21.8745 7.8435 21.7905Z" fill="#496F76"/>
                            <path d="M36.012 2.06642C35.9536 1.98183 35.8789 1.90968 35.7924 1.85416C35.7058 1.79864 35.6091 1.76086 35.5079 1.743C35.4066 1.72515 35.3028 1.72757 35.2025 1.75014C35.1022 1.77271 35.0074 1.81496 34.9235 1.87446L32.3626 3.66757C32.2785 3.72643 32.2069 3.80129 32.1517 3.88785C32.0966 3.97441 32.059 4.07099 32.0412 4.17207C32.0234 4.27314 32.0256 4.37674 32.0478 4.47695C32.07 4.57715 32.1118 4.672 32.1706 4.75608C32.2295 4.84015 32.3043 4.91181 32.3909 4.96696C32.4775 5.02211 32.574 5.05967 32.6751 5.07749C32.7762 5.09532 32.8798 5.09306 32.98 5.07085C33.0802 5.04864 33.1751 5.00691 33.2591 4.94804L35.8201 3.15493C35.9047 3.09649 35.9768 3.02183 36.0323 2.93529C36.0879 2.84875 36.1256 2.75205 36.1435 2.65079C36.1614 2.54953 36.1589 2.44574 36.1364 2.34542C36.1138 2.24511 36.0715 2.15028 36.012 2.06642Z" fill="#496F76"/>
                            <path d="M7.65083 3.66861L5.08989 1.87551C4.92009 1.75618 4.70984 1.70919 4.50539 1.74487C4.30094 1.78056 4.11905 1.896 3.99972 2.0658C3.88039 2.23561 3.83339 2.44586 3.86908 2.6503C3.90477 2.85475 4.02021 3.03665 4.19001 3.15598L6.75095 4.94908C6.83503 5.00795 6.92988 5.04968 7.03008 5.0719C7.13029 5.09411 7.23389 5.09637 7.33496 5.07854C7.43604 5.06072 7.53262 5.02316 7.61918 4.96801C7.70574 4.91286 7.78059 4.8412 7.83946 4.75712C7.89833 4.67305 7.94006 4.5782 7.96228 4.47799C7.98449 4.37779 7.98675 4.27419 7.96892 4.17311C7.9511 4.07204 7.91354 3.97546 7.85839 3.8889C7.80324 3.80233 7.73158 3.72748 7.64751 3.66861H7.65083Z" fill="#496F76"/>
                            <path d="M35.8201 23.3905L33.2591 21.5974C33.1751 21.5385 33.0802 21.4968 32.98 21.4746C32.8798 21.4524 32.7762 21.4501 32.6751 21.4679C32.574 21.4857 32.4775 21.5233 32.3909 21.5785C32.3043 21.6336 32.2295 21.7053 32.1706 21.7893C32.1118 21.8734 32.07 21.9683 32.0478 22.0685C32.0256 22.1687 32.0234 22.2723 32.0412 22.3734C32.059 22.4744 32.0966 22.571 32.1517 22.6576C32.2069 22.7442 32.2785 22.819 32.3626 22.8779L34.9235 24.671C35.0076 24.7298 35.1024 24.7716 35.2026 24.7938C35.3028 24.816 35.4065 24.8183 35.5075 24.8004C35.6086 24.7826 35.7052 24.745 35.7917 24.6899C35.8783 24.6348 35.9531 24.5631 36.012 24.479C36.0709 24.3949 36.1126 24.3001 36.1348 24.1999C36.157 24.0997 36.1593 23.9961 36.1415 23.895C36.1237 23.7939 36.0861 23.6973 36.0309 23.6108C35.9758 23.5242 35.9042 23.4494 35.8201 23.3905Z" fill="#496F76"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step1'); ?></h3>

                    <span class="decor">
                        <svg width="92" height="36" viewBox="0 0 92 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="82" cy="25.922" r="10" fill="#fff"/>
                            <path d="M20 24.922C6.5 33.922 6.66677 26.7554 7.5001 24.922C18.0001 5.92204 46.1998 -18.678 82.9998 26.922C84.3329 28.422 84.5 35.422 72.9993 28.922M35.5 17.922C39.8333 15.422 45.5 12.422 55.5 18.422" stroke="#00665E" stroke-dasharray="3 3"/>
                            <circle cx="10" cy="24.4221" r="10" fill="#fff"/>
                        </svg>
                    </span>
                </a>
            </div>
            <?php endif; ?>
            
            <!-- Step 2 -->
            <?php if ( !$hide_step_2 ) : ?>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-curious" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M24.1643 14.8106C24.0101 14.8106 23.8594 14.8564 23.7311 14.942C23.6029 15.0277 23.503 15.1495 23.444 15.2919C23.385 15.4344 23.3695 15.5912 23.3996 15.7424C23.4297 15.8937 23.504 16.0326 23.613 16.1416C23.7221 16.2507 23.861 16.3249 24.0122 16.355C24.1635 16.3851 24.3202 16.3696 24.4627 16.3106C24.6051 16.2516 24.7269 16.1517 24.8126 16.0235C24.8983 15.8953 24.944 15.7445 24.944 15.5903C24.944 15.3835 24.8618 15.1852 24.7156 15.039C24.5694 14.8928 24.3711 14.8106 24.1643 14.8106Z" fill="#00665E"/>
                            <path d="M38.9978 34.5882L28.5927 24.1831C30.2866 21.6377 31.1873 18.6469 31.1806 15.5893C31.1804 12.5059 30.2659 9.49183 28.5528 6.92817C26.8396 4.36451 24.4047 2.36642 21.556 1.18655C18.7073 0.00668597 15.5727 -0.301968 12.5486 0.299621C9.52442 0.901209 6.74659 2.38602 4.56631 4.56631C2.38602 6.74659 0.901209 9.52442 0.299621 12.5486C-0.301968 15.5727 0.00668597 18.7073 1.18655 21.556C2.36642 24.4047 4.36451 26.8396 6.92817 28.5528C9.49183 30.2659 12.5059 31.1804 15.5893 31.1806C18.6469 31.1872 21.6376 30.2866 24.1831 28.5927L27.0589 31.4685L34.5872 38.9968C34.872 39.3054 35.2162 39.5533 35.5992 39.7255C35.9822 39.8978 36.396 39.991 36.8158 39.9994C37.2357 40.0078 37.6529 39.9313 38.0424 39.7745C38.432 39.6177 38.7858 39.3838 39.0828 39.0869C39.3797 38.7899 39.6136 38.4361 39.7704 38.0465C39.9272 37.657 40.0037 37.2397 39.9953 36.8199C39.9869 36.4001 39.8937 35.9862 39.7214 35.6033C39.5492 35.2203 39.3013 34.8761 38.9927 34.5913L38.9978 34.5882ZM23.8163 26.9493C20.9554 29.0222 17.4184 29.9409 13.9103 29.5222C10.4022 29.1035 7.18073 27.3783 4.888 24.6903C2.59527 22.0023 1.39967 18.549 1.53952 15.0188C1.67937 11.4886 3.1444 8.14078 5.64259 5.64259C8.14078 3.1444 11.4886 1.67937 15.0188 1.53952C18.549 1.39967 22.0023 2.59527 24.6903 4.888C27.3783 7.18073 29.1035 10.4022 29.5222 13.9103C29.9409 17.4184 29.0222 20.9554 26.9493 23.8163C26.0766 25.0192 25.0192 26.0766 23.8163 26.9493ZM25.4556 27.6563C26.2624 26.997 27.0013 26.2587 27.6614 25.4525L29.8682 27.6614C29.1946 28.4565 28.4565 29.1946 27.6614 29.8682L25.4556 27.6563ZM37.8985 37.8954C37.7538 38.0403 37.5819 38.1552 37.3928 38.2336C37.2036 38.312 37.0009 38.3524 36.7961 38.3524C36.5914 38.3524 36.3886 38.312 36.1994 38.2336C36.0103 38.1552 35.8384 38.0403 35.6937 37.8954L28.772 30.9737C29.5618 30.2958 30.2989 29.5588 30.9768 28.7689L37.8985 35.6906C38.0433 35.8353 38.1582 36.007 38.2366 36.1961C38.315 36.3852 38.3553 36.5878 38.3553 36.7925C38.3553 36.9972 38.315 37.1999 38.2366 37.3889C38.1582 37.578 38.0433 37.7508 37.8985 37.8954Z" fill="#00665E"/>
                            <path d="M15.5899 3.11664C13.123 3.11664 10.7115 3.84815 8.66042 5.21866C6.6093 6.58918 5.01064 8.53714 4.06662 10.8162C3.12259 13.0953 2.87559 15.6031 3.35685 18.0226C3.83811 20.4421 5.02602 22.6645 6.77035 24.4088C8.51469 26.1531 10.7371 27.3411 13.1566 27.8223C15.576 28.3036 18.0839 28.0566 20.3629 27.1125C22.642 26.1685 24.59 24.5699 25.9605 22.5187C27.331 20.4676 28.0625 18.0562 28.0625 15.5893C28.0587 12.2825 26.7434 9.11225 24.4052 6.77399C22.0669 4.43573 18.8967 3.12043 15.5899 3.11664ZM15.5899 26.5026C13.4314 26.5026 11.3214 25.8626 9.52674 24.6634C7.73205 23.4642 6.33326 21.7598 5.50726 19.7657C4.68126 17.7715 4.46514 15.5772 4.88623 13.4602C5.30732 11.3432 6.34672 9.39867 7.87297 7.87242C9.39923 6.34616 11.3438 5.30677 13.4608 4.88568C15.5778 4.46458 17.7721 4.6807 19.7662 5.50671C21.7604 6.33271 23.4648 7.7315 24.664 9.52618C25.8631 11.3209 26.5032 13.4309 26.5032 15.5893C26.4999 18.4827 25.3491 21.2567 23.3032 23.3026C21.2572 25.3485 18.4833 26.4994 15.5899 26.5026Z" fill="#00665E"/>
                            <path d="M24.3264 12.2432C23.6474 10.4766 22.4493 8.95709 20.8899 7.88467C19.3305 6.81226 17.4828 6.23725 15.5902 6.23535C15.3834 6.23535 15.1851 6.3175 15.0389 6.46371C14.8927 6.60993 14.8105 6.80824 14.8105 7.01502C14.8105 7.2218 14.8927 7.42012 15.0389 7.56633C15.1851 7.71255 15.3834 7.79469 15.5902 7.79469C17.1662 7.80201 18.7036 8.28361 20.0021 9.1768C21.3006 10.07 22.3001 11.3334 22.8706 12.8026C22.9051 12.901 22.9591 12.9915 23.0293 13.0686C23.0994 13.1458 23.1844 13.2081 23.279 13.2519C23.3737 13.2956 23.4762 13.3199 23.5805 13.3234C23.6847 13.3268 23.7886 13.3093 23.8859 13.2718C23.9833 13.2344 24.0721 13.1778 24.1472 13.1054C24.2223 13.0331 24.2821 12.9463 24.3231 12.8504C24.3641 12.7545 24.3854 12.6514 24.3858 12.547C24.3862 12.4428 24.3667 12.3394 24.3264 12.2432Z" fill="#00665E"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step2'); ?></h3>

                    <span class="decor">
                        <svg width="92" height="36" viewBox="0 0 92 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="82" cy="25.922" r="10" fill="#fff"/>
                            <path d="M20 24.922C6.5 33.922 6.66677 26.7554 7.5001 24.922C18.0001 5.92204 46.1998 -18.678 82.9998 26.922C84.3329 28.422 84.5 35.422 72.9993 28.922M35.5 17.922C39.8333 15.422 45.5 12.422 55.5 18.422" stroke="#00665E" stroke-dasharray="3 3"/>
                            <circle cx="10" cy="24.4221" r="10" fill="#fff"/>
                        </svg>
                    </span>
                </a>
            </div>
            <?php endif; ?>
            
            <!-- Step 3 -->
            <?php if ( !$hide_step_3 ) : ?>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-begining" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <g clip-path="url(#clip0_92_907)">
                                <path d="M39.2008 11.2L28.8008 16.8V23.2L39.2008 28.8V11.2Z" stroke="#00665E" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
                                <path d="M28.8008 28.8C28.8008 30.5672 27.368 32 25.6008 32H4.00078C2.23358 32 0.800781 30.5672 0.800781 28.8V11.2C0.800781 9.4328 2.23358 8 4.00078 8H25.6008C27.368 8 28.8008 9.4328 28.8008 11.2V28.8Z" stroke="#00665E" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_92_907">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step3'); ?></h3>

                    <span class="decor">
                        <svg width="92" height="36" viewBox="0 0 92 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="82" cy="25.922" r="10" fill="#fff"/>
                            <path d="M20 24.922C6.5 33.922 6.66677 26.7554 7.5001 24.922C18.0001 5.92204 46.1998 -18.678 82.9998 26.922C84.3329 28.422 84.5 35.422 72.9993 28.922M35.5 17.922C39.8333 15.422 45.5 12.422 55.5 18.422" stroke="#00665E" stroke-dasharray="3 3"/>
                            <circle cx="10" cy="24.4221" r="10" fill="#fff"/>
                        </svg>
                    </span>
                </a>
            </div>
            <?php endif; ?>

            <!-- Step 4 -->
            <?php if ( !$hide_step_4 ) : ?>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-responsable" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M6.66602 23.3333V30.6666C6.66602 31.219 7.11373 31.6666 7.66602 31.6666H16.666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.6673 23.3333V30.6666C31.6673 31.219 31.2197 31.6666 30.6673 31.6666H23.334" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.334 8.33331H30.6673C31.2197 8.33331 31.6673 8.78103 31.6673 9.33331V16.6666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66602 16.6666V9.33331C6.66602 8.78103 7.11373 8.33331 7.66602 8.33331H16.666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.3327 31.6667V33.3334C23.3327 35.1744 21.8403 36.6667 19.9993 36.6667C18.1583 36.6667 16.666 35.1744 16.666 33.3334V31.6667" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66602 16.6667H8.33268C10.1736 16.6667 11.666 18.159 11.666 20C11.666 21.841 10.1736 23.3334 8.33268 23.3334H6.66602" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.666 16.6667H33.3327C35.1737 16.6667 36.666 18.159 36.666 20C36.666 21.841 35.1737 23.3334 33.3327 23.3334H31.666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.3327 8.33331V6.66665C23.3327 4.8257 21.8403 3.33331 19.9993 3.33331C18.1583 3.33331 16.666 4.8257 16.666 6.66665V8.33331" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step4'); ?></h3>
                </a>
            </div>
            <?php endif; ?>

            <!-- Step 5 -->
            <?php if ( !$hide_step_5 ) : ?>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-cult" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M14.9293 4.87848H38.5265C39.0651 4.87848 39.5021 5.31549 39.5021 5.85408V21.6295C39.5021 22.1685 39.0651 22.6055 38.5265 22.6055H35.8567V30.1141C35.8567 31.0708 34.6222 31.445 34.0812 30.6735L27.6522 22.6055H26.0464V25.6632C26.0464 26.2018 25.6098 26.6388 25.0708 26.6388H12.3478L5.91882 34.7072C5.37787 35.4787 4.14384 35.1045 4.14384 34.1478V26.6388H1.47358C0.934997 26.6388 0.497986 26.2018 0.497986 25.6632V9.88781C0.497986 9.34875 0.934997 8.91221 1.47358 8.91221H13.9537V5.85408C13.9537 5.31549 14.3907 4.87848 14.9293 4.87848ZM24.0952 22.6055H14.9293C14.3907 22.6055 13.9537 22.1685 13.9537 21.6295V10.8634H2.44965V24.6876H5.11944C5.65803 24.6876 6.09504 25.1246 6.09504 25.6632V31.3609L11.1181 25.0571C11.3104 24.8156 11.5938 24.6895 11.8801 24.6895L24.0952 24.6876V22.6055ZM20.9615 12.6629C19.6778 12.6629 19.6778 10.7113 20.9615 10.7113H32.4948C33.7779 10.7113 33.7779 12.6629 32.4948 12.6629H20.9615ZM20.9615 16.7723C19.6778 16.7723 19.6778 14.8211 20.9615 14.8211H32.4948C33.7779 14.8211 33.7779 16.7723 32.4948 16.7723H20.9615ZM37.5509 6.82968H15.9049V20.6539L28.1199 20.6558C28.4062 20.6562 28.6902 20.7819 28.882 21.0238L33.905 27.3272V21.6295C33.905 21.0909 34.342 20.6539 34.8806 20.6539H37.5509V6.82968Z" fill="#00665E"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step5'); ?></h3>
                </a>
            </div>
            <?php endif; ?>

            <!-- Step 6 -->
            <?php if ( !$hide_step_6 ) : ?>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#curiosities" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <g clip-path="url(#clip0_92_897)">
                                <path d="M38.7383 16.955L35 13.2166V9.16665C35 6.86831 33.13 4.99998 30.8333 4.99998H26.7833L23.045 1.26165C21.365 -0.418352 18.635 -0.418352 16.955 1.26165L13.2167 4.99998H9.16667C6.87 4.99998 5 6.86831 5 9.16665V13.2166L1.26167 16.955C0.448333 17.7666 0 18.85 0 20C0 21.15 0.448333 22.2333 1.26167 23.045L5 26.7833V30.8333C5 33.1316 6.87 35 9.16667 35H13.2167L16.955 38.7383C17.795 39.5783 18.8983 39.9966 20 39.9966C21.1017 39.9966 22.205 39.5783 23.045 38.7383L26.7833 35H30.8333C33.13 35 35 33.1316 35 30.8333V26.7833L38.7383 23.045C39.5517 22.2333 40 21.15 40 20C40 18.85 39.5517 17.7683 38.7383 16.955ZM37.56 21.8666L33.5767 25.85C33.42 26.0066 33.3333 26.2183 33.3333 26.44V30.835C33.3333 32.2133 32.2117 33.335 30.8333 33.335H26.4383C26.2167 33.335 26.005 33.4233 25.8483 33.5783L21.865 37.5616C20.8367 38.59 19.16 38.59 18.1317 37.5616L14.1483 33.5783C13.9917 33.4216 13.78 33.335 13.5583 33.335H9.16333C7.785 33.335 6.66333 32.2133 6.66333 30.835V26.44C6.66333 26.2183 6.575 26.0066 6.42 25.85L2.43667 21.8666C1.93833 21.3683 1.66333 20.705 1.66333 20C1.66333 19.295 1.93833 18.6316 2.43667 18.1333L6.42 14.15C6.57667 13.9933 6.66333 13.7816 6.66333 13.56V9.16498C6.66333 7.78665 7.785 6.66498 9.16333 6.66498H13.5583C13.78 6.66498 13.9917 6.57665 14.1483 6.42165L18.1317 2.43831C19.16 1.40998 20.8367 1.40998 21.865 2.43831L25.8483 6.42165C26.005 6.57831 26.2167 6.66498 26.4383 6.66498H30.8333C32.2117 6.66498 33.3333 7.78665 33.3333 9.16498V13.56C33.3333 13.7816 33.4217 13.9933 33.5767 14.15L37.56 18.1333C38.0583 18.6316 38.3333 19.295 38.3333 20C38.3333 20.705 38.0583 21.3683 37.56 21.8666ZM24.9217 14.1016C25.295 16.2233 24.2867 18.3466 22.4117 19.3816C21.4233 19.925 20.8333 20.78 20.8333 21.6666V22.5C20.8333 22.96 20.46 23.3333 20 23.3333C19.54 23.3333 19.1667 22.96 19.1667 22.5V21.6666C19.1667 20.1633 20.0783 18.7633 21.6067 17.9216C22.8767 17.2216 23.5333 15.835 23.2783 14.39C23.0433 13.0516 21.9483 11.955 20.6117 11.72C19.6017 11.5466 18.625 11.8 17.8567 12.4466C17.1 13.0816 16.6667 14.0116 16.6667 15C16.6667 15.46 16.2933 15.8333 15.8333 15.8333C15.3733 15.8333 15 15.46 15 15C15 13.5183 15.6517 12.1216 16.785 11.17C17.92 10.2166 19.415 9.81998 20.8983 10.08C22.9117 10.4316 24.5667 12.085 24.92 14.1016H24.9217ZM21.6667 28.3333C21.6667 29.2533 20.92 30 20 30C19.08 30 18.3333 29.2533 18.3333 28.3333C18.3333 27.4133 19.08 26.6666 20 26.6666C20.92 26.6666 21.6667 27.4133 21.6667 28.3333Z" fill="#00665E"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_92_897">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step6'); ?></h3>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endif; ?>


<?php if ($book_target == 'gimnaziu') : ?>
    
<div class="section py-32px theme-steps">
    <div class="container">
        <div class="parts flex flex-wrap gap-20px">
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#share-experience" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                            <path d="M38.5703 0.352024C38.4816 0.227077 38.358 0.13114 38.215 0.0762815C38.0719 0.021423 37.9158 0.0100936 37.7664 0.0437186C37.6169 0.0773436 37.4807 0.154421 37.375 0.265254C37.2692 0.376088 37.1986 0.515726 37.172 0.666603C37.1454 0.81748 37.164 0.972856 37.2254 1.11318C37.2869 1.25351 37.3885 1.37252 37.5175 1.45525C37.6464 1.53797 37.797 1.58072 37.9501 1.5781C38.1033 1.57548 38.2523 1.52762 38.3784 1.44054C38.463 1.38209 38.5351 1.30743 38.5906 1.22089C38.6461 1.13435 38.6839 1.03765 38.7018 0.936389C38.7196 0.835132 38.7172 0.731337 38.6946 0.631025C38.6721 0.530712 38.6298 0.435879 38.5703 0.352024Z" fill="#496F76"/>
                            <path d="M38.3784 25.1837C38.2523 25.0966 38.1033 25.0488 37.9501 25.0461C37.797 25.0435 37.6464 25.0863 37.5175 25.169C37.3885 25.2517 37.2869 25.3707 37.2254 25.5111C37.164 25.6514 37.1454 25.8068 37.172 25.9576C37.1986 26.1085 37.2692 26.2481 37.375 26.359C37.4807 26.4698 37.6169 26.5469 37.7664 26.5805C37.9158 26.6142 38.0719 26.6028 38.215 26.548C38.358 26.4931 38.4816 26.3972 38.5703 26.2722C38.6298 26.1884 38.6721 26.0935 38.6946 25.9932C38.7172 25.8929 38.7196 25.7891 38.7018 25.6879C38.6839 25.5866 38.6461 25.4899 38.5906 25.4033C38.5351 25.3168 38.463 25.2421 38.3784 25.1837Z" fill="#496F76"/>
                            <path d="M2.52928 0.160075C2.40325 0.0728499 2.25423 0.0248626 2.10098 0.0221549C1.94774 0.0194473 1.79711 0.0621403 1.66808 0.144859C1.53905 0.227577 1.43737 0.346623 1.37585 0.487007C1.31434 0.627391 1.29573 0.782838 1.32237 0.933775C1.34902 1.08471 1.41973 1.22439 1.52559 1.33523C1.63146 1.44607 1.76775 1.5231 1.9173 1.55664C2.06686 1.59018 2.223 1.57872 2.36605 1.52371C2.50911 1.46869 2.63269 1.37258 2.72124 1.24748C2.78057 1.16366 2.82268 1.06891 2.84515 0.968709C2.86762 0.868509 2.87 0.764848 2.85215 0.663723C2.8343 0.562598 2.79657 0.466016 2.74115 0.379566C2.68573 0.293116 2.61372 0.218514 2.52928 0.160075Z" fill="#496F76"/>
                            <path d="M2.72124 25.3711C2.63269 25.246 2.50911 25.1499 2.36605 25.0949C2.223 25.0398 2.06686 25.0284 1.9173 25.0619C1.76775 25.0954 1.63146 25.1725 1.52559 25.2833C1.41973 25.3942 1.34902 25.5338 1.32237 25.6848C1.29573 25.8357 1.31434 25.9912 1.37585 26.1315C1.43737 26.2719 1.53905 26.391 1.66808 26.4737C1.79711 26.5564 1.94774 26.5991 2.10098 26.5964C2.25423 26.5937 2.40325 26.5457 2.52928 26.4585C2.61372 26.4 2.68573 26.3254 2.74115 26.239C2.79657 26.1525 2.8343 26.0559 2.85215 25.9548C2.87 25.8537 2.86762 25.7501 2.84515 25.6499C2.82268 25.5497 2.78057 25.4549 2.72124 25.3711Z" fill="#496F76"/>
                            <path d="M28.8658 3.37349C27.0876 1.78804 24.9164 0.709219 22.5788 0.249748C20.2412 -0.209723 17.8231 -0.0329817 15.5772 0.761504C13.3313 1.55599 11.3399 2.93906 9.81125 4.76621C8.28256 6.59336 7.27261 8.79752 6.88695 11.1484C6.49986 13.5418 6.77616 15.9954 7.68582 18.2428C8.59548 20.4901 10.1037 22.4451 12.0466 23.8954C12.3336 24.112 12.5666 24.3921 12.7273 24.7138C12.8881 25.0355 12.9722 25.39 12.9731 25.7495V32.8987C12.9737 33.4107 13.1371 33.9092 13.4397 34.3223C13.7423 34.7354 14.1683 35.0416 14.6563 35.1966C14.8195 36.5271 15.4656 37.7513 16.4719 38.6367C17.4782 39.5222 18.7746 40.0073 20.115 39.9999C21.4554 39.9925 22.7464 39.4931 23.7428 38.5966C24.7393 37.7001 25.3719 36.4689 25.5203 35.1367C25.9669 34.9563 26.3498 34.6472 26.6202 34.2487C26.8907 33.8502 27.0366 33.3803 27.0394 32.8987V25.7495C27.0393 25.3913 27.1224 25.0379 27.282 24.7171C27.4416 24.3964 27.6734 24.117 27.9592 23.901C29.582 22.6838 30.9079 21.1148 31.8373 19.3117C32.7988 17.4441 33.2973 15.3727 33.2908 13.2722C33.2894 11.404 32.8947 9.55714 32.1323 7.85166C31.3699 6.14618 30.2569 4.62036 28.8658 3.37349ZM20.0845 38.4366C19.1837 38.4367 18.3107 38.1256 17.6129 37.5561C16.9151 36.9865 16.4355 36.1934 16.2552 35.3109H23.9114C23.73 36.1923 23.2504 36.9843 22.5533 37.5534C21.8563 38.1226 20.9844 38.4352 20.0845 38.4366ZM25.4771 32.8998C25.476 33.1118 25.3957 33.3158 25.252 33.4718C25.1084 33.6278 24.9116 33.7245 24.7004 33.7431H24.6915C24.6693 33.7431 24.6471 33.7431 24.6238 33.7431H15.3842C15.1595 33.7428 14.944 33.6534 14.7851 33.4944C14.6262 33.3355 14.5368 33.1201 14.5365 32.8953V31.9455H25.4771V32.8953V32.8998ZM25.4771 30.3876H14.5365V28.5901H25.4771V30.3899V30.3876ZM20.0123 16.9094C20.8264 16.91 21.6294 16.72 22.3569 16.3546V27.0289H17.6622V16.3546C18.3914 16.7209 19.1963 16.9109 20.0123 16.9094ZM17.8564 14.6425L20.0123 10.3317L22.1683 14.6425C21.5424 15.1021 20.7861 15.35 20.0096 15.35C19.233 15.35 18.4768 15.1021 17.8508 14.6425H17.8564ZM27.0283 22.6504C26.5481 23.0122 26.1584 23.4805 25.89 24.0185C25.6216 24.5565 25.4818 25.1494 25.4815 25.7507V27.0278H23.9181V14.8356C23.9196 14.8075 23.9196 14.7793 23.9181 14.7513C23.9181 14.7435 23.9181 14.7357 23.9181 14.728C23.9181 14.7202 23.9114 14.688 23.907 14.668L23.9003 14.6425C23.8952 14.6225 23.8892 14.6029 23.8826 14.5837L23.8748 14.5604C23.8671 14.5393 23.8582 14.5182 23.8482 14.4983V14.4861L23.8426 14.4739L20.7247 8.23683C20.6611 8.10551 20.5618 7.99476 20.4381 7.91727C20.3145 7.83978 20.1716 7.79868 20.0256 7.79868C19.8797 7.79868 19.7368 7.83978 19.6131 7.91727C19.4895 7.99476 19.3902 8.10551 19.3266 8.23683L16.2086 14.4739L16.2031 14.4861V14.4983C16.1931 14.5182 16.1842 14.5393 16.1765 14.5604L16.1687 14.5837C16.162 14.6029 16.1561 14.6225 16.1509 14.6425L16.1443 14.668C16.1443 14.688 16.1365 14.708 16.1332 14.728C16.1299 14.7479 16.1332 14.7435 16.1332 14.7513C16.1317 14.7793 16.1317 14.8075 16.1332 14.8356V27.0267H14.5365V25.7495C14.5353 25.1469 14.3944 24.5526 14.1249 24.0136C13.8553 23.4745 13.4645 23.0053 12.9831 22.6427C11.1028 21.2385 9.68775 19.3018 8.92135 17.0838C8.15494 14.8658 8.07253 12.4686 8.68481 10.2032C9.29709 7.93778 10.5758 5.90852 12.3552 4.37853C14.1346 2.84855 16.3326 1.88839 18.6642 1.62255C21.2232 1.32683 23.8084 1.88278 26.0197 3.20437C28.231 4.52595 29.945 6.53949 30.8966 8.9334C31.8482 11.3273 31.9843 13.9681 31.2838 16.4471C30.5834 18.9262 29.0853 21.1052 27.0216 22.6471L27.0283 22.6504Z" fill="#496F76"/>
                            <path d="M26.7795 5.70143C26.6252 5.56312 26.4222 5.49178 26.2153 5.50313C26.0083 5.51447 25.8143 5.60755 25.676 5.7619C25.5377 5.91625 25.4664 6.11922 25.4777 6.32617C25.4891 6.53311 25.5822 6.72708 25.7365 6.86539C26.637 7.67239 27.3575 8.65994 27.8511 9.76377C28.3447 10.8676 28.6004 12.063 28.6015 13.2722C28.6015 13.4795 28.6838 13.6783 28.8304 13.8249C28.977 13.9715 29.1759 14.0539 29.3832 14.0539C29.5905 14.0539 29.7893 13.9715 29.9359 13.8249C30.0825 13.6783 30.1649 13.4795 30.1649 13.2722C30.1636 11.8433 29.8615 10.4308 29.2782 9.12638C28.695 7.822 27.8436 6.65504 26.7795 5.70143Z" fill="#496F76"/>
                            <path d="M4.37679 12.491H0.781708C0.574386 12.491 0.375556 12.5734 0.228957 12.72C0.0823583 12.8666 0 13.0654 0 13.2727C0 13.4801 0.0823583 13.6789 0.228957 13.8255C0.375556 13.9721 0.574386 14.0544 0.781708 14.0544H4.37679C4.58411 14.0544 4.78294 13.9721 4.92954 13.8255C5.07614 13.6789 5.1585 13.4801 5.1585 13.2727C5.1585 13.0654 5.07614 12.8666 4.92954 12.72C4.78294 12.5734 4.58411 12.491 4.37679 12.491Z" fill="#496F76"/>
                            <path d="M39.2303 12.491H35.6352C35.4279 12.491 35.2291 12.5734 35.0825 12.72C34.9359 12.8666 34.8535 13.0654 34.8535 13.2727C34.8535 13.4801 34.9359 13.6789 35.0825 13.8255C35.2291 13.9721 35.4279 14.0544 35.6352 14.0544H39.2303C39.4376 14.0544 39.6365 13.9721 39.7831 13.8255C39.9297 13.6789 40.012 13.4801 40.012 13.2727C40.012 13.0654 39.9297 12.8666 39.7831 12.72C39.6365 12.5734 39.4376 12.491 39.2303 12.491Z" fill="#496F76"/>
                            <path d="M7.8435 21.7905C7.78506 21.7059 7.7104 21.6337 7.62386 21.5782C7.53731 21.5227 7.44061 21.4849 7.33935 21.4671C7.23809 21.4492 7.1343 21.4516 7.03399 21.4742C6.93368 21.4968 6.83884 21.539 6.75499 21.5985L4.19072 23.3905C4.10664 23.4494 4.03498 23.5242 3.97983 23.6108C3.92468 23.6974 3.88712 23.7939 3.8693 23.895C3.85147 23.9961 3.85373 24.0997 3.87594 24.1999C3.89816 24.3001 3.93989 24.3949 3.99876 24.479C4.05763 24.5631 4.13248 24.6348 4.21904 24.6899C4.3056 24.7451 4.40218 24.7826 4.50326 24.8004C4.60433 24.8183 4.70793 24.816 4.80814 24.7938C4.90834 24.7716 5.00319 24.7299 5.08727 24.671L7.64821 22.8779C7.73291 22.8197 7.80522 22.7453 7.86096 22.659C7.9167 22.5726 7.95475 22.4761 7.97291 22.375C7.99108 22.2738 7.98899 22.1701 7.96678 22.0697C7.94456 21.9694 7.90266 21.8745 7.8435 21.7905Z" fill="#496F76"/>
                            <path d="M36.012 2.06642C35.9536 1.98183 35.8789 1.90968 35.7924 1.85416C35.7058 1.79864 35.6091 1.76086 35.5079 1.743C35.4066 1.72515 35.3028 1.72757 35.2025 1.75014C35.1022 1.77271 35.0074 1.81496 34.9235 1.87446L32.3626 3.66757C32.2785 3.72643 32.2069 3.80129 32.1517 3.88785C32.0966 3.97441 32.059 4.07099 32.0412 4.17207C32.0234 4.27314 32.0256 4.37674 32.0478 4.47695C32.07 4.57715 32.1118 4.672 32.1706 4.75608C32.2295 4.84015 32.3043 4.91181 32.3909 4.96696C32.4775 5.02211 32.574 5.05967 32.6751 5.07749C32.7762 5.09532 32.8798 5.09306 32.98 5.07085C33.0802 5.04864 33.1751 5.00691 33.2591 4.94804L35.8201 3.15493C35.9047 3.09649 35.9768 3.02183 36.0323 2.93529C36.0879 2.84875 36.1256 2.75205 36.1435 2.65079C36.1614 2.54953 36.1589 2.44574 36.1364 2.34542C36.1138 2.24511 36.0715 2.15028 36.012 2.06642Z" fill="#496F76"/>
                            <path d="M7.65083 3.66861L5.08989 1.87551C4.92009 1.75618 4.70984 1.70919 4.50539 1.74487C4.30094 1.78056 4.11905 1.896 3.99972 2.0658C3.88039 2.23561 3.83339 2.44586 3.86908 2.6503C3.90477 2.85475 4.02021 3.03665 4.19001 3.15598L6.75095 4.94908C6.83503 5.00795 6.92988 5.04968 7.03008 5.0719C7.13029 5.09411 7.23389 5.09637 7.33496 5.07854C7.43604 5.06072 7.53262 5.02316 7.61918 4.96801C7.70574 4.91286 7.78059 4.8412 7.83946 4.75712C7.89833 4.67305 7.94006 4.5782 7.96228 4.47799C7.98449 4.37779 7.98675 4.27419 7.96892 4.17311C7.9511 4.07204 7.91354 3.97546 7.85839 3.8889C7.80324 3.80233 7.73158 3.72748 7.64751 3.66861H7.65083Z" fill="#496F76"/>
                            <path d="M35.8201 23.3905L33.2591 21.5974C33.1751 21.5385 33.0802 21.4968 32.98 21.4746C32.8798 21.4524 32.7762 21.4501 32.6751 21.4679C32.574 21.4857 32.4775 21.5233 32.3909 21.5785C32.3043 21.6336 32.2295 21.7053 32.1706 21.7893C32.1118 21.8734 32.07 21.9683 32.0478 22.0685C32.0256 22.1687 32.0234 22.2723 32.0412 22.3734C32.059 22.4744 32.0966 22.571 32.1517 22.6576C32.2069 22.7442 32.2785 22.819 32.3626 22.8779L34.9235 24.671C35.0076 24.7298 35.1024 24.7716 35.2026 24.7938C35.3028 24.816 35.4065 24.8183 35.5075 24.8004C35.6086 24.7826 35.7052 24.745 35.7917 24.6899C35.8783 24.6348 35.9531 24.5631 36.012 24.479C36.0709 24.3949 36.1126 24.3001 36.1348 24.1999C36.157 24.0997 36.1593 23.9961 36.1415 23.895C36.1237 23.7939 36.0861 23.6973 36.0309 23.6108C35.9758 23.5242 35.9042 23.4494 35.8201 23.3905Z" fill="#496F76"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step1'); ?></h3>

                    <span class="decor">
                        <svg width="92" height="36" viewBox="0 0 92 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="82" cy="25.922" r="10" fill="#fff"/>
                            <path d="M20 24.922C6.5 33.922 6.66677 26.7554 7.5001 24.922C18.0001 5.92204 46.1998 -18.678 82.9998 26.922C84.3329 28.422 84.5 35.422 72.9993 28.922M35.5 17.922C39.8333 15.422 45.5 12.422 55.5 18.422" stroke="#00665E" stroke-dasharray="3 3"/>
                            <circle cx="10" cy="24.4221" r="10" fill="#fff"/>
                        </svg>
                    </span>
                </a>
            </div>
            
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-curious" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M24.1643 14.8106C24.0101 14.8106 23.8594 14.8564 23.7311 14.942C23.6029 15.0277 23.503 15.1495 23.444 15.2919C23.385 15.4344 23.3695 15.5912 23.3996 15.7424C23.4297 15.8937 23.504 16.0326 23.613 16.1416C23.7221 16.2507 23.861 16.3249 24.0122 16.355C24.1635 16.3851 24.3202 16.3696 24.4627 16.3106C24.6051 16.2516 24.7269 16.1517 24.8126 16.0235C24.8983 15.8953 24.944 15.7445 24.944 15.5903C24.944 15.3835 24.8618 15.1852 24.7156 15.039C24.5694 14.8928 24.3711 14.8106 24.1643 14.8106Z" fill="#00665E"/>
                            <path d="M38.9978 34.5882L28.5927 24.1831C30.2866 21.6377 31.1873 18.6469 31.1806 15.5893C31.1804 12.5059 30.2659 9.49183 28.5528 6.92817C26.8396 4.36451 24.4047 2.36642 21.556 1.18655C18.7073 0.00668597 15.5727 -0.301968 12.5486 0.299621C9.52442 0.901209 6.74659 2.38602 4.56631 4.56631C2.38602 6.74659 0.901209 9.52442 0.299621 12.5486C-0.301968 15.5727 0.00668597 18.7073 1.18655 21.556C2.36642 24.4047 4.36451 26.8396 6.92817 28.5528C9.49183 30.2659 12.5059 31.1804 15.5893 31.1806C18.6469 31.1872 21.6376 30.2866 24.1831 28.5927L27.0589 31.4685L34.5872 38.9968C34.872 39.3054 35.2162 39.5533 35.5992 39.7255C35.9822 39.8978 36.396 39.991 36.8158 39.9994C37.2357 40.0078 37.6529 39.9313 38.0424 39.7745C38.432 39.6177 38.7858 39.3838 39.0828 39.0869C39.3797 38.7899 39.6136 38.4361 39.7704 38.0465C39.9272 37.657 40.0037 37.2397 39.9953 36.8199C39.9869 36.4001 39.8937 35.9862 39.7214 35.6033C39.5492 35.2203 39.3013 34.8761 38.9927 34.5913L38.9978 34.5882ZM23.8163 26.9493C20.9554 29.0222 17.4184 29.9409 13.9103 29.5222C10.4022 29.1035 7.18073 27.3783 4.888 24.6903C2.59527 22.0023 1.39967 18.549 1.53952 15.0188C1.67937 11.4886 3.1444 8.14078 5.64259 5.64259C8.14078 3.1444 11.4886 1.67937 15.0188 1.53952C18.549 1.39967 22.0023 2.59527 24.6903 4.888C27.3783 7.18073 29.1035 10.4022 29.5222 13.9103C29.9409 17.4184 29.0222 20.9554 26.9493 23.8163C26.0766 25.0192 25.0192 26.0766 23.8163 26.9493ZM25.4556 27.6563C26.2624 26.997 27.0013 26.2587 27.6614 25.4525L29.8682 27.6614C29.1946 28.4565 28.4565 29.1946 27.6614 29.8682L25.4556 27.6563ZM37.8985 37.8954C37.7538 38.0403 37.5819 38.1552 37.3928 38.2336C37.2036 38.312 37.0009 38.3524 36.7961 38.3524C36.5914 38.3524 36.3886 38.312 36.1994 38.2336C36.0103 38.1552 35.8384 38.0403 35.6937 37.8954L28.772 30.9737C29.5618 30.2958 30.2989 29.5588 30.9768 28.7689L37.8985 35.6906C38.0433 35.8353 38.1582 36.007 38.2366 36.1961C38.315 36.3852 38.3553 36.5878 38.3553 36.7925C38.3553 36.9972 38.315 37.1999 38.2366 37.3889C38.1582 37.578 38.0433 37.7508 37.8985 37.8954Z" fill="#00665E"/>
                            <path d="M15.5899 3.11664C13.123 3.11664 10.7115 3.84815 8.66042 5.21866C6.6093 6.58918 5.01064 8.53714 4.06662 10.8162C3.12259 13.0953 2.87559 15.6031 3.35685 18.0226C3.83811 20.4421 5.02602 22.6645 6.77035 24.4088C8.51469 26.1531 10.7371 27.3411 13.1566 27.8223C15.576 28.3036 18.0839 28.0566 20.3629 27.1125C22.642 26.1685 24.59 24.5699 25.9605 22.5187C27.331 20.4676 28.0625 18.0562 28.0625 15.5893C28.0587 12.2825 26.7434 9.11225 24.4052 6.77399C22.0669 4.43573 18.8967 3.12043 15.5899 3.11664ZM15.5899 26.5026C13.4314 26.5026 11.3214 25.8626 9.52674 24.6634C7.73205 23.4642 6.33326 21.7598 5.50726 19.7657C4.68126 17.7715 4.46514 15.5772 4.88623 13.4602C5.30732 11.3432 6.34672 9.39867 7.87297 7.87242C9.39923 6.34616 11.3438 5.30677 13.4608 4.88568C15.5778 4.46458 17.7721 4.6807 19.7662 5.50671C21.7604 6.33271 23.4648 7.7315 24.664 9.52618C25.8631 11.3209 26.5032 13.4309 26.5032 15.5893C26.4999 18.4827 25.3491 21.2567 23.3032 23.3026C21.2572 25.3485 18.4833 26.4994 15.5899 26.5026Z" fill="#00665E"/>
                            <path d="M24.3264 12.2432C23.6474 10.4766 22.4493 8.95709 20.8899 7.88467C19.3305 6.81226 17.4828 6.23725 15.5902 6.23535C15.3834 6.23535 15.1851 6.3175 15.0389 6.46371C14.8927 6.60993 14.8105 6.80824 14.8105 7.01502C14.8105 7.2218 14.8927 7.42012 15.0389 7.56633C15.1851 7.71255 15.3834 7.79469 15.5902 7.79469C17.1662 7.80201 18.7036 8.28361 20.0021 9.1768C21.3006 10.07 22.3001 11.3334 22.8706 12.8026C22.9051 12.901 22.9591 12.9915 23.0293 13.0686C23.0994 13.1458 23.1844 13.2081 23.279 13.2519C23.3737 13.2956 23.4762 13.3199 23.5805 13.3234C23.6847 13.3268 23.7886 13.3093 23.8859 13.2718C23.9833 13.2344 24.0721 13.1778 24.1472 13.1054C24.2223 13.0331 24.2821 12.9463 24.3231 12.8504C24.3641 12.7545 24.3854 12.6514 24.3858 12.547C24.3862 12.4428 24.3667 12.3394 24.3264 12.2432Z" fill="#00665E"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step2'); ?></h3>

                    <span class="decor">
                        <svg width="92" height="36" viewBox="0 0 92 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="82" cy="25.922" r="10" fill="#fff"/>
                            <path d="M20 24.922C6.5 33.922 6.66677 26.7554 7.5001 24.922C18.0001 5.92204 46.1998 -18.678 82.9998 26.922C84.3329 28.422 84.5 35.422 72.9993 28.922M35.5 17.922C39.8333 15.422 45.5 12.422 55.5 18.422" stroke="#00665E" stroke-dasharray="3 3"/>
                            <circle cx="10" cy="24.4221" r="10" fill="#fff"/>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-responsable" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M6.66602 23.3333V30.6666C6.66602 31.219 7.11373 31.6666 7.66602 31.6666H16.666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.6673 23.3333V30.6666C31.6673 31.219 31.2197 31.6666 30.6673 31.6666H23.334" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.334 8.33331H30.6673C31.2197 8.33331 31.6673 8.78103 31.6673 9.33331V16.6666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66602 16.6666V9.33331C6.66602 8.78103 7.11373 8.33331 7.66602 8.33331H16.666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.3327 31.6667V33.3334C23.3327 35.1744 21.8403 36.6667 19.9993 36.6667C18.1583 36.6667 16.666 35.1744 16.666 33.3334V31.6667" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.66602 16.6667H8.33268C10.1736 16.6667 11.666 18.159 11.666 20C11.666 21.841 10.1736 23.3334 8.33268 23.3334H6.66602" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.666 16.6667H33.3327C35.1737 16.6667 36.666 18.159 36.666 20C36.666 21.841 35.1737 23.3334 33.3327 23.3334H31.666" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.3327 8.33331V6.66665C23.3327 4.8257 21.8403 3.33331 19.9993 3.33331C18.1583 3.33331 16.666 4.8257 16.666 6.66665V8.33331" stroke="#00665E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step4'); ?></h3>
                    <span class="decor">
                        <svg width="92" height="36" viewBox="0 0 92 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="82" cy="25.922" r="10" fill="#fff"/>
                            <path d="M20 24.922C6.5 33.922 6.66677 26.7554 7.5001 24.922C18.0001 5.92204 46.1998 -18.678 82.9998 26.922C84.3329 28.422 84.5 35.422 72.9993 28.922M35.5 17.922C39.8333 15.422 45.5 12.422 55.5 18.422" stroke="#00665E" stroke-dasharray="3 3"/>
                            <circle cx="10" cy="24.4221" r="10" fill="#fff"/>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#am-cult" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <path d="M14.9293 4.87848H38.5265C39.0651 4.87848 39.5021 5.31549 39.5021 5.85408V21.6295C39.5021 22.1685 39.0651 22.6055 38.5265 22.6055H35.8567V30.1141C35.8567 31.0708 34.6222 31.445 34.0812 30.6735L27.6522 22.6055H26.0464V25.6632C26.0464 26.2018 25.6098 26.6388 25.0708 26.6388H12.3478L5.91882 34.7072C5.37787 35.4787 4.14384 35.1045 4.14384 34.1478V26.6388H1.47358C0.934997 26.6388 0.497986 26.2018 0.497986 25.6632V9.88781C0.497986 9.34875 0.934997 8.91221 1.47358 8.91221H13.9537V5.85408C13.9537 5.31549 14.3907 4.87848 14.9293 4.87848ZM24.0952 22.6055H14.9293C14.3907 22.6055 13.9537 22.1685 13.9537 21.6295V10.8634H2.44965V24.6876H5.11944C5.65803 24.6876 6.09504 25.1246 6.09504 25.6632V31.3609L11.1181 25.0571C11.3104 24.8156 11.5938 24.6895 11.8801 24.6895L24.0952 24.6876V22.6055ZM20.9615 12.6629C19.6778 12.6629 19.6778 10.7113 20.9615 10.7113H32.4948C33.7779 10.7113 33.7779 12.6629 32.4948 12.6629H20.9615ZM20.9615 16.7723C19.6778 16.7723 19.6778 14.8211 20.9615 14.8211H32.4948C33.7779 14.8211 33.7779 16.7723 32.4948 16.7723H20.9615ZM37.5509 6.82968H15.9049V20.6539L28.1199 20.6558C28.4062 20.6562 28.6902 20.7819 28.882 21.0238L33.905 27.3272V21.6295C33.905 21.0909 34.342 20.6539 34.8806 20.6539H37.5509V6.82968Z" fill="#00665E"/>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step5'); ?></h3>
                </a>
            </div>

            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#curiosities" class="step-box flex flex-col gap-20px justify-between bg-light-green p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-medium-green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <g clip-path="url(#clip0_92_897)">
                                <path d="M38.7383 16.955L35 13.2166V9.16665C35 6.86831 33.13 4.99998 30.8333 4.99998H26.7833L23.045 1.26165C21.365 -0.418352 18.635 -0.418352 16.955 1.26165L13.2167 4.99998H9.16667C6.87 4.99998 5 6.86831 5 9.16665V13.2166L1.26167 16.955C0.448333 17.7666 0 18.85 0 20C0 21.15 0.448333 22.2333 1.26167 23.045L5 26.7833V30.8333C5 33.1316 6.87 35 9.16667 35H13.2167L16.955 38.7383C17.795 39.5783 18.8983 39.9966 20 39.9966C21.1017 39.9966 22.205 39.5783 23.045 38.7383L26.7833 35H30.8333C33.13 35 35 33.1316 35 30.8333V26.7833L38.7383 23.045C39.5517 22.2333 40 21.15 40 20C40 18.85 39.5517 17.7683 38.7383 16.955ZM37.56 21.8666L33.5767 25.85C33.42 26.0066 33.3333 26.2183 33.3333 26.44V30.835C33.3333 32.2133 32.2117 33.335 30.8333 33.335H26.4383C26.2167 33.335 26.005 33.4233 25.8483 33.5783L21.865 37.5616C20.8367 38.59 19.16 38.59 18.1317 37.5616L14.1483 33.5783C13.9917 33.4216 13.78 33.335 13.5583 33.335H9.16333C7.785 33.335 6.66333 32.2133 6.66333 30.835V26.44C6.66333 26.2183 6.575 26.0066 6.42 25.85L2.43667 21.8666C1.93833 21.3683 1.66333 20.705 1.66333 20C1.66333 19.295 1.93833 18.6316 2.43667 18.1333L6.42 14.15C6.57667 13.9933 6.66333 13.7816 6.66333 13.56V9.16498C6.66333 7.78665 7.785 6.66498 9.16333 6.66498H13.5583C13.78 6.66498 13.9917 6.57665 14.1483 6.42165L18.1317 2.43831C19.16 1.40998 20.8367 1.40998 21.865 2.43831L25.8483 6.42165C26.005 6.57831 26.2167 6.66498 26.4383 6.66498H30.8333C32.2117 6.66498 33.3333 7.78665 33.3333 9.16498V13.56C33.3333 13.7816 33.4217 13.9933 33.5767 14.15L37.56 18.1333C38.0583 18.6316 38.3333 19.295 38.3333 20C38.3333 20.705 38.0583 21.3683 37.56 21.8666ZM24.9217 14.1016C25.295 16.2233 24.2867 18.3466 22.4117 19.3816C21.4233 19.925 20.8333 20.78 20.8333 21.6666V22.5C20.8333 22.96 20.46 23.3333 20 23.3333C19.54 23.3333 19.1667 22.96 19.1667 22.5V21.6666C19.1667 20.1633 20.0783 18.7633 21.6067 17.9216C22.8767 17.2216 23.5333 15.835 23.2783 14.39C23.0433 13.0516 21.9483 11.955 20.6117 11.72C19.6017 11.5466 18.625 11.8 17.8567 12.4466C17.1 13.0816 16.6667 14.0116 16.6667 15C16.6667 15.46 16.2933 15.8333 15.8333 15.8333C15.3733 15.8333 15 15.46 15 15C15 13.5183 15.6517 12.1216 16.785 11.17C17.92 10.2166 19.415 9.81998 20.8983 10.08C22.9117 10.4316 24.5667 12.085 24.92 14.1016H24.9217ZM21.6667 28.3333C21.6667 29.2533 20.92 30 20 30C19.08 30 18.3333 29.2533 18.3333 28.3333C18.3333 27.4133 19.08 26.6666 20 26.6666C20.92 26.6666 21.6667 27.4133 21.6667 28.3333Z" fill="#00665E"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_92_897">
                                <rect width="40" height="40" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>

                    <h3 class="text-28px font-500 text-green leading-120"><?php echo get_theme_translated_text('step6'); ?></h3>
                </a>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>



<?php endif; // this is from above! ?>

<?php get_footer(); ?>
