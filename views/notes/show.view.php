<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="inline-block mb-4 text-blue-500 underline">Go back...</a>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
    </div>
</main>
<?php require(base_path('views/partials/foot.php')); ?>