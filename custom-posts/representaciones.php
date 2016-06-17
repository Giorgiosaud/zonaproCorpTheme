<?php
new Representaciones();
class Representaciones{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
			'name'                  => _x( 'Representaciones', 'Post Type General Name', 'zonprocorp' ),
			'singular_name'         => _x( 'Representacion', 'Post Type Singular Name', 'zonprocorp' ),
			'menu_name'             => __( 'Representaciones', 'zonprocorp' ),
			'name_admin_bar'        => __( 'Representaciones', 'zonprocorp' ),
			'archives'              => __( 'Archivo de Representaciones', 'zonprocorp' ),
			'parent_item_colon'     => __( 'Representacion Superior', 'zonprocorp' ),
			'all_items'             => __( 'Todas Las Representaciones', 'zonprocorp' ),
			'add_new_item'          => __( 'Añadir Nueva Representacion', 'zonprocorp' ),
			'add_new'               => __( 'Nueva Representacion', 'zonprocorp' ),
			'new_item'              => __( 'Nueva Representacion', 'zonprocorp' ),
			'edit_item'             => __( 'Editar Representacion', 'zonprocorp' ),
			'update_item'           => __( 'Actualizar Representacion', 'zonprocorp' ),
			'view_item'             => __( 'Ver Representacion', 'zonprocorp' ),
			'search_items'          => __( 'Buscar Representacion', 'zonprocorp' ),
			'not_found'             => __( 'Representacion No Encontrado', 'zonprocorp' ),
			'not_found_in_trash'    => __( 'Representacion No Encontrado en la Papelera', 'zonprocorp' ),
			'featured_image'        => __( 'Imagen Predefinida', 'zonprocorp' ),
			'set_featured_image'    => __( 'Definir Imagen', 'zonprocorp' ),
			'remove_featured_image' => __( 'Borrar Imagen', 'zonprocorp' ),
			'use_featured_image'    => __( 'Usar como imagen', 'zonprocorp' ),
			'insert_into_item'      => __( 'Insertar en Representacion', 'zonprocorp' ),
			'uploaded_to_this_item' => __( 'Subidos a este Representacion', 'zonprocorp' ),
			'items_list'            => __( 'Lista de Representaciones', 'zonprocorp' ),
			'items_list_navigation' => __( 'Lista de navegacion de Representaciones', 'zonprocorp' ),
			'filter_items_list'     => __( 'Filtrar lista de Representaciones', 'zonprocorp' ),


		);
		$arguments=array(
			'label'                 => __( 'Representacion', 'zonprocorp' ),
			'description'           => __( 'Representacion', 'zonprocorp' ),
			'labels'                => $labels,
			'supports'              => array( 'title','editor', 'revisions' ),
			'taxonomies'            => array(  'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'menu_icon'				=>'dashicons-businessman',
			'capability_type'       => 'post',
		);
		$this->labels = $labels;
		$this->arguments = $arguments;
		add_action ('init', array(&$this, 'registerRepresentaciones'));
	}
	public function registerRepresentaciones(){
		register_post_type( 'representaciones', $this->arguments );
	}
}
