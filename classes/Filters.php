<?php


namespace classes;


use admin\options\Options;

class Filters
{

    public function __construct()
    {
        add_filter( 'google_font_url', array( $this, 'google_font_url' ), 10, 1 );
        add_filter( 'post_thumbnail_attributes', array( $this, 'post_thumbnail_attributes' ), 10, 1);
    }

    /**
     * Filter for adding / removing google fonts
     * @param array $google_fonts
     * @return array|mixed
     */
    public function google_font_url( $google_fonts = [] ) {
        $google_fonts['roboto'] = [
            'url' => 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap',
            'media' => 'screen'
        ];
        return $google_fonts;
    }

    /**
     * Filter for adding additional attributes to `<img>` tags
     * @param $attributes
     * @return mixed
     */
    public function post_thumbnail_attributes( $attributes = [] ): array
    {
        $attributes['loading'] = 'lazy';
        return $attributes;
    }

}