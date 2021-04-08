<p align="center">
<img width="200" src="https://imco.space/assets/img/branding-full.svg">
</p>

# WPSMASCSS
A theme template for IMCO wordpress Projects

_This theme uses composer <a href="https://www.php-fig.org/psr/psr-4/">PSR-4</a> Coding Standard for theme development._ 

To install composer, refer to their <a href="https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos">documentation</a> page.

After installing composer run `php composer.phar dump-autoload`

- **Actions**
  -
  **`wp_smascss_post_thumbnail`**
  Action for displaying post thumbnails with `width` and `height` attribute.

- **Filters** 
  -
  **`google_fonts_url`**
  A filter for removing or adding more google fonts

  _**Example**: Adding new google font `functions.php`_ 
  
  ```php
  add_action('google_font_url', function( $urls ){
    $urls['roboto'] = [
        'url' => 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap',
        'media' => 'screen'
    ];
    return $urls;
  });
  ```

  _**Example**: Removing a font `functions.php`_
  
  ```php
  add_action('google_font_url', function( $urls ){
    unset($urls['roboto']);
    return $urls;
  }, 11);
  ```