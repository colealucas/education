<?php 
/**
 * Single book template
 */

get_header();

$get_static_text = [
    'ro' => [
        'subjects' => 'Subiecte',
        'go_back' => 'Înapoi la Module',
        'access_theme' => 'Accesează Tema',
        'autoevaluation' => 'Autoevaluare',
        'criteria_title' => 'Criterii de succes',
        'unit' => 'Unitatea de învățare',
        'success_criteria' => 'Criterii de succes',
        'green_state' => 'Verde/independent',
        'yellow_state' => 'Galben/ghidat, ajutat',
        'red_state' => 'Roșu/mult ajutor',
        'explore_subjects' => 'Explorează Subiectele',
    ],
    'ru' => [
        'subjects' => 'Предметы',
        'go_back' => 'Назад к модулям',
        'access_theme' => 'Открыть Тему',
        'autoevaluation' => 'Автооценка',
        'criteria_title' => 'Критерии успеха',
        'unit' => 'Учебный модуль',
        'success_criteria' => 'Критерии успеха',
        'green_state' => 'Зелёный/независимый',
        'yellow_state' => 'Жёлтый/под руководством, с помощью',
        'red_state' => 'Красный/много помощи',
        'explore_subjects' => 'Исследуйте Предметы',
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
    // 'orderby' => 'id',
    // 'order' => 'DESC',
    'fields' => 'ids', // This retrieves only post IDs instead of full post objects
));

// Get the count of posts
$themes_count = $all_themes->found_posts;

$current_module_title = '';
?>

