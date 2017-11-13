<?php

namespace craft\commerce\records;

use craft\db\ActiveRecord;
use craft\records\Element;
use yii\db\ActiveQueryInterface;

/**
 * Variant record.
 *
 * @property int                  $id
 * @property int                  $productId
 * @property string               $sku
 * @property bool                 $isDefault
 * @property float                $price
 * @property int                  $sortOrder
 * @property float                $width
 * @property float                $height
 * @property float                $length
 * @property float                $weight
 * @property int                  $stock
 * @property bool                 $unlimitedStock
 * @property int                  $minQty
 * @property int                  $maxQty
 * @property ActiveQueryInterface $element
 * @property Product              $product
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  2.0
 */
class Variant extends ActiveRecord
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{%commerce_variants}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['sku'], 'unique']
        ];
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getProduct(): ActiveQueryInterface
    {
        return $this->hasOne(Product::class, ['id', 'productId']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getElement(): ActiveQueryInterface
    {
        return $this->hasOne(Element::class, ['id', 'id']);
    }
}
