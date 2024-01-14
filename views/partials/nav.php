<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-baseline space-x-4">
                    <a href="/"
                        class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium"
                        aria-current="page">Home</a>
                    <a href="/about"
                        class="<?= urlIs('/about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">About</a>
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/notes"
                            class="<?= urlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Notes</a>
                    <?php endif; ?>
                    <a href="/contact"
                        class="<?= urlIs('/contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="relative ml-3">
                        <div>
                            <?php if (isset($_SESSION['user'])): ?>
                                <button type="button"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </button>
                            <?php else: ?>
                                <a href="/login" class="text-white transition-colors hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-2">
                                    Login
                                </a>
                                <a href="/register" class="text-white transition-colors hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-2">
                                    Register
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['user'])): ?>
                        <form method="POST" action="/logout" class="ml-3">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="text-white transition-colors hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-2">
                                Logout
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>