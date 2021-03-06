<?php
namespace app\commands;
use yii\console\ExitCode;
use yii\console\Controller;

class HelloController extends Controller
{
    /**
     * @param string $message
     * @return int
     */
    public function actionIndex($message = 'hello world'): int
    {
        return ExitCode::OK;
    }
}
