<?php


namespace classes;


class Components
{

    public function __construct()
    {

    }

    public static function pagination () {
        global $wp_query;
        $paged = get_query_var('paged');
    ?>
        <?php echo $paged ?>
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'prev_text' => __('<img src="' . get_template_directory_uri() . '/assets/images/icons/arrow-back-outline.svg" alt="">'),
                'next_text' => __('<img src="' . get_template_directory_uri() . '/assets/images/icons/arrow-forward-outline.svg" alt="">'),
                'current' => max(1, $paged),
                'total' =>  $wp_query->max_num_pages
            ));
            ?>
        </div>
    <?php
    }

}