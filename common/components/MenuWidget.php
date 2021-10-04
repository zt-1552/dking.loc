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


    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
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
        // get Cache
        $menu = \Yii::$app->cache->get('menu');
        if ($menu) {
            return $menu;
        }

        $this->data = Category::find()->select('id, parent_id, name')->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
//                debug($this->tree);

        //set Cache
        \Yii::$app->cache->set('menu', $this->menuHtml, 600);


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
    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    /**
     * @param $category
     * @return false|string
     */
    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }


}