<div class="section py-40px bg-primary-light rounded-24px mx-8px mt-34px module-intro-section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); 
                $current_module_title = get_the_title();
            ?>
                    
            <div class="row min-h-[325px] items-center">
                <div class="col-lg-6">
                    <div class="max-w-[539px]">
                        <div class="go-back">
                            <a href="<?php echo $parent_book_url ; ?>" class="flex items-center gap-8px text-primary hover:text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                    <path d="M12.8334 7.50002H1.16669M1.16669 7.50002L7.00002 13.3334M1.16669 7.50002L7.00002 1.66669" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <?php echo $get_static_text[get_lang()]['go_back']; ?>
                            </a>
                        </div>

                        <h1 class="text-36px md:text-48px font-500 leading-120 mt-8px text-primary uppercase">
                            <?php the_title(); ?>
                        </h1>

                        <div class="mt-16px text-16px text-content-spacing">
                            <?php the_content(); ?>
                        </div>

                        <div class="module-subjects-count mt-16px text-primary">
                            <?php echo $themes_count . " " . $get_static_text[get_lang()]['subjects']; ?>
                        </div>

                        <div class="mt-30px">
                            <a href="#modules" class="btn"><?php echo $get_static_text[get_lang()]['explore_subjects']; ?></a>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="module-illustration lg:text-right">
                        <?php if ( has_post_thumbnail() ) : $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                            <div class="module-thumbnail">
                                <a href="<?php echo $thumbnail_url; ?>" class="lightbox">
                                    <img class="max-h-[500px] rounded-16px mx-auto block" src="<?php echo $thumbnail_url; ?>" alt="">
                                </a>
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
                        // 'orderby' => 'id',
                        // 'order' => 'ASC'
                        'meta_key'       => 'theme_order_number', // Set the ACF field for ordering
                        'orderby'        => 'meta_value_num', // Ensure numeric sorting
                        'order'          => 'ASC', // Change to DESC if needed
                    ));
                ?>

                <?php if ( $themes->have_posts() ) : $i=0; ?>
                    <?php while ($themes->have_posts()) : $themes->the_post(); $i++; ?>

                        <div class="p-24px bg-faded-white border-1px border-solid border-border-gray mb-16px flex flex-nowrap items-center justify-between rounded-24px">
                            <div>
                                <div class="flex flex-nowrap items-center">
                                    <div>
                                        <div class="subject-num flex items-center justify-center leading-1 size-78px bg-primary-light text-primary text-32px rounded-16px">
                                            <?php echo (get_field('theme_number') ? get_field('theme_number') : $i); ?>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="<?php the_permalink(); ?>" class="block hover:text-primary font-500">
                                            <h3 class="text-30px leading-130 pl-16px pr-30px max-w-[850px]"><?php the_title(); ?></h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="<?php the_permalink(); ?>" class="btn min-w-[200px]">
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

                    <?php if( have_rows('criteria') ) :
                        $x=0;
                        $rows = (get_field('criteria') ? count( get_field('criteria') ) : 0);
                    ?>

                        <div class="mt-40px mb-24px">
                            <h2 class="text-32px font-700"><?php echo $get_static_text[get_lang()]['autoevaluation']; ?></h2>
                        </div>

                        <div class="module-sum-item">
                            <div class="sum-module-header cursor-pointer bg-light-gray flex items-center gap-16px rounded-16px border-1px border-solid border-medium-gray justify-between py-16px px-20px">
                                <div>
                                    <div class="text-24px flex items-center font-500 leading-160 select-none cursor-pointer">
                                        <div class="max-w-[890px] leading-130">
                                            <?php echo $get_static_text[get_lang()]['criteria_title']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="size-40px flex items-center justify-center module-sum-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                            <path d="M10 15L20 25L30 15" stroke="#171412" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="sum-module-body hide">
                                <div class="py-20px text-dark text-16px">
                                    <table class="text-left cells-border table-spacing border-0">
                                        <tr>
                                            <th style="border:0"></th>
                                            <th style="border:0"></th>
                                            <th class="text-center border-0" style="border:0">
                                                <svg style="transform: scaleX(-1);" class="inline-block" width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M512.002 512.002m-491.988 0a491.988 491.988 0 1 0 983.976 0 491.988 491.988 0 1 0-983.976 0Z" fill="#FDDF6D" />
                                                    <path d="M617.43 931.356c-271.716 0-491.986-220.268-491.986-491.986 0-145.168 62.886-275.632 162.888-365.684C129.054 155.124 20.014 320.828 20.014 512c0 271.716 220.268 491.986 491.986 491.986 126.548 0 241.924-47.796 329.098-126.298-67.106 34.31-143.124 53.668-223.668 53.668z" fill="#FCC56B" />
                                                    <path d="M583.584 842.35c-109.984 0-199.146-89.162-199.146-199.146h398.292c0 109.984-89.162 199.146-199.146 199.146z" fill="#7F184C" />
                                                    <path d="M426.314 359.704m-60.044 0a60.044 60.044 0 1 0 120.088 0 60.044 60.044 0 1 0-120.088 0Z" fill="#FFFFFF" />
                                                    <path d="M764.374 359.704m-60.044 0a60.044 60.044 0 1 0 120.088 0 60.044 60.044 0 1 0-120.088 0Z" fill="#FFFFFF" />
                                                    <path d="M587.53 759.732c-53.832-25.01-113.568-21.376-162.01 4.564 36.4 47.442 93.642 78.058 158.06 78.058a198.412 198.412 0 0 0 79.806-16.684c-17.928-27.748-43.638-50.97-75.856-65.938z" fill="#FC4C59" />
                                                    <path d="M300.572 481.542c-36.536 0-66.156 29.62-66.156 66.156h132.314c0-36.536-29.618-66.156-66.158-66.156zM877.628 472.678c-36.536 0-66.156 29.62-66.156 66.156h132.314c-0.002-36.538-29.622-66.156-66.158-66.156z" fill="#F9A880" />
                                                    <path d="M436.782 643.204v31.086c0 13.108 10.626 23.732 23.732 23.732H714.16c13.108 0 23.732-10.626 23.732-23.732v-31.086H436.782z" fill="#F2F2F2" />
                                                    <path d="M598.670912 212.010313a102.74 57.374 15.801 1 0 31.245541-110.412045 102.74 57.374 15.801 1 0-31.245541 110.412045Z" fill="#FCEB88" />
                                                    <path d="M935.442 224.096c-56.546-83.01-135.324-147.116-227.816-185.386-10.212-4.224-21.922 0.63-26.148 10.842-4.224 10.216 0.628 21.92 10.842 26.148 85.266 35.28 157.894 94.39 210.04 170.934 53.388 78.38 81.612 170.14 81.612 265.368 0 260.248-211.724 471.97-471.97 471.97S40.03 772.244 40.03 512 251.752 40.03 512 40.03c11.054 0 20.014-8.962 20.014-20.014S523.054 0 512 0C229.68 0 0 229.68 0 512s229.68 512 512 512 512-229.68 512-512c0-103.3-30.622-202.856-88.558-287.904z" fill="" />
                                                    <path d="M506.386 359.712c0-44.144-35.914-80.058-80.058-80.058s-80.058 35.914-80.058 80.058c0 44.144 35.914 80.058 80.058 80.058s80.058-35.914 80.058-80.058z m-120.088 0c0-22.072 17.958-40.03 40.03-40.03s40.03 17.958 40.03 40.03c0 22.072-17.958 40.03-40.03 40.03s-40.03-17.958-40.03-40.03zM844.43 359.712c0-44.144-35.914-80.058-80.058-80.058s-80.058 35.914-80.058 80.058c0 44.144 35.914 80.058 80.058 80.058s80.058-35.914 80.058-80.058z m-120.088 0c0-22.072 17.958-40.03 40.03-40.03s40.03 17.958 40.03 40.03c0 22.072-17.958 40.03-40.03 40.03s-40.03-17.958-40.03-40.03zM364.422 643.204c0 120.846 98.314 219.16 219.16 219.16s219.16-98.314 219.16-219.16c0-11.054-8.962-20.014-20.014-20.014H384.436c-11.052-0.002-20.014 8.96-20.014 20.014z m397.182 20.014c-9.984 89.39-86.012 159.116-178.022 159.116-92.008 0-168.038-69.726-178.022-159.116h356.044z" fill="" />
                                                    <path d="M628.862 33.734m-20.014 0a20.014 20.014 0 1 0 40.028 0 20.014 20.014 0 1 0-40.028 0Z" fill="" />
                                                </svg>
                                            </th>
                                            
                                            <th class="text-center border-0" style="border:0">
                                                <svg style="transform: scaleX(-1);" class="inline-block" width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M512.003 512.003m-491.986961 0a491.986961 491.986961 0 1 0 983.973922 0 491.986961 491.986961 0 1 0-983.973922 0Z" fill="#FDDF6D" />
                                                    <path d="M617.431206 931.355819c-271.716531 0-491.984961-220.26843-491.984961-491.984961 0-145.168284 62.886123-275.632538 162.888318-365.684714-159.280311 81.438159-268.320524 247.140483-268.320524 438.312856 0 271.716531 220.26843 491.984961 491.984961 491.984961 126.548247 0 241.924473-47.794093 329.096643-126.298247-67.100131 34.312067-143.12228 53.670105-223.664437 53.670105z" fill="#FCC56B" />
                                                    <path d="M426.846834 359.704703m-60.044118 0a60.044117 60.044117 0 1 0 120.088235 0 60.044117 60.044117 0 1 0-120.088235 0Z" fill="#FFFFFF" />
                                                    <path d="M764.881494 359.704703m-60.044117 0a60.044117 60.044117 0 1 0 120.088234 0 60.044117 60.044117 0 1 0-120.088234 0Z" fill="#FFFFFF" />
                                                    <path d="M300.574587 481.542941c-36.536071 0-66.158129 29.618058-66.158129 66.156129h132.312258c0.004-36.538071-29.618058-66.156129-66.154129-66.156129zM877.629714 472.680923c-36.536071 0-66.158129 29.618058-66.158129 66.156129h132.312258c0.002-36.538071-29.616058-66.156129-66.154129-66.156129z" fill="#F9A880" />
                                                    <path d="M604.06718 780.219524c-53.018104 0-101.998199-28.800056-127.81825-75.158147-5.380011-9.658019-1.914004-21.846043 7.744015-27.226053 9.652019-5.386011 21.846043-1.914004 27.222053 7.744015 18.764037 33.684066 54.344106 54.608107 92.852182 54.608107 37.528073 0 73.512144-21.136041 93.908183-55.160108 5.686011-9.478019 17.970035-12.562025 27.458054-6.874013 9.482019 5.684011 12.558025 17.976035 6.874013 27.458053-27.588054 46.02009-76.72415 74.608146-128.24025 74.608146z" fill="#7F184C" />
                                                    <path d="M941.751839 233.584456c-52.404102-80.728158-126.076246-144.906283-213.054416-185.592362-10.00802-4.684009-21.928043-0.362001-26.612052 9.650019-4.684009 10.01202-0.362001 21.926043 9.650019 26.608052 80.190157 37.510073 148.116289 96.686189 196.440384 171.128334 49.582097 76.386149 75.792148 165.124323 75.792148 256.622501 0 260.246508-211.726414 471.970922-471.970922 471.970922S40.030078 772.247508 40.030078 511.999 251.754492 40.030078 511.999 40.030078c11.056022 0 20.014039-8.962018 20.014039-20.014039S523.055022 0 511.999 0C229.680449 0 0 229.682449 0 511.999s229.680449 511.999 511.999 511.999 511.999-229.680449 511.999-511.999c0.004-99.250194-28.436056-195.524382-82.246161-278.414544z" fill="" />
                                                    <path d="M505.872988 359.712703c0-44.144086-35.91407-80.058156-80.058156-80.058157s-80.058156 35.91407-80.058157 80.058157 35.91407 80.058156 80.058157 80.058156 80.058156-35.91407 80.058156-80.058156z m-80.060156 40.028078c-22.072043 0-40.030078-17.958035-40.030079-40.030078s17.958035-40.030078 40.030079-40.030079 40.030078 17.958035 40.030078 40.030079-17.954035 40.030078-40.030078 40.030078zM763.859492 439.770859c44.144086 0 80.058156-35.91407 80.058156-80.058156s-35.91407-80.058156-80.058156-80.058157-80.058156 35.91207-80.058156 80.058157 35.91407 80.058156 80.058156 80.058156z m0-120.088235c22.072043 0 40.030078 17.958035 40.030078 40.030079s-17.958035 40.030078-40.030078 40.030078-40.030078-17.958035-40.030078-40.030078 17.958035-40.030078 40.030078-40.030079zM511.214998 685.583339c-5.380011-9.658019-17.570034-13.126026-27.222053-7.744015-9.658019 5.380011-13.124026 17.568034-7.744015 27.226053 25.82405 46.360091 74.802146 75.156147 127.81825 75.156147 51.512101 0 100.652197-28.586056 128.24425-74.606146 5.684011-9.478019 2.608005-21.774043-6.874013-27.458053a20.014039 20.014039 0 0 0-27.458054 6.874013c-20.39804 34.024066-56.38211 55.158108-93.908183 55.158108-38.512075 0.002-74.090145-20.922041-92.856182-54.606107z" fill="" />
                                                    <path d="M648.021266 41.978082m-20.014039 0a20.014039 20.014039 0 1 0 40.028078 0 20.014039 20.014039 0 1 0-40.028078 0Z" fill="" />
                                                </svg>
                                            </th>

                                            <th class="text-center border-0" style="border:0">
                                                <svg style="transform: scaleX(-1);" class="inline-block" width="50px" height="50px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M512.002 512.002m-491.988 0a491.988 491.988 0 1 0 983.976 0 491.988 491.988 0 1 0-983.976 0Z" fill="#FDDF6D" />
                                                    <path d="M617.432 931.356c-271.716 0-491.986-220.268-491.986-491.986 0-145.168 62.886-275.632 162.888-365.684C129.054 155.124 20.014 320.828 20.014 512c0 271.716 220.268 491.986 491.986 491.986 126.548 0 241.924-47.796 329.098-126.298-67.102 34.31-143.124 53.668-223.666 53.668z" fill="#FCC56B" />
                                                    <path d="M426.314 359.704m-142.718 0a142.718 142.718 0 1 0 285.436 0 142.718 142.718 0 1 0-285.436 0Z" fill="#FFFFFF" />
                                                    <path d="M826.554 359.704m-142.718 0a142.718 142.718 0 1 0 285.436 0 142.718 142.718 0 1 0-285.436 0Z" fill="#FFFFFF" />
                                                    <path d="M300.576 556.564c-36.536 0-66.156 29.62-66.156 66.158h132.314c-0.004-36.54-29.622-66.158-66.158-66.158zM877.628 547.698c-36.536 0-66.156 29.62-66.156 66.158h132.314c0-36.538-29.618-66.158-66.158-66.158z" fill="#F9A880" />
                                                    <path d="M390.526 285.09m-40.03 0a40.03 40.03 0 1 0 80.06 0 40.03 40.03 0 1 0-80.06 0Z" fill="#7F184C" />
                                                    <path d="M796.612 282.314m-40.03 0a40.03 40.03 0 1 0 80.06 0 40.03 40.03 0 1 0-80.06 0Z" fill="#7F184C" />
                                                    <path d="M553.388 822.268a19.932 19.932 0 0 1-10.272-2.85c-9.482-5.684-12.558-17.976-6.874-27.458 27.59-46.018 76.732-74.606 128.244-74.606a146.14 146.14 0 0 1 45.684 7.282c10.504 3.448 16.22 14.758 12.77 25.262-3.45 10.498-14.76 16.222-25.262 12.766a106.238 106.238 0 0 0-33.192-5.282c-37.528 0-73.51 21.136-93.908 55.16a20.02 20.02 0 0 1-17.19 9.726z" fill="#7F184C" />
                                                    <path d="M976.568 296.66a162.334 162.334 0 0 0-7.144-14.786c-0.916-1.814-1.79-3.65-2.724-5.452a19.944 19.944 0 0 0-3.282-4.576c-28.984-44.988-79.486-74.866-136.864-74.866-89.732 0-162.732 73-162.732 162.732 0 89.73 73 162.73 162.732 162.732 66.794 0 124.292-40.462 149.336-98.15 5.354 28.624 8.084 57.894 8.084 87.708 0 260.248-211.724 471.968-471.97 471.968S40.03 772.248 40.03 512 251.752 40.03 512 40.03c73.236 0 143.414 16.308 208.588 48.47 9.906 4.892 21.914 0.824 26.804-9.09 4.892-9.914 0.822-21.914-9.092-26.806C667.572 17.698 591.434 0 512 0 229.68 0 0 229.68 0 512c0 282.316 229.68 512 512 512s512-229.68 512-511.998c0-74.35-16.38-148.314-47.432-215.342z m-27.314 63.052c0 67.66-55.044 122.7-122.704 122.7s-122.704-55.044-122.704-122.7 55.044-122.704 122.704-122.704c46.26 0 86.612 25.742 107.516 63.646a477.884 477.884 0 0 1 5.604 11.532 121.936 121.936 0 0 1 9.584 47.526z" fill="" />
                                                    <path d="M426.326 196.98c-89.732 0-162.732 73-162.732 162.732 0 89.73 73 162.73 162.732 162.73s162.732-73 162.732-162.73c0.002-89.732-73.002-162.732-162.732-162.732z m0 285.432c-67.66 0-122.704-55.044-122.704-122.7s55.044-122.704 122.704-122.704 122.704 55.046 122.704 122.704-55.046 122.7-122.704 122.7zM543.116 819.42a20.008 20.008 0 0 0 27.458-6.878c20.398-34.026 56.38-55.16 93.908-55.16 11.358 0 22.524 1.778 33.19 5.282 10.502 3.456 21.814-2.266 25.264-12.764 3.45-10.502-2.262-21.814-12.764-25.264a145.99 145.99 0 0 0-45.69-7.282c-51.516 0-100.652 28.588-128.244 74.606-5.68 9.482-2.604 21.776 6.878 27.46z" fill="" />
                                                    <path d="M791.274 106.798m-20.014 0a20.014 20.014 0 1 0 40.028 0 20.014 20.014 0 1 0-40.028 0Z" fill="" />
                                                </svg>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th>
                                                <?php echo $get_static_text[get_lang()]['unit']; ?>
                                            </th>
                                            <th>
                                                <?php echo $get_static_text[get_lang()]['success_criteria']; ?>
                                            </th>
                                            <th class="text-center" style="background-color: #7BA97D;">
                                                <?php echo $get_static_text[get_lang()]['green_state']; ?>
                                            </th>
                                            <th class="text-center" style="background-color: #FFF302;">
                                                <?php echo $get_static_text[get_lang()]['yellow_state']; ?>
                                            </th>
                                            <th class="text-center" style="background-color: #E18067;">
                                                <?php echo $get_static_text[get_lang()]['red_state']; ?>
                                            </th>
                                        </tr>

                                        <?php while( have_rows('criteria') ): the_row(); 
                                            $x++;
                                            $criteria_item = get_sub_field('criteria');
                                        ?>

                                            <?php if ($x == 1) : ?>
                                                <tr>
                                                    <td rowspan="<?php echo $rows; ?>">
                                                      <span class="text-primary text-18px font-600"><?php echo $current_module_title; ?></span>
                                                    </td>
                                                    <td><?php echo $criteria_item; ?></td>
                                                    <td class="text-center">
                                                        <label class="custom-checkbox green-checkbox">
                                                            <input type="checkbox" name="evaluate_green[]" value="1">
                                                            <span class="checkbox-mark"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="custom-checkbox orange-checkbox">
                                                            <input type="checkbox" name="evaluate_green[]" value="1">
                                                            <span class="checkbox-mark"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="custom-checkbox red-checkbox">
                                                            <input type="checkbox" name="evaluate_green[]" value="1">
                                                            <span class="checkbox-mark"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <tr>
                                                    <td><?php echo $criteria_item; ?></td>
                                                    <td class="text-center">
                                                        <label class="custom-checkbox green-checkbox">
                                                            <input type="checkbox" name="evaluate_green[]" value="1">
                                                            <span class="checkbox-mark"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="custom-checkbox orange-checkbox">
                                                            <input type="checkbox" name="evaluate_green[]" value="1">
                                                            <span class="checkbox-mark"></span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <label class="custom-checkbox red-checkbox">
                                                            <input type="checkbox" name="evaluate_green[]" value="1">
                                                            <span class="checkbox-mark"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>

                <?php else : ?>

                    <div class="col-md-12">
                        <strong><?php _e('No themes found', 'education'); ?>.</strong>
                    </div>    

                <?php endif; ?>    
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
