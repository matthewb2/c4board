<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600">현재 생성된 게시판 목록입니다.</p>
    <a href="<?= base_url('admin/boardCreate') ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow-sm transition">
        + 새 게시판 생성
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden border">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">ID</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">게시판 이름</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">코드</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase text-center">상태</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase text-center">관리</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm text-gray-700">
            <?php foreach ($boards as $board): ?>
                <tr class="hover:bg-blue-50/50 transition">
                    <td class="p-4"><?= $board['id'] ?></td>
                    <td class="p-4">
                        <div class="font-bold text-gray-900"><?= esc($board['title']) ?></div>
                        <div class="text-xs text-gray-400"><?= esc($board['description']) ?></div>
                    </td>
                    <td class="p-4"><span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-mono"><?= $board['code'] ?></span></td>
                    <td class="p-4 text-center">
                        <?php if ($board['is_active']): ?>
                            <span class="text-green-600 bg-green-50 px-2 py-1 rounded-full text-xs italic">Active</span>
                        <?php else: ?>
                            <span class="text-gray-400 bg-gray-50 px-2 py-1 rounded-full text-xs">Disabled</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 text-center space-x-3">
                        <a href="<?= base_url('admin/boardPosts/' . $board['id']) ?>" class="text-blue-600 hover:underline font-medium">
                            게시글 보기
                        </a>
                        <a href="<?= base_url('admin/boardEdit/' . $board['id']) ?>" class="text-gray-600 hover:text-blue-600 font-bold">설정</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>