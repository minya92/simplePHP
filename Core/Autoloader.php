<?php
namespace SimplePHP;

define('__NAMESPACE__', 'SimplePHP');

\SimplePHP\Autoloader::register();

use SimplePHP\Core\Exception\NotFoundException;

class Autoloader {

    public static function register(){
        if(!\spl_autoload_register(__NAMESPACE__.'\\Autoloader::load'))
            throw new NotFoundException( 'Could not register '.__NAMESPACE__.'\'s class config autoload function' );
    }

    public static function load( $fullClassName ){
        $namespaces = explode( '\\', $fullClassName ); // \SimplePHP\Core\System\Application
        $ns = array_shift( $namespaces ); // SimplePHP
        if( $ns != __NAMESPACE__ ){
            return;
        }

        $className = array_pop( $namespaces ); // Application
        //print_r($namespaces); // [Core, System]
        $load = ROOT . join('/', $namespaces) . '/'  . $className . '.php';
        //echo $load . file_exists( $load ) . '<br>';
        if(!file_exists( $load ))
            throw new NotFoundException( 'Не удалось найти страницу '. $fullClassName .' - '. $load . ' - ' );

        require_once $load;
    }
}