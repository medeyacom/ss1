<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@images', dirname(dirname(dirname(__DIR__))) . '/public_html/uploads/images/blog');
Yii::setAlias('@upload', 'http://site.com/uploads/blog');
/*Yii::setAlias('@uploadPath', '@frontend/web/uploads');*/
Yii::setAlias('@upload', 'http://site.com/uploads');
/*http://site.com/uploads/images/blog*/
Yii::setAlias('@uploadPath','http://site.com/uploads/images/Blog');