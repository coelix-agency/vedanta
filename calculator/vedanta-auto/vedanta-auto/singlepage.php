<?php
/*
Template Name: Стандартная страница
*/
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vedanta-auto
 */

get_header();
global $post_id;
?>


</header>

<div class="single single-post ">
	<section class="content">


<section class="content">
	<div class="cont" >
		<h1 itemprop = "name">


		<?php echo the_title();?>
		</h1>
		<?php
			while ( have_posts() ) :
				the_post();
		?>
		<div class="description">

			<?php echo the_content();?>

		</div>
		<?php
			endwhile; // End of the loop.
		?>
		<div class="new">
			<h4>Новые поступления</h4>
			<div class="all-cars">
				<?php
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'cat'            => '1'
				 );
				$loop = new Wp_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();  ?>

					<a href="<?php the_permalink(); ?>" class="item" target="_blank">
						<div class="item_img_cont">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="name">
							<?php the_title(); ?>
						</div>
						<div class="price price_us">Цена:
							<span>
								<?php
									$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
									if( is_array( $cur_terms ) ){
										foreach( $cur_terms as $cur_term ){
											echo $cur_term->name;
										}
									}
								?>
								&nbsp;$
							</span>
						</div>
					</a>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

	</div>
</section>



















	</section>
</div>









<?php

get_footer();
