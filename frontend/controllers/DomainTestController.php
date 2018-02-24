<?php
namespace frontend\controllers;

use common\models\WeixinPublicDomain;
use yii\web\Controller;

class DomainTestController extends Controller
{

    public function actionGetEntrance()
    {
        header("Access-Control-Allow-Origin: *");

        $model = new WeixinPublicDomain();
        if (($result = $model->getLandingDomain()) != null) {
            return json_encode([
                'code' => 0,
                'data' => [
                    'url' => "http://{$result->domain}/ll.html"
                ]
            ]);
        }

        return json_encode([
            'code' => -1
        ]);
    }

    public function actionList()
    {
        $domainList = WeixinPublicDomain::find()
            ->where(['type' => WeixinPublicDomain::STATUS_OK])
            ->column();

        foreach ($domainList as $key => $domain) {
            $domainList[$key] = "http://$domain/ll.html";
        }

        return json_encode([
            'code' => 200,
            'msg' => 'ok',
            'domains' => $domainList
        ]);
    }

    public function actionClose($url)
    {
        $url = trim($url);
        $urlInfo = parse_url($url);

        if (($model = WeixinPublicDomain::findOne(['domain' => $urlInfo['host']])) != null) {
            if ($model->setClose()) {
                return json_encode([
                    'code' => 0
                ]);
            }
        }

        return json_encode([
            'code' => -1
        ]);
    }
}