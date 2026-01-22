<div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
    <div class="p-8">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4"><?= esc($post['title']) ?></h2>

        <div class="flex items-center text-sm text-gray-500 space-x-4 mb-8 pb-6 border-b border-gray-100">
            <span class="flex items-center border-r pr-4">
                <strong class="text-gray-700 mr-2">작성자</strong> <?= esc($post['writer']) ?>
            </span>
            <span class="flex items-center border-r pr-4">
                <strong class="text-gray-700 mr-2">조회수</strong> <?= $post['views'] ?>
            </span>
            <span class="flex items-center">
                <strong class="text-gray-700 mr-2">작성일</strong> <?= $model->convertToKST($post['created_at']) ?>
            </span>
        </div>

        <div class="prose max-w-none text-gray-700 leading-relaxed mb-10">
            <?= nl2br($post['content']) ?>
        </div>
        <?php if (!empty($post['image'])): ?>
            <div class="mt-8 border-t pt-6">
                <p class="text-sm text-gray-500 mb-2 font-semibold">첨부 이미지</p>
                <div class="rounded-xl overflow-hidden shadow-lg border border-gray-200 inline-block">
                    <img src="<?= base_url('uploads/' . $post['image']) ?>"
                        alt="첨부 이미지"
                        class="max-w-full h-auto">
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="bg-gray-50 px-8 py-4 flex justify-between items-center">
        <a href="<?= base_url('list') ?>" class="text-gray-600 hover:text-gray-900 font-medium flex items-center transition-colors">
            ← 목록으로 돌아가기
        </a>
        <div class="space-x-2">
            <a href="<?= base_url('edit/' . $post['id']) ?>" class="bg-amber-500 hover:bg-amber-600 text-white px-5 py-2 rounded-lg text-sm font-bold transition-all shadow-md">
                수정
            </a>
            <a href="<?= base_url('delete/' . $post['id']) ?>" 
       onclick="return confirm('정말 삭제하시겠습니까? 삭제된 데이터는 복구할 수 없습니다.');"
       class="bg-rose-500 hover:bg-rose-600 text-white px-5 py-2 rounded-lg text-sm font-bold transition-all shadow-md">
        삭제
    </a>
        </div>
    </div>
</div>