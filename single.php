<?php get_header(); ?>

<!-- Hero Section -->
<section id="singleHero">
    <?php $thumb = get_the_post_thumbnail_url();  ?>
    <div class="hero_wrapper relative h-[90vh] -mt-20" style="background-image: url('<?php echo $thumb;?>')">
    </div>
</section>

<!-- Credentials Section -->
<section id="singleCredentials" class="my-16">
    <div class="container mx-auto">
        <div class="mx-10">
            <!-- Project Heading -->
            <h1 class="singleCredentials_title connectAndJoinSection_cardTitle font-prompt text-white pb-7"><?php the_title(); ?></h1>
            <!-- ACF repeater field for credentials -->
            <?php
                if( have_rows('project_single_credentials') ):

                    

                    while( have_rows('project_single_credentials') ) : the_row();

                        $projectSingleRole = get_sub_field('project_single_credentials_role');
                        $projectSingleName = get_sub_field('project_single_credentials_name'); 
                        
                        ?>


                        <div class="singleCredentials_wrapper singleCredentials_wrapper-<?php echo $i; ?> flex items-center">
                            <h3 class="font-normal text-white font-jost thentwrkTheme_paragraph w-[250px] py-7"><?php echo $projectSingleRole; ?></h3>
                            <h3 class="font-normal text-white font-jost thentwrkTheme_paragraph"><?php echo $projectSingleName; ?></h3>
                        </div>

                    <?php 

                    // End loop.
                    endwhile;

                // No value.
                else :
                    // Do something...
                endif;
            ?>

            <div class="projectsPosts_single_loadMore pt-5 pb-16 flex justify-center">
                <a class="projectsPostsSingle_loadMore__button projectsPosts_loadMore__button text-white font-jost thentwrkTheme_paragraph flex justify-center items-center h-[50px]" type="button" href=""><span class="projectPosts_loadMore__plus mb-2 mx-2">+</span>Load More</a>
            </div>
        </div>
    </div>
</section>

<!-- More of our work section -->
<section id="moreWork">
    <div class="container mx-auto">
        <div class="mx-10">
            <h2 class="singleCredentials_title connectAndJoinSection_cardTitle font-prompt text-white pb-5">View more of our work</h2>
        </div>
    </div>
</section>


<?php get_footer(); ?>