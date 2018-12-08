<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/8
 * Time: 16:07
 */

namespace app\components;


use yii\log\FileTarget;
use yii\log\Target;

class Dispatcher extends \yii\log\Dispatcher
{
    /**
     * @var int $traceLevel
     */
    public $traceLevel = YII_DEBUG ? 3 : 0;
    /**
     * @var array
     */
    public $targets = [
        [
            'class'=>FileTarget::class,
            'levels'=>['error','warning'],
            'logVars'=>['*'],
            'categories'=>['application'],
            'logFile' =>'@runtime/logs/%s/app.log'
        ]
    ];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        $date = date('Ym',time());
        foreach ($this->targets as $name => $target){
            if (!$target instanceof Target){
                $target['logFile'] = sprintf($target['logFile'],$date);
                $this->targets[$name] = \Yii::createObject($target);
            }
        }
    }

}