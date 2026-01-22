<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true; // 삭제 시 데이터 유지

    protected $allowedFields = ['board_id', 'user_id', 'title', 'content', 'writer', 'image', 'views'];

    // 자동 타임스탬프 설정
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * 뷰(View)에서 한국 시간으로 변환하여 출력하기 위한 헬퍼 메서드
     */
    // 이 메서드가 파일에 있는지 꼭 확인하세요!
    public function convertToKST(string $utcTime): string
    {
        if (empty($utcTime)) return '';

        $date = new \DateTime($utcTime, new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone('Asia/Seoul'));
        return $date->format('Y-m-d H:i:s');
    }
    public function getPostsWithNickname()
    {
        return $this->select('posts.*, users.nickname as writer_nickname')
            ->join('users', 'users.id = posts.user_id', 'left')
            ->orderBy('posts.id', 'DESC')
            ->findAll();
    }
}
