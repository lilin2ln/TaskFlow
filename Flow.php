<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/30
 * Time: 16:20
 */

namespace TaskFlow;

class Flow
{
    #所有添加到flow的task将会按顺序执行
    
    /**
     * @var array 任务池
     */
    private $_task_pool = array();

    /**
     * 添加任务到任务池
     */
    public function add($task){
        array_push($this->_task_pool, $task);
    }

    /**
     * 返回任务池
     * @return array
     */
    public function task_pool(){
        return $this->_task_pool;
    }
    
    /**
     * 执行任务流
     */
    public function run($task_seq, $task_args){
        return $this->_task_pool[$task_seq]->execute($task_args);
    }

    /**
     * 失败回滚
     */
    public function revert($task_seq, $task_args){
        return $this->_task_pool[$task_seq]->revert($task_args);
    }
}