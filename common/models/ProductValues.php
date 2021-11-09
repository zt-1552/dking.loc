<?php

namespace common\models;

use common\models\base\ProductValues as baseProductValues;

/**
 * This is the model class for table "product_values".
 *
 * @property int $product_id
 * @property int $values_id
 *
 * @property Product $product
 * @property Values $values
 */
class ProductValues extends baseProductValues
{



}
