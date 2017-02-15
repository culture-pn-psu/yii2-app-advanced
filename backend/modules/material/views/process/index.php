<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('person', 'Repairs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->
    
    <div class='box-body pad'>
        
    <p>
        <?= Html::a(Yii::t('person', 'Create Repair'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'material_id',
            'problem:ntext',
            'solving:ntext',
            'status',
            // 'type',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            // 'inform_at',
            // 'inform_by',
            // 'staff_id',
            // 'staff_status',
            // 'staff_comment:ntext',
            // 'staff_at',
            // 'boss_id',
            // 'boss_status',
            // 'boss_comment:ntext',
            // 'boss_at',
            // 'admin_id',
            // 'admin_status',
            // 'admin_comment:ntext',
            // 'admin_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div><!--box-body pad-->
 </div><!--box box-info-->
