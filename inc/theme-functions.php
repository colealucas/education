<?php
/**
 * Theme functions
 */

function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

function get_menu( $menu_name ) {
	if ( $menu_name ) {
		return wp_nav_menu(array(
			'theme_location' => $menu_name,
			'container' => false,
			'menu_class' => 'gr-menu-list',
		));
	}

	return false;
}

function get_random_id() {
	return substr(md5(uniqid(rand(), true)), 0, 6);
}

function custom_excerpt_length( $length ) {
    return 24; // Change this number to the desired excerpt length
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
    return ''; // Return an empty string to remove the ellipsis
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

function trim_to_max_words($string, $maxWords = 24) {
    // Split the string into an array of words
    $words = explode(' ', $string);
    
    // If the number of words is less than or equal to the max, return the original string
    if (count($words) <= $maxWords) {
        return $string;
    }
    
    // Take the first $maxWords words
    $trimmedWords = array_slice($words, 0, $maxWords);
    
    // Join the words back into a string
    $trimmedString = implode(' ', $trimmedWords);
    
    return $trimmedString;
}

function highlight_books_menu_item($classes, $item, $args) {
    // Ensure we are working with the primary menu
    if ($args->theme_location == 'primary-menu') {
        // Get the books archive URL
        $books_archive_url = get_post_type_archive_link('book');
        $books_archive_path = parse_url($books_archive_url, PHP_URL_PATH);

        // Get the URL of the current menu item
        $menu_item_url = $item->url;
        $menu_item_path = parse_url($menu_item_url, PHP_URL_PATH);

        // Check if the current path is a single book and matches the books archive path
        if (is_singular('book') && $books_archive_path === $menu_item_path) {
            $classes[] = 'current-menu-item';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'highlight_books_menu_item', 10, 3);

function get_current_language() {
    $locale = get_locale();
    $language_code = substr($locale, 0, 2);

    return $language_code;
}

function get_lang() {
    $locale = get_locale();
    $language_code = substr($locale, 0, 2);

    return $language_code;
}

function is_valid_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

/**
 * Generate letters grid
 * 
 */
function generateGrid($rows = 18, $cols = 18, $words = []) {
    // Initialize an empty grid
    $grid = array_fill(0, $rows, array_fill(0, $cols, ''));

    // Romanian letters to use for random filling
    
    if ( get_lang() == 'ru') {
        $lettersMix = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'];
    } else {
        $lettersMix = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'Î', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Z'];
    }

    // Insert words into the grid
    foreach ($words as $wordInfo) {
        $word = str_replace(' ', '', $wordInfo['word']);

        if ($wordInfo['direction'] == 'horizontal') {
            $row = $wordInfo['row'];
            $startCol = $wordInfo['start'];
            $endCol = $wordInfo['end'];

            for ($i = $startCol; $i <= $endCol; $i++) {
                $grid[$row][$i] = mb_substr($word, $i - $startCol, 1);
            }
        } elseif ($wordInfo['direction'] == 'vertical') {
            $col = $wordInfo['col'];
            $startRow = $wordInfo['start'];
            $endRow = $wordInfo['end'];

            for ($i = $startRow; $i <= $endRow; $i++) {
                $grid[$i][$col] = mb_substr($word, $i - $startRow, 1);
            }
        }
    }

    // Fill remaining empty cells with random letters
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($grid[$i][$j] === '') {
                $grid[$i][$j] = $lettersMix[array_rand($lettersMix)];
            }
        }
    }

    // Display the grid
    echo '<div class="word-grid">';

    $x=0;
    foreach ($grid as $row) : $x++; ?>

        <div class="words-row" data-row="<?php echo $x; ?>" data-word="<?php echo htmlspecialchars($word, ENT_QUOTES, 'UTF-8'); ?>">
            <?php 
            $y=0;
            foreach ($row as $letter) : $y++;
                $index_left = ($y == 1 ? $x : '');
                $index_top = ($x == 1 ? $y : '');
            ?>
                <span class="letter" data-column="<?php echo $y; ?>" data-letter="<?php echo htmlspecialchars($letter, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($letter, ENT_QUOTES, 'UTF-8'); ?> <i class="left-index"><?php echo $index_left; ?></i> <i class="top-index"><?php echo $index_top; ?></i></span>
            <?php endforeach; ?>
        </div>

    <?php
    endforeach;

    echo '</div>';
}

function replaceBracketsWithSpans($text) {
    return preg_replace_callback('/\{([^}]+)\}/', function($matches) {
        return "<span class=\"hunted-word\">{$matches[1]}</span>";
    }, $text);
}

function custom_mce_settings($initArray) {
    $initArray['invalid_elements'] = 'table[height], tr[height], td[height]';
    return $initArray;
}
add_filter('tiny_mce_before_init', 'custom_mce_settings');


function add_custom_body_class( $classes ) {
    $parent_book = get_field('parent_book');
    $parent_book_id = (is_array( $parent_book ) && $parent_book[0] ? $parent_book[0]->ID : false);

    // if this is a single theme or single module page
    if ($parent_book_id) {
        $book_target = get_field('choose_book_target', $parent_book_id);
        $classes[] = 'manual-' . $book_target;
    }
    // if this is the book page
    else if ( get_field('choose_book_target', get_the_ID() ) ) {
        $book_target = get_field('choose_book_target', get_the_ID() );
        $classes[] = 'manual-' . $book_target;
    }

    return $classes;
}
add_filter( 'body_class', 'add_custom_body_class' );
