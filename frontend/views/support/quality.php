<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use backend\modules\person\models\Position;
use yii\bootstrap\Modal;

$this->title = 'ประกันคุณภาพ';
$this->params['breadcrumbs'][] = [
    'label' => 'สนับสนุนบริหาร',
    'url' => ['/support']
];
$this->params['breadcrumbs'][] = $this->title;
?>


<h2>รายงานประจำปีการประเมินคุณภาพ</h2>

<h3>Self Assessment Report (SAR)</h3>

<h3>ตามแนวทางเกณฑ์รางวัลคุณภาพแห่งชาติ (TQA)</h3>


<div role="tabpanel">
    <ul class="nav main-tab nav-justified" role="tablist">
        <li role="presentation" class="active">
            <a href="#tab2558" role="tab" data-toggle="tab" aria-controls="tab2558" aria-expanded="false">2558</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab2557" role="tab" data-toggle="tab" aria-controls="tab2557" aria-expanded="false">2557</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab2556" role="tab" data-toggle="tab" aria-controls="tab2556" aria-expanded="false">2556</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab2555" role="tab" data-toggle="tab" aria-controls="tab2555" aria-expanded="false">2555</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab2554" role="tab" data-toggle="tab" aria-controls="tab2554" aria-expanded="true">2554</a>
        </li>
        <li role="presentation" class="">
            <a href="#tab2553" role="tab" data-toggle="tab" aria-controls="tab2553" aria-expanded="true">2553</a>
        </li>
    </ul>

    <div id="tab-content" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab2558" aria-labelledby="tab2558">
            <?= $this->render('_tqa58') ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab2557" aria-labelledby="tab2557">
            <?= $this->render('_tqa57') ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab2556" aria-labelledby="tab2556">
            <?= $this->render('_tqa56') ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab2555" aria-labelledby="tab2555">
            <?= $this->render('_tqa55') ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab2554" aria-labelledby="tab2554">
            <?= $this->render('_tqa54') ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab2553" aria-labelledby="tab2553">
            <?= $this->render('_tqa53') ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <?php

        use kartik\social\GooglePlugin;

echo GooglePlugin::widget(['type' => GooglePlugin::SHARE, 'settings' => ['annotation' => 'none']]);

        use kartik\social\TwitterPlugin;

echo TwitterPlugin::widget(['type' => TwitterPlugin::SHARE, 'settings' => ['size' => 'small']]);

        use kartik\social\FacebookPlugin;

echo FacebookPlugin::widget(['type' => FacebookPlugin::LIKE, 'settings' => ["share" => "true"]]);

//use kartik\social\Disqus;
//echo Disqus::widget();
        ?>
    </div>
</div>

