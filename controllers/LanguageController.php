<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class LanguageController extends Controller
{
    public function actionChange()
    {

        if (Yii::$app->request->isPost)
        {

            $cookies = Yii::$app->response->cookies;

            $cookies->add(new Cookie([
                'name' => 'RH_LANGUAGE',
                'value' => Yii::$app->request->post('language'),
            ]));

        }

    }
}