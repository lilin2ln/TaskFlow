<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/30
 * Time: 16:20
 */

namespace TaskFlow;

class Task
{
    #任务基类
    #继承Task的类必须实现execute方法和revert方法，并且其返回结果必须是下方方法的注释中的格式
    
    /**
     * 执行任务
     * return array array(
            "status"=> True/False,   #运行状态，该步骤运行是否成功，成功返回True，失败返回False
     *      "body"=> array()   #运行结果，该步骤运行后的返回值
     * )
     */
    public function execute(){
        return array(
            "status" => True,
            "body" => array()
        );
    }

    /**
     * 回滚任务
     * return array array(
            "status"=> True/False,   #运行状态，该步骤运行是否成功，成功返回True，失败返回False
     *      "body"=> array()   #运行结果，该步骤运行后的返回值
     * )
     */
    public function revert(){
        return array(
            "status" => True,
            "body" => array()
        );
    }
}