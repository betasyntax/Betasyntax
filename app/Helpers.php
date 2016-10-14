<?php namespace App;

class Helpers
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

    $wayfinder = new \Twig_SimpleFunction('Wayfinder', function ($slug='na',$options=null) {
      if(!$options) {
        $options = ['auth'=>true,
                    'category_id'=>0,
                    'data'=> [
                      'ul_id'=>'mainmenu'
                    ]
                  ];
      }
      \Betasyntax\Wayfinder::_setSlug($slug);
      $data = \Betasyntax\Wayfinder::getMenu($options['category_id']);
      \Betasyntax\Wayfinder::createTreeView($data,$options['category_id'],true,$options['data']['ul_id']);
      // $data = \Betasyntax\Wayfinder::tree(0,$auth);
    });


    return [
      'brandingStatus'=>$brandingStatus,
      'Wayfinder'=>$wayfinder
    ];
  }
}