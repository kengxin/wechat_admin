<?php
namespace backend\controllers;

use Yii;
use common\models\WeixinPublicConfig;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class WeixinPublicConfigController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WeixinPublicConfig::find(),
            'sort' => [
                'defaultOrder' => [
                    'status' => SORT_ASC,
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new WeixinPublicConfig();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', '保存成功');

                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', '保存失败');
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = WeixinPublicConfig::findOne($id);
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', '修改成功');

                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', '修改失败');
            }
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionView($id)
    {
        return $this->redirect("/weixin-public-domain/index?public_id={$id}");
    }

    public function actionDelete($id)
    {
        Yii::$app->session->setFlash('error', '删除失败');

        $model = WeixinPublicConfig::findOne($id);
        if (!empty($model)) {
            if ($model->delete()) {
                Yii::$app->session->setFlash('success', '删除成功');
            }
        }

        return $this->redirect('index');
    }
}