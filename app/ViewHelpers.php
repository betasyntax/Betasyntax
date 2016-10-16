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

    $wayfinder = new \Twig_SimpleFunction('Wayfinder', function ($slug='na',$parent_id = 0, $category_id = 1, $ul_class='') {
      Wayfinder::setSlug($slug);
      $menu = new Menu;
      $data = $menu->find_by(['status'=>'enabled','menu_category_id'=>$category_id],'parent_id ASC, site_order ASC');
      $menuArray = Wayfinder::menuArray($data);
      $menuArrayData = Wayfinder::tree($menuArray,$parent_id);
      Wayfinder::buildHtmlTree($menuArrayData,$ul_class);
    });

    return [
      'brandingStatus'=>$brandingStatus,
      'isLoggedIn'=>$isLoggedIn,
      'Wayfinder'=>$wayfinder
    ];
  }
}