<?php


function category_walker () {
    global $post;
    $categories = get_the_category( $post->ID );
?>
    <ul class="category-list">
        <?php
        foreach ($categories as $key => $category): ?>
            <li> <?= $category->name ?> </li>
        <?php endforeach;?>
    </ul>
<?php
}