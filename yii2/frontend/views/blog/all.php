<?php
 use \yii\widgets\ListView;
 use metalguardian\fotorama;


/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider; */
$blog = $dataProvider->getModels();
?>

 <div class="body-content">

   <?=ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_one',
]);?>
       
       </div>
 
         

  <?php 
    echo \metalguardian\fotorama\Fotorama::widget(
        [

         
               'items' => [
                ['img' => 'http://site.com/uploads/images/Blog/1515002791_x-xNUq.jpg', 'id' => 'id-one',],
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
  
   
    
    



   
  
 
