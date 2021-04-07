<?php


namespace classes;


use admin\options\Options;

class Filters
{

    public function __construct()
    {
        add_filter( 'google_font_url', array( $this, 'google_font_url' ), 10, 1 );
        add_filter('design_library_post_title', array( $this, 'design_library_post_title' ), 10, 1);
    }

    public function google_font_url( $google_fonts = [] ) {
        $google_fonts['Roboto'] = [
            'url' => 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap',
            'media' => 'screen'
        ];
        return $google_fonts;
    }

    public function design_library_post_title ( $title ) {
        if ( 'Dos and Don\'ts' === $title ) {
            $title = 'Please Don\'t';
        }
        return $title;
    }

}