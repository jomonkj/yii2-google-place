<?php

namespace jomonkj\GooglePlace\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%place}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $google_place_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Place extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%place}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['gps'], 'safe'],
            [['name', 'google_place_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'google_place_id' => Yii::t('app', 'Google Place ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function getPlaceId($condition) {
        $model = static::findOne($condition);
        return $model ? $model->id : false;
    }

    public function behaviors() {
        return[
            TimestampBehavior::className(),
        ];
    }

}
