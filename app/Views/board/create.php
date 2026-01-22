<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">새 글 작성</h2>
        <p class="text-gray-500 mt-2">새로운 소식이나 정보를 공유해 주세요.</p>
    </div>

    <form action="<?= base_url('store') ?>" method="post" enctype="multipart/form-data" class="space-y-6 bg-white p-8 shadow-xl rounded-2xl border border-gray-100">
        <?= csrf_field() ?>

        <?php if (session()->get('isLoggedIn')): ?>
    <div class="bg-blue-50 p-4 rounded-lg mb-6">
        <p class="text-sm text-blue-800">
            작성자: <strong><?= session()->get('nickname') ?></strong> 님으로 게시글이 등록됩니다.
        </p>
    </div>
<?php else: ?>

        <div>
            <label for="writer" class="block text-sm font-semibold text-gray-700 mb-2">작성자</label>
            <input type="text" name="writer" id="writer" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                   placeholder="이름을 입력하세요">
        </div>
<?php endif; ?>
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">제목</label>
            <input type="text" name="title" id="title" required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                   placeholder="제목을 입력하세요">
        </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">내용</label>
            <textarea name="content" id="content" rows="10" required
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                      placeholder="내용을 상세히 작성해 주세요"></textarea>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg border-2 border-dashed border-gray-300">
            <label for="userfile" class="block text-sm font-semibold text-gray-700 mb-2">이미지 첨부</label>
            <input type="file" name="userfile" id="userfile" accept="image/*"
                   class="block w-full text-sm text-gray-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100 transition-all cursor-pointer">
            <p class="text-xs text-gray-400 mt-2">* 이미지 파일(jpg, png, gif)만 업로드 가능합니다.</p>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-4">
            <a href="<?= base_url('list') ?>" class="text-gray-500 hover:text-gray-700 font-medium transition-colors">
                취소
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold shadow-lg transform active:scale-95 transition-all">
                작성 완료
            </button>
        </div>
    </form>
</div>