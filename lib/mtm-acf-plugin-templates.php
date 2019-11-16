<?php

/**
* Add ability to display using plugin templates
* @see http://www.advancedcustomfields.com/resources/custom-location-rules/
*/

add_filter('acf/location/rule_types', 'acf_location_rules_blocktypes');
function acf_location_rules_blocktypes( $choices )
{
    $choices['Page']['blocktemplates'] = 'Block Templates';

    return $choices;
}

add_filter('acf/location/rule_values/blocktemplates', 'acf_location_rules_values_blocktemplates');
function acf_location_rules_values_blocktemplates( $choices )
{
	$choices = array();

	$templates = array(
                        'Custom Block Template' => '../templates/template-block-content.php',
                        'Single Scroll Template' => '../templates/template-single-scroll.php'
                    );

	foreach( $templates as $k => $v ) {

		$choices[ $v ] = $k;

	}

    return $choices;
}

// Updated to reflect post templates for 4.7

add_filter('acf/location/rule_match/blocktemplates', 'acf_location_rules_match_blocktemplates', 10, 3);
function acf_location_rules_match_blocktemplates( $match, $rule, $options )
{
    // bail early if not a post
		if( !isset( $options['post_id'] ) || !$options['post_id'] ) return false;

		// vars
		$templates = array();
		$post_type = get_post_type( $options['post_id'] );
		$page_template = (isset($options['page_template']) ? $options['page_template'] : null);


		// get templates (WP 4.7)
		if( acf_version_compare('wp', '>=', '4.7') ) {

			$templates = wp_get_theme()->get_post_templates();

		}

		// 'page' is always a valid pt even if no templates exist in the theme
		// allows scenario where page_template = 'default' and no templates exist
		if( !isset($templates['page']) ) {

			$templates['page'] = array();

		}

		// bail early if this post type does not allow for templates
		if( !isset($templates[ $post_type ]) ) return false;


		// get page template
		if( !$page_template ) {

			$page_template = get_post_meta( $options['post_id'], '_wp_page_template', true );

		}

		// new post - no page template
		if( !$page_template ) $page_template = "default";


		// match
		$match = ( $page_template === $rule['value'] );


		// override for "all"
        if( $rule['value'] == 'all' ) $match = true;


		// reverse if 'not equal to'
        if( $rule['operator'] === '!=' ) {

        	$match = !$match;

        }

		// return
		return $match;

}
