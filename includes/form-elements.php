<?php

function buddyforms_form_setup_nav_li_cpt() { ?>
	<li class="cpt-nav"><a class="cpt"
	                       href="#cpt"
	                       data-toggle="tab"><?php _e( 'Custom Post Type', 'buddyforms' ); ?></a>
	</li><?php
}

add_action( 'buddyforms_form_setup_nav_li_last', 'buddyforms_form_setup_nav_li_cpt' );

function buddyforms_form_setup_tab_pane_cpt() {
	global $post, $buddyform; ?>


	<h4><?php _e('Custom Post Type'); ?></h4>

	<p>
		You can create a post type from this form.
	</p>

	<?php

	$form_setup = array();

	if ( ! $buddyform ) {
		$buddyform = get_post_meta( get_the_ID(), '_buddyforms_options', true );
	}

	$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Create new Post Type from this Form', 'buddyforms' ) . '</b>', "buddyforms_options[create_post_type]", array( 'create_post_type' => __( 'Create Post Type', 'buddyforms' ) ), array(
		'value'     => isset( $buddyform['create_post_type'] ) ? $buddyform['create_post_type'] : '',
		'shortDesc' => '(CPTUI default: true) Whether or not posts of this type should be shown in the admin UI and is publicly queryable.',
		'id'        => 'create_post_type',
	) );

	buddyforms_display_field_group_table( $form_setup );

	?>

	<div class="tab-pane fade in" id="cpt">
	<div class="buddyforms_accordion_cpt">


		<ul>

			<?php

			$form_slug = $post->post_name;

			$form_setup = array();

			if ( ! $buddyform ) {
				$buddyform = get_post_meta( get_the_ID(), '_buddyforms_options', true );
			}

			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Create new Post Type from this Form', 'buddyforms' ) . '</b>', "buddyforms_options[create_post_type]", array( 'create_post_type' => __( 'Create Post Type', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['create_post_type'] ) ? $buddyform['create_post_type'] : '',
				'shortDesc' => '(CPTUI default: true) Whether or not posts of this type should be shown in the admin UI and is publicly queryable.'
			) );

			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Public', 'buddyforms' ) . '</b>', "buddyforms_options[public]", array( 'public' => __( 'public', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['public'] ) ? $buddyform['public'] : '',
				'shortDesc' => '(CPTUI default: true) Whether or not posts of this type should be shown in the admin UI and is publicly queryable.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Publicly Queryable', 'buddyforms' ) . '</b>', "buddyforms_options[publicly_queryable]", array( 'publicly_queryable' => __( 'publicly_queryable', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['publicly_queryable'] ) ? true : false,
				'shortDesc' => '(default: true) Whether or not queries can be performed on the front end as part of parse_request()'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Show UI', 'buddyforms' ) . '</b>', "buddyforms_options[show_ui]", array( 'show_ui' => __( 'show_ui', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['show_ui'] ) ? true : false,
				'shortDesc' => '(default: true) Whether or not to generate a default UI for managing this post type.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Show in REST API', 'buddyforms' ) . '</b>', "buddyforms_options[show_in_rest]", array( 'show_in_rest' => __( 'show_in_rest', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['show_in_rest'] ) ? true : false,
				'shortDesc' => '(default: false) Whether or not to show this post type data in the WP REST API.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'REST API base slug', 'buddyforms' ) . '</b>', "buddyforms_options[rest_base]",  array(
				'value'     => isset( $buddyform['rest_base'] ) ? true : false,
				'shortDesc' => 'Description'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Has Archive', 'buddyforms' ) . '</b>', "buddyforms_options[has_archive]", array( 'has_archive' => __( 'has_archive', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['has_archive'] ) ? true : false,
				'shortDesc' => 'If left blank, the archive slug will default to the post type slug.(default: false) Whether or not the post type will have a post type archive URL.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Show in Nav Menus', 'buddyforms' ) . '</b>', "buddyforms_options[show_in_menu]", array( 'publicly_queryable' => __( 'show_in_menu', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['show_in_menu'] ) ? true : false,
				'shortDesc' => '(CPTUI default: true) Whether or not this post type is available for selection in navigation menus.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Exclude From Search', 'buddyforms' ) . '</b>', "buddyforms_options[exclude_from_search]", array( 'exclude_from_search' => __( 'exclude_from_search', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['exclude_from_search'] ) ? true : false,
				'shortDesc' => '(default: false) Whether or not to exclude posts with this post type from front end search results.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Capability Type', 'buddyforms' ) . '</b>', "buddyforms_options[capability_type]", array( 'capability_type' => __( 'capability_type', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['capability_type'] ) ? true : false,
				'shortDesc' => 'The post type to use for checking read, edit, and delete capabilities.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'map_meta_cap', 'buddyforms' ) . '</b>', "buddyforms_options[map_meta_cap]", array( 'publicly_queryable' => __( 'map_meta_cap', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['map_meta_cap'] ) ? true : false,
				'shortDesc' => 'Description'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Hierarchical', 'buddyforms' ) . '</b>', "buddyforms_options[hierarchical]", array( 'hierarchical' => __( 'hierarchical', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['hierarchical'] ) ? true : false,
				'shortDesc' => '(default: false) Whether or not the post type can have parent-child relationships.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Rewrite', 'buddyforms' ) . '</b>', "buddyforms_options[rewrite]", array( 'rewrite' => __( 'rewrite', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['rewrite'] ) ? true : false,
				'shortDesc' => '(default: true) Whether or not WordPress should use rewrites for this post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Custom Rewrite Slug', 'buddyforms' ) . '</b>', "buddyforms_options[rewrite_slug]",  array(
				'value'     => isset( $buddyform['rewrite_slug'] ) ? true : false,
				'shortDesc' => 'Custom post type slug to use instead of the default.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'With Front', 'buddyforms' ) . '</b>', "buddyforms_options[rewrite_withfront]", array( 'rewrite_withfront' => __( 'rewrite_withfront', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['rewrite_withfront'] ) ? true : false,
				'shortDesc' => '(default: true) Should the permastruct be prepended with the front base.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Query Var', 'buddyforms' ) . '</b>', "buddyforms_options[query_var]", array( 'query_var' => __( 'query_var', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['query_var'] ) ? true : false,
				'shortDesc' => '(default: true) Sets the query_var key for this post type.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Custom Query Var Slug', 'buddyforms' ) . '</b>', "buddyforms_options[query_var_slug]", array( 'query_var_slug' => __( 'query_var_slug', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['query_var_slug'] ) ? true : false,
				'shortDesc' => 'Custom query var slug to use instead of the default.'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'Supports', 'buddyforms' ) . '</b>', "buddyforms_options[supports]", array(
				'title' => __( 'Title', 'buddyforms' ) ,
				'editor' => __( 'Editor', 'buddyforms' ) ,
				'thumbnail' => __( 'Featured Image', 'buddyforms' ) ,
				'excerpts' => __( 'Excerpt', 'buddyforms' ) ,
				'trackbacks' => __( 'Title', 'buddyforms' ) ,
				'trackbacks' => __( 'Trackbacks', 'buddyforms' ) ,
				'custom-fields' => __( 'Custom Fields', 'buddyforms' ) ,
				'comments' => __( 'Comments', 'buddyforms' ) ,
				'revisions' => __( 'Revisions', 'buddyforms' ) ,
				'author' => __( 'Author', 'buddyforms' ) ,
				'page-attributes' => __( 'Page Attributes', 'buddyforms' ) ,
				'post-formats' => __( 'Post Formats', 'buddyforms' ) ,
				'title' => __( 'None', 'buddyforms' ) ,
			), array(
				'value'     => isset( $buddyform['supports'] ) ? $buddyform['supports'] : false,
				'shortDesc' => 'Use this input to register custom "supports" values, separated by commas. Learn about this at Custom "Supports"'
			) );
			$form_setup[]  = new Element_Checkbox( '<b>' . __( 'taxonomies', 'buddyforms' ) . '</b>', "buddyforms_options[taxonomies]", array( 'taxonomies' => __( 'taxonomies', 'buddyforms' ) ), array(
				'value'     => isset( $buddyform['taxonomies'] ) ? true : false,
				'shortDesc' => 'Description'
			) );


			buddyforms_formbuilder_settings( 'cpt_setup', 'Setup', $form_setup );


			$form_setup = array();
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Menu Name', 'buddyforms' ) . '</b>', "buddyforms_options[labels][menu_name]", array(
				'value'     => isset( $buddyform['labels']['menu_name'] ) ? $buddyform['labels']['menu_name'] : '',
				'shortDesc' => 'Custom admin menu name for your custom post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'All Items', 'buddyforms' ) . '</b>', "buddyforms_options[labels][all_items]", array(
				'value'     => isset( $buddyform['labels']['all_items'] ) ? $buddyform['labels']['all_items'] : '',
				'shortDesc' => 'Used in the post type admin submenu.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Add New', 'buddyforms' ) . '</b>', "buddyforms_options[labels][add_new]", array(
				'value'     => isset( $buddyform['labels']['add_new'] ) ? $buddyform['labels']['add_new'] : '',
				'shortDesc' => 'Used in the post type admin submenu.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Add New Item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][add_new_item]", array(
				'value'     => isset( $buddyform['labels']['add_new_item'] ) ? $buddyform['labels']['add_new_item'] : '',
				'shortDesc' => 'Used at the top of the post editor screen for a new post type post.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Edit Item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][edit_item]", array(
				'value'     => isset( $buddyform['labels']['edit_item'] ) ? $buddyform['labels']['edit_item'] : '',
				'shortDesc' => 'Used at the top of the post editor screen for an existing post type post.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'New Item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][new_item]", array(
				'value'     => isset( $buddyform['labels']['new_item'] ) ? $buddyform['labels']['new_item'] : '',
				'shortDesc' => 'Post type label. Used in the admin menu for displaying post types.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'View Item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][view_item]", array(
				'value'     => isset( $buddyform['labels']['view_item'] ) ? $buddyform['labels']['view_item'] : '',
				'shortDesc' => 'Used in the admin bar when viewing editor screen for a published post in the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Search Item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][search_items]", array(
				'value'     => isset( $buddyform['labels']['search_items'] ) ? $buddyform['labels']['search_items'] : '',
				'shortDesc' => 'Used as the text for the search button on post type list screen.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Not Found', 'buddyforms' ) . '</b>', "buddyforms_options[labels][not_found]", array(
				'value'     => isset( $buddyform['labels']['not_found'] ) ? $buddyform['labels']['not_found'] : '',
				'shortDesc' => 'Used when there are no posts to display on the post type list screen.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Not Found in Trash', 'buddyforms' ) . '</b>', "buddyforms_options[labels][not_found_in_trash]", array(
				'value'     => isset( $buddyform['labels']['not_found_in_trash'] ) ? $buddyform['labels']['not_found_in_trash'] : '',
				'shortDesc' => 'Used when there are no posts to display on the post type list trash screen.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Parent', 'buddyforms' ) . '</b>', "buddyforms_options[labels][parent_item_colon]", array(
				'value'     => isset( $buddyform['labels']['parent_item_colon'] ) ? $buddyform['labels']['parent_item_colon'] : '',
				'shortDesc' => 'Used for hierarchical types that need a colon.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Featured Image', 'buddyforms' ) . '</b>', "buddyforms_options[labels][featured_image]", array(
				'value'     => isset( $buddyform['labels']['featured_image'] ) ? $buddyform['labels']['featured_image'] : '',
				'shortDesc' => 'Used as the "Set featured image" phrase for the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Set Featured Image', 'buddyforms' ) . '</b>', "buddyforms_options[labels][set_featured_image]", array(
				'value'     => isset( $buddyform['labels']['set_featured_image'] ) ? $buddyform['labels']['set_featured_image'] : '',
				'shortDesc' => 'Used as the "Featured Image" phrase for the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Remove Featured Image', 'buddyforms' ) . '</b>', "buddyforms_options[labels][remove_featured_image]", array(
				'value'     => isset( $buddyform['labels']['remove_featured_image'] ) ? $buddyform['labels']['remove_featured_image'] : '',
				'shortDesc' => 'Used as the "Remove featured image" phrase for the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Use Featured Image', 'buddyforms' ) . '</b>', "buddyforms_options[labels][use_featured_image]", array(
				'value'     => isset( $buddyform['labels']['use_featured_image'] ) ? $buddyform['labels']['use_featured_image'] : '',
				'shortDesc' => 'Used as the "Use as featured image" phrase for the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Archives', 'buddyforms' ) . '</b>', "buddyforms_options[labels][archives]", array(
				'value'     => isset( $buddyform['labels']['archives'] ) ? $buddyform['labels']['archives'] : '',
				'shortDesc' => 'Post type archive label used in nav menus.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Insert into item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][insert_into_item]", array(
				'value'     => isset( $buddyform['labels']['insert_into_item'] ) ? $buddyform['labels']['insert_into_item'] : '',
				'shortDesc' => 'Used as the "Insert into post" or "Insert into page" phrase for the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Uploaded to this Item', 'buddyforms' ) . '</b>', "buddyforms_options[labels][uploaded_to_this_item]", array(
				'value'     => isset( $buddyform['labels']['uploaded_to_this_item'] ) ? $buddyform['labels']['uploaded_to_this_item'] : '',
				'shortDesc' => 'Used as the "Uploaded to this post" or "Uploaded to this page" phrase for the post type.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Filter Items List', 'buddyforms' ) . '</b>', "buddyforms_options[labels][filter_items_list]", array(
				'value'     => isset( $buddyform['labels']['filter_items_list'] ) ? $buddyform['labels']['add_new'] : '',
				'shortDesc' => 'Screen reader text for the filter links heading on the post type listing screen.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Items List Navigation', 'buddyforms' ) . '</b>', "buddyforms_options[labels][items_list_navigation]", array(
				'value'     => isset( $buddyform['labels']['items_list_navigation'] ) ? $buddyform['labels']['items_list_navigation'] : '',
				'shortDesc' => 'Screen reader text for the pagination heading on the post type listing screen.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'Items List', 'buddyforms' ) . '</b>', "buddyforms_options[labels][items_list]", array(
				'value'     => isset( $buddyform['labels']['items_list'] ) ? $buddyform['labels']['items_list'] : '',
				'shortDesc' => 'Screen reader text for the items list heading on the post type listing screen.'
			) );
			$form_setup[]  = new Element_Textbox( '<b>' . __( 'parent_item_colon', 'buddyforms' ) . '</b>', "buddyforms_options[labels][parent_item_colon]", array(
				'value'     => isset( $buddyform['labels']['parent_item_colon'] ) ? $buddyform['labels']['parent_item_colon'] : '',
				'shortDesc' => 'Description'
			) );
			buddyforms_formbuilder_settings( 'cpt_label', 'Labels', $form_setup );


			?>
		</ul>
	</div>
	</div><?php
}

