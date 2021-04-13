<?php

function Generate_Featured_Image($post_id) {

    $upload = wp_upload_bits($_FILES["upload_file"]["name"], null, file_get_contents($_FILES["upload_file"]["tmp_name"]));
 
        if ( ! $upload['error'] ) {
            $post_id = $post_id; //set post id to which you need to set featured image
            $filename = $upload['file'];
            $wp_filetype = wp_check_filetype($filename, null);
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => sanitize_file_name($filename),
                'post_content' => '',
                'post_status' => 'inherit'
            );
 
            $attachment_id = wp_insert_attachment( $attachment, $filename, $post_id );
 
            if ( ! is_wp_error( $attachment_id ) ) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
 
                $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
                wp_update_attachment_metadata( $attachment_id, $attachment_data );
                set_post_thumbnail( $post_id, $attachment_id );
            }
        }
    
}

?>