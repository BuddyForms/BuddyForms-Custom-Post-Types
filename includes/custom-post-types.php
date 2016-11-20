<?php

function buddyforms_create_post_types(){
	global $buddyforms;


	if(!isset($buddyforms)){
		return;
	}

	foreach ( $buddyforms as $form_slug => $buddyform ){

		if( isset( $buddyform['create_post_type'] ) ){

			if ( !empty( $buddyform['name'] ) ) {
				$labels['name'] = $buddyform['name'];
			}
			if ( !empty( $buddyform['singular_name'] ) ) {
				$labels['singular_name'] = $buddyform['singular_name'];
			}
			if ( !empty( $buddyform['labels']['menu_name'] ) ) {
				$labels['menu_name'] = $buddyform['labels']['menu_name'];
			}
			if ( !empty( $buddyform['labels']['all_items'] ) ) {
				$labels['all_items'] = $buddyform['labels']['all_items'];
			}
			if ( !empty( $buddyform['labels']['add_new'] ) ) {
				$labels['add_new'] = $buddyform['labels']['add_new'];
			}
			if ( !empty( $buddyform['labels']['add_new_item'] ) ) {
				$labels['add_new_item'] = $buddyform['labels']['add_new_item'];
			}
			if ( !empty( $buddyform['labels']['edit_item'] ) ) {
				$labels['edit_item'] = $buddyform['labels']['edit_item'];
			}
			if ( !empty( $buddyform['labels']['new_item'] ) ) {
				$labels['new_item'] = $buddyform['labels']['new_item'];
			}
			if ( !empty( $buddyform['labels']['view_item'] ) ) {
				$labels['view_item'] = $buddyform['labels']['view_item'];
			}
			if ( !empty( $buddyform['labels']['search_items'] ) ) {
				$labels['search_items'] = $buddyform['labels']['search_items'];
			}
			if ( !empty( $buddyform['labels']['not_found'] ) ) {
				$labels['not_found'] = $buddyform['labels']['not_found'];
			}
			if ( !empty( $buddyform['labels']['not_found_in_trash'] ) ) {
				$labels['not_found_in_trash'] = $buddyform['labels']['not_found_in_trash'];
			}
			if ( !empty( $buddyform['labels']['parent_item_colon'] ) ) {
				$labels['parent_item_colon'] = $buddyform['labels']['parent_item_colon'];
			}
			if ( !empty( $buddyform['labels']['featured_image'] ) ) {
				$labels['featured_image'] = $buddyform['labels']['featured_image'];
			}
			if ( !empty( $buddyform['labels']['set_featured_image'] ) ) {
				$labels['set_featured_image'] = $buddyform['labels']['set_featured_image'];
			}
			if ( !empty( $buddyform['labels']['remove_featured_image'] ) ) {
				$labels['remove_featured_image'] = $buddyform['labels']['remove_featured_image'];
			}
			if ( !empty( $buddyform['labels']['use_featured_image'] ) ) {
				$labels['use_featured_image'] = $buddyform['labels']['use_featured_image'];
			}
			if ( !empty( $buddyform['labels']['archives'] ) ) {
				$labels['archives'] = $buddyform['labels']['archives'];
			}
			if ( !empty( $buddyform['labels']['insert_into_item'] ) ) {
				$labels['insert_into_item'] = $buddyform['labels']['insert_into_item'];
			}
			if ( !empty( $buddyform['labels']['uploaded_to_this_item'] ) ) {
				$labels['uploaded_to_this_item'] = $buddyform['labels']['uploaded_to_this_item'];
			}
			if ( !empty( $buddyform['labels']['filter_items_list'] ) ) {
				$labels['filter_items_list'] = $buddyform['labels']['filter_items_list'];
			}
			if ( !empty( $buddyform['labels']['items_list_navigation'] ) ) {
				$labels['items_list_navigation'] = $buddyform['labels']['items_list_navigation'];
			}
			if ( !empty( $buddyform['labels']['items_list'] ) ) {
				$labels['items_list'] = $buddyform['labels']['items_list'];
			}
			if ( !empty( $buddyform['labels']['parent_item_colon'] ) ) {
				$labels['parent_item_colon'] = $buddyform['labels']['parent_item_colon'];
			}

			$args = array(
				'label'               => $labels['name'],
				'labels'              => $labels,
				'description'         => $buddyform['description'],
				'public'              => isset($buddyform['public']) ? false : true,
				'publicly_queryable'  => isset($buddyform['publicly_queryable']) ? false : true,
				'show_ui'             => isset($buddyform['show_ui']) ? false : true,
				'show_in_rest'        => isset($buddyform['show_in_rest']) ? true : false,
				'rest_base'           => isset($buddyform['rest_base']) ? $buddyform['public'] : '',
				'has_archive'         => isset($buddyform['has_archive']) ? true : false,
				'show_in_menu'        => isset($buddyform['show_in_menu']) ? false : true,
				'exclude_from_search' => isset($buddyform['exclude_from_search']) ? true : false,
				'capability_type'     => isset($buddyform['capability_type']) ? $buddyform['public'] : 'post',
				'map_meta_cap'        => isset($buddyform['map_meta_cap']) ? true : false,
				'hierarchical'        => isset($buddyform['hierarchical']) ? true : false,
				'rewrite'             => array(
					'slug' => $buddyform['slug'],
					'with_front' => isset($buddyform['with_front']) ? false : true,
				),
				'query_var'           => isset($buddyform['query_var']) ? true : false,
				'supports'            => isset($buddyform['supports']) ?  array(
					'title',
					'editor',
					'thumbnail'
				) : array(),
				'taxonomies'          => isset($buddyform['taxonomies']) ?  array(
					'product_tag',
				) : array(),
			);
			register_post_type( $buddyform['slug'] , $args );
		}
	}
}