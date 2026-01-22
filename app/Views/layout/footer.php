</main>

<footer class="bg-white border-t border-gray-200 mt-20">
    <div class="max-w-5xl mx-auto px-4 py-12 text-center">
        <p class="text-gray-500 text-sm font-medium">&copy; 2026 C4BBS Project. All rights reserved.</p>
        <div class="mt-2 text-gray-400 text-xs flex justify-center space-x-4">
            <span>Server Time (UTC): <?= date('Y-m-d H:i:s') ?></span>
            <span>Local Time (KST): <?= date('Y-m-d H:i:s', time() + (9 * 3600)) ?></span>
        </div>
    </div>
</footer>

</body>

</html>