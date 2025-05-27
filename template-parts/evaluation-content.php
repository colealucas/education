<?php
/**
 *  Evaluation Content
 */

?>

<!-- Evaluation Steps Modals -->
<?php if ( have_rows('evaluation_steps') ) : $step_count = 0; ?>
    <?php while ( have_rows('evaluation_steps') ) : the_row(); 
        $step_title = get_sub_field('step_title');
        $step_count++;
    ?>

        <div style="display: none;" id="evaluation-modal-<?php echo $step_count; ?>" class="w-[833px] p-24px rounded-24px">
            <div class="phase-bar flex items-center justify-between gap-12px mt-30px p-16px py-20px rounded-16px text-primary text-24px font-500 leading-120">
                <div class="flex gap-12px items-center">
                    <svg viewBox="0 0 32 32" width="34" height="34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M16.067 11.156c0.883 0 1.599-0.716 1.599-1.599 0-0.884-0.716-1.598-1.599-1.598s-1.599 0.714-1.599 1.598c0 0.883 0.716 1.599 1.599 1.599z" fill="currentColor"> </path> <path d="M17.153 13.289v-1.066h-3.199v1.066h1.066v9.063h-1.066v1.066h4.265v-1.066h-1.066z" fill="currentColor"> </path> <path d="M16 2.672c-7.361 0-13.328 5.968-13.328 13.328 0 7.362 5.968 13.328 13.328 13.328s13.328-5.966 13.328-13.328c0-7.361-5.968-13.328-13.328-13.328zM16 28.262c-6.761 0-12.262-5.501-12.262-12.262s5.5-12.262 12.262-12.262c6.761 0 12.262 5.501 12.262 12.262s-5.5 12.262-12.262 12.262z" fill="currentColor"> </path> </g></svg>
                    <?php echo $step_title; ?>
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
                <?php if( have_rows('evaluation_content') ): ?>
                    <?php while ( have_rows('evaluation_content') ) : the_row(); ?>

                        <?php get_template_part('template-parts/flexible-content/evaluation' , 'content'); // get flexible content sections ?>
                    
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

<?php endwhile; endif; ?>
<!-- End Evaluation Steps Modals -->

<div class="section py-32px theme-steps">
    <div class="container">
        <div class="parts flex flex-wrap gap-20px">

        <?php if ( have_rows('evaluation_steps') ) : $step_count = 0; ?>
            <?php while ( have_rows('evaluation_steps') ) : the_row(); 
                $step_title = get_sub_field('step_title');
                $step_count++;
            ?>

            <!-- Step n -->
            <div class="w-full md:w-[calc(50%-20px)] lg:w-[calc(25%-20px)] part-col">
                <a href="javascript:;" data-fancybox data-src="#evaluation-modal-<?php echo $step_count; ?>" class="step-box text-primary hover:text-primary-dark text-primary hover:text-primary-dark flex flex-col gap-20px justify-between bg-primary-light p-32px rounded-24px min-h-[300px]">
                    <span class="step-icon flex items-center justify-center size-[74px] rounded-50 bg-primary-medium">
                        <svg viewBox="0 0 32 32" width="44" height="44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M16.067 11.156c0.883 0 1.599-0.716 1.599-1.599 0-0.884-0.716-1.598-1.599-1.598s-1.599 0.714-1.599 1.598c0 0.883 0.716 1.599 1.599 1.599z" fill="currentColor"> </path> <path d="M17.153 13.289v-1.066h-3.199v1.066h1.066v9.063h-1.066v1.066h4.265v-1.066h-1.066z" fill="currentColor"> </path> <path d="M16 2.672c-7.361 0-13.328 5.968-13.328 13.328 0 7.362 5.968 13.328 13.328 13.328s13.328-5.966 13.328-13.328c0-7.361-5.968-13.328-13.328-13.328zM16 28.262c-6.761 0-12.262-5.501-12.262-12.262s5.5-12.262 12.262-12.262c6.761 0 12.262 5.501 12.262 12.262s-5.5 12.262-12.262 12.262z" fill="currentColor"> </path> </g></svg>
                    </span>

                    <h3 class="text-28px font-500 text-primary leading-120"><?php echo $step_title; ?></h3>
                </a>
            </div>

            <?php endwhile; endif; ?>
        </div>
    </div>
</div>