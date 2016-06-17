<?php
new Products();
class Products{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'zonaprocorp' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'zonaprocorp' ),
		'menu_name'             => __( 'Productos', 'zonaprocorp' ),
		'name_admin_bar'        => __( 'Productos', 'zonaprocorp' ),
		'archives'              => __( 'Archivo de Productos', 'zonaprocorp' ),
		'parent_item_colon'     => __( 'Producto Superior', 'zonaprocorp' ),
		'all_items'             => __( 'Todas Las Informaciónes Corporativa', 'zonaprocorp' ),
		'add_new_item'          => __( 'Añadir Nuevo Producto', 'zonaprocorp' ),
		'add_new'               => __( 'Nuevo Producto', 'zonaprocorp' ),
		'new_item'              => __( 'Nuevo Producto', 'zonaprocorp' ),
		'edit_item'             => __( 'Editar Producto', 'zonaprocorp' ),
		'update_item'           => __( 'Actualizar Producto', 'zonaprocorp' ),
		'view_item'             => __( 'Ver Producto', 'zonaprocorp' ),
		'search_items'          => __( 'Buscar Producto', 'zonaprocorp' ),
		'not_found'             => __( 'Producto No Encontrado', 'zonaprocorp' ),
		'not_found_in_trash'    => __( 'Producto No Encontrado en la Papelera', 'zonaprocorp' ),
		'featured_image'        => __( 'Imagen Predefinida', 'zonaprocorp' ),
		'set_featured_image'    => __( 'Definir Imagen', 'zonaprocorp' ),
		'remove_featured_image' => __( 'Borrar Imagen', 'zonaprocorp' ),
		'use_featured_image'    => __( 'Usar como imagen', 'zonaprocorp' ),
		'insert_into_item'      => __( 'Insertar en Producto', 'zonaprocorp' ),
		'uploaded_to_this_item' => __( 'Subidos a este Producto', 'zonaprocorp' ),
		'items_list'            => __( 'Lista de Productos', 'zonaprocorp' ),
		'items_list_navigation' => __( 'Lista de navegacion de Productos', 'zonaprocorp' ),
		'filter_items_list'     => __( 'Filtrar lista de Productos', 'zonaprocorp' ),


		);
		$arguments=array(
		'label'                 => __( 'Producto', 'zonaprocorp' ),
		'description'           => __( 'Producto', 'zonaprocorp' ),
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
        add_action ('init', array(&$this, 'registerProductos'));
	}
	public function registerProductos(){
		register_post_type( 'productos', $this->arguments );
	}
}
