<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="p-4 text-sm font-bold text-gray-600">ID</th>
                <th class="p-4 text-sm font-bold text-gray-600">제목</th>
                <th class="p-4 text-sm font-bold text-gray-600 text-center">작성자</th>
                <th class="p-4 text-sm font-bold text-gray-600 text-center">작성일</th>
                <th class="p-4 text-sm font-bold text-gray-600 text-center">관리</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            <?php foreach ($posts as $post): ?>
            <tr class="hover:bg-gray-50">
                <td class="p-4 text-sm text-gray-500"><?= $post['id'] ?></td>
                <td class="p-4 text-sm font-medium"><?= esc($post['title']) ?></td>
                <td class="p-4 text-sm text-center"><?= esc($post['writer_nickname']) ?></td>
                <td class="p-4 text-sm text-center text-gray-400"><?= $model->convertToKST($post['created_at']) ?></td>
                <td class="p-4 text-center">
                    <a href="<?= base_url('delete/' . $post['id']) ?>" onclick="return confirm('관리자 권한으로 삭제하시겠습니까?')" class="text-rose-600 hover:underline">삭제</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>