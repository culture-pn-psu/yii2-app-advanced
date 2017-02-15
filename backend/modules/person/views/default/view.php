<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\person\models\Person */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('person', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box <?=(!isset($ajax))?'box-info':''?>'>
    <div class='box-header'>
<!--     <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->

    <div class='box-body pad'>
     

        <div class="row">
            <div class="col-sm-3">
                <?= Html::img($model->imgTemp, ['width' => '100%','class'=>'thumbnail']) ?>
            </div>
            <div class="col-sm-9">
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id',
                        'fullname',
                        'id_card',
                        'tel',
                        'phone',
                        [
                            'attribute' => 'sex',
                            'value' => $model->sexLabel
                        ],
                    ],
                ])
                ?>
            </div>
        </div>

        
        <?php if(!isset($ajax)):?>
        <p>
            <?= Html::a(Yii::t('person', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a(Yii::t('person', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('person', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
        <?php endif;?>

    </div><!--box-body pad-->
</div><!--box box-info-->
