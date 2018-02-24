<h1>添加域名</h1>
<?php
    $model->type = 0;
    $model->status = 0;
?>
<?= $this->render('_form', [
        'model' => $model
    ]);
?>