<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\material\models\Repair */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('person', 'Repairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->
    
    <div class='box-body pad'>

    <p>
        <?= Html::a(Yii::t('person', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('person', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('person', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'material_id',
            'problem:ntext',
            'solving:ntext',
            'status',
            'type',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'inform_at',
            'inform_by',
            'staff_id',
            'staff_status',
            'staff_comment:ntext',
            'staff_at',
            'boss_id',
            'boss_status',
            'boss_comment:ntext',
            'boss_at',
            'admin_id',
            'admin_status',
            'admin_comment:ntext',
            'admin_at',
        ],
    ]) ?>


    </div><!--box-body pad-->
 </div><!--box box-info-->
