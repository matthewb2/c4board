<div class="flex flex-col items-center justify-center py-12">
    <div class="w-full max-w-md bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
        <div class="bg-slate-800 p-6 text-center">
            <h2 class="text-2xl font-bold text-white">회원가입</h2>
            <p class="text-slate-400 text-sm mt-1">C4BBS에 오신 것을 환영합니다</p>
        </div>

        <form action="<?= base_url('register') ?>" method="post" class="p-8 space-y-5">
            <?= csrf_field() ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <p>• <?= esc($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">아이디</label>
                <input type="text" name="username" value="<?= old('username') ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
    <label class="block text-sm font-semibold text-gray-700 mb-1">비밀번호</label>
    <div class="relative">
        <input type="password" name="password" id="password" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all pr-10">
        <button type="button" onclick="togglePassword('password', 'eye-icon-1')" 
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-500 transition-colors">
            <svg id="eye-icon-1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
</div>

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-1">비밀번호 확인</label>
    <div class="relative">
        <input type="password" name="password_confirm" id="password_confirm" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all pr-10">
        <button type="button" onclick="togglePassword('password_confirm', 'eye-icon-2')" 
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-500 transition-colors">
            <svg id="eye-icon-2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
</div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">닉네임</label>
                <input type="text" name="nickname" value="<?= old('nickname') ?>" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">이메일 (선택)</label>
                <input type="email" name="email" value="<?= old('email') ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-lg transition-all transform active:scale-95">
                가입하기
            </button>

            <div class="text-center text-sm text-gray-500 mt-4">
                이미 계정이 있으신가요? <a href="<?= base_url('login') ?>" class="text-blue-600 hover:underline">로그인</a>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);
    
    if (passwordInput.type === 'password') {
        // 비밀번호 표시
        passwordInput.type = 'text';
        // 아이콘 색상 변경 또는 아이콘 모양 변경 (눈에 사선 긋기 등)
        eyeIcon.classList.add('text-blue-600');
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.225 0 2.391.226 3.475.64M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
        `; // 눈에 사선이 그어진 SVG로 변경
    } else {
        // 비밀번호 숨김
        passwordInput.type = 'password';
        eyeIcon.classList.remove('text-blue-600');
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `; // 기본 눈 모양 SVG로 복구
    }
}
</script>