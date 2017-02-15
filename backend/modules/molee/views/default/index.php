<?php
use backend\modules\molee\assets\AppAsset;
$ss= AppAsset::register($this);
$floor = 2;
//if($floor == 1){
    $ss = $ss->baseUrl.'/'.$floor.'/script.js';
  $this->registerJsFile($ss);  
//}
//echo $ss->baseUrl;
?>

<div class="molee-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>


