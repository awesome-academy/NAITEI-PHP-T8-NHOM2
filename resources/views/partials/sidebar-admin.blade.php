<div class="w-64 bg-gray-800 text-white p-4">
    <h2 class="text-xl font-bold mb-4">Admin Menu</h2>
    <nav>
        <ul>
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.users.index') }}" class="block hover:bg-gray-700 p-2 rounded {{ request()->routeIs('admin.users.*') ? 'bg-gray-900' : '' }}">Manage Users</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block hover:bg-gray-700 p-2 rounded">Manage Products</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block hover:bg-gray-700 p-2 rounded">Manage Categories</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block hover:bg-gray-700 p-2 rounded">Manage Orders</a>
            </li>
        </ul>
    </nav>
</div>