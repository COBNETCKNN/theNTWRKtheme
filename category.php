<?php get_header(); ?>

<!-- Projects Heading Section -->
<section id="aboutUs_heading">
    <div class="container mx-auto">
        <div class="mx-10">
            <div class="aboutUs_heading__wrapper pt-24 pb-1">
                <h1 class="thentwrktheme_page__heading text-center lg:text-left text-white font-prompt lg:ml-14">Work</h1>
            </div>
        </div>
    </div>
</section>

<!-- Project Categories Section -->
<section id="projectCategories">
    <div class="container mx-auto">
        <div class="mx-10">
            <div class="projectCategories_wrapper flex justify-between lg:justify-start text-center lg:text-left items-center my-10">
                <a class="cat-list_item text-white cat-list_item text-white mx-1 lg:mx-3 py-1.5 px-3 lg:px-5 bg-zinc-500 uppercase font-jost" href="<?php echo get_post_type_archive_link('project');?>">All</a>
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
                            <a class="cat-list_item text-white mx-1 lg:mx-3 py-1.5 px-3 lg:px-5 bg-zinc-500 uppercase font-jost <?= $active_class; ?>" href="<?php echo site_url('/category/' . $term->slug)?>">
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
                    'post_type'      => 'project', // Change to your custom post type if needed
                    'posts_per_page' => -1, // Display all posts in the category
                    'category_name'  => $category->slug, // Use category slug for query
                );
                
                $categoryQuery = new WP_Query($args);
                
                if ($categoryQuery->have_posts()) :
                    while ($categoryQuery->have_posts()) : $categoryQuery->the_post();

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
                <?php endif; 
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>

<?php
// Adding current-menu-item class on Work element in the header
function add_custom_script_to_footer() {
    if (is_category()) { // Check if we are on the category.php template
        ?>
        <script>
            jQuery(document).ready(function($) {
                // Find the menu item with the class .menu-item in the header
                var menuItem = $('.menu-item-19');

                // Add .current-menu-item class to the menu item
                menuItem.addClass('current-menu-item');
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'add_custom_script_to_footer');
?>

<?php get_footer() ?>