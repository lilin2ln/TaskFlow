<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/11/30
 * Time: 17:31
 */

namespace TaskFlow;

class Engine
{
    #运行任务的引擎

    /**
     * 当前正在执行的任务
     */
    private $current_task;

    /**
     * @var object 流对象
     */
    private $flow;

    /**
     * @var array 上下文
     */
    private $context = array(
        "status" => True,  #任务执行结果，True-成功,False-失败
        "body" => array()
    );

    /**
     * 是否进入回滚流程
     */
    private $is_revert = False;

    public function __construct($flow)
    {
        $this->flow = $flow;
    }

    /**
     * 执行流
     */
    public function run_flow(){
        foreach ($this->flow->task_pool() as $seq=>$task_obj){
            if($this->context["status"]){
                $this->current_task = $seq;
                $this->context = $this->flow->run($seq, $this->context["body"]);

                if(!$this->context["status"]){
                    $this->is_revert = True;
                    break;
                }
            }
        }

        if($this->is_revert){
            while(True){
                $this->context = $this->flow->revert($this->current_task, $this->context["body"]);
                if($this->current_task == 0){
                    break;
                }
                $this->current_task -= 1;
            }
        }
    }
}