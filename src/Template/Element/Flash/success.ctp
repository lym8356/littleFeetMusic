<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!--<div class="message success" onclick="this.classList.add('hidden')">--><?//= $message ?><!--</div>-->

<div class="alert alert-dismissible alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
    </button>
    <strong><?= $message ?></strong>
</div>
