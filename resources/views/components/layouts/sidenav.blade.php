<aside class="w-60 border-r border-gray-200 py-2 sidenav">
    <h1>
        <a href="#">
            <img src="{{ asset('images/tmp/logo.png') }}" alt="logo" class="w-12 mx-auto">
        </a>
    </h1>

    <section class="section">
        <span class="label">Transactions</span>

        <ul>
            <li>
                <a href="#">
                    <x-heroicon-o-home class="w-5 h-5 mr-2" />
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('transaction.create') }}">
                    <x-heroicon-o-plus class="w-5 h-5 mr-2" />
                    <span>Create</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <x-heroicon-o-trash class="w-5 h-5 mr-2" />
                    <span>Trashed</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
