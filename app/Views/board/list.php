<?php if (session()->getFlashdata('message')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>
<div class="flex justify-between items-end mb-6">
    <h2 class="text-3xl font-bold text-gray-800">게시글 목록</h2>
    <a href="<?= base_url('create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition-all">
        새 글 작성
    </a>
</div>

<div class="bg-white shadow-md rounded-xl overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">순번</th>
                <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">제목</th>
                <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-32 text-center">작성자</th>
                <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-24 text-center">조회수</th>
                <th class="px-6 py-4 text-sm font-semibold text-gray-600 w-48 text-center">작성일</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach ($posts as $post): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-center text-gray-500 text-sm"><?= $post['id'] ?></td>
                    <td class="px-6 py-4">
                        <a href="<?= base_url('view/' . $post['id']) ?>" class="text-blue-600 hover:underline font-medium">
                            <?= esc($post['title']) ?>
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center text-sm">
    <?= esc($post['writer_nickname'] ?? $post['writer']) ?>
</td>
                    <td class="px-6 py-4 text-center text-sm text-gray-500"><?= $post['views'] ?></td>
                    <td class="px-6 py-4 text-center text-xs text-gray-400">
                        <?= $model->convertToKST($post['created_at']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>