<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="inline-block mb-6 text-blue-500 underline">Go back...</a>
        <p class="mb-6">
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
    </div>
</main>
<?php require(base_path('views/partials/foot.php')); ?>