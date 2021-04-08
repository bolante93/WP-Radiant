<?php


namespace classes;


use WP_Post;

class Helper
{

    /**
     * Convert post title to lowercase
     * and replace spaces with dash
     *
     * @param WP_Post $post
     * @return string|string[]
     */
    static function generate_dom_target_id( $post ){
        if ( is_a( $post, WP_Post::class ) ) {
            return $post->post_name;
        }
        $str = strtolower($post);
        $str = str_replace(' ','-', $str);
        return $str;
    }

    /**
     * Get `category` taxonomy featured content
     * from metabox field.
     *
     * @param int $category_id
     * @return mixed
     */
    static function get_category_description_meta( $category_id = 0 ) {
        return rwmb_meta( 'cat_featured_content', array( 'object_type' => 'term' ), $category_id );
    }

    /**
     * Get `post` content details from
     * metabox field
     *
     * @param $post_id
     * @return mixed
     */
    static function get_content_details( $post_id ){
        return rwmb_meta( 'featured_content', $post_id );
    }

    /**
     * Add additional attribute to `<a>` tag
     *
     * @param WP_Post $post
     * @return void
     */
    static function page_links_attribute( WP_Post $post)
    {
        $defaults = [ 'disabled'=> 'disabled', 'href'=> 'javascript:void(0);' ];
        if ( $post->post_status === 'draft' ) {
            echo 'href="'.$defaults['href'].'" disabled';
        }else{
            echo 'href="'.get_the_permalink($post->ID).'"';
        }
    }

    /**
     * Show admin controls if current user is logged in
     * and has permission to edit post.
     * @param WP_Post $post
     */
    static function admin_controls( WP_Post $post)
    {
        if ( is_user_logged_in() && current_user_can('edit_post', $post->ID ) )
        ?>
            <a href="<?php echo get_edit_post_link($post->ID) ?>"><span class="dashicons dashicons-edit-large"></span></a>
        <?php
    }

    /**
     * Parse two arguments to merge arrays.
     * this is similar to @see wp_parse_args()
     * but this method supports multi-dimensional array argument
     *
     * @param $array
     * @param $defaults
     * @return array
     * @source  https://mekshq.com/recursive-wp-parse-args-wordpress-function/
     */
    static function wp_parse_args_r( &$array, $defaults ) {
        $array = (array) $array;
        $defaults = (array) $defaults;
        $result = $defaults;
        foreach ( $array as $k => &$v ) {
            if ( is_array( $v ) && isset( $result[ $k ] ) ) {
                $result[ $k ] = self::wp_parse_args_r( $v, $result[ $k ] );
            } else {
                $result[ $k ] = $v;
            }
        }
        return $result;
    }

    static function parse_assc_array_to_attr( $array = [] ){
        $attr = '';
        if ( isset( $array['src'] ) )
            unset( $array['src'] );

        foreach ( $array as $attribute => $value) {
            $attr .= $attribute . '="'.$value.'" ';
        }
       return $attr;
    }

}