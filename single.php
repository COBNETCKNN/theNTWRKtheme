<?php get_header(); ?>

<!-- Hero Section -->
<section id="singleHero">
    <?php $thumb = get_the_post_thumbnail_url();  ?>
    <div class="hero_wrapper relative h-[90vh] -mt-20" style="background-image: url('<?php echo $thumb;?>')">
    </div>
</section>

<section id="singleCredentials" class="my-10">
    <div class="container mx-auto">
        <div class="mx-10">
            <h1 class="singleCredentials_title connectAndJoinSection_cardTitle font-prompt text-white pb-5"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<?php get_footer(); ?>