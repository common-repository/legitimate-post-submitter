<?php
namespace Legitimate\Application\ScriptStyles;

class AdminStyles
{
	public function __construct ($hook_suffix)
	{
        global $post_type;
        if( 'post' == $post_type )
        {
            wp_enqueue_style( 'legitimate-admin-style' , Legitimate_BACKEND_ASSETS.'css/style.css');
        }
	}
}