<?php
namespace jorgelsaud\ZonaproCorpTheme;
use WP_Query;
class CustomPosts{
	private $posts;

	public function __construct(array $posts)
	{
		$this->posts = $posts;
	}
	public static function getPosts($tipo,$qty,$length,$order=null,$orderby=null){

		$args = array (
			'post_type'             => $tipo,
			'post_status'           => array( 'publish' ),
			'posts_per_page'        => $qty,
		);
		if($order){
			$args['order']=$order;
		}
		if($orderby){
			$args['orderby']=$orderby;			
		}
		$posts=[];
		$custom_posts_query = new WP_Query( $args );
		if ( $custom_posts_query->have_posts() ) {
			while ( $custom_posts_query->have_posts() ) {
				$custom_posts_query->the_post();
				$post=[];
				$post['title']=get_the_title();
				$post['excerpt']=get_posts_excerpt($length,'more_callback');
				$post['link']=get_permalink();
				if(get_field('imagen_circular')){
					$post['imagen_circular']=get_field('imagen_circular');	
				}
				if(get_field('link')){
					$post['link']=get_field('link');	
				}
				if(get_field('tiene_link')){
					$post['tiene_link']=get_field('tiene_link');	
				}
				$post['resumen']=(get_field('resumen'))?get_field('resumen'):$post['excerpt'];
				$posts[]=$post;
			}
		}
		wp_reset_postdata();
		return $posts;
	}

}
