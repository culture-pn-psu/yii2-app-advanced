<?php
//use kartik\widgets\DatePicker;
///* 
// * To change this license header, choose License Headers in Project Properties.
// * To change this template file, choose Tools | Templates
// * and open the template in the editor.
// */
//echo '<div class="well well-sm" style="background-color: #fff; width:100%">';
//echo DatePicker::widget([
//    'name' => 'dp_5',
//    'type' => DatePicker::TYPE_INLINE,
//    'value' => 'Tue, 23-Feb-1982',
//    'pluginOptions' => [
//        'format' => 'D, dd-M-yyyy'
//    ],
//    'options' => [
//        'width'=>'100%'
//        // you can hide the input by setting the following
//        // 'class' => 'hide'
//    ]
//]);
//echo '</div>';
?>


<?php
/*
  //use dosamigos\datepicker\DatePicker;
  use yii\jui\DatePicker;
  ?>
  <?=

  DatePicker::widget([
  'name' => 'Test',
  'inline' => true,

  //'sideBySide'=> true,
  //'value' => '02-16-2012,03-16-2012',
  //'valueTo' => '02-16-2012,03-16-2012',
  //'template' => '{addon}{input}',
  'clientOptions' => [
  'changeYear'=>true,
  'changeMonth'=>true,
  //'autoclose' => true,
  'format' => 'dd-M-yyyy',
  'setDate'=>  '02-16-2012,03-16-2012',

  ],

  'language' => 'th',
  ]);
 */
?>

<?php
$css = "
    #calendar {
    width: 200px;
    margin: 0 auto;
    font-size: 10px;
}
.fc-header-title h2 {
    font-size: .9em;
    white-space: normal !important;
}
.fc-view-month .fc-event, .fc-view-agendaWeek .fc-event {
    font-size: 0;
    overflow: hidden;
    height: 2px;
}
.fc-view-agendaWeek .fc-event-vert {
    font-size: 0;
    overflow: hidden;
    width: 2px !important;
}
.fc-agenda-axis {
    width: 20px !important;
    font-size: .7em;
}

.fc-button-content {
    padding: 0;
}
.fc-toolbar{
    margin:0px;
}
.fc-toolbar h2{
    font-size:16px;
    padding:10px 0 0;
    margin:0px;
}
.fc-day{
width:20px;
}
.fc-day-header , fc-row fc-widget-header{
font-size:12px;
}
";
$this->registerCss($css);

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
<br/>
</div>
