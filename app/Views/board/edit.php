<div class="max-w-3xl mx-auto">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800">게시글 수정</h2>
    </div>

    <form action="<?= base_url('update/' . $post['id']) ?>" method="post" enctype="multipart/form-data" class="space-y-6 bg-white p-8 shadow-xl rounded-2xl border border-gray-100">
        <?= csrf_field() ?>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">작성자</label>
            <input type="text" name="writer" value="<?= esc($post['writer']) ?>" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">제목</label>
            <input type="text" name="title" value="<?= esc($post['title']) ?>" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">내용</label>
            <textarea name="content" rows="10" required
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none"><?= esc($post['content']) ?></textarea>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
            <label class="block text-sm font-semibold text-gray-700 mb-2">이미지 변경</label>
            
            <?php if ($post['image']): ?>
                <div class="mb-3 flex items-center space-x-3">
                    <img src="<?= base_url('uploads/' . $post['image']) ?>" class="w-20 h-20 object-cover rounded shadow">
                    <span class="text-xs text-gray-500">기존 파일: <?= $post['image'] ?></span>
                </div>
            <?php endif; ?>

            <input type="file" name="userfile" accept="image/*"
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer">
        </div>

        <div class="flex items-center justify-end space-x-4 pt-4 border-t">
            <a href="<?= base_url('view/' . $post['id']) ?>" class="text-gray-500 hover:text-gray-700 font-medium">취소</a>
            <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-lg font-bold shadow-lg transition-all">
                수정 완료
            </button>
        </div>
    </form>
</div>