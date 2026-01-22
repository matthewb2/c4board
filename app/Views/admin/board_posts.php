<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="mb-6 flex items-center justify-between">
    <div>
        <nav class="flex text-sm text-gray-500 mb-2">
            <a href="<?= base_url('admin/posts') ?>" class="hover:text-blue-600">게시판 관리</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-semibold"><?= esc($board['title']) ?></span>
        </nav>
        <p class="text-gray-600 text-sm">이 게시판에 등록된 모든 게시글을 관리합니다.</p>
    </div>
    <a href="<?= base_url('admin/posts') ?>" class="text-sm bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg transition">
        뒤로 가기
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden border">
    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase w-16">ID</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">제목</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase text-center w-32">작성자</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase text-center w-40">작성일</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase text-center w-24">관리</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm">
            <?php if (empty($posts)): ?>
                <tr>
                    <td colspan="5" class="p-10 text-center text-gray-400 italic">등록된 게시글이 없습니다.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-gray-500"><?= $post['id'] ?></td>
                    <td class="p-4 font-medium">
                        <a href="<?= base_url('view/' . $post['id']) ?>" target="_blank" class="hover:text-blue-600">
                            <?= esc($post['title']) ?>
                        </a>
                    </td>
                    <td class="p-4 text-center"><?= esc($post['writer_nickname'] ?? '미확인') ?></td>
                    <td class="p-4 text-center text-gray-400"><?= $model->convertToKST($post['created_at']) ?></td>
                    <td class="p-4 text-center">
                        <a href="<?= base_url('delete/' . $post['id']) ?>" 
                           onclick="return confirm('정말 삭제하시겠습니까?')"
                           class="text-rose-500 hover:text-rose-700 font-bold">삭제</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>