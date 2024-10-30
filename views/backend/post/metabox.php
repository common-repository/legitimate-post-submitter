<?php
$legitimate_title = esc_attr(get_post_meta($post->ID,LEGITIMATE_TITLE, true));
$legitimate_description = esc_attr(get_post_meta($post->ID,LEGITIMATE_DESCRIPTION, true));
$legitimate_tags = esc_attr(get_post_meta($post->ID,LEGITIMATE_TAGS, true));
$legitimate_post_author_code = esc_attr(get_post_meta($post->ID,LEGITIMATE_POST_AUTHOR_CODE, true));
$legitimate_author_code = esc_attr(get_user_meta(get_current_user_id(),LEGITIMATE_AUTHOR_CODE, true));
$legitimate_image = esc_attr(get_post_meta($post->ID,LEGITIMATE_IMAGE, true));
if(!empty($legitimate_post_author_code)) {
    $author_code =  $legitimate_post_author_code;
} else {
    $author_code = $legitimate_author_code;
}

?>
<table id="legitimate-content">
    <tbody>
        <tr>
            <th role="columnheader">
                <label for="legitimate-title">Title</label>
            </th>
        </tr>
        <tr>
            <th role="columnheader">
                <p>If you want to personalise the title for Legitimate, otherwise we will use the meta title or Open Graph title. Max length 100 characters</p>
            </th>
        </tr>
        <tr>
            <td>
                <input class="legitimate-counter full-width" data-maxallowed="100" type="text" name="<?php echo LEGITIMATE_TITLE; ?>" id="legitimate-title" value="<?php echo $legitimate_title; ?>">
            </td>
        </tr>
        <tr>
            <th role="columnheader">
                <label for="legitimate-description">Description</label>
            </th>
        </tr>
        <tr>
            <th role="columnheader">
                <p>If you want to personalise the description for Legitimate, otherwise we will use the meta title or Open Graph description. Max length 160 characters</p>
            </th>
        </tr>
        <tr>
            <td>
                <textarea class="legitimate-counter full-width" data-maxallowed="160" cols="40" rows="5" name="<?php echo LEGITIMATE_DESCRIPTION; ?>" id="legitimate-description"><?php echo $legitimate_description; ?></textarea>
            </td>
        </tr>
        <tr>
            <th role="columnheader">
                <label for="legitimate-tags">Tags</label>
            </th>
        </tr>
        <tr>
            <th role="columnheader">
                <p>Enter up to 5 tags separated by commas</p>
            </th>
        </tr>
        <tr>
            <td>
                <input class="full-width" type="text" name="<?php echo LEGITIMATE_TAGS; ?>" id="legitimate-tags" value="<?php echo $legitimate_tags; ?>">
            </td>
        </tr>
        <tr>
            <th role="columnheader">
                <label for="legitimate-post-author-code">Creator Code</label>
            </th>
        </tr>
        <tr>
            <th role="columnheader">
                <p>This is how we identify the creator in our system.</p>
            </th>
        </tr>
            <td>
                <input class="full-width" type="text" name="<?php echo LEGITIMATE_POST_AUTHOR_CODE; ?>" id="legitimate-post-author-code" value="<?php echo $author_code; ?>">
            </td>
        </tr>
        <tr>
            <th>
                <label for="legitimate-image">Image</label>
            </th>
        </tr>
        <tr>
            <th role="columnheader">
                <p>Please use a 16 x 9 aspect ratio with a file size no bigger than 1mb.</p>
            </th>
        </tr>
            <td>
                <input readonly class="half-width" type="text" name="<?php echo LEGITIMATE_IMAGE ?>" id="legitimate-image" value="<?php echo $legitimate_image; ?>">
                <input type="button" class="browser button button-hero" name="legitimate_image_btn" id="legitimate_image_btn" value="Upload Image">
                <input type="button" class="browser button button-hero" name="legitimate_image_remove_btn" id="legitimate_image_remove_btn" value="Remove Image"><br>
                <span id="image-help"></span>
            </td>
        </tr>
        <tr>
            <td><img id="legitimate-img-preview" src="<?php echo $legitimate_image; ?>" alt="No Image"></td>
        </tr>
    </tbody>
</table>
