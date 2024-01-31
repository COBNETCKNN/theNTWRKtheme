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
                <a class="cat-list_item text-white cat-list_item text-white mx-5 py-1.5 px-5 bg-zinc-500 uppercase font-jost" href="<?php echo get_post_type_archive_link('project');?>">All</a>
                <?php 
                    $cat_args = get_terms(array(
                        'taxonomy' => 'category',
                        'order' => 'DSC',
                    ));

                    $categories = $cat_args;
                    $current_category_slug = get_queried_object()->slug;

                    foreach ($categories as $term) : 
                        $active_class = ($current_category_slug === $term->slug) ? 'active' : '';
                    ?>
                        <li class="project_categories__wrapper w-fit">
                            <a class="cat-list_item text-white mx-3 py-1.5 px-5 bg-zinc-500 uppercase font-jost <?= $active_class; ?>" href="<?php echo site_url('/category/' . $term->slug)?>">
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
        <div class="grid-wrapper">
            <?php

                $i = 0;
                // The WordPress Loop
                $category = get_queried_object(); // Get the current category object

                $args = array(
                    'post_type'      => 'post', // Change to your custom post type if needed
                    'posts_per_page' => -1, // Display all posts in the category
                    'category_name'  => $category->slug, // Use category slug for query
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();

                        $thumb = get_the_post_thumbnail_url(); 
                        ?>
                                <div class="workGrid-item projectPosts_post__card-<?php echo $i; ?> relative" style="background-image: url('<?php echo $thumb;?>')">
                                    <h3 class="projectCard_title font-prompt text-white absolute bottom-3 left-5 z-20"><?php the_title(); ?></h3>
                                    <a href="<?php the_permalink(); ?>" target="_blank" class="w-full h-full absolute z-30"></a>
                                </div>
                        <?php
                        $i++;
                    endwhile;
                else :
                    ?>
                    <p>No posts found</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>