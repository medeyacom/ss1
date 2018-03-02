<?php

namespace frontend\controllers;


use medeyacom\blog\models\Blog;
use yii\helpers\Url;
use common\models\ImageManager;
use yii\widgets\Breadcrumbs;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\MethodNotAllowedHttpException;
use medeyacom\blog\models\BlogSearch;
use yii\filters\VerbFilter;



/**
 * Blog controller
 */
class BlogController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */


public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete-image' => ['POST'],
                    'sort-image' => ['POST'],

                ],
            ],
        ];
    }

    public function actionIndex()
    {
        #$blogs = Blog::find()->where(['status_id'=>1])->orderBy(['id' => SORT_DESC])->all();

       $blogs = Blog::find()->with('author')->andWhere(['status_id'=>1])->orderBy('sort');
        $dataProvider = new ActiveDataProvider([
            'query' => $blogs,
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        #$blogs = Blog::find()->where(['status_id'=>1])->orderBy(['id' => SORT_ASC])->all();
        return $this->render('all',['dataProvider'=>$dataProvider]);
    }

       public function actionOne($url)
    {  
       if($blog = Blog::find()
        ->andWhere(['url'=>$url])
        ->one()) {

        //generate meta tags
            $canonical_url = Url::toRoute([$this->getRoute(),'url'=>$url], true);
        Yii::$app->view->registerMetaTag (['content'=> $canonical_url,'name'=>'og_url'], 'og_url');
        Yii::$app->view->registerMetaTag (['rel'=>'canonical','href'=>$canonical_url]);

        //generate breadcrumbes
            $this->view->params ['breadcrumbs'] = [
            ['label'=>'публикации','url'=>['blog/index']],
            ['label'=>$blog->title]
            ];

            return $this->render('one',['blog'=>$blog]);
      }
       throw new NotFoundHttpException('ой,нет такого блога');
    }

 

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


 public function actionDeleteImage()
    {
        if(($model = ImageManager::findOne(Yii::$app->request->post('key'))) and $model->delete()){
            return true;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}



    
  
   




