<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'C4 게시판' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap');

        body {
            font-family: 'Noto Sans KR', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">

    <nav class="bg-slate-800 text-white shadow-lg">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="<?= base_url('list') ?>" class="text-xl font-bold tracking-tighter">
                        C4<span class="text-blue-400">BBS</span>
                    </a>
                </div>
                <div class="flex space-x-4">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <?php if (session()->get('username') === 'admin'): ?>
                            <a href="<?= base_url('admin/posts') ?>"
                                class="flex items-center text-xs bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-full font-bold transition-all shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                관리자 모드
                            </a>
                        <?php endif; ?>
                        <span class="text-sm text-slate-400 py-1">
                            <b class="text-white"><?= session()->get('nickname') ?></b>님
                        </span>
                        <a href="<?= base_url('logout') ?>" class="text-xs bg-slate-700 px-3 py-1 rounded hover:bg-slate-600">로그아웃</a>

                    <?php else: ?>
                        <a href="<?= base_url('login') ?>" class="hover:text-blue-400">로그인</a>
                        <a href="<?= base_url('signup') ?>" class="hover:text-blue-400">회원가입</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-10">