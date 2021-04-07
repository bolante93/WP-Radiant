<?php


namespace classes;


class Components
{

    public function __construct()
    {

    }

    /**
     * Generate pagination link
     */
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

    /**
     * Generate admin controls if user is currently
     * logged in and has permission
     */
    public static function admin_controls() {
        if ( is_user_logged_in() && current_user_can('administrator') ):
            $admin_url = get_admin_url(null, 'admin.php?page=options');
            $customizer_url = get_admin_url(null, 'customize.php');
            ?>
                <ul class="admin-controls">
                    <li>
                        <a href="<?php echo $admin_url ?>">
                            <ion-icon name="person-outline"></ion-icon> <span>Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $customizer_url ?>">
                            <ion-icon name="brush-outline"></ion-icon> <span>Customize</span>
                        </a>
                    </li>
                </ul>
            <?php
        endif;
    }

}