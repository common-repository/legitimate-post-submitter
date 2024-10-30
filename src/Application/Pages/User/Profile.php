<?php


namespace Legitimate\Application\Pages\User;


class Profile
{
    public function showFields($user)
    {
        require_once Legitimate_BACKEND_VIEWS.'user/profile-fields.php';
    }

    public function saveProfile($user_id)
    {
        if ( !current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }
        if(isset($_POST[LEGITIMATE_AUTHOR_URL])) {
            update_user_meta( $user_id, LEGITIMATE_AUTHOR_URL, sanitize_text_field($_POST[LEGITIMATE_AUTHOR_URL]) );
        }
        if(isset($_POST[LEGITIMATE_AUTHOR_CODE])) {
            update_user_meta( $user_id, LEGITIMATE_AUTHOR_CODE, sanitize_text_field($_POST[LEGITIMATE_AUTHOR_CODE]) );
        }
    }
}