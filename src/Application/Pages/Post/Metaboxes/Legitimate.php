<?php
namespace Legitimate\Application\Pages\Post\Metaboxes;

class Legitimate
{
    const LEGITIMATE_API_URL = 'https://www.legitimate.net/api/articles/grab?url=';
    public function loadContent()
    {
        global $post;
        require_once Legitimate_BACKEND_VIEWS.'post/metabox.php';
    }

    public function saveMetaData()
    {
        global $post;
        if ( ! current_user_can( 'edit_post', $post->ID ) ) return;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        if( $post->post_type == 'post' ) {
            $post_id = $post->ID;
            if(isset($_POST[LEGITIMATE_TITLE])) {
                $trim_title = sanitize_text_field(substr($_POST[LEGITIMATE_TITLE], 0, 100));
                update_post_meta($post_id, LEGITIMATE_TITLE, $trim_title);
            }
            if(isset($_POST[LEGITIMATE_DESCRIPTION])) {
                $trim_description = sanitize_text_field(substr($_POST[LEGITIMATE_DESCRIPTION], 0, 160));
                update_post_meta($post_id, LEGITIMATE_DESCRIPTION, $trim_description);
            }
            if(isset($_POST[LEGITIMATE_TAGS])) {
                $tags = sanitize_text_field($_POST[LEGITIMATE_TAGS]);
                update_post_meta($post_id, LEGITIMATE_TAGS, $tags);
            }
            if(isset($_POST[LEGITIMATE_POST_AUTHOR_CODE])) {
                $author_code = sanitize_text_field($_POST[LEGITIMATE_POST_AUTHOR_CODE]);
                update_post_meta($post_id, LEGITIMATE_POST_AUTHOR_CODE, $author_code);
            }
            if(isset($_POST[LEGITIMATE_IMAGE])) {
                $image_url = sanitize_text_field($_POST[LEGITIMATE_IMAGE]);
                update_post_meta($post_id, LEGITIMATE_IMAGE, $image_url);
            }
            $post_url = get_permalink($post_id);
            
            
            wp_remote_post(self::LEGITIMATE_API_URL.$post_url);
        }
    }
}
