<h1>添加公众号</h1>
<?php
    $model->status = 0;
?>
<?= $this->render('_form', [
        'model' => $model
    ]);
?>