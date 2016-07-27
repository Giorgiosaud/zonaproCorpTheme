<?php 
/*
 * Template Name: Iframe Page 
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
						<iframe src="<?php the_field('direccion')?>" class="myIframe" width="100%" frameBorder="0"></iframe>
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
	</div>
</div>
<?php get_footer(); ?>
