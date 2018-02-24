<?php
namespace backend\controllers;

use Yii;
use yii\base\Exception;
use yii\web\Controller;
use common\components\Oss;
use common\models\WeixinAdCode;
use yii\data\ActiveDataProvider;

class WeixinAdCodeController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WeixinAdCode::find(),
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
        $model = new WeixinAdCode();
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

    public function actionBatchCreate()
    {
        $model = new WeixinAdCode();
        if (Yii::$app->request->isPost) {
            if ($model->batchAdd(Yii::$app->request->post())) {
                Yii::$app->session->setFlash('success', '批量保存成功');

                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('error', '批量保存失败');
            }
        }

        return $this->render('batch-create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = WeixinAdCode::findOne($id);
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

        $model = WeixinAdCode::findOne($id);
        if (!empty($model)) {
            if ($model->delete()) {
                Yii::$app->session->setFlash('success', '删除成功');
            }
        }

        return $this->redirect('index');
    }

    public function actionView($id)
    {
        $id = intval($id);
        if (($model = WeixinAdCode::findOne($id)) != null) {
            return $this->redirect($model->code_url);
        }

        return $this->redirect('index');
    }

    public function actionUpload()
    {
        $file_path = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $upload_path = "ad/{$file_name}";

        try {
            Oss::upload($upload_path, $file_path);

            return json_encode([
                'code' => 0,
                'url' => Yii::$app->params['domain'] . '/' . $upload_path,
                'attachment' => Yii::$app->params['domain'] . '/' . $upload_path
            ]);
        } catch(Exception $e) {
        }

        return json_encode([
            'code' => 1,
            'msg' => 'OSS错误'
        ]);
    }
}