<?php
/**
 * Return a custom field stored by the Advanced Custom Fields plugin
 * @see http://seanbutze.com/safely-using-advanced-custom-fields-via-wrapper-functions/
 * 
 * @global $post
 * @param str $key The key to look for
 * @param mixed $id The post ID (int|str, defaults to $post->ID)
 * @param mixed $default Value to return if get_field() returns nothing
 * @return mixed
 * @uses get_field()
 */

if( !function_exists( '_get_field' ) ){
  function _get_field( $key, $id=false, $default='' ) {
    global $post;
    $key = trim( filter_var( $key, FILTER_SANITIZE_STRING ) );
    $result = '';
   
    if ( function_exists( 'get_field' ) ) {
      if ( isset( $post->ID ) && !$id )
        $result = get_field( $key );
      else
        $result = get_field( $key, $id );
   
      if ( $result == '' ) // If ACF enabled but key is undefined, return default
        $result = $default;
   
    } else {
      $result = $default;
    }
    return $result;
  }
}

/**
 * Shortcut for 'echo _get_field()'
 * @param str $key The meta key
 * @param mixed $id The post ID (int|str, defaults to $post->ID)
 * @param mixed $default Value to return if there's no value for the custom field $key
 * @return void
 * @uses _get_field()
 */
if( !function_exists( '_the_field' ) ){
  function _the_field( $key, $id=false, $default='' ) {
    echo _get_field( $key, $id, $default );
  }
}
/**
 * Get a sub field of a Repeater field
 * @param str $key The meta key
 * @param mixed $default Value to return if there's no value for the custom field $key
 * @return mixed
 * @uses get_sub_field()
 */
if( !function_exists( '_get_sub_field' ) ){
  function _get_sub_field( $key, $default='' ) {
     if ( function_exists( 'get_sub_field' ) &&  get_sub_field( $key ) )  
      return get_sub_field( $key );
     else 
      return $default;
  }
}
/**
 * Shortcut for 'echo _get_sub_field()'
 * @param str $key The meta key Value to return if there's no value for the custom field $key
 * @return void
 * @uses _get_sub_field()
 */
if( !function_exists( '_the_sub_field' ) ){
  function _the_sub_field( $key, $default='' ) {
    echo _get_sub_field( $key, $default );
  }
}
/**
 * Check if a given field has a sub field
 * @param str $key The meta key
 * @param mixed $id The post ID
 * @return bool
 * @uses has_sub_field()
 */
if( !function_exists( '_has_sub_field' ) ){
  function _has_sub_field( $key, $id=false ) {
    if ( function_exists('has_sub_field') )
      return has_sub_field( $key, $id );
    else
      return false;
  }
}