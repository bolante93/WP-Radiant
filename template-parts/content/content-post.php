<?php
    while( have_posts() ): the_post();
?>
    <article class="post">
        <div class="entry-header cf">
            <h1><a href="javascript:" title=""> <?php the_title(); ?> </a></h1>
            <p class="post-meta">
                <time class="date" datetime="2014-01-14T11:24">Jan 14, 2014</time>
                /
                <span class="categories">
                     <a href="#">Design</a> /
                     <a href="#">User Inferface</a> /
                     <a href="#">Web Design</a>
                </span>
            </p>
        </div>
        <div class="post-thumb">
            <a href="#" title=""><img src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" alt="post-image" title="post-image"></a>
        </div>
        <div class="post-content">
            <p> <?php the_excerpt(); ?> </p>
        </div>
    </article> <!-- post end -->

<?php
        endwhile;