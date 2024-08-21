<?php get_header(); 
/**
 * Single Theme Template
 * 
 */

$get_static_text = [
    'ro' => [
        'subjects' => 'Subiecte',
        'go_back' => 'Inapoi la Teme',
        'concepts' => 'Concepte Cheie',
    ],
    'ru' => [
        'subjects' => 'Предметы',
        'go_back' => 'Назад к Темам',
        'concepts' => 'Concepte Cheie',
    ]
];
?>

<div class="section py-40px bg-green text-white rounded-24px mx-8px mt-34px theme-intro-section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                    
            <div class="row items-center">
                <div class="col-lg-6">
                    <div class="relative">
                        <div class="go-back">
                            <a href="<?php echo $parent_book_url ; ?>" class="flex items-center gap-8px text-white hover:text-white">
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
                <div class="col-lg-6">
                    <div class="keey-concepts">
                        <div class="flex justify-end">
                            <a href="#" class="inline-flex items-center gap-8px text-green text-14px rounded-24px bg-light-green hover:bg-white px-10px py-6px leading-1">
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

<div class="section py-32px theme-steps">
    <div class="container">
        <div class="parts flex flex-wrap gap-20px">
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="#" class="step-box">

                </a>
            </div>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">sss</div>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">sss</div>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">sss</div>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">sss</div>
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">sss</div>
        </div>
    </div>
</div>

<div class="theme-content">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>

        <h2>Modul părinte</h2>
        <?php
        $parent_module = get_field('parent_module');

        print_r($parent_module);

        if ($parent_module) : ?>
            <a href="<?php echo get_permalink($parent_module->ID); ?>"><?php echo get_the_title($parent_module->ID); ?></a>
        <?php endif; ?>
        <h2>Carte părinte</h2>
        <?php
        $parent_book = get_field('parent_book');
        if ($parent_book) : ?>
            <a href="<?php echo get_permalink($parent_book->ID); ?>"><?php echo get_the_title($parent_book->ID); ?></a>
        <?php endif; ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
