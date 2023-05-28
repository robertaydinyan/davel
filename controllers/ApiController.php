<?php

namespace app\controllers;

use app\models\API;
use app\models\ItemSearch;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class ApiController extends Controller {
    public $enableCsrfValidation = false;

    public function beforeAction($action) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        error_reporting(0);
        $secret = '2YUmrIyqgY8wyHbcZPoaWw6YsiSQFS';
        $auth_header = $_SERVER['HTTP_AUTHORIZATION'];
        if (preg_match('/Bearer\s(\S+)/', $auth_header, $matches)) {
            $token = $matches[1];
            if ($secret != $token) {
                API::returnError(401, "Wrong token");
            }
        } else {
            API::returnError(401, "Wrong token format");
        }
        return parent::beforeAction($action);
    }


    public function actionSearch() {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            API::returnError(403, "Wrong request method");
        }

        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(array('ItemSearch' => Yii::$app->request->queryParams));
        $dataProvider->pagination->pageSize = 10; // Adjust the page size as per your requirements

        $models = $dataProvider->getModels();

        $responseData = [];
        foreach ($models as $model) {
            $responseData[] = [
                'id' => $model->id,
                'name' => $model->name,
                'price' => $model->price,
                'location_id' => $model->location->name,
                'category_id' => $model->category->name
            ];
        }

        return $responseData;
    }

    public function actionError() {
        API::returnError(500, "Internal server error");
    }
}