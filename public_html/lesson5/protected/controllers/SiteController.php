<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\lessons\Country;
use app\models\lessons\EntryForm;
use app\models\home\Dtype;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /** YII LESSONS ------------------------------------------------------------------------------------------------- */
    /**
     * Class lessons
     */
    public function actionLessons($lesson)
    {

        if($lesson == 'form')
        {
            $form = new EntryForm();
            if($form->load(Yii::$app->request->post()) && $form->validate())
            {
                $data = ['form'=>$form, 'id'=>'1919', 'errors'=>$form->getErrors()];
            }
            else
            {
                $data = ['form'=>$form, 'id'=>'1919', 'errors'=>$form->getErrors()];
            }

            return $this->render('lessons/'.$lesson, $data);
        }
        if($lesson == 'db')
        {
            return $this->render('lessons/'.$lesson);
        }


    }


    /** TEST CLASS  ------------------------------------------------------------------------------------------------- */
    /**
     * Class lessons
    */
    public function actionHome($lesson)
    {
        $lesson = intval($lesson);
        $data = ['lesson'=> $lesson];

        return $this->render('home/lesson'.$lesson, $data);
    }


    /**
     *  my simple lessons
     * */
    public function actionDtype()
    {
        $dtype = new Dtype();
        $data =['dtype'=>$dtype];

        if ($dtype->load(Yii::$app->request->post()) && $dtype->validate())
        {
            $id = Yii::$app->request->post('id');
            if (($model = Dtype::findOne($id)) !== null) {
                $dtype->save();
                //return $model;
            }


            return $this->render('home/dsave', $data);
        }

        return $this->render('home/dform', $data);
    }


    /**
     * calendar
    */
    public function actionCalendar($version = null){
        if(!$version || $version == 1)
            $data['calendar'] = Yii::$app->sampleCalendar->makeCalendarV1();
        elseif ($version = 2)
            $data['calendar'] = Yii::$app->sampleCalendar->show();

        $data['version'] = $version;

        return $this->render('calendar/index', $data);
    }

    /** HELPER LESSONS  --------------------------------------------------------------------------------------------- */
    /**
     * Class helper - url
     */
    public function actionHelper($helper)
    {
        return $this->render('helper/'.$helper);
    }


    /** CSS LESSONS  --------------------------------------------------------------------------------------------- */
    /**
     * Class helper - url
     */

    public function actionCss(){

        return $this->render('css/index');

    }

}
