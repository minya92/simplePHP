<?php
namespace SimplePHP;

define('__NAMESPACE__', 'SimplePHP');

\SimplePHP\Autoloader::register();

class Autoloader {

    public static function register(){
        if(!\spl_autoload_register(__NAMESPACE__.'\\Autoloader::load'))
            throw new \ErrorException( 'Could not register '.__NAMESPACE__.'\'s class config autoload function' );
    }

    public static function load( $fullClassName ){
        $namespaces = explode( '\\', $fullClassName ); // \SimplePHP\Core\System\Application
        $ns = array_shift( $namespaces ); // SimplePHP
        if( $ns != __NAMESPACE__ ){
            return;
        }

        $className = array_pop( $namespaces ); // Application
        //print_r($namespaces);
        $load = ROOT . ( "app/" . join('/', $namespaces) . "/" ) . $className .'.php';
        echo $load . '<br>';
        if(!file_exists( $load ))
            throw new \UnexpectedValueException( 'Could not load library for class '. $fullClassName .' - '. $load . ' - ' );

        require_once $load;
    }
}