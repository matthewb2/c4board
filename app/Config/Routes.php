<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// app/Config/Routes.php

$routes->group('c4bbs', function ($routes) {
    // 목록 보기: localhost:8080/c4bbs/list
    $routes->get('list', 'Board::index');

    // 상세 보기: localhost:8080/c4bbs/view/(:num)
    // (:num)은 게시글의 ID 값을 의미합니다.
    $routes->get('view/(:num)', 'Board::view/$1');

    // 글쓰기 및 기타 기능
    $routes->get('create', 'Board::create');
    $routes->post('store', 'Board::store');

    $routes->get('edit/(:num)', 'Board::edit/$1');
    $routes->post('update/(:num)', 'Board::update/$1');

    $routes->get('delete/(:num)', 'Board::delete/$1');

    // 인증 관련 라우트
    $routes->get('signup', 'Auth::signup');
    $routes->post('register', 'Auth::register');
    $routes->get('login', 'Auth::login'); // 다음 단계를 위해 미리 정의
    
    $routes->post('loginProcess', 'Auth::loginProcess');
    $routes->get('logout', 'Auth::logout');

    // 관리자 페이지 라우트
    $routes->get('admin/posts', 'Admin::posts');
    $routes->get('admin/users', 'Admin::users');

    $routes->get('admin/boardCreate', 'Admin::boardCreate');
    $routes->post('admin/boardStore', 'Admin::boardStore');

    $routes->get('admin/boardPosts/(:num)', 'Admin::boardPosts/$1');

    $routes->get('admin/boardEdit/(:num)', 'Admin::boardEdit/$1');
    $routes->post('admin/boardUpdate/(:num)', 'Admin::boardUpdate/$1');
    $routes->get('admin/boardDelete/(:num)', 'Admin::boardDelete/$1');
});
