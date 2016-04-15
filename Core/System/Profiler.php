<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 15.04.2016
 * Time: 11:46
 */

namespace SimplePHP\Core\System;


class Profiler
{
    private $timestamps = [];

    public function start($timestamp){
        $this->timestamps[$timestamp] = [
            'start' => microtime(true),
        ];
    }

    public function finish($timestamp){
        $this->timestamps[$timestamp]['finish'] = microtime(true);
        $this->timestamps[$timestamp]['time'] = $this->timestamps[$timestamp]['finish'] - $this->timestamps[$timestamp]['start'];
    }

    public function getTime($timestamp){
        return $this->timestamps[$timestamp]['time'];
    }
}