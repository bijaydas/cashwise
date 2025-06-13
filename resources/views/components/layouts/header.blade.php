<header class="header">
    <div class="flex justify-end items-center py-1 px-2 relative" x-data="{ profileDropdown: false }">
        <button
            type="button"
            class="profile-dropdown-trigger"
            @click="profileDropdown = !profileDropdown""
        >
            <x-heroicon-o-user-circle class="w-7" />
            <span>Bijay Das</span>
            <x-heroicon-s-chevron-down class="w-4" />
        </button>

        <div
            @click.outside="profileDropdown = false"
            @keyup.escape.window="profileDropdown = false"
            x-show="profileDropdown"
            class="profile-dropdown"
        >
            <ul>
                <li>
                    <a href="#" class="item">
                        <x-heroicon-o-user class="w-5" />
                        <span>My profile</span>
                    </a>
                </li>
                <li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="item">
                            <x-heroicon-o-arrow-left-start-on-rectangle class="w-5" />
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
