<?php

/* @var $this yii\web\View */

use yii\widgets\Breadcrumbs;
use \yii\widgets\ListView;
use metalguardian\fotorama;


$this->title = 'site-index';



$this->params['breadcrumbs'] = [
    ['label'=>'надкатегория','url'=>['blog/url_4']],

];


?>
<div class="site-index">

    <div class="jumbotron">
      

        <p><a class="btn btn-lg btn-success" href="http://site.com/blog">жми</a></p>

 

    </div>

    <div class="body-content">

        <div class="row">
        <?php foreach ($blogs as $one):?>
            <div class="col-lg-4">
                <h2><?=$one->title?></h2>
                <?=$one->text?>
            </div>
            <?php endforeach; ?>
        </div>
       
        </div>
     </div>

 