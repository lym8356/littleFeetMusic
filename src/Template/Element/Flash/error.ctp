<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message error" onclick="this.classList.add('hidden');">--><?//= $message ?><!--</div>-->

<div class="alert alert-danger" role="alert">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    <?= $message ?>
</div>
