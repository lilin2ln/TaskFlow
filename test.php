<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/3
 * Time: 14:04
 */

require_once dirname(__FILE__) . "/Engine.php";
require_once dirname(__FILE__) . "/Task.php";
require_once dirname(__FILE__) . "/Flow.php";

use TaskFlow\Task;
use TaskFlow\Flow;
use TaskFlow\Engine;


class Task1 extends Task{

    public function execute(){
        var_dump("executed task1!");
        return array(
            "status"=> True,
            "body"=>array()
        );
    }

    public function revert(){
        var_dump("revert task1!");
        return array(
            "status"=> True,
            "body"=>array()
        );
    }
}

class Task2 extends Task{
    public function execute(){
        var_dump("executed task2!");
        return array(
            "status"=> True,
            "body"=>array()
        );
    }

    public function revert(){
        var_dump("revert task2!");
        return array(
            "status"=> True,
            "body"=>array()
        );
    }
}

class Task3 extends Task{
    public function execute(){
        var_dump("executed task3!");
        return array(
            "status"=> True,
            "body"=>array()
        );
    }

    public function revert(){
        var_dump("revert task3!");
        return array(
            "status"=> True,
            "body"=>array()
        );
    }
}

$task1 = new Task1();
$task2 = new Task2();
$task3 = new Task3();

$test_flow = new Flow();
$test_flow->add($task1);
$test_flow->add($task2);
$test_flow->add($task3);

$test_engine = new Engine($test_flow);
$test_engine->run_flow();