<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 모드 - <?= $title ?? '대시보드' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Noto Sans KR', sans-serif; }</style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex-shrink-0">
        <div class="p-6 text-center border-b border-slate-800">
            <h1 class="text-xl font-bold tracking-widest text-blue-400">ADMIN PANEL</h1>
        </div>
        <nav class="mt-6 flex-1 px-4 space-y-2">
            <a href="<?= base_url('admin/posts') ?>" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-slate-800 transition-colors <?= ($activeMenu == 'posts') ? 'bg-blue-600 text-white' : 'text-slate-400' ?>">
                게시판 관리
            </a>
            <a href="<?= base_url('admin/users') ?>" 
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:bg-slate-800 transition-colors <?= ($activeMenu == 'users') ? 'bg-blue-600 text-white' : 'text-slate-400' ?>">
                회원 관리
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <a href="<?= base_url('list') ?>" class="block text-center text-xs text-slate-500 hover:text-white underline">게시판 돌아가기</a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b flex items-center justify-between px-8 shadow-sm">
            <h2 class="text-lg font-semibold text-gray-700"><?= $title ?></h2>
            <div class="flex items-center space-x-4 text-sm text-gray-500">
                <span>관리자: <strong><?= session()->get('nickname') ?></strong></span>
                <a href="<?= base_url('logout') ?>" class="text-rose-500 hover:underline">로그아웃</a>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8 bg-gray-50">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

</body>
</html>