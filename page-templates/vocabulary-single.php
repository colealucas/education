<?php
/**
 * Template name: Vocabular Single
 * 
 */

 get_header();

 $letters = [
    'ro' => [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'î', 'j', 'k', 'l', 'm', 
        'n', 'o', 'p', 'q', 'r', 's', 'ș', 't', 'ț', 'u', 'v', 'w', 'x', 'y', 'z'
    ],
    'ru' => [
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 
        'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
    ],
];

$curr_lang = get_current_language();
?>

<section class="team-section py-40px md:py-50px">
    <div class="container">
        <h1 class="text-36px md:text-48px text-center font-700">
            <?php echo get_the_title(); ?>
        </h1>
        
        <div class="mt-24px">
            <div class="voc flex flex-wrap lg:flex-nowrap gap-4px lg:gap-0 justify-between bg-faded-white rounded-8px w-full">
                <?php if(is_array($letters[$curr_lang])) : $i=0; ?>
                    <?php foreach($letters[$curr_lang] as $letter) : $i++; ?>
                        <a class="text-16px text-dark bg-light-gray lg:bg-transparent leading-1 uppercase voc-letter block relative py-8px w-[32px] lg:w-auto" href="#" data-voc-letter="<?php echo trim($letter); ?>" data-voc-filter-link><?php echo $letter; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="notions mt-24px">
            <?php if( have_rows('notions') ): ?>
                <div class="row">
                    <?php while( have_rows('notions') ): the_row(); 
                        $letter = (get_sub_field('assign_letter') ? get_sub_field('assign_letter') : 'a'); // default to A letter
                        $notion = get_sub_field('notion');
                        $description = get_sub_field('description');
                    ?>
                        
                        <div class="col-md-6 col-lg-4" data-notion-box data-filter-letter="<?php echo $letter; ?>">
                            <div class="notion-box bg-faded-white rounded-16px mb-16px pb-16px">
                                <div class="notion-title text-16px cursor-pointer select-none flex justify-between p-24px pb-8px" data-notion-title>
                                    <?php echo $notion; ?>

                                    <div class="notion-icon">
                                        <span class="plus">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="plus">
                                                    <path id="Icon" d="M9.99996 4.16663V15.8333M4.16663 9.99996H15.8333" stroke="#808285" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                            </svg>
                                        </span>

                                        <span class="minus">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="minus">
                                                <path id="Icon" d="M4.16663 10H15.8333" stroke="#171412" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="notion-body text-16 text-dark leading-150 mt-8px p-24px pt-0 content-links content-list content-spacing" style="display:none" data-notion-body>
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        </div>
                        
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php
get_footer();

