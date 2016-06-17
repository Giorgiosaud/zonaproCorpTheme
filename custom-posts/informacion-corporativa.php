<?php
new InformacionCorporativa();
class InformacionCorporativa{
	public $arguments;
	private $labels;

	public function __construct($labels=null, $arguments=null)
	{
		$labels=array(
			'name'                  => _x( 'Información Corporativa', 'Post Type General Name', 'zonprocorp' ),
			'singular_name'         => _x( 'Información', 'Post Type Singular Name', 'zonprocorp' ),
			'menu_name'             => __( 'Información Corporativa', 'zonprocorp' ),
			'name_admin_bar'        => __( 'Información Corporativa', 'zonprocorp' ),
			'archives'              => __( 'Archivo de Información Corporativa', 'zonprocorp' ),
			'parent_item_colon'     => __( 'Información Superior', 'zonprocorp' ),
			'all_items'             => __( 'Todas Las Informaciónes Corporativa', 'zonprocorp' ),
			'add_new_item'          => __( 'Añadir Nueva Información', 'zonprocorp' ),
			'add_new'               => __( 'Nueva Información', 'zonprocorp' ),
			'new_item'              => __( 'Nueva Información', 'zonprocorp' ),
			'edit_item'             => __( 'Editar Información', 'zonprocorp' ),
			'update_item'           => __( 'Actualizar Información', 'zonprocorp' ),
			'view_item'             => __( 'Ver Información', 'zonprocorp' ),
			'search_items'          => __( 'Buscar Información', 'zonprocorp' ),
			'not_found'             => __( 'Información No Encontrado', 'zonprocorp' ),
			'not_found_in_trash'    => __( 'Información No Encontrado en la Papelera', 'zonprocorp' ),
			'featured_image'        => __( 'Imagen Predefinida', 'zonprocorp' ),
			'set_featured_image'    => __( 'Definir Imagen', 'zonprocorp' ),
			'remove_featured_image' => __( 'Borrar Imagen', 'zonprocorp' ),
			'use_featured_image'    => __( 'Usar como imagen', 'zonprocorp' ),
			'insert_into_item'      => __( 'Insertar en Información', 'zonprocorp' ),
			'uploaded_to_this_item' => __( 'Subidos a este Información', 'zonprocorp' ),
			'items_list'            => __( 'Lista de Información Corporativa', 'zonprocorp' ),
			'items_list_navigation' => __( 'Lista de navegacion de Información Corporativa', 'zonprocorp' ),
			'filter_items_list'     => __( 'Filtrar lista de Información Corporativa', 'zonprocorp' ),


		);
		$arguments=array(
			'label'                 => __( 'Informacion', 'zonprocorp' ),
			'description'           => __( 'Informacion Corporativa', 'zonprocorp' ),
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
			'menu_icon'				=>'dashicons-groups',
			'capability_type'       => 'post',
		);
		$this->labels = $labels;
		$this->arguments = $arguments;
		add_action ('init', array(&$this, 'registerAutoridades'));
	}
	public function registerAutoridades(){
		register_post_type( 'infoCorporativa', $this->arguments );
	}
}
