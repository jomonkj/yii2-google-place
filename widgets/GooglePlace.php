<?php

namespace jomonkj\GooglePlace\widgets;

use Yii;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;
use jomonkj\GooglePlace\MapAsset;

/**
 * @author Nghia Nguyen <yiidevelop@hotmail.com>
 * @since 2.0
 */
class GooglePlace extends InputWidget {

    public $options = [];
    public $clientOptions = [
        'imageManagerJson' => '/redactor/upload/imagejson',
        'imageUpload' => '/redactor/upload/image',
        'fileUpload' => '/redactor/upload/file'
    ];
    private $_assetBundle;

    public function init() {
        if (!isset($this->options['id'])) {
            if ($this->hasModel()) {
                $this->options['id'] = Html::getInputId($this->model, $this->attribute);
            } else {
                $this->options['id'] = $this->getId();
            }
        }
        $this->registerAssetBundle();
        $this->registerScript();
    }

    public function run() {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
    }

//    public function registerScript() {
//        $clientOptions = (count($this->clientOptions)) ? Json::encode($this->clientOptions) : '';
//        $this->getView()->registerJs("jQuery('#{$this->options['id']}').redactor({$clientOptions});");
//    }

    public function registerAssetBundle() {
        $this->_assetBundle = MapAsset::register($this->getView());
    }

    public function getAssetBundle() {
        if (!($this->_assetBundle instanceof AssetBundle)) {
            $this->registerAssetBundle();
        }
        return $this->_assetBundle;
    }

}
