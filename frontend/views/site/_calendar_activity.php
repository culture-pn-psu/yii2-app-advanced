<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="box">       
        
    <?= Html::tag('h3', 'ปฎิทินกิจกรรม', ['class' => 'column-title text-left wow fadeInDown article-head']) ?>
<?=
        \yii2fullcalendar\yii2fullcalendar::widget(
                [
                    //'events' => $events,                    
                    'ajaxEvents' => Url::toRoute(['/site/jsoncalendar']),
                    'options' => [ 'lang' => 'th'],
                    'header' => [
                        'left' => 'prev,next today',
                        'center' => 'title',
                        'right' => 'month,basicWeek,basicDay'
                    ],
                    'clientOptions' => [
                        'selectable' => false,
                        'selectHelper' => false,
                        'draggable' => false,
                        'editable' => false,
                    ],
                ]
        );
        ?>

</div>