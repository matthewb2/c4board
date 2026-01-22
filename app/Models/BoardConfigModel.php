<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardConfigModel extends Model
{
    protected $table      = 'board_configs';
    protected $primaryKey = 'id';

    protected $allowedFields = ['code', 'title', 'description', 'is_active'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // 저장 시 UTC 기준 저장 (사용자 메모 내용 반영)
    protected $dateFormat = 'datetime';
}