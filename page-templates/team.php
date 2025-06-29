<?php
/**
 * Template name: Echipa 
 * 
 */

 get_header(); 
 ?>

<section class="team-section py-40px md:py-72px">
    <div class="container">
        <h1 class="text-36px md:text-64px text-center font-700"><span><?php echo get_field('page_title'); ?></span></h1>
       
        <?php if( have_rows('add_team_members') ) : ?>
            <?php while( have_rows('add_team_members') ): the_row();
                $title = get_sub_field('title');
            ?>

                <div class="mt-40px md:mt-56px mb-24px">
                    <h2 class="text-28px md:text-32px font-700"><?php echo $title; ?></h2>
                </div>

                <?php if( have_rows('team_members') ): ?>
                    <div class="row">
                        <?php while( have_rows('team_members') ): the_row(); 
                            $photo = get_sub_field('photo');
                            $name = get_sub_field('name');
                            $role = get_sub_field('role');
                            $bio = get_sub_field('bio');
                        ?>
                            
                            <div class="col-md-3">
                                <div class="mb-36px">
                                    <?php if ( $photo ) : ?>
                                        <img class="rounded-24px" src="<?php echo $photo; ?>" alt="">
                                    <?php endif; ?>

                                    <h3 class="text-18px font-600 mt-16px"><?php echo $name; ?></h3>

                                    <p class="text-16px font-400 mt-8px">
                                        <?php echo $role; ?>
                                    </p>

                                    <p class="text-14px font-400 mt-8px">
                                        <?php echo $bio; ?>
                                    </p>
                                </div>
                            </div>
                            
                        <?php endwhile; ?>
                </div>
            <?php endif; ?> 
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="page-content entry-content text-content-spacing">
            <?php the_content(); ?>
        </div>
        
    </div>
</section>

<?php
get_footer();

