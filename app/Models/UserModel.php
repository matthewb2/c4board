<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true; // UTC 기준 자동 저장

    protected $allowedFields    = ['username', 'password', 'nickname', 'email'];

    // 비밀번호 해싱을 위한 콜백 설정
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) return $data;

        // PHP 기본 권장 해시 알고리즘(PASSWORD_DEFAULT) 사용
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    /**
     * KST 변환 로직 (이미 익숙하신 코드)
     */
    public function convertToKST($utcDateTime)
    {
        if (empty($utcDateTime)) return "";
        $date = new \DateTime($utcDateTime, new \DateTimeZone('UTC'));
        $date->setTimezone(new \DateTimeZone('Asia/Seoul'));
        return $date->format('Y-m-d H:i:s');
    }
}