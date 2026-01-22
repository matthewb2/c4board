<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToPosts extends Migration
{
    public function up()
{
    $this->forge->addColumn('posts', [
        'user_id' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
            'after'      => 'id',
        ],
    ]);
}

    public function down()
    {
        //
    }
}
