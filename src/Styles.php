<?php
namespace jorgelsaud\ZonaproCorpTheme;

class Styles
{

	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array($this,'enqueue' ));
		return true;
		$this->manifest_path= get_stylesheet_directory().'/compiled/build/rev-manifest.json' ;
	}
	public function enqueue()
	{
		wp_deregister_script( 'jquery' );
		wp_register_style('assetsCss',get_template_directory_uri().'/compiled/css/assets.css');
		wp_enqueue_style('assetsCss');
		wp_register_style('socicons','https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css',['assetsCss']);
		wp_enqueue_style('socicons');
		wp_register_script('recaptchajs','https://www.google.com/recaptcha/api.js',array(),null,true);
		$deps=array('recaptchajs');

		if(get_field('api_googlemaps', 'options')){
		$google_key=get_field('api_googlemaps', 'options');
	wp_register_script('googleMap',"https://maps.googleapis.com/maps/api/js?key={$google_key}&callback=initMap",array('mainJs','recaptchajs'),null,true);
		array_push($deps, 'googleMap');
		}

		wp_register_script('assetsJs',get_template_directory_uri().'/compiled/js/assets.js',$deps);
		wp_localize_script( 'assetsJs', 'Zonapro', array( 'url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'myajax-post-comment-nonce' )  ) );
		wp_enqueue_script('assetsJs');
		wp_register_script('mainJs',get_template_directory_uri().'/compiled/js/main.js');
			wp_enqueue_script('mainJs');
		if(is_child_theme()){
			wp_register_style('mainCss',get_stylesheet_directory_uri().'/compiled/css/main.css',['assetsCss']);
			wp_enqueue_style('mainCss');
			wp_register_script('childJs',get_stylesheet_directory_uri().'/compiled/js/child.js');
			wp_enqueue_script('childJs');
		}
		else{
			wp_register_style('mainCss',get_template_directory_uri().'/compiled/css/main.css',['assetsCss']);
			wp_enqueue_style('mainCss');
		}

	//	foreach($this->styles as $style){
	//		$enqueuefile=get_template_directory_uri().'/compiled/build/'.$this->manifest[$style];
	//		$extension=pathinfo($enqueuefile, PATHINFO_EXTENSION);
	//	//	switch ($extension) {
	//	//	case 'css':
	//	//		if(is_child_theme()&&$style=="css/main.css"){
	//	//		break;
	//	//		}
	//	//		$deps=[];
	//	//		if($style!='css/assets.css'){
	//	//			$deps[]='css/assets.css';
	//	//		}
	//	//		wp_register_style($style,$enqueuefile,$deps);

	//	//		wp_enqueue_style($style);
	//	//		break;
	//	//	case 'js':
	//	//		wp_register_script($enqueuefile, $enqueuefile);
	//	//		wp_localize_script( $enqueuefile, 'Zonapro', array( 'url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'myajax-post-comment-nonce' )  ) );
	//	//		wp_enqueue_script($enqueuefile);
	//	//		break;
	//	//	}
	//	}
	}
}
