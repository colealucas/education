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
        'step5' => 'Vorbesc cult!',
        'step6' => 'Știai că...',

        // gimnaziu
        'gimnaziu' => [
            'subjects' => 'Subiecte',
            'go_back' => 'Inapoi la Teme',
            'pagination_back' => 'Înapoi',
            'pagination_next' => 'Înainte',
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
            'pagination_back' => 'Înapoi',
            'pagination_next' => 'Înainte',
            'concepts' => 'Concepte cheie',
            'step1' => 'Evocare',
            'step2' => 'Realizarea sensului',
            'step3' => 'Exercițiu practic',
            'step4' => 'Reflecție',
            'step5' => 'Extindere',
            'step6' => 'Știai că...',
        ],
    ],
    'ru' => [
        'subjects' => 'Предметы',
        'go_back' => 'Назад к Темам',
        'pagination_back' => 'Назад',
        'pagination_next' => 'Вперед',
        'concepts' => 'Ключевые понятия',
        'step1' => 'Я уже знаю и делюсь своим опытом с другими!',
        'step2' => 'Мне интересно узнать больше!',
        'step3' => 'Я потребляю и создаю медиа-продукты ответственно',
        'step4' => 'Мое медийное приключение продолжается!',
        'step5' => 'Я говорю на культурном языке!',
        'step6' => 'Удивительные факты',

        // gimnaziu
        'gimnaziu' => [
            'subjects' => 'Предметы',
            'go_back' => 'Назад к Темам',
            'pagination_back' => 'Назад',
            'pagination_next' => 'Вперед',
            'concepts' => 'Ключевые понятия',
            'step1' => 'Вызов',
            'step2' => 'Осмысление',
            'step3' => 'Практическое упражнение',
            'step4' => 'Рефлексия',
            'step5' => 'Расширение',
            'step6' => 'Знаете ли вы, что...',
        ],

        // liceu
        'liceu' => [
            'subjects' => 'Предметы',
            'go_back' => 'Назад к Темам',
            'pagination_back' => 'Назад',
            'pagination_next' => 'Вперед',
            'concepts' => 'Ключевые понятия',
            'step1' => 'Вызов',
            'step2' => 'Осмысление',
            'step3' => 'Практическое упражнение',
            'step4' => 'Рефлексия',
            'step5' => 'Расширение',
            'step6' => 'Знаете ли вы, что...',
        ],
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
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step1'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step2'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step3'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step4'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step5'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
            <div>
                <?php echo get_theme_translated_text('step6'); ?>
            </div>

            <div>
                <span class="inline-block cursor-pointer print-button" onclick="window.print()">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
    <div class="concept-bar mt-30px mb-20px bg-primary p-16px rounded-16px text-white text-24px font-500 leading-120">
        <div class="flex items-center gap-16px">
            <div>
                <div class="size-48px rounded-50 bg-white flex items-center justify-center">
                    <?php if ($book_target == 'liceu') : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/liceu/cuvinte_cheie.svg'; ?>" width="30" height="30" alt="">
                    <?php elseif ($book_target == 'gimnaziu') : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/gimnaziu/cuvinte_cheie.svg'; ?>" width="30" height="30" alt="">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/cuvinte_cheie.svg'; ?>" width="30" height="30" alt="">
                    <?php endif; ?>
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

<!-- Modal 1 -->
<div style="display: none;" id="modal-1" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
        <div class="flex gap-16px items-center" data-target="<?php echo $book_target; ?>">
            <?php if ($book_target == 'gimnaziu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gimnaziu/evocare.svg" width="40" height="40" alt="">
            <?php elseif ($book_target == 'liceu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liceu/evocare.svg" width="40" height="40" alt="">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stiu_deja.svg" width="40" height="40" alt="">
            <?php endif; ?>

            <?php echo get_theme_translated_text('step1'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=1" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <a href="#" class="theme-pagination-btn tp-button-left hide" data-fancybox data-src="#modal-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="#" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#modal-2">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- Modal 2 -->
<div style="display: none;" id="modal-2" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <?php if ($book_target == 'gimnaziu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gimnaziu/realizarea_sensului.svg" width="40" height="40" alt="">
            <?php elseif ($book_target == 'liceu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liceu/realizarea_sensului.svg" width="40" height="40" alt="">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sunt_curios.svg" width="40" height="40" alt="">
            <?php endif; ?>

            <?php echo get_theme_translated_text('step2'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=2" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <a href="#" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#modal-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="#" class="theme-pagination-btn tp-button-right" data-fancybox data-src="<?php echo ($book_target == 'gimnaziu' || $book_target == 'liceu' ? '#modal-4' : '#modal-3'); ?>">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- Modal 3 -->
<div style="display: none;" id="modal-3" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <?php if ($book_target == 'gimnaziu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gimnaziu/reflectie.svg" width="40" height="40" alt="">
            <?php elseif ($book_target == 'liceu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liceu/reflectie.svg" width="40" height="40" alt="">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aventura_continua.svg" width="40" height="40" alt="">
            <?php endif; ?>

            <?php echo get_theme_translated_text('step3'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=3" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <a href="#" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#modal-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="#" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#modal-4">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- Modal 4 -->
<div style="display: none;" id="modal-4" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <?php if ($book_target == 'gimnaziu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gimnaziu/reflectie.svg" width="40" height="40" alt="">
            <?php elseif ($book_target == 'liceu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liceu/reflectie.svg" width="40" height="40" alt="">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/consum_responsabil.svg" width="40" height="40" alt="">
            <?php endif; ?>

            <?php echo get_theme_translated_text('step4'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=4" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <a href="#" class="theme-pagination-btn tp-button-left" data-fancybox data-src="<?php echo ($book_target == 'gimnaziu' || $book_target == 'liceu' ? '#modal-2' : '#modal-3'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="#" class="theme-pagination-btn tp-button-right" data-fancybox data-src="<?php echo ($hide_step_5 ? '#modal-6' : '#modal-5'); ?>">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- Modal 5 -->
<div style="display: none;" id="modal-5" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <?php if ($book_target == 'gimnaziu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gimnaziu/extindere.svg" width="40" height="40" alt="">
            <?php elseif ($book_target == 'liceu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liceu/extindere.svg" width="40" height="40" alt="">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/vorbesc_cult.svg" width="40" height="40" alt="">
            <?php endif; ?>

            <?php echo get_theme_translated_text('step5'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=5" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <a href="#" class="theme-pagination-btn tp-button-left" data-fancybox data-src="#modal-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>

        <a href="#" class="theme-pagination-btn tp-button-right" data-fancybox data-src="#modal-6">
            <?php echo $get_static_text[get_lang()]['pagination_next']; ?>

            <svg class="rotate180" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</div>

<!-- Modal 6 -->
<div style="display: none;" id="modal-6" class="w-[833px] p-24px rounded-24px">
    <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
        <div class="flex gap-16px items-center">
            <?php if ($book_target == 'gimnaziu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gimnaziu/stiai_ca.svg" width="40" height="40" alt="">
            <?php elseif ($book_target == 'liceu') : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/liceu/stiai_ca.svg" width="40" height="40" alt="">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/curiozitati.svg" width="40" height="40" alt="">
            <?php endif; ?>
            <?php echo get_theme_translated_text('step6'); ?>
        </div>

        <div>
            <a href="<?php the_permalink( get_the_ID() ) ?>?print=true&step=6" class="inline-block cursor-pointer print-button" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="40" height="40" rx="20" fill="var(--primary-color)"/>
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
        <a href="#" class="theme-pagination-btn tp-button-left" data-fancybox data-src="<?php echo ($hide_step_5 ? '#modal-4' : '#modal-5'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php echo $get_static_text[get_lang()]['pagination_back']; ?>
        </a>
    </div>
</div>


<div class="section mt-34px theme-intro-section">
    <div class="container">
        <div class="section-inner p-24px md:p-40px bg-primary text-white rounded-24px">
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

                            <h1 class="text-30px md:text-48px font-500 leading-120 mt-12px text-white">
                                <?php the_title(); ?>
                            </h1>

                            <div class="mt-16px text-16px text-content-spacing">
                                <?php // the_content(); ?>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-3">
                        <?php if ( !get_field('is_evaluation') ) : ?>
                            <div class="keey-concepts">
                                <div class="flex md:justify-end">
                                    <a data-fancybox data-src="#key-concepts" href="javascript:;" class="inline-flex items-center gap-8px text-primary text-14px rounded-24px bg-primary-light hover:bg-white px-10px py-6px leading-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M10 13.3333V10M10 6.66667H10.0084M18.3334 10C18.3334 14.6024 14.6024 18.3333 10 18.3333C5.39765 18.3333 1.66669 14.6024 1.66669 10C1.66669 5.39763 5.39765 1.66667 10 1.66667C14.6024 1.66667 18.3334 5.39763 18.3334 10Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <?php echo $get_static_text[get_lang()]['concepts']; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- evaluation content start -->
<?php if ( get_field('is_evaluation') ) : ?>

    <?php include(get_template_directory() . '/template-parts/evaluation-content.php'); ?>

    <!-- evaluation content end -->
<?php else : ?>

    <!-- normal content start -->

    <!-- Theme steps -->
    <?php if ($book_target == 'primar') : ?>
        <?php include(get_template_directory() . '/template-parts/book-primar.php'); ?>
    <?php endif; ?>

    <?php if ($book_target == 'gimnaziu') : ?>
        <?php include(get_template_directory() . '/template-parts/book-gimnaziu.php'); ?>
    <?php endif; ?>

    <?php if ($book_target == 'liceu') : ?>
        <?php include(get_template_directory() . '/template-parts/book-liceu.php'); ?>
    <?php endif; ?>

    <!-- normal content end -->

<?php endif; ?>


<?php endif; // this is from above! ?>

<?php get_footer(); ?>
