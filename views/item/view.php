<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Item $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'Category',
                'value' => function($model) {
                    return $model->category->name;
                }
            ],
            'price',
            [
                'label' => 'Seller',
                'value' => function($model) {
                    return $model->seller->name;
                }
            ],
            [
                'label' => 'Location',
                'value' => function($model) {
                    return $model->location->name;
                }
            ],
            [
                'label' => 'Seller Rate',
                'value' => function($model) {
                    return $model->seller->rate;
                }
            ]
        ],
    ]) ?>

</div>
