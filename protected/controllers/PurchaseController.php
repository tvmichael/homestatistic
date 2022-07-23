<?php

namespace app\controllers;

use Yii;
use app\models\Spending;
use app\models\search\SpendingSearch;
use app\models\search\ProductSearch;
use yii\filters\AccessControl;
use yii\web\Controller;

class PurchaseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(), [

            ]
        );
    }

    /**
     * Displays statistic page.
     *
     * @return string
     */
    public function actionAdd()
    {
        $x= 0;
        return $this->render('add', [
            'productList' => ProductSearch::list(),
            'spending' => SpendingSearch::month(),
        ]);
    }

    /**
     * Displays statistic page.
     *
     * @return string
     */
    public function actionAddProductAjax()
    {
        $datetime = Yii::$app->request->post('datetime');
        $productId = intval(Yii::$app->request->post('productId'));
        $price = floatval(Yii::$app->request->post('price'));
        $userId = floatval(Yii::$app->request->post('user'));

        $model = new Spending();
        $model->productId = $productId;
        $model->price = $price;
        $model->userId = $userId;
        $model->datetime = date ('Y-m-d H:i:s', strtotime($datetime));

        if($model->save()){
            return 1;
        }

        return 0;
    }
}
