<?php
new Services();
class Services{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Servicios', 'Post Type General Name', 'zonaprocorp' ),
		'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'zonaprocorp' ),
		'menu_name'             => __( 'Servicios', 'zonaprocorp' ),
		'name_admin_bar'        => __( 'Servicios', 'zonaprocorp' ),
		'archives'              => __( 'Archivo de Servicios', 'zonaprocorp' ),
		'parent_item_colon'     => __( 'Servicio Superior', 'zonaprocorp' ),
		'all_items'             => __( 'Todos Los Servicios', 'zonaprocorp' ),
		'add_new_item'          => __( 'Añadir Nuevo Servicio', 'zonaprocorp' ),
		'add_new'               => __( 'Nuevo Servicio', 'zonaprocorp' ),
		'new_item'              => __( 'Nuevo Servicio', 'zonaprocorp' ),
		'edit_item'             => __( 'Editar Servicio', 'zonaprocorp' ),
		'update_item'           => __( 'Actualizar Servicio', 'zonaprocorp' ),
		'view_item'             => __( 'Ver Servicio', 'zonaprocorp' ),
		'search_items'          => __( 'Buscar Servicio', 'zonaprocorp' ),
		'not_found'             => __( 'Servicio No Encontrado', 'zonaprocorp' ),
		'not_found_in_trash'    => __( 'Servicio No Encontrado en la Papelera', 'zonaprocorp' ),
		'featured_image'        => __( 'Imagen Predefinida', 'zonaprocorp' ),
		'set_featured_image'    => __( 'Definir Imagen', 'zonaprocorp' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'zonaprocorp' ),
		'use_featured_image'    => __( 'Usar como imagen', 'zonaprocorp' ),
		'insert_into_item'      => __( 'Insertar en Servicio', 'zonaprocorp' ),
		'uploaded_to_this_item' => __( 'Subidos a este Servicio', 'zonaprocorp' ),
		'items_list'            => __( 'Lista de Servicios', 'zonaprocorp' ),
		'items_list_navigation' => __( 'Lista de navegacion de Servicios', 'zonaprocorp' ),
		'filter_items_list'     => __( 'Filtrar lista de Servicios', 'zonaprocorp' ),


		);
		$arguments=array(
		'label'                 => __( 'Servicio', 'zonaprocorp' ),
		'description'           => __( 'Servicio', 'zonaprocorp' ),
		'labels'                => $labels,
		'supports'              => array( 'title','editor', 'revisions' ,'excerpt'),
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
		'menu_icon'				=>'dashicons-admin-tools',
		'capability_type'       => 'post',
		);
		$this->labels = $labels;
		$this->arguments = $arguments;
        add_action ('init', array(&$this, 'registerServicios'));
	}
	public function registerServicios(){
		register_post_type( 'servicios', $this->arguments );
	}
}
