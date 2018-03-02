<?php

namespace backend\controllers;

use Yii;
use common\models\Tag;
use common\models\TagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\rules\AuthorRule;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller
{
    /**
     * @inheritdoc
     */
   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    } 

    /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

                        
                /**
     * Lists all Tag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tag model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tag::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionRole() {

      /*  $admin = Yii::$app->authManager->createRole ('admin');
        $admin->description = 'Администратор';
        Yii::$app->authManager ->add ($admin);

        $content = Yii::$app->authManager->createRole ('content');
        $content ->description = 'Контент менеджер';
        Yii::$app->authManager->add ($content);

        $user = Yii::$app->authManager->createRole ('user');
        $user ->description = 'Пользователь';
        Yii::$app->authManager ->add($user);
        
        $ban = Yii::$app->authManager->createRole ('banned');
        $ban ->description ='Tварь';
        Yii::$app->authManager->add($ban);*/
      
       /* $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit ->description = 'Право входа в админку';
         Yii::$app->authManager ->add ($permit);*/

       /* $role_a = Yii::$app->authManager->getRole ('admin');
        $role_c = Yii::$app->authManager->getRole ('content');
        $permit = Yii:: $app->authManager ->getPermission ('canAdmin');
        Yii::$app->authManager->addChild ($role_a, $permit);
        Yii::$app->authManager->addChild ($role_c, $permit);*/
        

        /*$userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, 1);*/
         
        
        /*$updatePost = Yii::$app->authManager->createRole ('updatePost');
        $updatePost ->description ='Редактировать пост';
        Yii::$app->authManager->add($updatePost);*/
      
       /* $userRole = Yii::$app->authManager->getRole('user');
        Yii::$app->authManager->assign($userRole, 2);

        $userRole = Yii::$app->authManager->getRole('content');
        Yii::$app->authManager->assign($userRole, 3);*/

        /* $updateOwnPost = Yii::$app->authManager->createRole ('updateOwnPost');
        $updateOwnPost ->description ='Редактировать собственные записи';
        Yii::$app->authManager->add($updateOwnPost);*/


      /* $auth = Yii::$app->authManager;
        $rule = new AuthorRule();
        $auth->add($rule);*/

       /* $updateOwnPost = $auth -> createPermission ('updateOwnPost');
        $updateOwnPost -> description = 'Редактировать собственные записи';
        $updateOwnPost->ruleName =$rule->name;
        $auth->add($updateOwnPost);*/

       /* $updatePost =$auth->getPermission ('updatePost');
        $updateOwnPost = $auth->getPermission ('updateOwnPost');

        $author =$auth->createRole ('author');
        $author->description ='Автор';
        $auth->add($author);

        $auth->addChild($author, $updateOwnPost); */

  /* $role_a =Yii::$app->authManager->getRole ('admin');
   $role_c = Yii::$app->authManager->getRole ('content');
   $permit = Yii::$app->authManager->getPermission ('updatePost');
   Yii::$app->authManager->addChild($role_a, $role_c);
   Yii::$app->authManager->addChild($role_c, $permit);*/



 return 12345;

     }
}
