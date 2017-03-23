<?php

namespace common\models;

use yii\base\Model;
use Yii;
use backend\modules\menu\models\Menu;
use yii\helpers\Html;

/**
 * Description of navigate
 *
 * @author madone
 */
class Navigate extends Model {

    //put your code here
    public function menu($category_id) {
        $model = Menu::find()
                ->where([
                    'menu_category_id' => $category_id,
                    'status' => '1',
                    'parent_id' => null
                ])
                ->orderBy(['sort' => SORT_ASC])
                ->all();

        return $this->genArray($model);
    }

    public function parentMenu($id) {
        $model = Menu::find()
                ->where([
                    'parent_id' => $id,
                    'status' => '1'
                ])
                ->orderBy(['sort' => SORT_ASC])
                ->all();
        return $model ? $this->genArray($model) : null;
    }

    private function genArray($model) {
        //$ob='backend\modules\seller\models\RegisterSeller::getCoutRegis();';
        //$run ='getCoutRegis()';
        $menu = [];
        foreach ($model as $val) {
            $items = ($val->id) ? $this->parentMenu($val->id) : null;
            //$params = $val['params']?Json::encode($val['params']):null;
            //print_r($params);
            //$labelParam = $params?(eval('return '.$params['label'])):null;
            $visible = $val->item_name ? Yii::$app->user->can($val->item_name) : null;
            $menu[] = [
                'label' => $val->title . $this->getCount($val->router),
                'encode' => false,
                'icon' => $val->icon,
                'url' => (strpos($val->router, 'http') === false) ? [$val->router] : $val->router,
                'visible' => $visible,
                //$visible,
                'items' => $items
            ];
        }
        //print_r($menu);
        return $menu;
    }

    private function getCount($router) {
        $count = '';
        switch ($router) {
            /**
             * material
             */
            case '/material':
                if (Yii::$app->user->can('staffMaterial')) {
                    $count = \backend\modules\material\models\Repair::find()
                            ->where(['IN', 'status', ['1']])
                            //->orWhere(['IS', 'status', NULL])
                            ->count();
                }

                if (Yii::$app->user->can('staffIt')) {
                    $count = \backend\modules\material\models\Repair::find()
                                    ->where(['type' => 2, 'status' => 2, 'staff_status' => null])->count();
                }

                $count = $count ? ' <small class="label bg-yellow">' . $count . '</small>' : '';
                break;

            /**
             * repair
             */
            case '/repair':
                $count = \backend\modules\repair\models\Repair::find()
                        ->where(['IN', 'status', ['1']])
                        ->count();
                $count = $count ? '<small class="label pull-right bg-yellow">' . $count . '</small>' : '';
                break;

            /**
             * reserve-car
             */
//            case '/reserve-car/default/index':
//                $searchModel = new \backend\modules\reserveCar\models\ReserveCarSearch();
//                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//                $count = $dataProvider->getTotalCount();
//                $count = $count ? '<span> (' . $count . ')</span>' : '';
//                break;

        }
        return $count;
    }

}
