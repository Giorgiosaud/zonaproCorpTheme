<?php 
/**
 * Template Name: Contact Page
 */
get_header(); ?>


<!-- section -->
<div class="wrapper">
	<div class="container inner-container Padding-off">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php if(get_field('incluir_titulo')){
?><div class="col-xs-12 text-center"><h1><?php the_title()?></h1></div><?php }?>
<?php 
if( get_field('colocar_slider') ):
	$sliders=new Sliders(get_field('tipo_de_post'),get_field('cantidad'),get_field('id'));
$sliders->home();
endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
get_template_part('flex','section');
?>
<div class="container-fluid">
	<?php the_content(); ?>
</div>
<?php edit_post_link(); ?>
<br class="clear">
				</article>
				<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

				</article>
				<!-- /article -->

				<?php endif; ?>
				<section class="Direccion container">
					<div class="Direccion__texto">
						<div class="Drieccion__texto__Linea1">
							<p>
								<?php the_field('direccion_linea_1','option')?>
							</p>
						</div>
						<div class="Drieccion__texto__Linea2">
							<p>
								<?php the_field('direccion_linea_2','option')?>
							</p>
						</div>
						<div class="Direccion__texto__telefono">
							<p>	
								Tlf: <a href='tel:<?php the_field('telefono','option')?>'><?php the_field('telefono_formatted','option')?></a>
							</p>
						</div>
						<div class="Direccion__texto__email">
							<p>
								Mail: <a href="mailto:<?php the_field('email','option')?>"><?php the_field('email','option')?></a>
							</p>
						</div>
					</div>
					<div class="Direccion__mapa">
						<div id="map"></div>
					</div>
				</section>
				<form id="emailForm" class="ContactForm container" method="POST">
					<div class="FormHalf">
						<div class="formField">
							<input type="text" name="nombre" placeholder="* Nombre" required>
						</div>
						<div class="formField">
							<input type="text" name="empresa" placeholder="* Empresa" required>
						</div>
						<div class="formField">
							<input type="text" name="telefono" placeholder="* Telefono" required>
						</div>
						<div class="formField">
							<input type="email" name="email" placeholder="* email" required>
						</div>
					</div>
					<div class="FormHalf">
						<div class="formField">
							<textarea id="mensaje" name="mensaje" cols="30" rows="8" placeholder="* Mensaje" required></textarea>
						</div>
						<div class="formField">
							<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php the_field('g_recaptcha_key','options')?>"></div>
							<button id="enviarEmail" class="btn btn-primary btn-custom" disabled>Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php get_footer(); ?>
