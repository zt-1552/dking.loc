<?php


namespace common\components;

use common\models\Category;
use yii\base\Widget;


/**
 * Class MenuWidget
 * @package common\components
 */
class MenuWidget extends Widget
{


    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;
    public $cache_time = 60;


    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        if ($this->ul_class === null) {
            $this->ul_class = 'menu';
        }
        $this->tpl .= '.php';

    }

    /**
     * @return mixed|string
     */
    public function run()
    {
        if($this->cache_time){
            // get Cache
            $menu = \Yii::$app->cache->get('menu');
            if ($menu) {
                return $menu;
            }
        }

        $this->data = Category::find()->select('id, parent_id, name')->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
//                debug($this->tree);

        if($this->cache_time){
            //set Cache
            \Yii::$app->cache->set('menu', $this->menuHtml, $this->cache_time);
        }

        return $this->menuHtml;
    }

    /**
     * @return array
     */
    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
        }
        return $tree;
    }

    /**
     * @param $tree
     * @return string
     */
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    /**
     * @param $category
     * @return false|string
     */
    protected function catToTemplate($category, $tab)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}














