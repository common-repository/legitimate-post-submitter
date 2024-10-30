<?php
if(!function_exists('legitimate_get_post_header_meta_fields')) {
    function legitimate_get_post_header_meta_fields() {
        global $post;
        $user_id = $post->post_author;
        $post_id = $post->ID;
        $legitimate_author_code = esc_attr(get_user_meta($user_id, LEGITIMATE_AUTHOR_CODE,true));
        $legitimate_post_title = esc_attr(get_post_meta($post_id,LEGITIMATE_TITLE, true));
        $legitimate_post_description = esc_attr(get_post_meta($post_id,LEGITIMATE_DESCRIPTION, true));
        $legitimate_post_tags = esc_attr(get_post_meta($post_id,LEGITIMATE_TAGS, true));
        $legitimate_post_author_code = esc_attr(get_post_meta($post_id,LEGITIMATE_POST_AUTHOR_CODE, true));
        $legitimate_post_image = esc_attr(get_post_meta($post_id,LEGITIMATE_IMAGE, true));
        $meta_tags='';
        $meta_tags.='<!-- Legitimate plugin. -->'."\r\n";
        if(!empty($legitimate_post_title)) {
            $meta_tags .= '<meta property="lg:title" content="' . $legitimate_post_title . '" />' . "\r\n";
        }
        if(!empty($legitimate_post_description)) {
            $meta_tags.='<meta property="lg:description" content="'.$legitimate_post_description.'" />'."\r\n";
        }
        if(!empty($legitimate_post_tags)) {
            $meta_tags.='<meta property="lg:tags" content="'.$legitimate_post_tags.'" />'."\r\n";
        }
        $meta_tags.='<meta property="lg:url" content="'.get_permalink($post_id).'" />'."\r\n";

        if(!empty($legitimate_post_image)) {
            $meta_tags .= '<meta property="lg:image" content="' . $legitimate_post_image . '" />' . "\r\n";
        }
        if(!empty($legitimate_post_author_code)) {
            $meta_tags .= '<meta property="lg:creator" content="' . $legitimate_post_author_code . '" />' . "\r\n";
        }
        $meta_tags.='<!-- / Legitimate plugin. -->'."\r\n";

        echo $meta_tags;
    }
}
