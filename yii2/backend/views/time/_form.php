<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\TimePicker;
use kartik\widgets\DateTimePicker;




/* @var $this yii\web\View */
/* @var $model common\models\Time */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="time-form">

<?php $form = ActiveForm::begin ();?>
    
<?= $form->field($model,'time')->widget(DateControl::className(),['type'=> DateControl::FORMAT_TIME
])?> 
<?= $form->field($model,'date')->widget(DateControl::className(),[])?> 
<?= $form->field($model,'datetime')->widget(DateControl::className(),[
'type'=> DateControl::FORMAT_DATETIME
/*'displayFormat'=> 'yyyy-mm-dd'*/
])?> 


 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  
]);?>
    
</div>


