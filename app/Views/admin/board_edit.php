<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="max-w-2xl bg-white shadow rounded-xl overflow-hidden border border-gray-100">
    <div class="p-6 border-b bg-gray-50 flex justify-between items-center">
        <h3 class="text-lg font-bold text-gray-800">게시판 설정 수정 (코드: <?= $board['code'] ?>)</h3>
        <a href="<?= base_url('admin/boardDelete/' . $board['id']) ?>" 
           onclick="return confirm('정말 이 게시판을 삭제하시겠습니까? 해당 게시판의 설정이 영구 삭제됩니다.')"
           class="text-xs bg-rose-50 text-rose-600 px-3 py-1.5 rounded-lg hover:bg-rose-100 font-bold transition">
            게시판 삭제
        </a>
    </div>
    
    <form action="<?= base_url('admin/boardUpdate/' . $board['id']) ?>" method="post" class="p-8 space-y-6">
        <?= csrf_field() ?>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">게시판 이름</label>
            <input type="text" name="title" value="<?= esc($board['title']) ?>" required
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">게시판 설명</label>
            <textarea name="description" rows="3" 
                      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all"><?= esc($board['description']) ?></textarea>
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" <?= $board['is_active'] ? 'checked' : '' ?>
                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
            <label for="is_active" class="text-sm font-medium text-gray-700 cursor-pointer">게시판 활성화 상태</label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t">
            <a href="<?= base_url('admin/posts') ?>" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition">취소</a>
            <button type="submit" class="px-6 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 shadow-md transition font-bold">변경사항 저장</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>