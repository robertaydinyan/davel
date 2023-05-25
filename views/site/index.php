<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Welcome!</h1>
        <a href="<?php echo Url::to(['item/index']); ?>">Go to items</a>
    </div>

</div>
