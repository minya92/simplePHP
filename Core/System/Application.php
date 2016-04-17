<?php
namespace SimplePHP\Core\System;
use SimplePHP\Core\Exception\BaseException;
use SimplePHP\Core\Exception\NotFoundException;

class Application {
    /**
     * @var
     */
    private $Router;

    public function getRouter(){
        if(!$this->Router)
            $this->Router = new Router();
        return $this->Router;
    }

    public function run(){
        $Debug = new Debug();

        $Profiler = new Profiler();
        $Profiler->start('routing');

        $Router = $this->getRouter();

        require_once ROOT .'Application/config/routes.php';
        require_once ROOT .'Application/config/settings.php';

        $Route = $Router->getRoute();

        $Profiler->finish('routing');
        $time = $Profiler->getTime('routing'); //@todo добавить в логгер

        try{
            $controllerClass = "SimplePHP\\Application\\Controllers\\" . $Route['control'];
            if(!preg_match("/^(\w+)$/", $Route['control']))
                throw new NotFoundException( 'Could not load library for class!!!!!');
            $Controller = new $controllerClass();
            $Controller->$Route['action']($Route['data']);

        } catch (NotFoundException $e){

            $Debug->resolve($e);

        } catch (BaseException $e){

            $Debug->resolve($e);

        } catch (\Exception $e){

            $Debug->resolve($e, true);

        }
    }
}