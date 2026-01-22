<div class="flex flex-col items-center justify-center py-12">
    <div class="w-full max-w-md bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
        <div class="bg-slate-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">로그인</h2>
        </div>

        <form action="<?= base_url('loginProcess') ?>" method="post" class="p-8 space-y-5">
            <?= csrf_field() ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">아이디</label>
                <input type="text" name="username" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">비밀번호</label>
                <div class="relative">
                    <input type="password" name="password" id="login_password" required
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all pr-10">
                    <button type="button" onclick="togglePassword('login_password', 'login-eye-icon')" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-500 transition-colors">
                        <svg id="login-eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-lg transition-all transform active:scale-95">
                로그인
            </button>

            <div class="text-center text-sm text-gray-500 mt-4">
                계정이 없으신가요? <a href="<?= base_url('signup') ?>" class="text-blue-600 hover:underline">회원가입</a>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.add('text-blue-600');
    } else {
        input.type = 'password';
        icon.classList.remove('text-blue-600');
    }
}
</script>