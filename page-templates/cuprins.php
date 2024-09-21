<?php
/**
 * Template name: Cuprins
 * 
 * Placeholder image api url https://via.placeholder.com/685x503
 */

 get_header();
 ?>

<section class="summary-section py-40px">
    <div class="container">        
        <div class="relative">
            <h1 class="text-48px font-700 leading-130 text-center"><?php the_title();  ?></h1>

            <div class="mt-40px">
                <?php
                    $args = array(
                        'post_type'      => 'book', // Custom post type slug
                        'posts_per_page' => -1,     // Retrieve all posts
                        'post_status'    => 'publish'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) : $i=0; ?>
                    
                        <div class="books-summary-wrap mx-auto max-w-[998px]">
                            <?php while ($query->have_posts()) : $query->the_post(); $i++; ?>
                                <div class="book-sum p-16px bg-faded-white border-1px border-solid border-border-gray rounded-24px mb-24px">
                                    <div class="book-sum-header select-none flex gap-16px justify-between items-center cursor-pointer hover:text-green">
                                        <div>
                                            <div class="flex items-center gap-16px">
                                                <div>
                                                    <div class="size-64px text-green book-sum-index rounded-12px flex items-center justify-center bg-light-green text-32px font-500 leading-1">
                                                        <?php echo $i; ?>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h2 class="text-28px font-500">
                                                        <?php the_title(); ?>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="size-40px flex items-center justify-center the-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                                    <path d="M10 15L20 25L30 15" stroke="#171412" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="book-sum-body hide mt-24px px-12px">
                                        <div class="book-sum-modules">
                                            <?php
                                                $modules = new WP_Query(array(
                                                    'post_type' => 'module',
                                                    'post_status' => 'publish',
                                                    'meta_query' => array(
                                                        array(
                                                            'key' => 'parent_book',
                                                            'value' => '"' . get_the_ID() . '"',
                                                            'compare' => 'LIKE'
                                                        ),
                                                    ),
                                                    'orderby' => 'id',
                                                    'order' => 'ASC'
                                                ));
                                            ?>

                                            <?php if ( $modules->have_posts() ) : $k=0; ?>
                                                <ul class="list-none flex flex-col gap-16px my-20px">
                                                    <?php while ($modules->have_posts()) : $modules->the_post(); $k++; ?>

                                                        <li>
                                                           <div class="module-sum-item">
                                                                <div class="sum-module-header bg-light-gray flex items-center gap-16px rounded-24px border-1px border-solid border-medium-gray justify-between py-16px px-20px">
                                                                    <div>
                                                                        <div class="text-24px font-500 leading-160">
                                                                            <?php echo $k . ". " .  get_the_title(); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="size-40px flex items-center justify-center module-sum-arrow">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                                                                <path d="M10 15L20 25L30 15" stroke="#171412" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="sum-module-body hide">
                                                                    <ol class="list-decimal list-inside text-24px font-500 leading-150 text-dark mt-20px pl-20px">
                                                                        <li>Item here too</li>
                                                                        <li>Item here too</li>
                                                                        <li>Item here too</li>
                                                                        <li>Item here too</li>
                                                                    </ol>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    
                                                    <?php
                                                        endwhile;
                                                        wp_reset_postdata();
                                                    ?>
                                                </ul>

                                                <?php else : ?>

                                                <div>
                                                    <strong><?php _e('No modules found', 'education'); ?>.</strong>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>

                    <?php 
                    wp_reset_postdata();
                    endif;
                    ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

