<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $addtime
 * @property string $author
 * @property integer $number
 * @property integer $t_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['addtime', 'number', 't_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['author'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'addtime' => 'Addtime',
            'author' => 'Author',
            'number' => 'Number',
            't_id' => 'T ID',
        ];
    }
}
