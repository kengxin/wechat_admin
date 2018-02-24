<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\WeixinShareLog;
use yii\web\NotFoundHttpException;
use common\models\WeixinAppConfig;
use common\models\WeixinPublicDomain;

class GetShareConfigController extends Controller
{
    public function actionIndex($url, $id)
    {
        header("Access-Control-Allow-Origin: *");

        $urlInfo = parse_url($url);
        $id = intval($id);

        if (isset($urlInfo['host']) && !empty($urlInfo['host'])) {
            if (($appConfig = $this->findModel($urlInfo['host'])) != false) {
                list($public_id, $app_id, $app_secret) = $appConfig;
                $config = Yii::$app->JsSDK->getSignPackage($url, $app_id, $app_secret);
                $appConfig = $this->getAppConfig($id);
                $domainList = WeixinPublicDomain::getShareEntrance(3);

                $config['public_id'] = $public_id;

                return json_encode([
                    'code' => 0,
                    'data' => [
                        'domainList' => $domainList,
                        'appConfig' => $appConfig,
                        'shareConfig' => $config
                    ]
                ]);
            }
        }

        return json_encode([
            'code' => -1
        ]);
    }

    public function actionShareCount($type, $app_id, $url, $msg)
    {
        header("Access-Control-Allow-Origin: *");

        $type = intval($type);
        $app_id = intval($app_id);
        $url = trim($url);
        $msg = trim($msg);

        $weixinShareLog = new WeixinShareLog();
        if ($weixinShareLog->saveLog($url, $type, $app_id, $msg)) {
            return json_encode([
                'code' => 0
            ]);
        }

        return json_encode([
            'code' => -1
        ]);
    }

    public function getAppConfig($id)
    {
        $model = WeixinAppConfig::find()
            ->select(['share_title', 'share_desc', 'share_thumb', 'ad_title', 'ad_thumb', 'ad_url'])
            ->where(['id' => $id])
            ->asArray()
            ->one();
        if ($model != null) {
            return $model;
        }

        throw new NotFoundHttpException();
    }

    public function findModel($domain)
    {
        $publicDomain = WeixinPublicDomain::findOne(['domain' => $domain]);
        if (!empty($publicDomain) && !empty($publicDomain->publicConfig)) {
            return [$publicDomain->public_id, $publicDomain->publicConfig->app_id, $publicDomain->publicConfig->app_secret];
        }

        return false;
    }
}