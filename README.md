# slim3

This is simple migrations & API using slim framework v.3 and phinx.

First time install package

    composer install

**create migration file**

    vendor/bin/phinx create CreateUsersTable -c phinx.php

**example migrate function**

if migration file created it will be in db/migrations/YYYYMMDDHHMMSS_create_users_table.php

    <?php

    use Phinx\Migration\AbstractMigration;

    final class CreateUsersTable extends AbstractMigration
    {
      /**
        * Change Method.
        *
        * Write your reversible migrations using this method.
        *
        * More information on writing migrations is available here:
        * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
       *
       * Remember to call "create()" or "update()" and NOT "save()" when working
       * with the Table class.
       */
      public function up()
      {
        $table = $this->table('users');
        $table->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->addIndex(['email'], ['unique' => true])
            ->create();
      }

      public function down()
      {
        $this->table('users')->drop()->save();
      }
    }


**migrate**

    vendor/bin/phinx migrate -c phinx.php
