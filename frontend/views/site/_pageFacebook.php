<?php

use kartik\social\FacebookPlugin;
 
/**
 * If any parameters are not passed, the widget will use settings from the 
 * social module wherever possible. For example `appId` and `secret` will
 * be referred from the module settings for the example below.
 */
echo FacebookPlugin::widget(['type'=>FacebookPlugin::PAGE, 'settings' => ['href'=>'http://facebook.com/สถาบันวัฒนธรรมศึกษากัลยาณิวัฒนา-272730689544916']]);