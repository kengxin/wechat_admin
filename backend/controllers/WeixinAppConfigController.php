<?php
namespace backend\controllers;

use Yii;
use common\models\WeixinAppConfig;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class WeixinAppConfigController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WeixinAppConfig::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new WeixinAppConfig();
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
        $model = WeixinAppConfig::findOne($id);
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

    public function actionDelete($id)
    {
        Yii::$app->session->setFlash('error', '删除失败');

        $model = WeixinAppConfig::findOne($id);
        if (!empty($model)) {
            if ($model->delete()) {
                Yii::$app->session->setFlash('success', '删除成功');
            }
        }

        return $this->redirect('index');
    }
}