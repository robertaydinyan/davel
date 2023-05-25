<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Item[] $items */
/** @var yii\data\Pagination $pagination */
/** @var app\models\ItemSearch $searchModel */
/** @var app\models\Category[] $categories */
/** @var app\models\Location[] $locations */
$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <section class="section-search col-2">
            <?php echo $this->render('_search', [
                'model' => $searchModel,
                'categories' => $categories,
                'locations' => $locations,
            ]); ?>
        </section>
        <section class="section-products col-10">
            <div class="row">
                <?php if ($items) {
                    foreach ($items as $item) {
                        echo sprintf('
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product">
                                    <div class="part-1">
                                        <img src="/images/items/%s" alt="item" class="item-image">
                                    </div>
                                    <div class="part-2 d-flex justify-content-around">
                                        <h3 class="product-title"><a href="/item/view?id=%s">%s</a></h3>
                                        <span class="product-price">%s</span>
                                    </div>
                                </div>
                            </div>',

                            $item->image,
                            $item->id,
                            $item->name,
                            $item->price
                        );
                    }
                } ?>
            </div>

            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
                'linkOptions' => ['class' => 'page-link'],
                'disabledListItemSubTagOptions' => ['class' => 'page-link'],
            ]) ?>
        </section>
    </div>
</div>
