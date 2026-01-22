<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToPosts extends Migration
{
    public function up()
    {
        $fields = [
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true, // 이미지가 없는 글도 있을 수 있으므로 null 허용
                'after'      => 'content', // content 컬럼 뒤에 생성
            ],
        ];
        $this->forge->addColumn('posts', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('posts', 'image');
    }
}