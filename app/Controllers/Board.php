<?php

namespace App\Controllers;

use App\Models\PostModel;

class Board extends BaseController
{
    public function index()
    {
        $model = new PostModel();
// 조인된 데이터를 가져오도록 변경
    $data['posts'] = $model->getPostsWithNickname();
        $data['model'] = $model; // 시간 변환 메서드 사용을 위해 모델 전달

        // 테스트용 이미지 경로 생성
        $data['test_image'] = 'uploads/1.png';

        // 반드시 echo를 붙여서 차례대로 출력해야 합니다.
        echo view('layout/header', $data);
        echo view('board/list', $data);
        echo view('layout/footer');
    }


    public function view($id = null)
    {
        $model = new PostModel();

        // 1. 해당 ID의 게시글 가져오기
        $post = $model->find($id);

        // 2. 게시글이 없는 경우 404 에러 처리
        if (!$post) {
            //throw PageNotFoundException::forPageNotFound("{$id}번 게시글을 찾을 수 없습니다.");
        }

        // 3. 조회수 증가 (선택 사항)
        $model->update($id, ['views' => $post['views'] + 1]);

        $data = [
            'post'  => $post,
            'model' => $model, // 뷰에서 convertToKST() 사용을 위해 전달
        ];

        //return view('board/view', $data);
        echo view('layout/header', $data);
        echo view('board/view', $data);
        echo view('layout/footer');
    }

    public function create()
{
    $data = [
        'title' => '새 글 작성',
    ];

    echo view('layout/header', $data);
    echo view('board/create');
    echo view('layout/footer');
}

public function store()
{
    $model = new \App\Models\PostModel();

    // 1. 이미지 파일 처리
    $file = $this->request->getFile('userfile');
    $imgName = null;

    if ($file && $file->isValid() && ! $file->hasMoved()) {
        // 랜덤한 파일명 생성 (중복 방지)
        $imgName = $file->getRandomName();
        // FCPATH는 public 폴더를 가리킵니다. public/uploads에 저장합니다.
        $file->move(FCPATH . 'uploads', $imgName);
    }

    // 2. 데이터 저장
    // PostModel에서 $useTimestamps = true 설정 시, 
    // 기본적으로 UTC 기반의 현재 시간이 created_at에 저장됩니다.
    $data = [
        'title'   => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'user_id' => session()->get('user_id'), // 세션에서 ID 가져옴
        'writer'  => session()->get('nickname'), // 세션에서 닉네임 가져옴
        'image'   => $imgName, // DB 컬럼에 파일명 저장
        'views'   => 0
    ];

    if ($model->save($data)) {
        // 성공 시 목록으로 이동
        return redirect()->to(base_url('list'))->with('message', '새 글이 등록되었습니다.');
    } else {
        // 실패 시 이전 페이지로 이동
        return redirect()->back()->withInput()->with('errors', $model->errors());
    }
}

// 1. 수정 폼 호출
public function edit($id = null)
{
    $model = new \App\Models\PostModel();
    $post = $model->find($id);

    if (!$post) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    $data = [
        'title' => '게시글 수정',
        'post'  => $post
    ];

    echo view('layout/header', $data);
    echo view('board/edit', $data);
    echo view('layout/footer');
}

// 2. 수정 데이터 처리
public function update($id = null)
{
    $model = new \App\Models\PostModel();
    $post = $model->find($id);

    if (!$post) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

    $imgName = $post['image']; // 기본값은 기존 파일명
    $file = $this->request->getFile('userfile');

    // 새 이미지가 업로드 되었을 경우
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // 기존 파일이 있다면 삭제 (서버 용량 관리)
        if ($post['image'] && file_exists(FCPATH . 'uploads/' . $post['image'])) {
            unlink(FCPATH . 'uploads/' . $post['image']);
        }
        
        $imgName = $file->getRandomName();
        $file->move(FCPATH . 'uploads', $imgName);
    }

    $updateData = [
        'title'   => $this->request->getPost('title'),
        'content' => $this->request->getPost('content'),
        'writer'  => $this->request->getPost('writer'),
        'image'   => $imgName,
    ];

    if ($model->update($id, $updateData)) {
        return redirect()->to(base_url('view/' . $id))->with('message', '게시글이 수정되었습니다.');
    } else {
        return redirect()->back()->withInput();
    }
}

public function delete($id = null)
{
    $model = new \App\Models\PostModel();
    $post = $model->find($id);

    if (!$post) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    // 1. 서버에서 실제 이미지 파일 삭제
    if ($post['image'] && file_exists(FCPATH . 'uploads/' . $post['image'])) {
        unlink(FCPATH . 'uploads/' . $post['image']);
    }

    // 2. DB 레코드 삭제
    $model->delete($id);

    return redirect()->to(base_url('list'))->with('message', '게시글과 첨부파일이 안전하게 삭제되었습니다.');
}

}
