<?php


namespace backend\components\behaviors;

use Yii;
use yii\base\Behavior;
use backend\components\AppAdminController;
use yii\caching\TagDependency;


class DeleteCacheBehavior extends Behavior
{
    public $cacheTag;
    public $actions;

    public function events()
    {
        return [
            AppAdminController::EVENT_BEFORE_ACTION  => 'deleteCache',
        ];
    }

    public function deleteCache()
    {
        $action = Yii::$app->controller->action->id; //название текущего действия
        if(array_search($action, $this->actions)=== false)
            return;

        $cacheTag = $this->cacheTag;
        TagDependency::invalidate(Yii::$app->cache, $cacheTag);
    }

}