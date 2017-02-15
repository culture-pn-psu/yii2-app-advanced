<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\person\models\PersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('person', 'ระบบจัดการบุคลากร');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->

    <div class='box-body pad'>

        <p>
            <?= Html::a(Yii::t('person', 'เพิ่มบุคคล'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    //'attribute' => 'img_id',
                    'contentOptions' => ['width' => '50'],
                    'format' => 'html',
                    'value' => function($model) {
                return Html::a($model->imgCircle, ['/person/default/view', 'id' => $model->id]);
            }
                ],
                [
                    'attribute' => 'fullname',
                    'format' => 'html',
                    'value' => function($model) {
                        return Html::a($model->fullname, ['/person/default/view', 'id' => $model->id]);
                    }
                        ],
                        [
                            'attribute' => 'position',
                            'format' => 'html',
                            'filter' => backend\modules\person\models\Position::getList(),
                            'value' => function($model) {
                                return $model->position;
                            }
                        ],
                        'tel',
                        // 'sex',
                        // 'img_id',
                        // 'data:ntext',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>


    </div><!--box-body pad-->
</div><!--box box-info-->
