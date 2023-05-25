<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seller".
 *
 * @property int $id
 * @property string $name
 * @property float|null $rating
 *
 * @property Item[] $items
 */
class Seller extends \yii\db\ActiveRecord
{
    private static $ratings_categories = array(
        1 => '1+',
        2 => '2+',
        3 => '3+',
        4 => '4+',
        5 => '5'
    );
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['rating'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'rating' => 'Rating',
        ];
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Item::class, ['seller_id' => 'id']);
    }

    public static function getRatingCategories() {
        return self::$ratings_categories;
    }
}
