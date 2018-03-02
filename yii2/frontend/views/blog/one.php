<?php
  

    /* @var $this yii\web\View */
   /* @var $blog medeyacom\Blog */
   /* @throws NotFoundHttpException if the model cannot be found
  */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use metalguardian\fotorama;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;
use yii\helpers\VarDumper;
use medeyacom\blog\models;
use common\models\ImageManager;



$this->title = $blog->title;
  /*$desc = \yii\helpers\StringHelper::truncateWords(strip_tags($blog->body),20, '');*/
  $this->registerMetaTag(['property'=>'og:title','content'=>$this->title]);

 $this->registerMetaTag(['name'=>'description','content'=>$desc]);
  $this->registerMetaTag(['property'=>'og:description','content'=>$desc]);
  $this->registerMetaTag(['property'=>'og:site_name','content'=>$this->title]);


$this->params['breadcrumbs'] = [
	['label'=>'публикации','url'=>['blog/index']],
	['label'=>$blog->title]
];

?>

<h1><?=$blog->title?></h1>
<?=$blog->text?>


<div class="blog-view">

 
<?php 
    echo \metalguardian\fotorama\Fotorama::widget(
        [

         
               'items' => [
                ['img' => 'http://s.fotorama.io/1.jpg', 'id' => 'id-one',],
                ['img' => 'http://site.com/uploads/images/Blog/1515002791_x-xNUq.jpg',],
                ['img' => 'http://site.com/uploads/images/blog/58290548_Svyatoslav_Rerih_Zov_Svyaschennaya_fleyta_II_1955.jpg',],
                
            ],
            'options' => [
                'nav' => 'thumbs',
               'ratio' => 200/50,
                'loop' => true,
                'hash' => true,
            ],
            'spinner' => [
                'lines' => 20,
            ],
           
        ]
    ); 
    ?>
   </div>  
  