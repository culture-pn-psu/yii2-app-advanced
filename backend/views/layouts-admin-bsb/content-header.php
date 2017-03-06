<?php
/**
 * @var $this \yii\web\View
 */

use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;

?>
<div class="block-header">
    
    
    <div class="row">
        <div class="col-md-5">
            <h2 class="align-left">
        <?= Html::encode($this->title) ?>
            </h2>
        </div>
    
        <div class="col-md-7">
         <ol class="breadcrumb align-right" style="padding:0px;">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">home</i> Home
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">library_books</i> Library
                </a>
            </li>
            <li class="active">
                <i class="material-icons">archive</i> Data
            </li>
        </ol>
      </div>
    </div>
   
    

    <?= Breadcrumbs::widget([
        'homeLink' => [
            'label' => 'Home',
            'url' => '/' . ($this->context ? $this->context->module->id : null),
        ],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>