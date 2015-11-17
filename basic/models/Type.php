<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $t_id
 * @property string $type
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'T ID',
            'type' => 'Type',
        ];
    }
}
