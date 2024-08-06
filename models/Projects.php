<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $user_id
 * @property string $name
 * @property string $link
 * @property string|null $status
 * @property string|null $image
 * @property int $created_at
 * @property int $updated_at
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'status'], 'required'],
            ['image', 'file', 'extensions' => 'jpg, jpeg, png', 'maxSize' => 1024 * 1024 * 2], // 2 MB
            [['name', 'link', 'status', 'image'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'link' => 'Link',
            'status' => 'Status',
            'image' => 'Image',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
        ];
    }
}