add_action( 'buddyforms_form_setup_tab_pane_last', 'buddyforms_form_setup_tab_pane_cpt' );


function buddyforms_formbuilder_settings( $trigger, $link_label, $form_setup ){
	?>
	<li id="trigger<?php echo $trigger ?>" class="bf_trigger_list_item <?php echo $trigger ?> ui-sortable-handle">
		<div class="accordion_fields">
			<div class="accordion-group">
				<div class="accordion-heading-options">
					<table class="wp-list-table widefat fixed posts">
						<tbody>
						<tr>
							<td class="field_label">
								<a style="display: block;" class="bf_edit_field row-title accordion-toggle collapsed" data-toggle="collapse"
								   data-parent="#accordion_text" href="#accordion_<?php echo $trigger ?>"
								   title="Edit this Field"
								   href="#">
									<strong>
										<?php echo $link_label; ?>
									</strong>
								</a>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div id="accordion_<?php echo $trigger ?>" class="accordion-body collapse">
					<div class="accordion-inner">
						<?php buddyforms_display_field_group_table( $form_setup, $trigger ) ?>
					</div>
				</div>
			</div>
		</div>
	</li>
	<?php

}

add_filter('buddyforms_form_builder_post_type', 'buddyforms_cpt_form_builder_post_type');
function buddyforms_cpt_form_builder_post_type($post_types){
	$post_types['custom'] = 'Custom';
	return $post_types;
}


add_action( 'buddyforms_admin_js_footer', 'buddyforms_cpt_admin_js_footer' );
function buddyforms_cpt_admin_js_footer(){

	?>
	<script>
		jQuery(document).ready(function (jQuery) {

			// Init function to check the post type and show the custom post type nav is needed
			from_setup_post_type_custom();

			// On Change listener for the post type. If the post type is custom show the custom post type nav
			jQuery(document.body).on('change', '#create_post_type-0', function () {
				from_setup_post_type_custom();
			});

		});

		// function to show hide the custom post type nav
		function from_setup_post_type_custom() {
			var create_post_type = jQuery('#create_post_type-0').val();


			if(jQuery('#create_post_type-0').is(":checked")){
				jQuery('.buddyforms_accordion_cpt').show();
			} else {
				jQuery('.buddyforms_accordion_cpt').hide();
			}
		}

	</script>
	<?php

}
