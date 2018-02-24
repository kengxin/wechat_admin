<?php
namespace frontend\controllers;

use common\models\WeixinAdCode;
use yii\web\Controller;

class GetAdCodeController extends Controller
{
    public function actionIndex()
    {
        $model = new WeixinAdCode();
        if (($adConfig = $model->getShowCode()) != false) {
            return json_encode([
                'code' => 0,
                'data' => $adConfig
            ]);
        }

        return json_encode([
            'code' => -1
        ]);
    }
}