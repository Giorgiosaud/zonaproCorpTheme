<?php

if ( ! function_exists( 'custom_product_type' ) ) {

// Register Custom Taxonomy
function custom_product_type() {

	$labels = array(
		'name'                       => _x( 'Tipos de Productos', 'Taxonomy General Name', 'zonaprocorp' ),
		'singular_name'              => _x( 'Tipo De Producto', 'Taxonomy Singular Name', 'zonaprocorp' ),
		'menu_name'                  => __( 'Tipo', 'zonaprocorp' ),
		'all_items'                  => __( 'Todos Los Tipos', 'zonaprocorp' ),
		'parent_item'                => __( 'Parent Item', 'zonaprocorp' ),
		'parent_item_colon'          => __( 'Parent Item:', 'zonaprocorp' ),
		'new_item_name'              => __( 'Nuevo Tipo', 'zonaprocorp' ),
		'add_new_item'               => __( 'Añadir Nuevo Tipo', 'zonaprocorp' ),
		'edit_item'                  => __( 'Editar Tipo', 'zonaprocorp' ),
		'update_item'                => __( 'Actualizar Tipo', 'zonaprocorp' ),
		'view_item'                  => __( 'Ver Tipo', 'zonaprocorp' ),
		'separate_items_with_commas' => __( 'Separa Tipos Con Comas', 'zonaprocorp' ),
		'add_or_remove_items'        => __( 'Añadir o Borrar Tipos', 'zonaprocorp' ),
		'choose_from_most_used'      => __( 'Escojer de Los Mas Usados', 'zonaprocorp' ),
		'popular_items'              => __( 'Tipos Populares', 'zonaprocorp' ),
		'search_items'               => __( 'Buscar Tipos', 'zonaprocorp' ),
		'not_found'                  => __( 'Not Found', 'zonaprocorp' ),
		'no_terms'                   => __( 'No items', 'zonaprocorp' ),
		'items_list'                 => __( 'Items list', 'zonaprocorp' ),
		'items_list_navigation'      => __( 'Items list navigation', 'zonaprocorp' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tipo_de_producto', array( 'productos' ), $args );

}
add_action( 'init', 'custom_product_type', 0 );

}
