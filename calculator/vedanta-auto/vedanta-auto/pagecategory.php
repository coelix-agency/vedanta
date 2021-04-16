<?php
/*
Template Name: Категории авто
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

	<div class="slider_cont">
		<div class="headBackground" >
			<div class="headBackgroundLeft">
				<h1>Авто из Кореи</h1>
				<p class="greenHead">В наличии и под заказ</p>
				<p>Без пробега по Украине</p>
			</div>
			<div class="headBackgroundRight">




				 <!-- <div class="hidForms"> -->
				 	<?php
				 	 echo do_shortcode('[contact-form-7 id="14221" title="Быстрый подбор авто"]');
				 	?>
				 <!-- </div> -->


			</div>
		</div>

	</div>
	<div class="scroll_btn">
		 <span>↓ Подробнее ↓</span>
	</div>
	<div class="scroll"></div>
</header>
<section class="cars-available carsNoFilter" id="cars-available">
	<div class="cont">
		<div style="display:none;">
<?php echo do_shortcode('[contact-form-7 id="14202" title="Контактная форма 1"]');?>
		</div>
		<div class="homeBanner">
			<?php
			$imgLink = get_post_meta(2, 'banner-link');
			// print_r($imgLink) ;
			?>
			<a href="<?php echo $imgLink[0]?>">
				<?php  $imgUrl = get_post_meta(2, 'banner-img');

				// print_r($imgUrl[0]);
				echo wp_get_attachment_image($imgUrl[0],'full');
				?>


			</a>
		</div>
		<h2 style="text-transform: inherit!important;"> <?php echo the_title('');?></h2>
		<div class="filters_content">
			<div class="filters_mob_btn">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
					<g>
						<path style="fill:#72bf45;" d="M498.725,89.435c7.328,0,13.275,5.947,13.275,13.275s-5.947,13.275-13.275,13.275H183.172v12.479   c0,18.293-14.882,33.188-33.188,33.188H98.476c-18.293,0-33.188-14.895-33.188-33.188v-12.479H13.275   C5.947,115.986,0,110.039,0,102.711s5.947-13.275,13.275-13.275h52.012V76.957c0-18.293,14.895-33.188,33.188-33.188h51.508   c18.307,0,33.188,14.895,33.188,33.188v12.479H498.725z M156.621,128.465V76.957c0-3.664-2.974-6.638-6.638-6.638H98.476   c-3.651,0-6.638,2.974-6.638,6.638v51.508c0,3.651,2.987,6.638,6.638,6.638h51.508   C153.648,135.102,156.621,132.115,156.621,128.465z"/>
						<path style="fill:#72bf45;" d="M498.725,237.295c7.328,0,13.275,5.947,13.275,13.275c0,7.328-5.947,13.275-13.275,13.275h-52.012   v12.465c0,18.307-14.895,33.188-33.188,33.188h-51.508c-18.307,0-33.188-14.882-33.188-33.188v-12.465H13.275   C5.947,263.846,0,257.898,0,250.57c0-7.328,5.947-13.275,13.275-13.275h315.553v-12.479c0-18.307,14.882-33.188,33.188-33.188   h51.508c18.293,0,33.188,14.882,33.188,33.188v12.479H498.725z M420.162,276.311v-51.495c0-3.664-2.987-6.638-6.638-6.638h-51.508   c-3.664,0-6.638,2.974-6.638,6.638v51.495c0,3.664,2.974,6.638,6.638,6.638h51.508   C417.175,282.949,420.162,279.975,420.162,276.311z"/>
						<path style="fill:#72bf45;" d="M498.725,396.014c7.328,0,13.275,5.947,13.275,13.275c0,7.328-5.947,13.275-13.275,13.275H276.431   v12.479c0,18.293-14.882,33.188-33.188,33.188h-51.495c-18.307,0-33.188-14.895-33.188-33.188v-12.479H13.275   C5.947,422.565,0,416.617,0,409.289c0-7.328,5.947-13.275,13.275-13.275H158.56v-12.479c0-18.293,14.882-33.188,33.188-33.188   h51.495c18.307,0,33.188,14.895,33.188,33.188v12.479H498.725z M249.88,435.043v-51.508c0-3.651-2.974-6.638-6.638-6.638h-51.495   c-3.664,0-6.638,2.987-6.638,6.638v51.508c0,3.664,2.974,6.638,6.638,6.638h51.495C246.906,441.681,249.88,438.707,249.88,435.043z   "/>
					</g>
					<g>
						<path style="fill:#f95c18;" d="M420.162,224.816v51.495c0,3.664-2.987,6.638-6.638,6.638h-51.508c-3.664,0-6.638-2.974-6.638-6.638   v-51.495c0-3.664,2.974-6.638,6.638-6.638h51.508C417.175,218.179,420.162,221.152,420.162,224.816z"/>
						<path style="fill:#f95c18;" d="M249.88,383.535v51.508c0,3.664-2.974,6.638-6.638,6.638h-51.495c-3.664,0-6.638-2.974-6.638-6.638   v-51.508c0-3.651,2.974-6.638,6.638-6.638h51.495C246.906,376.898,249.88,379.885,249.88,383.535z"/>
						<path style="fill:#f95c18;" d="M156.621,76.957v51.508c0,3.651-2.974,6.638-6.638,6.638H98.476c-3.651,0-6.638-2.987-6.638-6.638   V76.957c0-3.664,2.987-6.638,6.638-6.638h51.508C153.648,70.319,156.621,73.293,156.621,76.957z"/>
					</g>

				</svg>
			</div>
			<div class="filters">
				<div class="custom-select carMarkBlock">
					<select name="car-mark" id="car-mark">
						<option value="0">Марка авто:</option>
						<option value="0">Все виды авто</option>
						<?php
							$categories = get_terms('cars_mark', 'orderby=name&hide_empty=1');
							if($categories){
								foreach ($categories as $cat){
									echo "<option value='{$cat->term_id}'>{$cat->name}</option>";
								}
							}
						?>
					</select>
				</div>
				<div class="custom-select carModelSelect">
					<select name="car-model" id="car-model">
						<option value="0">Модель авто:</option>
						<option value="0">Все модели авто</option>
						<?php
							$categories = get_terms('cars_model', 'orderby=name&hide_empty=1');
							if($categories){
								foreach ($categories as $cat){
									echo "<option value='{$cat->term_id}'>{$cat->name}</option>";
								}
							}
						?>
					</select>
				</div>
				<div class="custom-select">
					<select name="car-type" id="car-type">
						<option value="0">Тип кузова:</option>
						<option value="0">Все типы кузова</option>
						<?php
							$categories = get_terms('cars_type', 'orderby=name&hide_empty=1');
							if($categories){
								foreach ($categories as $cat){
									echo "<option value='{$cat->term_id}'>{$cat->name}</option>";
								}
							}
						?>
					</select>
				</div>
				<div class="custom-select">
					<select name="car-status" id="car-status">
						<option value="0">Статус:</option>
						<option value="0">Все статусы</option>
						<?php
							$categories = get_terms('cars_status', 'orderby=name&hide_empty=1');
							if($categories){
								foreach ($categories as $cat){
									echo "<option value='{$cat->term_id}'>{$cat->name}</option>";
								}
							}
						?>
					</select>
				</div>
				<div class="custom-select">
					<select name="car-manual" id="car-manual">
						<option value="0">Тип привода:</option>
						<option value="0">Все типы привода</option>
						<?php
							$categories = get_terms('cars_manual', 'orderby=name&hide_empty=1');
							if($categories){
								foreach ($categories as $cat){
									echo "<option value='{$cat->term_id}'>{$cat->name}</option>";
								}
							}
						?>
					</select>
				</div>
				<div class="custom-select">
					<select name="car-fuel" id="car-fuel">
						<option value="0">Тип топлива:</option>
						<option value="0">Все виды топлива</option>
						<?php
							$categories = get_terms('cars_fuel', 'orderby=name&hide_empty=1');
							if($categories){
								foreach ($categories as $cat){
									echo "<option value='{$cat->term_id}'>{$cat->name}</option>";
								}
							}
						?>
					</select>
				</div>

				<label for="amount">Диапазон цен:</label>
				<div class="all_quantity">
					<div class="quantity">
							<?php
								$categories = get_terms('cars_our_price', 'orderby=name&hide_empty=1');
								if($categories){
									$i = 0;
									foreach ($categories as $cat) {
										$tArray[$i] = $cat->name;
										$i++;
									}
									$min_value = min($tArray);
									$max_value = max($tArray);
									// echo  $min_value .' '. $max_value;
								}
							?>
						<input type="number" id="amount-min" step="100" min="<?php if (isset($min_value)) {echo  $min_value;} else {echo 0;}; ?>" max="<?php if (isset($max_value)) {echo  $max_value;} else {echo  0;} ?>"  value="<?php if (isset($min_value)) {echo  $min_value;} else {echo 0;}; ?>">
					</div>
					-
					<div class="quantity">
						<input type="number" id="amount-max" step="100" min="<?php if (isset($min_value)) {echo  $min_value;} else {echo 0;}; ?>" max="<?php if (isset($max_value)) {echo  $max_value;} else {echo  0;} ?>" value="<?php if (isset($max_value)) {echo  $max_value;} else {echo  0;} ?>">
					</div>
				</div>
				<div id="slider-range"></div>

				<div class="view_switcher">
					<div class="view_switch_btn tile active">
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
					</div>
					<div class="view_switch_btn list">
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
					</div>
				</div>
				<input type="text" name="checkVin" placeholder="Последние цифры VIN-кода" class="vinCheck" maxlength="4">
				<div class="filters_mob_btn_close">
					Применить
				</div>
			</div><!-- filters end -->

			<div class="all-cars">
				<div class="query" style="display: none">По Вашему запросу результатов не найдено...</div>








				<?php
				global $post;

				$modelLink = get_post_meta($post->ID, 'model-auto');
				if(!empty($modelLink[0])){
					$array_model = array(
								'taxonomy' => 'cars_model',
								'field' => 'slug',
								'terms' =>  array($modelLink[0])

							);
				};

				$markLink = get_post_meta($post->ID, 'mark-auto');
				if(!empty($markLink[0])){
					$array_mark = array(
								'taxonomy' => 'cars_mark',
								'field' => 'slug',
								'terms' =>  array($markLink[0])

							);
				};

				$fuelLink = get_post_meta($post->ID, 'petrol-auto');
				if(!empty($fuelLink[0])){
					$array_fuel = array(
								'taxonomy' => 'cars_mark',
								'field' => 'slug',
								'terms' =>  array($fuelLink[0])

							);
				};
				$typelLink = get_post_meta($post->ID, 'body-auto');
				if(!empty($typelLink[0])){
					$array_type = array(
								'taxonomy' => 'cars_type',
								'field' => 'slug',
								'terms' =>  array($typelLink[0])

							);
				};



				$topIdLink = get_post_meta($post->ID, 'top-id');

				$topIdLink = get_post_meta($post->ID, 'top-id');

			 $topIdLink =$topIdLink;

			 $listIdTop = explode(" ", $topIdLink[0]);
 $listIdTop= 	array_reverse($listIdTop);
				?>

				<?php
					$args = array(

						'post_status'            => 'publish',
						'posts_per_page' 		 => -1,
						'post__in' => $listIdTop,
						'orderby' => 'post__in' ,
						'tax_query' =>array(

							$array_model,
							$array_mark,
							( empty ($array_fuel) ? array() : $array_fuel ),
							$typelLink

),


						'post_type'      => 'post',
						'cat'            => '1',
						'order'       => 'ASC'
					);

					$loop = new Wp_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();  ?>
					<?php
					// print_r($post);
						$cur_terms = get_the_terms( $post->ID, 'cars_status' );
						if( is_array( $cur_terms ) ){
							if (  $cur_terms[0]->name == 'Продано') {
								continue;
							}
						}
					?>
					<!-- cars_action_price -->
					<a  href="<?php the_permalink(); ?>"
						target="_blank"
						class="item"
						data-cars-type="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_type' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>"

						data-cars-price="<?php
						// для акции
							$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->name;
								}
							} else {
								$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
								if( is_array( $cur_terms ) ){
									print_r($cur_terms[1]->name);
									// foreach( $cur_terms as $cur_term ){
									// 	echo $cur_term->name;
									// }
								}
							}
						// без акции
							// $cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
							// if( is_array( $cur_terms ) ){
							// 	foreach( $cur_terms as $cur_term ){
							// 		echo $cur_term->name;
							// 	}
							// }
						?>"
						data-cars-status="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_status' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>"
						data-cars-mark="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_mark' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>"

						data-cars-model="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_model' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>"
						data-cars-modelname="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_model' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->name;
								}
							}
						?>"

						data-cars-vincode="<?php
							 $cur_terms = get_the_terms( $post->ID, 'cars_vin' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){

									echo substr($cur_term->name,-4);
								}
							}
						?>"
						data-cars-manual="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_manual' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>"
						data-cars-fuel="<?php
							$cur_terms = get_the_terms( $post->ID, 'cars_fuel' );
							if( is_array( $cur_terms ) ){
								foreach( $cur_terms as $cur_term ){
									echo $cur_term->term_id;
								}
							}
						?>"
						>
						<div class="item_img_cont">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="cloud_img">';
										echo '<img class="cloud" src="/wp-content/uploads/2020/02/cloud.png" alt="">';
										echo '<span class="action_price">';
										echo number_format($cur_term->name, 0, '.', ' ');
										echo '</span>';
									}
									$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
									if( is_array( $cur_terms ) ){
										foreach( $cur_terms as $cur_term ){
											echo '<span class="price">';
											echo number_format($cur_term->name, 0, '.', ' ');
											echo '</span></div>';

										}
									}
								}
							?>
						</div>
						<div class="data">
							<div class="name"><?php the_title(); ?></div>
							<div class="price price_us">Цена:
								<span>
									<?php
									// для акции
										$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
										if( is_array( $cur_terms ) ){
											foreach( $cur_terms as $cur_term ){
												echo '<span>';
												echo number_format($cur_term->name, 0, '.', ' ');
												echo '</span>';
											}
										} else {
											$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo '<span>';
													echo number_format($cur_term->name, 0, '.', ' ');
													echo '</span>';
												}
											}
										}
									// без акции
										// $cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
										// if( is_array( $cur_terms ) ){
										// 	foreach( $cur_terms as $cur_term ){
										// 		echo number_format($cur_term->name, 0, '.', ' ');
										// 	}
										// }
									?>
									&nbsp;$
								</span>
							</div>

							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_status' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Статус: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_fuel' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Тип топлива: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_volume' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Объем: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_year' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Год выпуска: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_years_release' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Модельный год: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_transmission' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Коробка: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<?php
								$cur_terms = get_the_terms( $post->ID, 'cars_manual' );
								if( is_array( $cur_terms ) ){
									foreach( $cur_terms as $cur_term ){
										echo '<div class="price price_in">Привод: <span>'. $cur_term->name .'</span></div>';
									}
								}
							?>
							<div class="autoExtraButtons">
								<span class="freeDriveAuto">Бесплатный Тест-драйв</span>
								<span class="getAdviceAuto">Получить консультацию</span>
							</div>

						</div>


					</a>
				<?php endwhile;?>
				<?php if (  $loop->max_num_pages > 1 ) : ?>
					<script>
					var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
					var true_posts = '<?php echo serialize($loop->query_vars); ?>';
					var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
					var max_pages = '<?php echo $loop->max_num_pages; ?>';
					</script>

					<div id="true_loadmore">Загрузить ещё</div>
				<?php endif; ?>












								<?php
									$args = array(
										// 'post_type'              => 'post',
										'post_status'            => 'publish',
										'posts_per_page' 		 => -1,
										// 'numberposts' => 5,
				'post__not_in' => $listIdTop,
				'tax_query' =>array(

					// 'relation' => 'OR',
$array_model,
$array_mark,
( empty ($array_fuel) ? array() : $array_fuel ),
$typelLink

),


										'post_type'      => 'post',
										'cat'            => '1',
										'order'       => 'ASC'
									);

									$loop = new Wp_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post();  ?>
									<?php
									// print_r($post);
										$cur_terms = get_the_terms( $post->ID, 'cars_status' );
										if( is_array( $cur_terms ) ){
											if (  $cur_terms[0]->name == 'Продано') {
												continue;
											}
										}
									?>
									<!-- cars_action_price -->
									<a  href="<?php the_permalink(); ?>"
										target="_blank"
										class="item"
										data-cars-type="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_type' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->term_id;
												}
											}
										?>"

										data-cars-price="<?php
										// для акции
											$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->name;
												}
											} else {
												$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo $cur_term->name;
													}
												}
											}
										// без акции
											// $cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
											// if( is_array( $cur_terms ) ){
											// 	foreach( $cur_terms as $cur_term ){
											// 		echo $cur_term->name;
											// 	}
											// }
										?>"
										data-cars-status="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_status' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->term_id;
												}
											}
										?>"
										data-cars-mark="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_mark' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->term_id;
												}
											}
										?>"

										data-cars-model="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_model' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->term_id;
												}
											}
										?>"
										data-cars-modelname="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_model' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->name;
												}
											}
										?>"

										data-cars-vincode="<?php
											 $cur_terms = get_the_terms( $post->ID, 'cars_vin' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){

													echo substr($cur_term->name,-4);
												}
											}
										?>"
										data-cars-manual="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_manual' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->term_id;
												}
											}
										?>"
										data-cars-fuel="<?php
											$cur_terms = get_the_terms( $post->ID, 'cars_fuel' );
											if( is_array( $cur_terms ) ){
												foreach( $cur_terms as $cur_term ){
													echo $cur_term->term_id;
												}
											}
										?>"
										>
										<div class="item_img_cont">
											<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="cloud_img">';
														echo '<img class="cloud" src="/wp-content/uploads/2020/02/cloud.png" alt="">';
														echo '<span class="action_price">';
														echo number_format($cur_term->name, 0, '.', ' ');
														echo '</span>';
													}
													$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
													if( is_array( $cur_terms ) ){
														foreach( $cur_terms as $cur_term ){
															echo '<span class="price">';
															echo number_format($cur_term->name, 0, '.', ' ');
															echo '</span></div>';

														}
													}
												}
											?>
										</div>
										<div class="data">
											<div class="name"><?php the_title(); ?></div>
											<div class="price price_us">Цена:
												<span>
													<?php
													// для акции
														$cur_terms = get_the_terms( $post->ID, 'cars_action_price' );
														if( is_array( $cur_terms ) ){
															foreach( array_reverse($cur_terms) as $cur_term ){
																echo '<span>';
																echo number_format($cur_term->name, 0, '.', ' ');
																echo '</span>';
															}
														} else {
															$cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
															if( is_array( $cur_terms ) ){
																foreach( array_reverse($cur_terms) as $cur_term ){
																	echo '<span>';
																	echo number_format($cur_term->name, 0, '.', ' ');
																	echo '</span>';
																}
															}
														}
													// без акции
														// $cur_terms = get_the_terms( $post->ID, 'cars_our_price' );
														// if( is_array( $cur_terms ) ){
														// 	foreach( $cur_terms as $cur_term ){
														// 		echo number_format($cur_term->name, 0, '.', ' ');
														// 	}
														// }
													?>
													&nbsp;$
												</span>
											</div>

											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_status' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Статус: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_fuel' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Тип топлива: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_volume' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Объем: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_year' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Год выпуска: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_years_release' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Модельный год: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_transmission' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Коробка: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<?php
												$cur_terms = get_the_terms( $post->ID, 'cars_manual' );
												if( is_array( $cur_terms ) ){
													foreach( $cur_terms as $cur_term ){
														echo '<div class="price price_in">Привод: <span>'. $cur_term->name .'</span></div>';
													}
												}
											?>
											<div class="autoExtraButtons">
												<span class="freeDriveAuto">Бесплатный Тест-драйв</span>
												<span class="getAdviceAuto">Получить консультацию</span>
											</div>

										</div>


									</a>
								<?php endwhile;?>
								<?php if (  $loop->max_num_pages > 1 ) : ?>
									<script>
									var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
									var true_posts = '<?php echo serialize($loop->query_vars); ?>';
									var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
									var max_pages = '<?php echo $loop->max_num_pages; ?>';
									</script>

									<div id="true_loadmore">Загрузить ещё</div>
								<?php endif; ?>











			</div>


















			<span class="moreAuto">Показать все</span>

		</div>
		<a href="/#cars-available" class="allAutoLink">Все авто</a>

	</div>

</section>

<?php
	while ( have_posts() ) :
		the_post();
		the_content();


	endwhile; // End of the loop.
?>








<script>
	function sliderInit(){
		$( "#slider-range" ).slider({
			range: true,
			min: <?php if (isset($min_value)) {echo  $min_value;} else {echo 0;}; ?> ,
			max: <?php if (isset($max_value)) {echo  $max_value;} else {echo  0;} ?>,
			values: [ <?php if (isset($min_value)) {echo  $min_value;} else {echo 0;}; ?>, <?php if (isset($max_value)) {echo  $max_value;} else {echo  0;} ?> ],
			step: 100,
			slide: function( event, ui ) {
			$( "#amount-min" ).val( ui.values[ 0 ] );
			$( "#amount-max" ).val( ui.values[ 1 ] );
			},
			change: function( ) {
			carsHandler();
			carsFilterHandler();
			}
		});
		$( "#amount-min" ).val( $( "#slider-range" ).slider( "values", 0 ) );
		$( "#amount-max" ).val( $( "#slider-range" ).slider( "values", 1 ) );
		$( "#slider-range" ).draggable();
	}
</script>
<?php
// get_sidebar();
get_footer();
