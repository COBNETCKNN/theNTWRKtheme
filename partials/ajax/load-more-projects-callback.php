<?php 

add_action( 'wp_ajax_nopriv_codex_load_more_post_ajax', 'codex_load_more_post_ajax_call_back' );
add_action( 'wp_ajax_codex_load_more_post_ajax', 'codex_load_more_post_ajax_call_back' );

function codex_load_more_post_ajax_call_back(){

	$posts_per_page = ( isset( $_POST["posts_per_page"] ) ) ? $_POST["posts_per_page"] : 9;
	$page = ( isset( $_POST['pageNumber'] ) ) ? $_POST['pageNumber'] : 1;
    $i = 0;

	$args = array(
		'post_type' => 'project',
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish', 
		'paged'    => $page,
	);

	$the_query = new WP_Query( $args );

	$html = '';
	ob_start();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts()) { $the_query->the_post();
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
	$html .= ob_get_clean();

	wp_send_json( array( 'html' => $html ) );
}
?>