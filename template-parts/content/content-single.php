
    <div class="row p-0">
        <div class="col-md-6">
            <p>
                Posted: <strong><?php echo get_the_date() ?></strong>
            </p>
        </div>
        <div class="col-md-6 text-right">
            <p> by: <strong><?php echo get_the_author() ?></strong></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <img class="w-100" src="<?= get_the_post_thumbnail_url() ?>">
        </div>
        <div class="col-md-6">
            <h2> <?php __( the_title(  ), 'tyreconnect') ?> </h2>
            <?php the_content() ?>
        </div>
        <div class="col-md-6 text-right">
            <?php category_walker(); ?>
        </div>


    </div>