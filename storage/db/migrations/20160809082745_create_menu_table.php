<?php

use Phinx\Migration\AbstractMigration;

class CreateMenuTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $menus = $this->table('menus');
        $menus->addColumn('menu_id', 'integer', array('limit' => 11,'default' => 0))
              ->addColumn('title', 'string', array('limit' => 255))
              ->addColumn('lft', 'integer', array('limit' => 11,'default' => 0))
              ->addColumn('rgt', 'integer', array('limit' => 11,'default' => 0))
              ->addColumn('url', 'string', array('limit' => 255))
              ->addColumn('slug', 'string', array('limit' => 45))
              ->addColumn('type', 'string', array('limit' => 45,'default' => 'internal'))
              ->addColumn('status', 'string', array('limit' => 45,'default' => 'enabled'))
              ->addColumn('hidden', 'integer', array('limit' => 1, 'default' => 0))
              ->addColumn('is_root', 'integer', array('limit' => 1, 'default' => 0))
              ->addColumn('updated_at', 'datetime', array('null' => true))
              ->addColumn('created_at', 'datetime', array('null' => true))
              ->addIndex(array('title', 'url', 'slug'), array('unique' => true))
              ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('menus');
    }

}
