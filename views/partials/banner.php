<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            <?= $title ?>
        </h1>
        <p class="mt-2 opacity-70">Hello
            <?= $_SESSION['name'] ?? 'Guest' ?>
        </p>
    </div>
</header>