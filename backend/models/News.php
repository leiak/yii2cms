<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $id
 * @property string $keywords
 * @property string $title
 * @property string $description
 * @property string $content
 * @property integer $click
 * @property string $time
 * @property string $cid
 * @property integer $del
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'cid'], 'required'],
            [['content'], 'string'],
            [['click', 'time', 'cid', 'del'], 'integer'],
            [['keywords'], 'string', 'max' => 60],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keywords' => 'Keywords',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'click' => 'Click',
            'time' => 'Time',
            'cid' => 'Cid',
            'del' => 'Del',
        ];
    }
}
