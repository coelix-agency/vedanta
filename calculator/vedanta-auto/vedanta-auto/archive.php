<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vedanta-auto
 */
if ( !is_user_logged_in() ) {
	header("Location: https://vedanta-auto.com.ua/"); 
}
get_header();
?>
<div class="cont" itemscope itemtype = "http://schema.org/Product" <?php 
							$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									// echo $cur_term->term_id;
									echo 'data-cars-action-price="' . number_format($cur_term->name, 0, '.', ' ') .' $" id="action_price"';
								}
							}
						?>>

	<h1 itemprop = "name">
		<?php  the_title();  ?>
		<?php 
		echo ' ';
		$cur_terms = get_the_terms( $post->ID, 'cars_year' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '('. $cur_term->name .')';
			}
		}
		
		$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
		if( is_array( $cur_terms ) ){
			foreach( $cur_terms as $cur_term ){
				echo '<span>'. number_format($cur_term->name, 0, '.', ' ') .' $</span>';
			}
		}
		?>
	</h1>
	<div class="sidebar">
		<div class="all_info">
			<ul>
				<?php
				$cur_terms = get_the_terms( $post->ID, 'cars_mark' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Марка:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_model' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Модель:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_type' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Кузов:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_road' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Пробег:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_fuel' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Тип топлива:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_volume' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Объем:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_year' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Год выпуска:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_years_release' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Модельный год:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_transmission' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Коробка:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_manual' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Привод:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_sits' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Количество сидений:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_country' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Страна производитель:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_state' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Состояние:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_color' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Цвет:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_vin' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li id="vin-code-line"><span>VIN:</span>  <strong style="font-size: 12px;font-weight: 300;">'. $cur_term->name .'</strong></li>';
					}
				}
				$cur_terms = get_the_terms( $post->ID, 'cars_status' );
				if( is_array( $cur_terms ) ){
					foreach( $cur_terms as $cur_term ){
						echo '<li><span>Статус:</span>  <strong>'. $cur_term->name .'</strong></li>';
					}
				}
				?>
			</ul>
			<?php 
			$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
			if( is_array( $cur_terms ) ){
				foreach( $cur_terms as $cur_term ){
					echo '<div class="price sea">Цена: <span>'. number_format($cur_term->name, 0, '.', ' ')  .' $</span></div>';
				}
			}
			?>
			<div id="buy_btn" class="btn btn_text">Купить</div>
		</div>
		<div class="facebook">
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FVedantaauto&tabs=timeline&width=260&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="260" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		</div>
	</div> <!-- sidebar end -->
	<div id="slider" data-cars-status="<?php 
							$cur_terms = get_the_terms( $post->ID, 'cars_status' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>">
		<div class="slider-for">
			<?php 
			if( have_rows('gallery') ): ?>
				<?php while( have_rows('gallery') ): the_row(); 
				$image = get_sub_field('slide');
				?>
				<div><img itemprop = "image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="buttons" id="slider-buttons"></div>
		<div class="slider-nav">
			<?php 
			if( have_rows('gallery') ): ?>
				<?php while( have_rows('gallery') ): the_row(); 
				$image = get_sub_field('slide');
				?>
				<div><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	
</div>
</header>
<section class="content">
	<div class="cont" >
		<?php
			while ( have_posts() ) :
				the_post();
		?>
		<div class="description">
			<?php 
			$cur_terms = get_the_terms( $post->ID, 'cars_security' );
			if( is_array( $cur_terms ) ){
				echo '<div class="description_container">';
				echo '<h4>Безопасность</h4>';
				echo '<ul>';
				foreach( $cur_terms as $cur_term ){
					echo '<li>'.$cur_term->name .'</li>';
				}
				echo '</ul>';
				echo '</div>';
			}
			?>
			<?php 
			$cur_terms = get_the_terms( $post->ID, 'cars_comfort' );
			if( is_array( $cur_terms ) ){
				echo '<div class="description_container">';
				echo '<h4>Комфорт</h4>';
				echo '<ul>';
				foreach( $cur_terms as $cur_term ){
					echo '<li>'. $cur_term->name .'</li>';
				}
				echo '</ul>';
				echo '</div>';
			}
			?>
			<?php 
			$cur_terms = get_the_terms( $post->ID, 'cars_multimedia' );
			if( is_array( $cur_terms ) ){
				echo '<div class="description_container">';
				echo '<h4>Мультимедиа</h4>';
				echo '<ul>';
				foreach( $cur_terms as $cur_term ){
					echo '<li>'. $cur_term->name .'</li>';
				}
				echo '</ul>';
				echo '</div>';
			}
			?>
			<?php the_content(); ?>
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

<?php
// get_sidebar();
get_footer();
