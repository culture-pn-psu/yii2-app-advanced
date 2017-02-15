<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use backend\modules\person\models\Position;
use yii\bootstrap\Modal;

$this->title = 'KPIs';
$this->params['breadcrumbs'][] = [
    'label' => 'สนับสนุนบริหาร',
    'url' => ['/support']
];
$this->params['breadcrumbs'][] = $this->title;
?>


<h2>KPIs</h2>


<div role="tabpanel">
    <ul class="nav main-tab nav-justified" role="tablist">
        <li role="presentation" class="active">
            <a href="#tab2555" role="tab" data-toggle="tab" aria-controls="tab2555" aria-expanded="false">2555-2558</a>
        </li>
    </ul>

    <div id="tab-content" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab2555" aria-labelledby="tab2555">
            <?= $this->render('_kpis55-58') ?>
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


<?php
$this->registerJs(" 
    var urlPdf =  $('a.media,a#media').attr('href');
    $('a.media,a#media').before('<p><iframe frameborder=\"0\" height=\"700\" scrolling=\"no\" src=\"'+urlPdf+'\" width=\"100%\"></iframe></p>');
    
");
?>