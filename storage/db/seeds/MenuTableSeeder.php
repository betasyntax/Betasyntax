<?php

use Phinx\Seed\AbstractSeed;

class MenuTableSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
          array(
            'menu_id'             => 1,
            'title'               => 'Home',
            'lft'                 => 0,
            'rgt'                 => 1,
            'url'                 => '/',
            'slug'                => 'home',
            'type'                => 'internal',
            'status'              => 'enabled',
            'hidden'              => 0,
            'is_root'             => 0,
            'updated_at'          => date('Y-m-d H:i:s'),
            'created_at'          => date('Y-m-d H:i:s')
          ),
          array(
            'menu_id'             => 1,
            'title'               => 'Welcome',
            'lft'                 => 2,
            'rgt'                 => 3,
            'url'                 => '/welcome',
            'slug'                => 'welcome',
            'type'                => 'internal',
            'status'              => 'enabled',
            'hidden'              => 0,
            'is_root'             => 0,
            'updated_at'          => date('Y-m-d H:i:s'),
            'created_at'          => date('Y-m-d H:i:s')
          ),
          array(
            'menu_id'             => 1,
            'title'               => 'Account',
            'lft'                 => 4,
            'rgt'                 => 5,
            'url'                 => '/account',
            'slug'                => 'account',
            'type'                => 'internal',
            'status'              => 'enabled',
            'hidden'              => 0,
            'is_root'             => 0,
            'updated_at'          => date('Y-m-d H:i:s'),
            'created_at'          => date('Y-m-d H:i:s')
          )
        );

        $posts = $this->table('menus');
        $posts->insert($data)
              ->save();
    }
}
