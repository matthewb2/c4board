<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="max-w-2xl bg-white shadow rounded-xl overflow-hidden border">
    <div class="p-6 border-b bg-gray-50">
        <h3 class="text-lg font-bold text-gray-800">게시판 설정 입력</h3>
    </div>
    
    <form action="<?= base_url('admin/boardStore') ?>" method="post" class="p-8 space-y-6">
        <?= csrf_field() ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-50 text-red-600 p-4 rounded-lg text-sm">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p>• <?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">게시판 코드 (URL용)</label>
            <input type="text" name="code" value="<?= old('code') ?>" placeholder="예: qna, news" required
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all font-mono">
            <p class="text-xs text-gray-400 mt-1">* 영문, 숫자, 하이픈(-)만 사용 가능합니다.</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">게시판 이름</label>
            <input type="text" name="title" value="<?= old('title') ?>" placeholder="예: 질문과 답변" required
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">게시판 설명</label>
            <textarea name="description" rows="3" 
                      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all"><?= old('description') ?></textarea>
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked
                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_active" class="text-sm font-medium text-gray-700">활성화 상태 (체크 시 사용 가능)</label>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t">
            <a href="<?= base_url('admin/posts') ?>" class="px-6 py-2 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition">취소</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md transition">게시판 생성</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>