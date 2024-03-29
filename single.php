<?php get_header(); ?>

<!-- Hero Section -->
<?php 

    $videoUrl = get_field('project_single_vimeo_video_id');

    if($videoUrl){ ?>

    <section id="singleHero" class="relative xl:h-screen w-full 2xl:mb-28">
        <div class='embed-container'>
            <iframe src='https://player.vimeo.com/video/<?php echo $videoUrl; ?>?&autoplay=1&loop=1&controls=0&muted=1' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
    </section>

<?php } elseif (empty($videoUrl)) {?>

    <!-- Hero Section -->
    <section id="singleHeroThumbnail" class="h-screen w-full">
        <?php $thumb = get_the_post_thumbnail_url();  ?>
        <div class="hero_wrapper absolute top-0 right-0 h-screen w-full -mt-10 lg:-mt-0" style="background-image: url('<?php echo $thumb;?>')">
        </div>
    </section>

    <?php
    } else {
        echo "Unexpected value for videoUrl: " . $videoUrl;
    }
?>

<section id="singleImages" class="mb-14">
    <div class="container mx-auto">
        <div class="mx-10">
            <!-- Project Heading -->
            <h1 class="singleCredentials_title connectAndJoinSection_cardTitle font-prompt text-white pb-10"><?php the_title(); ?></h1>
            <div class="singleProject_grid grid grid-cols-3 gap-4 mx-auto">
                <?php 
                $singleImages = get_field('project_single_images');
                $size = 'project-images'; // (thumbnail, medium, large, full or custom size)
                if( $singleImages ): ?>
                        <?php foreach( $singleImages as $singleImage_id ): ?>
                                <?php echo wp_get_attachment_image( $singleImage_id, $size ); ?>
                        <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Credentials Section -->
<section id="singleCredentials" class="my-5 lg:my-0 lg:mb-16">
    <div class="container mx-auto relative">
        <div class="mx-10">
            <!-- ACF repeater field for credentials -->
            <?php
            if( have_rows('project_single_credentials') ):
                while( have_rows('project_single_credentials') ) : the_row(); 

                $projectSingleRole = get_sub_field('project_single_credentials_role');
                $projectSingleName = get_sub_field('project_single_credentials_name'); 
                
                ?>


                <div class="singleCredentials_wrapper singleCredentials_wrapper-<?php echo $i; ?> flex items-center">
                    <h3 class="singleCredentials_role font-normal text-white font-jost thentwrkTheme_paragraph w-[150px] lg:w-[250px] py-7"><?php echo $projectSingleRole; ?></h3>
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
            <!-- Line Art -->
            <div class="page_lineArt__single lineArt"></div>
            <div class="projectsPosts_single_loadMore py-16 flex justify-center">
                <a class="projectsPostsSingle_loadMore__button projectsPosts_loadMore__button text-white font-jost thentwrkTheme_paragraph flex justify-center items-center h-[50px]" type="button" href=""><span class="projectPosts_loadMore__plus mb-2 mx-2">+</span>Load More</a>
            </div>
        </div>
    </div>
</section>

<!-- More of our work section -->
<section id="moreWork">
    <div class="container mx-auto">
        <div class="mx-10">
            <h2 class="thentwrkTheme_title font-prompt text-white">View more of our work</h2>
        </div>
        <div id="specificDiv" class="ourProjects_carousel my-10">
        <?php
            // The Query
            $args = array(
                'post_type' => 'project',   // Specify the custom post type
                'posts_per_page' => -1,      // Number of posts to display
                'orderby' => 'date',        // Order by date
                'order' => 'DESC',           // Sort in descending order
            );

            $projectQuery = new WP_Query($args); ?>

            <div class="owl-carousel owl-theme">

            <?php 
            // The Loop
            if ($projectQuery->have_posts()) :
                while ($projectQuery->have_posts()) : $projectQuery->the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="projectsCard_wrapper relative">
                        <?php the_post_thumbnail('project-carousel') ?>
                        <h3 class="projectCard_title__carousel projectCard_title font-prompt text-white absolute bottom-1 left-3 z-20"><?php the_title(); ?></h3>
                    </div>
                </a>
            <?php 
                endwhile;
            else :
                // No posts found
                echo 'No projects found';
            endif; ?>

            </div>
            <!-- Cursor blob element -->
            <div class="cursor-blob"></div>
            <?php 
            // Restore original post data
            wp_reset_postdata();
        ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>