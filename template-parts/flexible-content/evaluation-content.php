<?php
/**
 * Theme flexible content
 * 
 */

 $get_static_text = [
    'ro' => [
        'print' => 'Printează',
        'true' => 'Adevărat',
        'false' => 'Fals',
        'true_initial' => 'A',
        'false_initial' => 'F',
        'write_here' => 'scrie aici...',
        'add_field' => '+ Adaugă câmp',
        'founded_words' => 'Cuvinte găsite:',
    ],
    'ru' => [
        'print' => 'Распечатать',
        'true' => 'Правда',
        'false' => 'Ложь',
        'true_initial' => 'П',
        'false_initial' => 'Л',
        'write_here' => 'пиши здесь...',
        'add_field' => '+ Добавить поле',
        'founded_words' => 'Найденные слова',
    ]
];

?>

<?php if( get_row_layout() == 'text_content' ) :  // text_content section
    $css_classes      = [];
    $section_title    = get_sub_field('title');
    $section_content  = get_sub_field('content');
    $full_with_images = get_sub_field('full_with_images');
    $check_paragraphs = get_sub_field('check_paragraphs');
    $add_signs        = get_sub_field('add_custom_signs');
    $custom_signs     = get_sub_field('custom_signs');
    $custom_signs_json = htmlspecialchars(json_encode($custom_signs, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8');
    $enable_words_hunt = get_sub_field('enable_words_hunt');
    $add_plus         = get_sub_field('add_plus');
    $add_cards        = get_sub_field('add_cards');
    $add_exclamation  = get_sub_field('add_exclamation');
    $add_exclamation_interogation = get_sub_field('add_exclamation_interogation');
    $add_four_options = get_sub_field('add_four_options');
    $split_variants   = get_sub_field('split_variants');
    $click_words      = get_sub_field('click_words');
    $add_table_boders = get_sub_field('add_table_boders');
    $add_dropdown_game = get_sub_field('add_dropdown_game');
    $add_reactions = get_sub_field('add_reactions');
    $dropdown_words_repeater = get_sub_field('dropdown_words');
    $dropdown_words = [];

    if ($dropdown_words_repeater) {
        foreach ($dropdown_words_repeater as $word) {
            $dropdown_words[] = $word['word'];
        }
    }
    $dropdown_words_json = htmlspecialchars(json_encode($dropdown_words, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8');

    $background_color = (get_sub_field('background_color') ? get_sub_field('background_color') : 'transparent');

    if ($full_with_images) {
        $css_classes[] = 'full-width-images';
    }

    if ($check_paragraphs) {
        $css_classes[] = 'check-paragraphs';
    }

    if ($add_signs) {
        $css_classes[] = 'add-signs';
    }

    if ($add_plus) {
        $css_classes[] = 'add-plus';
    }

    if ($add_cards) {
        $css_classes[] = 'add-cards';
    }

    if ($add_exclamation) {
        $css_classes[] = 'add-exclamation';
    }

    if ($add_exclamation_interogation) {
        $css_classes[] = 'add-exclamation-interogation';
    }
    
    if ($add_four_options) {
        $css_classes[] = 'add-four-options';
    }

    if ($split_variants) {
        $css_classes[] = 'split-variants';
    }

    if ($click_words) {
        $css_classes[] = 'click-words';
    }

    if ($add_table_boders) {
        $css_classes[] = 'table-borders';
    }

    if ($add_dropdown_game) {
        $css_classes[] = 'dropdown-game';
    }

    if ($add_reactions) {
        $css_classes[] = 'add-reactions';
    }

    // convert array of classes to string
    $addition_classes = implode(' ', $css_classes);

    $reacions = get_sub_field('reactions');
    $content_functions = get_sub_field('content_functions');
?>

    <div class="flexible-content-section text-content-section my-20px <?php echo ($content_functions ? 'correct-answers' : ''); ?>">
        <?php if (strlen(trim($section_title))) : ?>
            <div class="tcs-heading mb-16px bg-primary text-white py-20px px-24px rounded-16px">
                <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                    <span class="w-30px block">
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                            <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="w-[calc(100%-42px)] block">
                        <?php echo ($enable_words_hunt ? replaceBracketsWithSpans($section_title) : $section_title); ?>
                    </span>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($enable_words_hunt) : ?>
            <div class="words-hunt-stats">
                <?php echo $get_static_text[get_lang()]['founded_words']; ?> <strong class="words-hunt-total">1/1</strong>
            </div>
        <?php endif; ?>

        <?php if ( strlen(trim($section_content)) ) : ?>
            <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video <?php echo $addition_classes; ?> <?php if (strlen($background_color) && strtolower($background_color) != 'rgb(255,255,255)' && strtolower($background_color) != '#ffffff') :  ?> p-20px rounded-16px <?php endif; ?>" <?php if (strlen($background_color) && strtolower($background_color) != 'rgb(255,255,255)') :  ?>style="background-color: <?php echo $background_color; ?>"<?php endif; ?> data-dropdown-words="<?php echo $dropdown_words_json; ?>" data-custom-signs="<?php echo $custom_signs_json; ?>">
                <?php echo ($enable_words_hunt ? replaceBracketsWithSpans($section_content) : $section_content); ?>
            </div>

            <?php if ($reacions) : ?>
                <div class="reactions-wrap flex flex-wrap justify-center gap-8px border-t-1px border-solid border-medium-gray pt-16px border-b-1px pb-16px">
                    <?php foreach ($reacions as $reaction) : ?>
                        <div class="reaction-item min-h-42px py-8px px-12px text-14px font-600 leading-1 select-none cursor-pointer inline-flex items-center justify-center gap-8px hover:text-primary hover:bg-primary-light hover:border-green border-1px border-solid border-medium-gray rounded-8px">
                            <?php if ($reaction['reaction_type'] == 'sad') : ?>
                                <span class="reaction-emoji text-30px">
                                    <svg width="30" height="30" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512.004 512.002m-491.988 0a491.988 491.988 0 1 0 983.976 0 491.988 491.988 0 1 0-983.976 0Z" fill="#FDDF6D" /><path d="M617.43 931.354c-271.716 0-491.986-220.268-491.986-491.986 0-145.168 62.886-275.632 162.888-365.684C129.056 155.124 20.016 320.824 20.016 512c0 271.716 220.268 491.986 491.986 491.986 126.548 0 241.924-47.796 329.098-126.298-67.106 34.308-143.124 53.666-223.67 53.666z" fill="#FCC56B" /><path d="M735.828 834.472H496.912c-11.056 0-20.014-8.958-20.014-20.014s8.958-20.014 20.014-20.014h238.914c11.056 0 20.014 8.958 20.014 20.014s-8.956 20.014-20.012 20.014zM442.172 628.498c-48.674 0-92.65-12.454-117.634-33.316-8.486-7.082-9.62-19.706-2.536-28.188 7.082-8.484 19.702-9.62 28.188-2.536 17.472 14.586 53.576 24.012 91.98 24.012 37.486 0 74.086-9.604 93.242-24.464 8.732-6.776 21.3-5.188 28.08 3.546 6.776 8.732 5.188 21.304-3.546 28.08-26.524 20.58-70.554 32.866-117.774 32.866zM789.346 628.498c-48.674 0-92.65-12.454-117.634-33.316-8.486-7.082-9.62-19.706-2.536-28.188s19.706-9.62 28.188-2.536c17.472 14.586 53.576 24.012 91.98 24.012 37.486 0 74.086-9.604 93.242-24.464 8.73-6.776 21.304-5.188 28.08 3.546 6.776 8.732 5.188 21.304-3.546 28.08-26.526 20.58-70.554 32.866-117.774 32.866zM347.382 526.08c-7.438 0-14.36-0.836-20.53-2.544-10.654-2.946-16.9-13.972-13.954-24.628 2.948-10.654 13.984-16.904 24.628-13.954 9.852 2.73 30.072 0.814 53.044-9.608 22.486-10.194 37.75-24.62 42.904-34.39 5.156-9.78 17.26-13.528 27.038-8.368 9.778 5.156 13.524 17.264 8.368 27.038-10.488 19.886-33.582 39.392-61.778 52.178-20.608 9.346-41.672 14.276-59.72 14.276zM878.98 526.08c-18.05 0-39.108-4.928-59.724-14.278-28.194-12.782-51.288-32.288-61.774-52.174-5.158-9.776-1.41-21.882 8.368-27.038 9.778-5.164 21.882-1.406 27.038 8.368 5.156 9.77 20.418 24.194 42.898 34.388 22.974 10.42 43.2 12.338 53.044 9.61 10.666-2.938 21.68 3.298 24.628 13.952 2.946 10.654-3.298 21.68-13.952 24.628-6.166 1.706-13.09 2.544-20.526 2.544z" fill="#7F184C" /><path d="M711.124 40.168c-10.176-4.304-21.922 0.464-26.224 10.646s0.464 21.926 10.646 26.224c175.212 74.03 288.428 244.764 288.428 434.96 0 260.248-211.724 471.97-471.968 471.97S40.03 772.244 40.03 511.998 251.756 40.03 512.002 40.03c11.056 0 20.014-8.958 20.014-20.014S523.058 0 512.002 0c-282.32 0-512 229.68-512 511.998 0 282.32 229.68 512.002 512 512.002C794.318 1024 1024 794.32 1024 512c0.002-206.322-122.812-391.528-312.876-471.832z" fill="" /><path d="M496.912 794.444c-11.056 0-20.014 8.958-20.014 20.014s8.958 20.014 20.014 20.014h238.914c11.056 0 20.014-8.958 20.014-20.014s-8.958-20.014-20.014-20.014H496.912zM350.194 564.46c-8.488-7.088-21.106-5.948-28.188 2.536-7.086 8.486-5.948 21.106 2.536 28.188 24.984 20.86 68.96 33.316 117.634 33.316 47.218 0 91.248-12.286 117.778-32.864 8.734-6.776 10.322-19.348 3.546-28.08-6.778-8.738-19.348-10.32-28.08-3.546-19.158 14.858-55.758 24.464-93.242 24.464-38.408-0.002-74.514-9.43-91.984-24.014zM671.714 595.184c24.984 20.86 68.96 33.316 117.634 33.316 47.218 0 91.248-12.286 117.778-32.864 8.734-6.776 10.322-19.348 3.546-28.08-6.776-8.738-19.35-10.32-28.08-3.546-19.158 14.858-55.758 24.464-93.242 24.464-38.404 0-74.508-9.426-91.98-24.012-8.486-7.088-21.104-5.948-28.188 2.536-7.09 8.48-5.954 21.104 2.532 28.186zM347.382 526.08c18.048 0 39.108-4.926 59.718-14.272 28.196-12.786 51.294-32.29 61.778-52.176 5.158-9.776 1.41-21.882-8.368-27.038-9.778-5.164-21.882-1.41-27.038 8.368-5.156 9.77-20.418 24.194-42.904 34.388-22.972 10.42-43.19 12.34-53.042 9.608-10.646-2.936-21.68 3.298-24.628 13.952-2.946 10.65 3.296 21.68 13.952 24.628 6.17 1.704 13.094 2.542 20.532 2.542zM819.26 511.808c20.616 9.346 41.674 14.272 59.722 14.272 7.434 0 14.362-0.836 20.532-2.546 10.65-2.948 16.896-13.976 13.946-24.628a20.004 20.004 0 0 0-24.628-13.946c-9.842 2.714-30.062 0.812-53.042-9.61-22.48-10.192-37.746-24.618-42.898-34.388-5.156-9.778-17.26-13.53-27.038-8.368-9.778 5.156-13.524 17.264-8.368 27.038 10.482 19.888 33.576 39.39 61.774 52.176z" fill="" /><path d="M638.204 37.682m-20.014 0a20.014 20.014 0 1 0 40.028 0 20.014 20.014 0 1 0-40.028 0Z" fill="" /></svg>
                                </span>

                            <?php elseif ($reaction['reaction_type'] == 'admiration') : ?>
                                <span class="reaction-emoji text-30px">
                                    <svg width="30" height="30" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M486.344 546.52m-458.818 0a458.818 458.818 0 1 0 917.636 0 458.818 458.818 0 1 0-917.636 0Z" fill="#FDDF6D" /><path d="M584.658 937.602c-253.398 0-458.816-205.418-458.816-458.816 0-135.38 58.646-257.05 151.906-341.03C129.208 213.704 27.52 368.234 27.52 546.518c0 253.398 205.418 458.816 458.816 458.816 118.018 0 225.614-44.572 306.91-117.784-62.58 31.998-133.474 50.052-208.588 50.052z" fill="#FCC56B" /><path d="M332.348 36.48l55.87 113.202a31.95 31.95 0 0 0 24.06 17.48l124.926 18.152c26.212 3.808 36.676 36.02 17.71 54.508l-90.398 88.116a31.96 31.96 0 0 0-9.19 28.284l21.34 124.42c4.478 26.104-22.924 46.012-46.368 33.688l-111.738-58.744a31.944 31.944 0 0 0-29.74 0l-111.738 58.744c-23.444 12.324-50.844-7.584-46.368-33.688l21.34-124.42a31.96 31.96 0 0 0-9.19-28.284l-90.398-88.116c-18.966-18.488-8.502-50.698 17.71-54.508l124.926-18.152a31.956 31.956 0 0 0 24.06-17.48l55.87-113.202c11.724-23.752 45.594-23.752 57.316 0zM845.892 187.926l36.224 73.394a20.72 20.72 0 0 0 15.6 11.334l80.996 11.77c16.992 2.468 23.78 23.354 11.482 35.34l-58.61 57.128a20.726 20.726 0 0 0-5.958 18.34l13.834 80.666c2.902 16.926-14.862 29.832-30.062 21.84l-72.444-38.088a20.714 20.714 0 0 0-19.282 0l-72.444 38.088c-15.198 7.992-32.966-4.916-30.062-21.84l13.834-80.666a20.726 20.726 0 0 0-5.958-18.34l-58.61-57.128c-12.296-11.986-5.51-32.87 11.482-35.34l80.996-11.77a20.712 20.712 0 0 0 15.6-11.334l36.224-73.394c7.6-15.402 29.56-15.402 37.158 0z" fill="#FFFF00" /><path d="M315.41 173.542l22.846 46.292a13.062 13.062 0 0 0 9.84 7.148l51.086 7.424c10.718 1.558 15 14.728 7.242 22.288l-36.968 36.034a13.064 13.064 0 0 0-3.758 11.568l8.726 50.88c1.832 10.674-9.374 18.814-18.962 13.776l-45.692-24.022c-3.808-2-8.354-2-12.162 0l-45.692 24.022c-9.586 5.04-20.79-3.1-18.962-13.776l8.726-50.88a13.08 13.08 0 0 0-3.758-11.568l-36.968-36.034c-7.754-7.56-3.476-20.73 7.242-22.288l51.086-7.424a13.076 13.076 0 0 0 9.84-7.148l22.846-46.292c4.798-9.71 18.648-9.71 23.442 0zM833.332 289.562l11.734 23.778a6.704 6.704 0 0 0 5.054 3.67l26.238 3.812c5.506 0.798 7.702 7.566 3.72 11.448l-18.986 18.512a6.714 6.714 0 0 0-1.932 5.94l4.482 26.134c0.94 5.482-4.816 9.664-9.738 7.076l-23.468-12.34a6.71 6.71 0 0 0-6.246 0l-23.468 12.34c-4.926 2.588-10.68-1.592-9.738-7.076l4.482-26.134a6.7 6.7 0 0 0-1.932-5.94l-18.986-18.508c-3.984-3.882-1.784-10.65 3.72-11.448l26.238-3.812a6.714 6.714 0 0 0 5.054-3.67l11.734-23.778c2.464-4.992 9.576-4.992 12.038-0.004z" fill="#FC4C59" /><path d="M579.896 849.502c-102.57 0-185.72-83.15-185.72-185.72h371.44c0 102.57-83.146 185.72-185.72 185.72z" fill="#7F184C" /><path d="M439.492 663.782v28.99c0 12.224 9.91 22.132 22.132 22.132h236.544c12.224 0 22.132-9.91 22.132-22.132v-28.99H439.492z" fill="#F2F2F2" /><path d="M583.796 772.454c-50.202-23.324-105.912-19.934-151.088 4.256 33.946 44.244 87.328 72.794 147.404 72.794a185.026 185.026 0 0 0 74.424-15.56c-16.72-25.872-40.694-47.532-70.74-61.49z" fill="#FC4C59" /><path d="M1003.222 333.126c10.814-10.54 14.634-26.01 9.968-40.372-4.668-14.362-16.852-24.634-31.796-26.806L900.4 254.18a2.056 2.056 0 0 1-1.546-1.124L862.632 179.66c-6.684-13.542-20.216-21.952-35.314-21.952-15.102 0-28.636 8.412-35.318 21.952l-0.008 0.012c-42.02-35.096-89.236-62.426-140.686-81.368-9.676-3.566-20.402 1.394-23.964 11.068-3.564 9.674 1.394 20.402 11.068 23.964 50.24 18.496 96.1 45.69 136.536 80.876l-19.168 38.838a2.046 2.046 0 0 1-1.546 1.124l-80.996 11.77c-14.944 2.172-27.126 12.444-31.794 26.804-4.666 14.362-0.846 29.832 9.968 40.372l58.61 57.13c0.482 0.47 0.704 1.152 0.592 1.816l-13.838 80.666c-2.554 14.882 3.45 29.644 15.664 38.52 6.904 5.018 14.982 7.566 23.116 7.566 6.26 0 12.55-1.508 18.364-4.564l72.444-38.088c0.598-0.316 1.31-0.314 1.908 0l72.444 38.088a39.194 39.194 0 0 0 24.84 4c0.598 9.4 0.934 18.824 0.934 28.26 0 242.702-197.452 440.15-440.15 440.15S46.186 789.22 46.186 546.518c0-80.174 21.504-157.824 62.364-225.964l21.286 20.75a13.286 13.286 0 0 1 3.822 11.764l-21.34 124.42c-3.28 19.134 4.434 38.104 20.138 49.512 8.872 6.448 19.252 9.724 29.706 9.724 8.046 0 16.132-1.942 23.606-5.868l111.738-58.744a13.292 13.292 0 0 1 12.368 0l111.738 58.744c17.18 9.032 37.612 7.556 53.31-3.852 15.704-11.408 23.418-30.382 20.138-49.512l-21.34-124.42a13.296 13.296 0 0 1 3.822-11.766l90.4-88.116c13.896-13.548 18.808-33.43 12.806-51.89-5.996-18.458-21.654-31.664-40.864-34.454l-124.928-18.152a13.3 13.3 0 0 1-10.008-7.27l-12.336-24.996a442.704 442.704 0 0 1 93.718-10.056 18.668 18.668 0 0 0 0-37.332 479.57 479.57 0 0 0-110.72 12.938L349.078 28.22C340.496 10.814 323.1 0 303.69 0s-36.804 10.814-45.394 28.218l-55.87 113.204a13.286 13.286 0 0 1-10.008 7.27l-124.926 18.156c-19.208 2.792-34.866 15.992-40.864 34.454-5.998 18.458-1.09 38.344 12.81 51.892l41.7 40.648c-47.33 75.72-72.284 162.742-72.284 252.676C8.854 809.804 223.05 1024 486.336 1024s477.482-214.196 477.482-477.482c0-33.132-3.442-66.212-10.182-98.378l-9.614-56.066a2.064 2.064 0 0 1 0.59-1.82l58.61-57.128zM62.132 212.834c0.766-2.364 3.35-7.974 10.728-9.046l124.926-18.152a50.594 50.594 0 0 0 38.114-27.692l55.87-113.202c3.3-6.688 9.434-7.408 11.918-7.408 2.486 0 8.618 0.722 11.918 7.408l55.87 113.202a50.608 50.608 0 0 0 38.114 27.692l124.926 18.152c7.382 1.072 9.962 6.684 10.732 9.046s1.976 8.42-3.364 13.624l-90.398 88.116a50.624 50.624 0 0 0-14.558 44.806l21.34 124.42c1.262 7.35-3.278 11.54-5.288 12.998-2.008 1.458-7.396 4.48-13.996 1.01l-111.738-58.744a50.592 50.592 0 0 0-47.112 0l-111.738 58.744c-6.598 3.47-11.986 0.448-13.996-1.012-2.01-1.458-6.548-5.65-5.288-12.998l21.34-124.424a50.61 50.61 0 0 0-14.558-44.806l-90.398-88.11c-5.34-5.206-4.132-11.262-3.364-13.624z m856.424 150.69a39.384 39.384 0 0 0-11.326 34.86l9.084 52.964c0.07 0.704 0.17 1.412 0.322 2.118 0.102 0.472 0.186 0.948 0.286 1.422l4.144 24.162c0.068 0.408 0.214 1.256-0.816 2.006-1.028 0.75-1.8 0.348-2.162 0.156l-72.444-38.084a39.362 39.362 0 0 0-36.65 0l-72.444 38.088c-0.366 0.194-1.134 0.592-2.162-0.156-1.03-0.75-0.884-1.6-0.816-2.008l13.84-80.672a39.38 39.38 0 0 0-11.328-34.856l-58.61-57.13c-0.298-0.288-0.916-0.89-0.52-2.106 0.394-1.214 1.246-1.338 1.654-1.398l80.996-11.77a39.388 39.388 0 0 0 29.656-21.544l25.424-51.516c0.07-0.14 0.142-0.278 0.206-0.418l10.59-21.458c0.182-0.37 0.564-1.144 1.842-1.144 1.276 0 1.658 0.774 1.84 1.144l36.224 73.394a39.386 39.386 0 0 0 29.654 21.542l80.996 11.77c0.41 0.06 1.264 0.184 1.658 1.398 0.394 1.214-0.224 1.814-0.52 2.106l-58.618 57.13z" fill="" /><path d="M375.512 663.782c0 112.698 91.686 204.386 204.386 204.386s204.386-91.686 204.386-204.386a18.666 18.666 0 0 0-18.666-18.666H394.174c-10.306 0-18.662 8.358-18.662 18.666z m370.404 18.664c-9.308 83.362-80.212 148.39-166.02 148.39s-156.712-65.028-166.02-148.39h332.04z" fill="" /><path d="M576.26 97.16m-18.666 0a18.666 18.666 0 1 0 37.332 0 18.666 18.666 0 1 0-37.332 0Z" fill="" /></svg>
                                </span>
                            <?php elseif ($reaction['reaction_type'] == 'confuzion') : ?>
                                <span class="reaction-emoji text-30px">
                                    <svg width="30" height="30" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512.002 512.002m-491.988 0a491.988 491.988 0 1 0 983.976 0 491.988 491.988 0 1 0-983.976 0Z" fill="#FDDF6D" /><path d="M617.432 931.356c-271.716 0-491.986-220.268-491.986-491.986 0-145.168 62.886-275.632 162.888-365.684C129.054 155.124 20.014 320.828 20.014 512c0 271.716 220.268 491.986 491.986 491.986 126.548 0 241.924-47.796 329.098-126.298-67.102 34.31-143.124 53.668-223.666 53.668z" fill="#FCC56B" /><path d="M426.314 359.704m-142.718 0a142.718 142.718 0 1 0 285.436 0 142.718 142.718 0 1 0-285.436 0Z" fill="#FFFFFF" /><path d="M826.554 359.704m-142.718 0a142.718 142.718 0 1 0 285.436 0 142.718 142.718 0 1 0-285.436 0Z" fill="#FFFFFF" /><path d="M300.576 556.564c-36.536 0-66.156 29.62-66.156 66.158h132.314c-0.004-36.54-29.622-66.158-66.158-66.158zM877.628 547.698c-36.536 0-66.156 29.62-66.156 66.158h132.314c0-36.538-29.618-66.158-66.158-66.158z" fill="#F9A880" /><path d="M390.526 285.09m-40.03 0a40.03 40.03 0 1 0 80.06 0 40.03 40.03 0 1 0-80.06 0Z" fill="#7F184C" /><path d="M796.612 282.314m-40.03 0a40.03 40.03 0 1 0 80.06 0 40.03 40.03 0 1 0-80.06 0Z" fill="#7F184C" /><path d="M553.388 822.268a19.932 19.932 0 0 1-10.272-2.85c-9.482-5.684-12.558-17.976-6.874-27.458 27.59-46.018 76.732-74.606 128.244-74.606a146.14 146.14 0 0 1 45.684 7.282c10.504 3.448 16.22 14.758 12.77 25.262-3.45 10.498-14.76 16.222-25.262 12.766a106.238 106.238 0 0 0-33.192-5.282c-37.528 0-73.51 21.136-93.908 55.16a20.02 20.02 0 0 1-17.19 9.726z" fill="#7F184C" /><path d="M976.568 296.66a162.334 162.334 0 0 0-7.144-14.786c-0.916-1.814-1.79-3.65-2.724-5.452a19.944 19.944 0 0 0-3.282-4.576c-28.984-44.988-79.486-74.866-136.864-74.866-89.732 0-162.732 73-162.732 162.732 0 89.73 73 162.73 162.732 162.73 66.794 0 124.292-40.462 149.336-98.15 5.354 28.624 8.084 57.894 8.084 87.708 0 260.248-211.724 471.968-471.97 471.968S40.03 772.248 40.03 512 251.752 40.03 512 40.03c73.236 0 143.414 16.308 208.588 48.47 9.906 4.892 21.914 0.824 26.804-9.09 4.892-9.914 0.822-21.914-9.092-26.806C667.572 17.698 591.434 0 512 0 229.68 0 0 229.68 0 512c0 282.316 229.68 512 512 512s512-229.68 512-511.998c0-74.35-16.38-148.314-47.432-215.342z m-27.314 63.052c0 67.66-55.044 122.7-122.704 122.7s-122.704-55.044-122.704-122.7 55.044-122.704 122.704-122.704c46.26 0 86.612 25.742 107.516 63.646a477.884 477.884 0 0 1 5.604 11.532 121.936 121.936 0 0 1 9.584 47.526z" fill="" /><path d="M426.326 196.98c-89.732 0-162.732 73-162.732 162.732 0 89.73 73 162.73 162.732 162.73s162.732-73 162.732-162.73c0.002-89.732-73.002-162.732-162.732-162.732z m0 285.432c-67.66 0-122.704-55.044-122.704-122.7s55.044-122.704 122.704-122.704 122.704 55.046 122.704 122.704-55.046 122.7-122.704 122.7zM543.116 819.42a20.008 20.008 0 0 0 27.458-6.878c20.398-34.026 56.38-55.16 93.908-55.16 11.358 0 22.524 1.778 33.19 5.282 10.502 3.456 21.814-2.266 25.264-12.764 3.45-10.502-2.262-21.814-12.764-25.264a145.99 145.99 0 0 0-45.69-7.282c-51.516 0-100.652 28.588-128.244 74.606-5.68 9.482-2.604 21.776 6.878 27.46z" fill="" /><path d="M791.274 106.798m-20.014 0a20.014 20.014 0 1 0 40.028 0 20.014 20.014 0 1 0-40.028 0Z" fill="" /></svg>
                                </span>
                            <?php elseif ($reaction['reaction_type'] == 'joy') : ?>
                                <span class="reaction-emoji text-30px">
                                    <svg width="30" height="30" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512.002 512.002m-491.988 0a491.988 491.988 0 1 0 983.976 0 491.988 491.988 0 1 0-983.976 0Z" fill="#FDDF6D" /><path d="M617.43 931.356c-271.716 0-491.986-220.268-491.986-491.986 0-145.168 62.886-275.632 162.888-365.684C129.054 155.124 20.014 320.828 20.014 512c0 271.716 220.268 491.986 491.986 491.986 126.548 0 241.924-47.796 329.098-126.298-67.106 34.31-143.124 53.668-223.668 53.668z" fill="#FCC56B" /><path d="M583.584 842.35c-109.984 0-199.146-89.162-199.146-199.146h398.292c0 109.984-89.162 199.146-199.146 199.146z" fill="#7F184C" /><path d="M426.314 359.704m-60.044 0a60.044 60.044 0 1 0 120.088 0 60.044 60.044 0 1 0-120.088 0Z" fill="#FFFFFF" /><path d="M764.374 359.704m-60.044 0a60.044 60.044 0 1 0 120.088 0 60.044 60.044 0 1 0-120.088 0Z" fill="#FFFFFF" /><path d="M587.53 759.732c-53.832-25.01-113.568-21.376-162.01 4.564 36.4 47.442 93.642 78.058 158.06 78.058a198.412 198.412 0 0 0 79.806-16.684c-17.928-27.748-43.638-50.97-75.856-65.938z" fill="#FC4C59" /><path d="M300.572 481.542c-36.536 0-66.156 29.62-66.156 66.156h132.314c0-36.536-29.618-66.156-66.158-66.156zM877.628 472.678c-36.536 0-66.156 29.62-66.156 66.156h132.314c-0.002-36.538-29.622-66.156-66.158-66.156z" fill="#F9A880" /><path d="M436.782 643.204v31.086c0 13.108 10.626 23.732 23.732 23.732H714.16c13.108 0 23.732-10.626 23.732-23.732v-31.086H436.782z" fill="#F2F2F2" /><path d="M598.670912 212.010313a102.74 57.374 15.801 1 0 31.245541-110.412045 102.74 57.374 15.801 1 0-31.245541 110.412045Z" fill="#FCEB88" /><path d="M935.442 224.096c-56.546-83.01-135.324-147.116-227.816-185.386-10.212-4.224-21.922 0.63-26.148 10.842-4.224 10.216 0.628 21.92 10.842 26.148 85.266 35.28 157.894 94.39 210.04 170.934 53.388 78.38 81.612 170.14 81.612 265.368 0 260.248-211.724 471.97-471.97 471.97S40.03 772.244 40.03 512 251.752 40.03 512 40.03c11.054 0 20.014-8.962 20.014-20.014S523.054 0 512 0C229.68 0 0 229.68 0 512s229.68 512 512 512 512-229.68 512-512c0-103.3-30.622-202.856-88.558-287.904z" fill="" /><path d="M506.386 359.712c0-44.144-35.914-80.058-80.058-80.058s-80.058 35.914-80.058 80.058c0 44.144 35.914 80.058 80.058 80.058s80.058-35.914 80.058-80.058z m-120.088 0c0-22.072 17.958-40.03 40.03-40.03s40.03 17.958 40.03 40.03c0 22.072-17.958 40.03-40.03 40.03s-40.03-17.958-40.03-40.03zM844.43 359.712c0-44.144-35.914-80.058-80.058-80.058s-80.058 35.914-80.058 80.058c0 44.144 35.914 80.058 80.058 80.058s80.058-35.914 80.058-80.058z m-120.088 0c0-22.072 17.958-40.03 40.03-40.03s40.03 17.958 40.03 40.03c0 22.072-17.958 40.03-40.03 40.03s-40.03-17.958-40.03-40.03zM364.422 643.204c0 120.846 98.314 219.16 219.16 219.16s219.16-98.314 219.16-219.16c0-11.054-8.962-20.014-20.014-20.014H384.436c-11.052-0.002-20.014 8.96-20.014 20.014z m397.182 20.014c-9.984 89.39-86.012 159.116-178.022 159.116-92.008 0-168.038-69.726-178.022-159.116h356.044z" fill="" /><path d="M628.862 33.734m-20.014 0a20.014 20.014 0 1 0 40.028 0 20.014 20.014 0 1 0-40.028 0Z" fill="" /></svg>
                                </span>    
                            <?php endif; ?>

                            <?php echo $reaction['reaction_title']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php 
                // Get content functions repeater
                if ($content_functions) : ?>
                    <div class="content-functions flex flex-wrap items-center gap-8px px-20px border-t-1px border-solid border-medium-gray pt-16px border-b-1px pb-16px">
                        <?php foreach ($content_functions as $function) :
                            $function_name = $function['function_nme'];
                            $correct = $function['correct'];

                            if ($function_name) : ?>
                                <div class="content-function py-10px px-12px font-500 leading-130 rounded-20px bg-light-gray text-15px cursor-pointer border-2px border-solid border-medium-gray" data-correct="<?php echo ($correct ? 'true' : 'false'); ?>">
                                    <?php echo esc_html($function_name); ?>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>


<?php elseif( get_row_layout() == 'text_section_with_background' ) : // text_section_with_background
    $content = get_sub_field('text_content');
    $title = get_sub_field('section_title');
    $text_color = (get_sub_field('text_color') ? get_sub_field('text_color') : '#ffffff');
    $background_color = (get_sub_field('background_color') ? get_sub_field('background_color') : '#F78D1E');
?>

    <div class="flexible-content-section color-section my-20px">
        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <div class="flex flex-col gap-12px p-20px text-<?php echo $text_color; ?> rounded-16px" style="background-color: <?php echo $background_color; ?>; color: <?php echo $text_color; ?>;">
                <?php if ($title): ?>
                    <div class="text-20px font-600 leading-130">
                       <?php echo $title; ?>
                    </div>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="color-section-content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php elseif( get_row_layout() == 'remember' ) : // remember
    $content = get_sub_field('content');
    $title = get_sub_field('title');
?>

    <div class="flexible-content-section remeber-section my-20px">
        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
        
            <div class="remember-wrap flex gap-4px">
                <div class="flex rounded-12px overflow-hidden w-full">
                    <div class="text-22px font-700 text-white bg-blue p-20px min-w-[160px]">
                        <div class="flex h-full items-center justify-center">
                            <div>
                                <?php echo $title; ?>
                            </div>
                        </div>
                    </div>

                    <div class="bg-orange text-dark flex-1 p-20px font-600 italic">
                        <div class="flex h-full items-center">
                            <div class="flex-1 last-no-margin">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php elseif( get_row_layout() == 'text_area' ) : // text_area
    $placeholder = get_sub_field('placeholder');
    $rows = (get_sub_field('rows') ? get_sub_field('rows') : 10);
    $text_color = get_sub_field('text_color'); // default to black
?>

<?php if ( $text_color ) : ?>
    <style>
        .user-textarea::placeholder {
            color: inherit !important;
        }
    </style>
<?php endif; ?>

    <div class="flexible-content-section curiosity-section my-20px">
        <div class="tcs-content phase-content entry-content content-spacing text-17px responsive-video">
            <form action="#" method="POST">
                <textarea <?php echo ($text_color ? 'style="color:' . $text_color .' !important;"' : ''); ?> rows="<?php echo $rows; ?>" class="w-full p-16px border-2px border-solid border-medium-gray bg-light-gray focus:bg-white rounded-8px focus:outline-none user-textarea" name="text_area" placeholder="<?php echo $placeholder; ?>"></textarea>
            </form>
        </div>
    </div>


<?php elseif( get_row_layout() == 'boxes_with_text_game' ) : 
    $cols = get_sub_field('columns');
    $columns_per_row = (get_sub_field('cols') ? get_sub_field('cols') : 'auto');
    $cols_layout = $columns_per_row;
    $placeholder_text = get_sub_field('placeholder_text');
    $print = get_sub_field('print');

    if ($columns_per_row == 'auto') {
        $cols_layout = 'flex-1';
    }
?>

<div class="flexible-content-section boxes-with-text my-20px">
    <div class="relative print-div">
        <?php if ($print) : ?>
            <div class="print-trigger-wrap flex justify-end mb-8px">
                <a href="#" class="inline-flex leading-1 bg-light-gray py-4px px-20px rounded-8px text-15px font-600 items-center gap-4px print-trigger" data-print-trigger>
                    <span>
                        <svg fill="#000000" width="30px" height="30px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.656 6.938l-0.344 2.688h11.781l-0.344-2.688c0-0.813-0.656-1.438-1.469-1.438h-8.188c-0.813 0-1.438 0.625-1.438 1.438zM1.438 11.094h19.531c0.813 0 1.438 0.625 1.438 1.438v8.563c0 0.813-0.625 1.438-1.438 1.438h-2.656v3.969h-14.219v-3.969h-2.656c-0.813 0-1.438-0.625-1.438-1.438v-8.563c0-0.813 0.625-1.438 1.438-1.438zM16.875 25.063v-9.281h-11.344v9.281h11.344zM15.188 18.469h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 21.063h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375zM15.188 23.656h-8.125c-0.188 0-0.344-0.188-0.344-0.375v-0.438c0-0.188 0.156-0.344 0.344-0.344h8.125c0.188 0 0.375 0.156 0.375 0.344v0.438c0 0.188-0.188 0.375-0.375 0.375z"></path>
                        </svg>
                    </span>
                    <?php echo $get_static_text[get_lang()]['print']; ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="comp-wrap">
            <div class="boxes-with-text-wrap">
                <?php if ( have_rows('columns') ) : $i=0; ?>
                    <div class="bwt-wrap <?php  if ($columns_per_row == 'auto') { echo 'flex flex-wrap gap-20px'; } else { echo 'row'; } ?>">

                        <?php while ( have_rows('columns') ) : the_row(); $i++;
                            $text_content = get_sub_field('text_content');
                        ?>

                        <div class="<?php echo $cols_layout; ?>" style="<?php if ($columns_per_row == 'auto') { echo 'min-width: 250px'; } ?>">
                            <div class="bwt-col p-12px rounded-8px mb-20px">
                                <div class="relative tcs-content phase-content entry-content content-spacing text-17px responsive-video">
                                    <?php echo $text_content; ?>
                                </div>

                                <div class="mt-12px">
                                    <textarea class="border-2px border-none rounded-8px p-12px text-14px w-full min-h-[156px] outline-none hover:outline-none" name="bwt_textarea[]" placeholder="<?php echo $placeholder_text; ?>"></textarea>
                                </div>
                            </div>
                        </div>

                        <?php endwhile; ?>
                        
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<?php elseif( get_row_layout() == 'match_words_with_definition' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');
?>

    <div class="flexible-content-section match-definitions my-20px">
        <div class="theme-heading bg-primary text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="match-definitions-wrap my-20px flex flex-col gap-16px">
            <?php if( have_rows('definitions') ): ?>
                <?php while( have_rows('definitions') ): the_row();
                    $word = get_sub_field('word');
                    $def = get_sub_field('definition');
                ?>
                
                    <div class="flex flex-nowrap gap-24px">
                        <div class="w-50% placeholders-column flex items-center">
                            <div class="placeholder h-full rounded-8px text-16px font-600 flex items-center justify-center w-full min-h-[40px]" data-word="<?php echo $word; ?>"></div>
                        </div>

                        <div class="w-50% definitions-column">
                            <div class="definition rounded-8px py-16px px-20px bg-light-gray font-600 text-16px" data-word="<?php echo $word; ?>">
                                - <?php echo $def; ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

                <div class="words mt-20px bg-primary-light p-24px flex gap-10px flex-wrap justify-center rounded-8px">
                    <?php 
                        $words_data = [];

                        while( have_rows('definitions') ): the_row();
                            $word = get_sub_field('word');
                            $words_data[] = $word;
                        endwhile; 
                    ?>

                    <?php 
                        if( !empty($words_data) ) {
                            shuffle($words_data);
                        }
                    ?>
                    
                    <?php if( !empty($words_data) ) : 
                        foreach( $words_data as $the_word ) : ?>
                            <div class="word inline-flex items-center justify-center max-w-[50%] p-8px text-center rounded-8px text-16px font-600 leading-120 border-medium-gray border-2px border-solid bg-white" draggable="true" data-word="<?php echo $the_word; ?>">
                                <span class="inline-block mr-6px text-gray">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 2.89331L8.81809 6.07529L9.87875 7.13595L11.2501 5.76463V11.2499H5.7649L7.13619 9.8786L6.07553 8.81794L2.89355 11.9999L6.07553 15.1819L7.13619 14.1212L5.76485 12.7499H11.2501V18.2352L9.87875 16.8639L8.81809 17.9245L12.0001 21.1065L15.182 17.9245L14.1214 16.8639L12.7501 18.2352V12.7499H18.2353L16.8639 14.1213L17.9246 15.1819L21.1066 11.9999L17.9246 8.81796L16.8639 9.87862L18.2352 11.2499H12.7501V5.76463L14.1214 7.13595L15.182 6.07529L12.0001 2.89331Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <?php echo $the_word; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>
    </div>



<?php elseif( get_row_layout() == 'match_using_arrows' ) : // match_words_with_definition
    $section_title = get_sub_field('title');
    $section_description = get_sub_field('description');
    $left_column_terms = get_sub_field('left_column_terms');
    $right_column_items = get_sub_field('right_column_items');

    $right_col_html_items_array = [];

    if( have_rows('right_column_items') ) : $k=0;
        while( have_rows('right_column_items') ): the_row(); $k++;
            $item = get_sub_field('item');
            $right_col_html_items_array[] = '<div class="ma-item ma-item-right" data-id="' . $k . '">' . $item . '</div>';
        endwhile;
    endif;

    if ( $right_col_html_items_array ) {
        // Shuffle the array
        shuffle($right_col_html_items_array);
    }
?>

    <div class="flexible-content-section match-arrows my-20px">
        <div class="theme-heading bg-primary text-white py-20px px-24px rounded-16px mb-16px">
            <h2 class="text-20px font-500 leading-130 flex items-center gap-16px">
                <span class="w-30px block">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="currentColor"/>
                        <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="w-[calc(100%-42px)] block">
                    <?php echo $section_title; ?>
                </span>
            </h2>
        </div>

        <div class="tcs-content phase-content entry-content content-spacing text-17px">
            <?php echo $section_description; // optional ?>
        </div>

        <div class="match-arrows-game my-20px flex flex-col gap-16px">

            <div class="ma-container">
                <div class="ma-column left">
                    <?php if( have_rows('left_column_terms') ) : $i=0; ?>
                        <?php while( have_rows('left_column_terms') ): the_row(); $i++;
                            $term = get_sub_field('term');
                        ?>
                        
                        <div class="ma-item ma-item-left" data-id="<?php echo $i; ?>">
                            <?php echo $term; ?>
                        </div>
                        
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="ma-column right">
                    <?php if( $right_col_html_items_array ) : ?>
                        <?php foreach( $right_col_html_items_array as $item ) : ?>
                        
                            <?php echo $item; ?>
                        
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <svg class="ma-arrows"></svg>
            </div>

        </div>
    </div>


<?php 
endif;
