<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => '첫 번째 게시글입니다.',
                'content'    => 'CI4 게시판 개발을 시작합니다.',
                'writer'     => '관리자',
                'created_at' => date('Y-m-d H:i:s'), // 현재 서버 시간(UTC 예상)
            ],
            [
                'title'      => '두 번째 테스트 글',
                'content'    => '데이터가 잘 나오는지 확인해봅시다.',
                'writer'     => '테스터',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // posts 테이블에 데이터 삽입
        $this->db->table('posts')->insertBatch($data);
    }
}