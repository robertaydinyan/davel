<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ItemSearch $model */
/** @var app\models\Category[] $categories */
/** @var app\models\Location[] $locations */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['class' => 'form-control name-autocomplete']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(['' => ''] + $categories) ?>

    <span>Price</span>
    <div class="price-search d-flex align-items-center">
        <?= $form->field($model, 'price_lower')->textInput(['type' => 'number', 'id' => 'itemsearch-price-lower'])->label('From'); ?>
        <span>-</span>
        <?= $form->field($model, 'price_upper')->textInput(['type' => 'number', 'id' => 'itemsearch-price-upper'])->label('To'); ?>
    </div>
    <?= $form->field($model, 'location_id')->dropDownList(['' => ''] + $locations) ?>

<!--    --><?php // echo $form->field($model, 'seller_id_id[rating]')->dropDownList() ?>
    <div class="form-group col-12">
        <label for="">Seller Rate</label>
        <div class="rate d-flex flex-row-reverse justify-content-end">
            <?php for ($i = 5; $i >= 1; $i--) {
                echo sprintf('
                    <input type="radio" id="star%s" name="ItemSearch[seller_id][rate]" value="%s" %s/>
                    <label for="star%s" title="text">%s stars</label>',

                    $i,
                    $i,
                    isset($model->seller_id) ? ($model->seller_id['rate'] == $i ? 'checked' : '') : '',
                    $i,
                    $i
                );
            } ?>
        </div>
    </div>

    <?= $form->field($model, 'order')->dropDownList([
        0 => '',
        1 => 'Price: Low to High',
        2 => 'Price: High to Low',
        3 => 'Customer Review',
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
