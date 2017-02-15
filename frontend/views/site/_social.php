<?php

use kartik\social\GooglePlugin;
use kartik\social\TwitterPlugin;
?>
<div class="row">
    <div class="col-xs-12 col-sm-3 col-sm-offset-3">


        <?= TwitterPlugin::widget(['type' => TwitterPlugin::FOLLOW, 'settings' => ['annotation' => 'vertical-bubble']]) ?>
    </div>
    <div class="col-xs-4 col-sm-1">
        <?= GooglePlugin::widget(['type' => GooglePlugin::PLUS_ONE, 'settings' => ['size' => 'tall']]) ?>

    </div>
    <div class="col-xs-8 col-sm-2">
        <!-- Histats.com  (div with counter) -->
        <div id="histats_counter" style="display: inline-block;"></div>
        <!-- Histats.com  START  (aync)-->
        <script type="text/javascript">var _Hasync = _Hasync || [];
            _Hasync.push(['Histats.start', '1,3535768,4,1032,150,25,00011111']);
            _Hasync.push(['Histats.fasi', '1']);
            _Hasync.push(['Histats.track_hits', '']);
            (function () {
                var hs = document.createElement('script');
                hs.type = 'text/javascript';
                hs.async = true;
                hs.src = ('//s10.histats.com/js15_as.js');
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
            })();</script>
        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3535768&101" alt="" border="0"></a></noscript>
        <!-- Histats.com  END  -->
    </div>
</div>