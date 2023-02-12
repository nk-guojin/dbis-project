<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the newscontroller of frontend controller
 */

namespace frontend\controllers;

use Yii;
use common\models\News;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Tag;
use common\models\Newscomment;
use common\models\User;
use yii\rest\Serializer;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public $added=0;
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' =>[
                'class' => AccessControl::className(),
                'rules' =>[
                    ['actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],],
                    ['actions' => ['index', 'detail'],
                        'allow' => true,
                        'roles' => ['@'],],
                ],
            ],
        
            'pageCache'=>[
                'class'=>'yii\filters\PageCache',
                'only'=>['index'],
                'duration'=>600,
                'variations'=>[
                    Yii::$app->request->get('page'),
                    Yii::$app->request->get('NewsSearch'),
                ],
                'dependency'=>[
                    'class'=>'yii\caching\DbDependency',
                    'sql'=>'select count(id) from news',
                ],
            ],
        
            'httpCache'=>[
                'class'=>'yii\filters\HttpCache',
                'only'=>['detail'],
                'lastModified'=>function ($action,$params){
                    $q = new \yii\db\Query();
                    return $q->from('news')->max('update_time');
                },
                'etagSeed'=>function ($action,$params) {
                    $post = $this->findModel(Yii::$app->request->get('id'));
                    return serialize([$post->title,$post->content]);
                },
            'cacheControlHeader' => 'public,max-age=600',
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tags=Tag::findTagWeights();
    	$recentNewsComments=Newscomment::findRecentNewsComments();
    	
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tags'=>$tags,
        	'recentNewsComments'=>$recentNewsComments,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDetail($id)
    {
    	//step1. 准备数据模型   	
    	$model = $this->findModel($id);
    	$tags=Tag::findTagWeights();
    	$recentNewsComments=Newscomment::findRecentNewsComments();
    	
    	$userMe = User::findOne(Yii::$app->user->id);
    	$commentModel = new Newscomment();
    	$commentModel->email = $userMe->email;
    	$commentModel->userid = $userMe->id;
    	
    	//step2. 当评论提交时，处理评论
    	if($commentModel->load(Yii::$app->request->post()))
    	{
    		$commentModel->status = 1; //新评论默认状态为 pending
    		$commentModel->post_id = $id;
    		if($commentModel->save())
    		{
    			$this->added=1;
    		}
    	}
    	
    	//step3.传数据给视图渲染
    	
    	return $this->render('detail',[
    			'model'=>$model,
    			'tags'=>$tags,
    			'recentNewsComments'=>$recentNewsComments,
    			'commentModel'=>$commentModel, 
    			'added'=>$this->added, 			
    	]);
    }
}
