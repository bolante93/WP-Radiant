<?php

namespace admin\options\controller;

/**
 * Class Template
 * @package IntegrityRising
 */
class Controller
{
    /**
     * @var string
     */
    public $path;

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * Template constructor.
     * @param string $path
     * @param array $parameters
     */
    public function __construct(string $path = '', array $parameters = [])
    {
        if ( defined('CONTROLLER_VIEW') ) {
            $this->path = rtrim(CONTROLLER_VIEW, '/').'/';
        }else {
            $this->path = rtrim($path, '/').'/';
        }
        $this->parameters = $parameters;
    }

    /**
     * @param string $view
     * @param array $context
     * @return string
     * @throws \Exception
     */
    public function render( string $view, array $context = [] ): string
    {
        if ( !strpos($view, '.php') ) {
            $view .= '.php';
        }
        if (!file_exists($file = $this->path.$view)) {
            throw new \Exception(sprintf('The file %s could not be found.', $view));
        }
        extract(array_merge($context, ['template' => $this]));

        ob_start();

        include ($file);

        return ob_get_flush();
    }

    /**
     * @param string|null $path
     * @param string $view
     * @param array $context
     * @return string
     * @throws \Exception
     */
    public static function renderStatic(  string $view, array $context = [], string $path = null ): string
    {
        if ( defined('CONTROLLER_VIEW') ) {
            $path = rtrim(CONTROLLER_VIEW, '/').'/';
        }else {
            if ( is_null( $path ) ) {
                wp_die('Not view path provided');
            }
            $path = rtrim($path, '/').'/';
        }

        if ( !strpos($view, '.php') ) {
            $view .= '.php';
        }

        if (!file_exists($file = $path.$view)) {
            throw new \Exception(sprintf('The file %s could not be found.', $view));
        }
        extract($context);

        ob_start();

        include ($file);

        return ob_get_flush();
    }


    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->parameters[$key] ?? null;
    }
}