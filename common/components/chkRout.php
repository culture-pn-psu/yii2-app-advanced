<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;
use Yii;
use yii\base\Component;
/**
 * Description of Img
 *
 * @author Madone
 */
class chkRout extends Component{
    

    public function action($action){
        return (Yii::$app->controller->action->id == $action);
    }
    
    
}
