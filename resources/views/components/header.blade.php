<header class="bg-[var(--color-surface)] text-[var(--color-dark)] border-b border-[var(--color-border)] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">FitForge</h1>
        <nav class="space-x-4 text-sm font-medium">
            <a href="{{ route('dashboard') }}" class="hover:text-[var(--color-primary)]">Dashboard</a>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="hover:text-[var(--color-danger)]">Logout</a>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</header>
