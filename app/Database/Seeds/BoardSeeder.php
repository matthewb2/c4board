<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BoardSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'code'        => 'notice',
                'title'       => '공지사항',
                'description' => '서비스의 주요 소식을 알리는 게시판입니다.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'free',
                'title'       => '자유게시판',
                'description' => '사용자들이 자유롭게 소통하는 공간입니다.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'code'        => 'gallery',
                'title'       => '갤러리',
                'description' => '사진과 이미지를 공유하는 게시판입니다.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        // 테이블에 삽입
        $this->db->table('board_configs')->insertBatch($data);
    }
}