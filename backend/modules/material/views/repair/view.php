<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\material\models\Repair */

$this->title = $model->material_id.' '.$model->material->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
        <div class="box-tools">
            <?=Html::a('พิมพ์',['print',$id=>$model->id]);?>
            
        </div>
    </div><!--box-header -->

    <div class='box-body pad'>

        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'material_id',
                'material.title',
                'problem:html',
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => $model->statusLabel
                ],
                'created_at:datetime',
                'inform_at:datetime',
                'inform_by',
                'staff_id',
                'admin_id',
            ],
        ])
        ?>
        
        <?=Yii::$app->runAction('/material/material/history',['id'=>$model->material_id,'header'=>false])?>


    </div><!--box-body pad-->
</div><!--box box-info-->
