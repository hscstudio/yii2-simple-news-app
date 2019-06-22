<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\News;

class NewsController extends Controller
{
    /**
     * Displays list of news.
     *
     * @return json
     */
    public function actionIndex()
    {
        return News::find()->all();
    }

    /**
     * Displays detail of news.
     *
     * @return json
     */
    public function actionView($guid)
    {
        return News::find()->where([
            'guid' => $guid
        ])->one();
    }

    /**
     * Search news.
     *
     * @return json
     */
    public function actionSearch($keyword='')
    {
        return News::find()->search([
            'title' => '/'.$keyword.'/i',

        ])->all();
    }

}
