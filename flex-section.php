<?php
use jorgelsaud\ZonaproCorpTheme\Sections\SmartSlider;
use jorgelsaud\ZonaproCorpTheme\Sections\RevSliderById;
use jorgelsaud\ZonaproCorpTheme\Sections\Sliders;
use jorgelsaud\ZonaproCorpTheme\Sections\InformacionCorporativa;
use jorgelsaud\ZonaproCorpTheme\Sections\PostCircular;
use jorgelsaud\ZonaproCorpTheme\Sections\PostCircularConCarusel;
use jorgelsaud\ZonaproCorpTheme\Sections\PostConFondo;
use jorgelsaud\ZonaproCorpTheme\Sections\FormularioDeContacto;
use jorgelsaud\ZonaproCorpTheme\Sections\ProductosCirculares;
use jorgelsaud\ZonaproCorpTheme\Sections\Html;
use jorgelsaud\ZonaproCorpTheme\Sections\ImagenFW;

if( have_rows('page_sections') ){
	while ( have_rows('page_sections') ){ 
		the_row();
		switch (get_row_layout()){
		case 'smart_slider':
			$slider=new SmartSlider();
			break;
		case 'smartSlider':
			the_sub_field('slider');
			break;
		case 'revolution_sliders':
			the_sub_field('slider');
			break;
		case 'revolution_sliders_by_id':
			$slider=new RevSliderById();
			break;
		case 'informacion_corporativa':
			$informacionCorporativa=new informacionCorporativa();
			break;
		case 'anadir_posts_circular_con_titulo_y_subtitulo':
			$customPosts=new PostCircular();
			break;
		case 'añadir_posts_circular_con_titulo_subtitulo_y_carrusel':
			$rand=false;
			$rand=get_sub_field('rand');
			$customPosts=new PostCircularConCarusel();
			break;
		case 'anadir_posts_con_fondo':
			$PostConFondo=new PostConFondo(get_sub_field('titulo'),get_sub_field('tipo_de_post'),get_sub_field('cantidad_de_posts'),get_sub_field('color_de_fondo'),get_sub_field('imagen_de_fondo'));
			$PostConFondo->show();
			break;
		case 'tipos_de_productos_circulares':
			$customProducts=new ProductosCirculares(get_sub_field('titulo'),get_sub_field('sub_titulo'),get_sub_field('tax'));
			$customProducts->show();
			break;
		case 'html':
			$HTML=new Html(get_sub_field('contenido'));
			$HTML->show();
			break;
		case 'imagen_full_width':
			$HTML=new ImagenFW(get_sub_field('imagen'),get_sub_field('titulo'));
			$HTML->show();
			break;
		case 'formulario_de_contacto':
			$Formulario=new FormularioDeContacto(get_sub_field('titulo'),get_sub_field('mensaje_superior'));
			$Formulario->show();
			break;
		}
	}
}
