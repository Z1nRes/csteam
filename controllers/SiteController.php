<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Note;
use yii\web\UploadedFile;
use app\models\SignupForm;
use app\models\User;
use app\models\Map;
use app\models\SearchForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
        $map = Map::find()->all();

        return $this->render('index', [
            'map' => $map,
        ]);
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
     * Signup action.
     *
     * @return Response|string
     */

    public function actionSignup()
    {
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            if(true){
                return $this->redirect(['site/login']);
            }
        } 

        return $this->render('signup', [
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
     * Displays about page.
     *
     * @return string
     */
    public function actionMapNote($id_map)
    {
        $model = new Note();
        $id_user = Yii::$app->user->identity->id;
        $notes = Note::find()->where(['id_user' => $id_user, 'id_map' => $id_map])->all();
        $last_note = Note::find()->max('id');
        $map = Map::find()->where(['id' => $id_map])->all();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $photos = '';
                if(UploadedFile::getInstances($model, 'photos') != NULL){
                    foreach(UploadedFile::getInstances($model, 'photos') as $photo){
                        $photo->saveAs("uploads/{$photo->fullPath}");
                        $photos .= "{$photo->fullPath}\n";
                    }
                }
                $model->photos = substr($photos, 0, -1);
                
                $model->save(false);

                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('map-note', [
            'model' => $model,
            'notes' => $notes,
            'id_user' => $id_user,
            'last_note' => $last_note,
            'map' => $map
        ]);
    }

    public function actionSearchPage()
    {
        $q = new SearchForm();
        $qRes = null;
        $message = '';

        if (Yii::$app->request->isPost && $q->load(Yii::$app->request->post()) && $q->validate()) {
            $qRes = Note::find()->where(['title' => $q])->all();
            if ($qRes == null) {
                $message = 'Поиск ничего не выдал';
            }
        } 

        return $this->render('search', [
            'q' => $q,
            'qRes' => $qRes,
            'message' => $message
        ]);
    }

    public function actionNote($id)
    {
        $note = Note::findOne($id);

        return $this->render('note', [
            'note' => $note,
        ]);
    }


    public function actionUpdateNote($id){
        $note = Note::findOne($id);

        if ($this->request->isPost && $note->load($this->request->post())) {
            

            $note->save();

            return $this->redirect(['note', 'id' => $note->id]);
        }

        return $this->render('update-note', [
            'note' => $note,
        ]);
    }

    public function actionDeleteNote($id){
        $note = Note::findOne($id);
        $note->delete();

        return $this->redirect(['site/map-note?id_map=' . $note->id_map]);
    }
}
