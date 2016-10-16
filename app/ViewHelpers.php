<?php namespace App;

use App\Models\Menu;
use App\Functions as Fn;
use Betasyntax\Wayfinder;

class ViewHelpers
{
  protected static $debugbarRender;
  protected static $app;
  protected static $debugbar;
  protected static $render;

  public static function helpers()
  {
    static::$app = app();

    $brandingStatus = new \Twig_SimpleFunction('brandingStatus', function () {
      $x = Setting::search('key_name','=','show_branding',1);
      for($i=0;$i<count($x);$i++) {
        $s = $x->value;
      }
      return $s;
    });

    $isLoggedIn = new \Twig_SimpleFunction('isLoggedIn', function () {
      return app()->session->isLoggedIn;
    });

    $wayfinder = new \Twig_SimpleFunction('Wayfinder', function ($slug='na',$options=null) {
      if(!$options) {
        $options = ['auth'=>true, 'category_id'=>0, 'data'=> ['ul_id'=>'mainmenu']];
      }
      Wayfinder::_setSlug($slug);
      $menu = new Menu;
      $menuData = [];
      $data = $menu->find_by(['status'=>'enabled','menu_category_id'=>$options['category_id']],'site_order');
      if (count($data)>0) {
        foreach ($data as $key => $value) {
          $menuData[$value->id] = array(
            "parent_id" => $value->parent_id, 
            "name" => $value->title, 
            "url" => $value->url,
            "type" => $value->type,
            "status" => $value->status,
            "slug" => $value->slug
          );
        }
      }
      Wayfinder::createTreeView($menuData,$options['category_id'],true,$options['data']['ul_id']);
    });

    return [
      'brandingStatus'=>$brandingStatus,
      'isLoggedIn'=>$isLoggedIn,
      'Wayfinder'=>$wayfinder
    ];
  }
}