<?php
/**
 * Template Name: Pagina Principala
 */

 get_header();
?>

<div class="section py-64px pb-35px">
    <div class="container">
        <div class="text-center mx-auto max-w-[870px]">
            <h1 class="text-28px md:text-48px font-900 uppercase">
                <?php echo get_field('intro_title'); ?>
            </h1>
        </div>

        <div class="text-16px text-gray text-center leading-150 mt-12px">
            <?php echo get_field('intro_subtitle'); ?>
        </div>

        <div class="books-grid-wrap mt-48px">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="book-wrap rounded-56px p-36px pb-0 bg-light-gray mx-auto mb-36px lg:mb-0 max-w-[415px] md:max-w-auto overflow-hidden">
                        <h2 class="text-28px md:text-40px font-600 min-h-[110px]">
                            <a href="#" class="text-inherit hover:text-green block">Manual pentru ciclu primar. Clasele a III-a, a-IV-a.</a>
                        </h2>

                        <div class="mt-20px">
                            <a href="#" class="home-book-link">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/book.png' ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="book-wrap rounded-56px p-36px pb-0 bg-light-gray mx-auto mb-36px lg:mb-0 max-w-[415px] md:max-w-auto overflow-hidden">
                        <h2 class="text-28px md:text-40px font-600 min-h-[110px]">
                            <a href="#" class="text-inherit hover:text-green block">Educatie pentru Media</a>
                        </h2>

                        <div class="mt-20px">
                            <a href="#" class="home-book-link">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/book.png' ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="book-wrap rounded-56px p-36px pb-0 bg-light-gray mx-auto mb-36px lg:mb-0 max-w-[415px] md:max-w-auto overflow-hidden">
                        <h2 class="text-28px md:text-40px font-600 min-h-[110px]">
                            <a href="#" class="text-inherit hover:text-green block">Educatie pentru Media</a>
                        </h2>

                        <div class="mt-20px">
                            <a href="#" class="home-book-link">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/book.png' ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
