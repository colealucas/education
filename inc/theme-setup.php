<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function education_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on education, use a find and replace
		* to change 'education' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'education', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary', 'education' ),
			'footer-menu' => esc_html__( 'Footer', 'education' ),
			'mobile-menu' => esc_html__( 'Mobile', 'education' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'education_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'education_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function education_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'education_content_width', 1200 );
}
add_action( 'after_setup_theme', 'education_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function education_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'education' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'education' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'education_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function education_scripts() {
	wp_enqueue_style( 'education-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'education-style', 'rtl', 'replace' );

	wp_enqueue_script( 'education-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'education_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add custom column to the 'modules' post type table
add_filter('manage_module_posts_columns', function ($columns) {
	 // Create a new array with the desired order
	 $reordered_columns = [
        'cb'           => $columns['cb'], // Checkbox column
        'title'        => $columns['title'], // Title column
        'target_book'  => __('Book', 'education'), // Target Book column
        'date'         => $columns['date'], // Date column
    ];

    return $reordered_columns;

    // $columns['target_book'] = __('Target Book', 'education'); // Add new column
    // return $columns;
});

// Populate the custom column with data
add_action('manage_module_posts_custom_column', function ($column, $post_id) {
    if ($column === 'target_book') {
        // Retrieve the relationship field data (returns an array)
        $target_books = get_field('parent_book', $post_id); // Replace 'target_book' with your actual ACF field key
        
        if (!empty($target_books) && is_array($target_books)) {
            $book_titles = array_map(function ($book) {
                return get_the_title($book); // Get the title of each related book
            }, $target_books);
            
            echo implode(', ', $book_titles); // Display the book titles separated by commas
        } else {
            echo __('Not Assigned', 'education'); // Fallback if no books are assigned
        }
    }
}, 10, 2);

// Make the column sortable (optional)
add_filter('manage_edit-modules_sortable_columns', function ($columns) {
    $columns['target_book'] = 'target_book';
    return $columns;
});

add_action('restrict_manage_posts', function ($post_type) {
    // Apply the filter only to the 'module' post type
    if ($post_type === 'module') {
        // Fetch all books (assuming 'parent_book' points to books)
        $books = get_posts([
            'post_type' => 'book', // Replace 'book' with the post type for books
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        if (!empty($books)) {
            echo '<select name="filter_by_book">';
            echo '<option value="">' . __('All Books', 'education') . '</option>';
            
            foreach ($books as $book) {
                $selected = (isset($_GET['filter_by_book']) && $_GET['filter_by_book'] == $book->ID) ? ' selected="selected"' : '';
                echo '<option value="' . esc_attr($book->ID) . '"' . $selected . '>' . esc_html($book->post_title) . '</option>';
            }

            echo '</select>';
        }
    }
});

add_action('pre_get_posts', function ($query) {
    global $pagenow;

    if (
        is_admin() &&
        $pagenow === 'edit.php' &&
        $query->is_main_query() &&
        $query->get('post_type') === 'module' &&
        !empty($_GET['filter_by_book'])
    ) {
        $book_id = intval($_GET['filter_by_book']);
        
        // Modify the query to filter by the selected book
        $query->set('meta_query', [
            [
                'key' => 'parent_book', // Replace with your ACF field key
                'value' => $book_id,
                'compare' => 'LIKE',
            ],
        ]);
    }
});


// THEME SETTINGS
add_filter('manage_theme_posts_columns', function ($columns) {
    // Add Target Module and Target Book columns to the list
    $columns['parent_module'] = __('Module', 'education');
    $columns['parent_book']   = __('Book', 'education');

    // Reorder columns
    $reordered_columns = [
        'cb'            => $columns['cb'], // Checkbox column
        'title'         => $columns['title'], // Title column
        'parent_module' => __('Module', 'education'), // Target Module column
        'parent_book'   => __('Book', 'education'), // Target Book column
        'date'          => $columns['date'], // Date column
    ];

    return $reordered_columns;
});

add_action('manage_theme_posts_custom_column', function ($column, $post_id) {
    if ($column === 'parent_module') {
        // Retrieve the parent module (relationship field)
        $parent_modules = get_field('parent_module', $post_id);
        
        if (!empty($parent_modules) && is_array($parent_modules)) {
            $module_titles = array_map(function ($module) {
                return get_the_title($module);
            }, $parent_modules);
            echo implode(', ', $module_titles); // Display module titles separated by commas
        } else {
            echo __('Not Assigned', 'education');
        }
    }

    if ($column === 'parent_book') {
        // Retrieve the parent book via the related module's parent_book field
        $parent_book = get_field('parent_book', $post_id);

		//print_r($parent_book[0]->post_title);

        if (!empty($parent_book) && is_array($parent_book)) {
            echo ($parent_book[0] ? $parent_book[0]->post_title : '');
        } else {
            echo __('Not Assigned', 'education');
        }
    }
}, 10, 2);


// make sortable (optional)
add_filter('manage_edit-theme_sortable_columns', function ($columns) {
    $columns['parent_module'] = 'parent_module';
    return $columns;
});

// Add dropdown filters
add_action('restrict_manage_posts', function ($post_type) {
    // Apply the filter only to the 'theme' post type
    if ($post_type === 'theme') {
        // Fetch all modules
        $modules = get_posts([
            'post_type' => 'module',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        if (!empty($modules)) {
            echo '<select name="filter_by_module">';
            echo '<option value="">' . __('All Modules', 'education') . '</option>';
            
            foreach ($modules as $module) {
                $selected = (isset($_GET['filter_by_module']) && $_GET['filter_by_module'] == $module->ID) ? ' selected="selected"' : '';
                echo '<option value="' . esc_attr($module->ID) . '"' . $selected . '>' . esc_html($module->post_title) . '</option>';
            }

            echo '</select>';
        }

        // Fetch all target books
        $books = get_posts([
            'post_type' => 'book', // Replace with your 'target_book' post type
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        if (!empty($books)) {
            echo '<select name="filter_by_book">';
            echo '<option value="">' . __('All Books', 'education') . '</option>';
            
            foreach ($books as $book) {
                $selected = (isset($_GET['filter_by_book']) && $_GET['filter_by_book'] == $book->ID) ? ' selected="selected"' : '';
                echo '<option value="' . esc_attr($book->ID) . '"' . $selected . '>' . esc_html($book->post_title) . '</option>';
            }

            echo '</select>';
        }
    }
});

// Modify the query
add_action('pre_get_posts', function ($query) {
    global $pagenow;

    if (
        is_admin() &&
        $pagenow === 'edit.php' &&
        $query->is_main_query() &&
        $query->get('post_type') === 'theme'
    ) {
        $meta_query = [];

        // Filter by module if selected
        if (!empty($_GET['filter_by_module'])) {
            $module_id = intval($_GET['filter_by_module']);
            $meta_query[] = [
                'key' => 'parent_module', // Replace with your ACF field key
                'value' => $module_id,
                'compare' => 'LIKE',
            ];
        }

        // Filter by book if selected
        if (!empty($_GET['filter_by_book'])) {
            $book_id = intval($_GET['filter_by_book']);
            $meta_query[] = [
                'key' => 'parent_book', // Replace with your ACF field key
                'value' => $book_id,
                'compare' => 'LIKE',
            ];
        }

        if (!empty($meta_query)) {
            $query->set('meta_query', $meta_query);
        }
    }
});

// Custom TinyMCE settings, allow only <p> tags in tables
function custom_tinymce_settings($settings) {
    $settings['valid_children'] = '+body[style],+td[p]'; 
    return $settings;
}
add_filter('tiny_mce_before_init', 'custom_tinymce_settings');