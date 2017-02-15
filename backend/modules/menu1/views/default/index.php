<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\menu\models\Menu;
use backend\modules\menu\models\MenuCategory;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\menu\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('system', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box box-info'>
    <div class='box-header'>
     <!-- <h3 class='box-title'><?= Html::encode($this->title) ?></h3>-->
    </div><!--box-header -->

    <div class='box-body pad'>

        <p>
            <?= Html::a(Yii::t('system', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'title',
                    'format'=>'html',
                    'value' => function($model) {
                        return Html::a($model->iconShow.' '.$model->title,['/menu/default/view','id'=>$model->id]);
                    }
                ],
                [
                    'attribute' => 'menu_category_id',
                    'filter' => MenuCategory::getList(),
                    'value' => function($model) {
                        return $model->menuCategory->title;
                    }
                ],
                'router',
                //'parent_id',
                [
                    'attribute' => 'parent_id',
                    'filter' => Menu::getList(),
                    'value' => function($model) {
                        return $model->parentTitle;
                    }
                ],
                // 'parameter',
                // 'icon',
                 'status',
                // 'item_name',
                // 'target',
                // 'protocol',
                // 'home',
                 'sort',
                // 'language',
                // 'assoc',
                // 'created_at',
                // 'created_by',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>


    </div><!--box-body pad-->
</div><!--box box-info-->
