<h3>Legitimate profile information</h3>

<table class="form-table">
    <tr>
        <th><label for="legitimate-profile-url">Legitimate Profile URL</label></th>
        <td>
            <input type="text" name="<?php echo LEGITIMATE_AUTHOR_URL; ?>" id="legitimate-profile-url" value="<?php echo esc_attr( get_user_meta( $user->ID,LEGITIMATE_AUTHOR_URL,true ) ); ?>" class="regular-text" /><br />
            <span class="description">Please enter your Legitimate Profile URL.</span>
        </td>
    </tr>
    <tr>
        <th><label for="legitimate-author-code">Legitimate Creator Code</label></th>
        <td>
            <input type="text" name="<?php echo LEGITIMATE_AUTHOR_CODE ?>" id="legitimate-author-code" value="<?php echo esc_attr( get_user_meta( $user->ID,LEGITIMATE_AUTHOR_CODE,true ) ); ?>" class="regular-text" /><br />
            <span class="description">Please enter your Legitimate Creator Code.</span>
        </td>
    </tr>
</table>
