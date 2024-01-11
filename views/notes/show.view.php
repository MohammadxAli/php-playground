<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="inline-block mb-6 text-blue-500 underline">Go back...</a>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <form method="POST" class="mt-6">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="text-red-500 text-sm">Delete</button>
        </form>
    </div>
</main>
<?php require(base_path('views/partials/foot.php')); ?>