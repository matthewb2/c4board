<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function signup()
    {
        $data = ['title' => '회원가입'];
        echo view('layout/header', $data);
        echo view('auth/signup');
        echo view('layout/footer');
    }

    public function register()
    {
        $model = new UserModel();

        // 유효성 검사 규칙
        $rules = [
            'username' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]',
            'nickname' => 'required|min_length[2]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userData = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), // 모델의 hashPassword가 자동으로 해싱합니다.
            'nickname' => $this->request->getPost('nickname'),
            'email'    => $this->request->getPost('email'),
        ];

        if ($model->save($userData)) {
            return redirect()->to(base_url('login'))->with('message', '회원가입이 완료되었습니다. 로그인해 주세요.');
        }

        return redirect()->back()->withInput()->with('message', '가입 중 오류가 발생했습니다.');
    }

    // 로그인 화면
public function login()
{
    $data = ['title' => '로그인'];
    echo view('layout/header', $data);
    echo view('auth/login');
    echo view('layout/footer');
}

// 로그인 인증 처리
public function loginProcess()
{
    $session = session();
    $model = new UserModel();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // 사용자 조회
    $user = $model->where('username', $username)->first();

    if ($user) {
        // 비밀번호 검증 (암호화된 해시와 비교)
        if (password_verify($password, $user['password'])) {
            // 로그인 성공: 세션 데이터 설정
            $sessionData = [
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'nickname'   => $user['nickname'],
                'isLoggedIn' => true,
            ];
            $session->set($sessionData);

            return redirect()->to(base_url('list'))->with('message', $user['nickname'] . '님, 환영합니다!');
        } else {
            return redirect()->back()->with('error', '비밀번호가 일치하지 않습니다.');
        }
    } else {
        return redirect()->back()->with('error', '존재하지 않는 아이디입니다.');
    }
}

// 로그아웃 처리
public function logout()
{
    session()->destroy();
    return redirect()->to(base_url('login'))->with('message', '로그아웃 되었습니다.');
}
}