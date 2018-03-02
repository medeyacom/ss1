<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\widgets\BreadcrumbsWidget;

 


$this->title = '_top_nav';
?>
<header>


<div class ='container'>
<div id ="breadcrumbs" class="hidden-xs">
 <?= common\widgets\BreadcrumbsWidget::widget([
 	'options'=> ['itemscope'=>'', 'itemtype'=>"http://schema.org/BreadcrumbList", 'class'=> 'breadcrumb'],
 	'homeLink'=> ['label'=>'Главная','url'=>Url::home()],
	 	'itemTemplate'=> "<li itemprop=\"itemListElement\" itemscope
      itemtype= \"http://schema.org/ListItem\"
>{link}</li>\n", 
		'activeItemTemplate'=> "<li itemprop=\"itemListElement\" itemscope
      itemtype= \"http://schema.org/ListItem\" class=\"active\">{link}</li>\n", 
             'links' => 
           /*  ['label'=>'','url'=>'','template'=>''], переопределить link, передать html можно
             [],
             [], */
             (isset($this->params['breadcrumbs']))
         ?$this->params['breadcrums']:[],
     ]);?>
</div>

<a href="#" id ="open-menu-button"><i class='fa fa-bars' aria-hidden="true"></i>Mеню</a>


</div>



</header>
     




