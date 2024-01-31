<?php get_header(); ?>

<!-- Projects Heading Section -->
<section id="aboutUs_heading">
    <div class="container mx-auto">
        <div class="mx-10">
            <div class="aboutUs_heading__wrapper pt-24 pb-1">
                <h1 class="thentwrktheme_page__heading text-white font-prompt ml-14">Work</h1>
            </div>
        </div>
    </div>
</section>

<!-- Project Categories Section -->
<section id="projectCategories">
    <div class="container mx-auto">
        <div class="mx-10">
            <div class="projectCategories_wrapper flex justify-start items-center my-10">
                <a class="cat-list_item active text-white cat-list_item text-white mx-5 py-1.5 px-5 bg-zinc-500 uppercase font-jost" href="<?php echo get_post_type_archive_link('project');?>">All</a>
                <?php 
                    $cat_args = get_terms(array(
                        'taxonomy' => 'category',
                        'order' => 'DSC',
                    ));

                    $categories = $cat_args;

                    foreach($categories as $term) : ?>
                        <li class="project_categories__wrapper w-fit">
                        <a class="cat-list_item text-white mx-3 py-1.5 px-5 bg-zinc-500 uppercase font-jost" href="<?php echo site_url('/category/' . $term->slug)?>">
                            <?= $term->name; ?>
                        </a>
                        </li>
                    <?php 
                    endforeach; 
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Project Posts Section -->
<section id="projectPosts" class="my-10">
    <div class="container mx-auto">
        <div class="mx-10">
        <div class="cxc-post-wrapper">
            <div id="cxc-posts" class="cxc-posts grid-wrapper">
                <?php
                $postsPerPage = 9;
                $i = 0;

                $args = array(
                    'post_type' => 'project',
                    'post_status' => 'publish',
                    'posts_per_page' => $postsPerPage,
                );

                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ){ 
                        $the_query->the_post();

                        $thumb = get_the_post_thumbnail_url(); 
                        ?>
                                <div class="workGrid-item projectPosts_post__card-<?php echo $i; ?> relative" style="background-image: url('<?php echo $thumb;?>')">
                                    <h3 class="projectCard_title font-prompt text-white absolute bottom-3 left-5 z-20"><?php the_title(); ?></h3>
                                    <a href="<?php the_permalink(); ?>" target="_blank" class="w-full h-full absolute z-30"></a>
                                </div>
                        <?php
                        $i++;
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="projectsPosts_loadMore flex justify-center">
                <button type="button" id="codex-load-more" class="codex-load-more projectsPosts_loadMore__button text-white font-jost thentwrkTheme_paragraph flex justify-center items-center" data-page="2"><span class="projectPosts_loadMore__plus mb-2 mx-2">+</span>Load More</button>
            </div>
        </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>