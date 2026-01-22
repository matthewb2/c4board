<?php
namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function posts()
{
    $boardConfigModel = new \App\Models\BoardConfigModel();
    
    $data = [
        'title'      => '게시판 관리',
        'activeMenu' => 'posts',
        'boards'     => $boardConfigModel->findAll(),
    ];
    
    return view('admin/board_list', $data);
}

    // 회원 관리 목록
    public function users()
    {
        $userModel = new UserModel();
        $data = [
            'title'      => '회원 명단 관리',
            'activeMenu' => 'users',
            'users'      => $userModel->findAll(),
            'model'      => $userModel
        ];
        return view('admin/users', $data);
    }

    // 게시판 생성 폼
public function boardCreate()
{
    $data = [
        'title'      => '새 게시판 생성',
        'activeMenu' => 'posts',
    ];
    return view('admin/board_create', $data);
}

// 게시판 데이터 저장
public function boardStore()
{
    $model = new \App\Models\BoardConfigModel();

    $rules = [
        'code'  => 'required|alpha_dash|is_unique[board_configs.code]|min_length[2]',
        'title' => 'required|min_length[2]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $data = [
        'code'        => $this->request->getPost('code'),
        'title'       => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'is_active'   => $this->request->getPost('is_active') ?? 1,
    ];

    if ($model->save($data)) {
        return redirect()->to(base_url('admin/posts'))->with('message', '새 게시판이 생성되었습니다.');
    }

    return redirect()->back()->withInput();
}

// 특정 게시판의 게시글 목록 관리
public function boardPosts($board_id = null)
{
    if ($board_id === null) return redirect()->to(base_url('admin/posts'));

    $postModel = new \App\Models\PostModel();
    $boardModel = new \App\Models\BoardConfigModel();

    // 1. 해당 게시판 정보 가져오기
    $board = $boardModel->find($board_id);
    if (!$board) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    // 2. 해당 board_id를 가진 게시글만 조회 (닉네임 조인 포함)
    $posts = $postModel->select('posts.*, users.nickname as writer_nickname')
                       ->join('users', 'users.id = posts.user_id', 'left')
                       ->where('posts.board_id', $board_id)
                       ->orderBy('posts.id', 'DESC')
                       ->findAll();

    $data = [
        'title'      => '[' . $board['title'] . '] 게시글 관리',
        'activeMenu' => 'posts',
        'board'      => $board,
        'posts'      => $posts,
        'model'      => $postModel
    ];

    return view('admin/board_posts', $data);
}
// 게시판 수정 폼
public function boardEdit($id = null)
{
    $model = new \App\Models\BoardConfigModel();
    $board = $model->find($id);

    if (!$board) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    $data = [
        'title'      => '게시판 설정 수정',
        'activeMenu' => 'posts',
        'board'      => $board
    ];

    return view('admin/board_edit', $data);
}

// 게시판 업데이트 처리
public function boardUpdate($id = null)
{
    $model = new \App\Models\BoardConfigModel();

    $rules = [
        'title' => 'required|min_length[2]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $updateData = [
        'title'       => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'is_active'   => $this->request->getPost('is_active') ?? 0,
    ];

    if ($model->update($id, $updateData)) {
        return redirect()->to(base_url('admin/posts'))->with('message', '게시판 설정이 변경되었습니다.');
    }

    return redirect()->back()->withInput();
}

// 게시판 삭제 처리
public function boardDelete($id = null)
{
    $model = new \App\Models\BoardConfigModel();
    
    // 실제 서비스에서는 해당 게시판에 글이 있으면 삭제를 막는 로직이 필요할 수 있습니다.
    if ($model->delete($id)) {
        return redirect()->to(base_url('admin/posts'))->with('message', '게시판이 삭제되었습니다.');
    }

    return redirect()->back()->with('error', '삭제 중 오류가 발생했습니다.');
}
}