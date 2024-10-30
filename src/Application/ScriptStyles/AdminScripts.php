<?php
namespace Legitimate\Application\ScriptStyles;

class AdminScripts
{
	
	public function __construct($hook_suffix)
	{
        global $post_type;
        if( 'post' == $post_type )
		{

            if ( ! did_action( 'wp_enqueue_media' ) ) {
                wp_enqueue_media();
            }
            wp_register_script('legitimate-admin-script', Legitimate_BACKEND_ASSETS.'js/scripts.js', array('jquery'));
            wp_enqueue_script('legitimate-admin-script');

		}
	}
}