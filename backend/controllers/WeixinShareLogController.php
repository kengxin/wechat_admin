<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use common\models\WeixinShareLog;

class WeixinShareLogController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WeixinShareLog::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ]
        ]);

        $startTime = strtotime(date('Y-m-d'), time());

        $currentDayShareTalk = WeixinShareLog::find()->where(['type' => WeixinShareLog::TYPE_TALK])->andWhere(['between', 'created_at', $startTime, $startTime + 86400])->count();
        $currentDayShareFriend = WeixinShareLog::find()->where(['type' => WeixinShareLog::TYPE_FRIEND])->andWhere(['between', 'created_at', $startTime, $startTime + 86400])->count();
        $currentDayShareAD= WeixinShareLog::find()->where(['type' => WeixinShareLog::TYPE_AD])->andWhere(['between', 'created_at', $startTime, $startTime + 86400])->count();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'currentDayShareTalk' => $currentDayShareTalk,
            'currentDayShareFriend' => $currentDayShareFriend,
            'currentDayShareAD' => $currentDayShareAD
        ]);
    }
}