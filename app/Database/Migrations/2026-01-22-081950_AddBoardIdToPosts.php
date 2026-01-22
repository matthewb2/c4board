<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBoardIdToPosts extends Migration
{
    public function up()
    {
        $fields = [
            'board_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'after'      => 'id', // ID 바로 뒤에 배치하여 소속을 명확히 함
            ],
        ];
        
        $this->forge->addColumn('posts', $fields);

        // (선택 사항) 외래키 제약 조건을 추가하여 데이터 무결성을 보장할 수 있습니다.
        // $this->db->query("ALTER TABLE posts ADD CONSTRAINT fk_board_id FOREIGN KEY (board_id) REFERENCES board_configs(id) ON DELETE CASCADE");
    }

    public function down()
    {
        $this->forge->dropColumn('posts', 'board_id');
    }
}