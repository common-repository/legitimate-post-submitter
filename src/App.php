<?php


namespace Legitimate;

use Legitimate\Application\Pages\Post\Metaboxes\Legitimate;
use Legitimate\Application\ScriptStyles\Handler as ScriptStyleHandler;
use Legitimate\Application\Pages\User\Profile;

class App
{
    public function __construct()
    {

        add_action("admin_init", array($this,"adminInitCallback"));


        add_action( 'show_user_profile', array($this,'userProfileFields' ));
        add_action( 'edit_user_profile', array($this,'userProfileFields' ));
        add_action( 'personal_options_update', array($this,'saveUserProfileFields' ));
        add_action( 'edit_user_profile_update', array($this,'saveUserProfileFields' ));


        add_action('save_post', array($this,'savePostCallback'));
        add_action('wp_head',array($this,'authorMetaFields'));

        add_action('admin_enqueue_scripts', array($this,'registerEnqueueAdminScriptsStyles'));

    }

    public function adminInitCallback()
    {
        add_meta_box("legitimate-fields", "Legitimate", array($this,'metaCallback'), 'post', "advanced", "high");
    }

    public function metaCallback()
    {
        $metaBox = new Legitimate();
        $metaBox->loadContent();
    }

    public function savePostCallback()
    {
        $metaBox =  new Legitimate();
        $metaBox->saveMetaData();
    }

    public function userProfileFields($user)
    {
        $userProfile = new Profile();
        $userProfile->showFields($user);
    }

    public function saveUserProfileFields( $user_id )
    {
        $userProfile = new Profile();
        $userProfile->saveProfile($user_id);
    }

    public function registerEnqueueAdminScriptsStyles ($hook_suffix)
    {
        $scriptStyles = new ScriptStyleHandler();
        $scriptStyles->loadAdminScriptStyles($hook_suffix);
    }

    public function authorMetaFields()
    {
        if(is_single()) {
            legitimate_get_post_header_meta_fields();
        }
    }
}