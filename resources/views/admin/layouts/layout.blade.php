<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --light-bg: #f8f9fa;
            --dark-bg: #212529;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --header-height: 70px;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        body {
            background-color: #f5f7fb;
            color: #333;
            overflow-x: hidden;
        }
        
        /* Layout Container */
        .layout-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--dark-bg) 0%, #1a1a2e 100%);
            color: #fff;
            transition: var(--transition);
            position: fixed;
            height: 100vh;
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar.hidden {
            transform: translateX(-100%);
            width: 0;
        }
        
        .sidebar-header {
            padding: 20px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            height: var(--header-height);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .logo-icon {
            font-size: 28px;
            color: var(--primary-color);
        }
        
        .logo-text {
            font-size: 22px;
            font-weight: 700;
            color: white;
        }
        
        .sidebar-controls {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .toggle-btn, .close-btn {
            background: none;
            border: none;
            color: #aaa;
            font-size: 20px;
            cursor: pointer;
            transition: var(--transition);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
        
        .toggle-btn:hover, .close-btn:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-menu {
            padding: 20px 0;
            height: calc(100vh - var(--header-height));
            overflow-y: auto;
        }
        
        .menu-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #aaa;
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
        }
        
        .menu-item:hover, .menu-item.active {
            background-color: rgba(255, 255, 255, 0.05);
            color: white;
            border-left-color: var(--primary-color);
        }
        
        .menu-icon {
            font-size: 20px;
            min-width: 24px;
            text-align: center;
        }
        
        .menu-text {
            font-size: 16px;
            font-weight: 500;
            white-space: nowrap;
        }
        
        /* Main Content Wrapper */
        .main-wrapper {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .main-wrapper.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        .main-wrapper.full-width {
            margin-left: 0;
        }
        
        /* Top Header */
        .top-header {
            background-color: white;
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: var(--card-shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark-bg);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        /* Main Content Area */
        .main-content {
            flex: 1;
            padding: 30px;
        }
        
        /* Hide menu text when sidebar collapsed */
        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .logo-text {
            display: none;
        }
        
        .sidebar.collapsed .logo {
            justify-content: center;
        }
        
        .sidebar.collapsed .sidebar-header {
            justify-content: center;
        }
        
        .sidebar.collapsed .toggle-btn,
        .sidebar.collapsed .close-btn {
            display: none;
        }
        
        .sidebar.hidden .sidebar-header,
        .sidebar.hidden .sidebar-menu {
            opacity: 0;
            pointer-events: none;
        }
        
        /* Show sidebar button when hidden */
        .show-sidebar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 999;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }
        
        .show-sidebar-btn:hover {
            background-color: var(--secondary-color);
            transform: scale(1.05);
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-wrapper {
                margin-left: 0;
            }
            
            .main-wrapper.expanded,
            .main-wrapper.full-width {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .show-sidebar-btn {
                display: flex;
            }
        }
        
        @media (max-width: 768px) {
            .top-header {
                padding: 0 15px;
            }
            
            .main-content {
                padding: 20px 15px;
            }
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--dark-bg);
            cursor: pointer;
        }
        
        /* Flex fill utility */
        .flex-fill {
            flex: 1;
        }
        
        /* Footer */
        footer {
            background-color: white;
            padding: 12px 30px;
            border-top: 1px solid #e9ecef;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Show Sidebar Button (visible when sidebar is hidden) -->
    <button class="show-sidebar-btn" id="showSidebarBtn">
        <i class="fas fa-bars"></i>
    </button>
    
    <div class="layout-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-chart-line logo-icon"></i>
                    <span class="logo-text">AdminPanel</span>
                </div>
                <div class="sidebar-controls">
                    <button class="toggle-btn" id="toggleBtn">
                        <i class="fas fa-angle-left"></i>
                    </button>
                    <button class="close-btn" id="closeBtn" title="Close Sidebar">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <div class="sidebar-menu">
                <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt menu-icon"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
                <a href="{{ route('orders.index') }}" class="menu-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart menu-icon"></i>
                    <span class="menu-text">Orders</span>
                </a>
                <a href="{{ route('product.index') }}" class="menu-item">
                    <i class="fas fa-box menu-icon"></i>
                    <span class="menu-text">Products</span>
                </a>
                <a href="{{ route('customers.index') }}" class="menu-item {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-text">Customers</span>
                </a>
                <a href="{{ route('analytics') }}" class="menu-item {{ request()->routeIs('analytics') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar menu-icon"></i>
                    <span class="menu-text">Analytics</span>
                </a>
                <a href="{{ route('settings') }}" class="menu-item {{ request()->routeIs('settings') ? 'active' : '' }}">
                    <i class="fas fa-cog menu-icon"></i>
                    <span class="menu-text">Settings</span>
                </a>
            </div>
        </aside>
        
        <!-- Main Wrapper -->
        <div class="main-wrapper" id="mainWrapper">
            <!-- Top Header -->
            <header class="top-header">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
                <div class="user-info">
                    <div class="user-avatar">{{ substr(Auth::user()->name ?? 'Admin', 0, 2) }}</div>
                    <span>{{ Auth::user()->name ?? 'Admin User' }}</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </header>
            
            <!-- Main Content Area - This is where child views will be injected -->
            <main class="main-content flex-fill">
                @yield('content')
            </main>
            
            <!-- Optional Footer -->
            <footer>
                <div class="text-center text-muted">
                    &copy; {{ date('Y') }} Admin Panel. All rights reserved.
                </div>
            </footer>
        </div>
    </div>
    
    <script>
        // DOM Elements
        const toggleBtn = document.getElementById('toggleBtn');
        const closeBtn = document.getElementById('closeBtn');
        const showSidebarBtn = document.getElementById('showSidebarBtn');
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const mainWrapper = document.getElementById('mainWrapper');
        
        // Toggle sidebar between collapsed and expanded
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainWrapper.classList.toggle('expanded');
            
            // Rotate toggle button icon
            const icon = toggleBtn.querySelector('i');
            if (sidebar.classList.contains('collapsed')) {
                icon.className = 'fas fa-angle-right';
            } else {
                icon.className = 'fas fa-angle-left';
            }
            
            // Save sidebar state to localStorage
            localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });
        
        // Close sidebar completely
        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            mainWrapper.classList.add('full-width');
            showSidebarBtn.style.display = 'flex';
            
            // Save sidebar hidden state to localStorage
            localStorage.setItem('sidebarHidden', 'true');
            localStorage.removeItem('sidebarCollapsed'); // Reset collapsed state
        });
        
        // Show sidebar when hidden
        showSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('hidden');
            mainWrapper.classList.remove('full-width');
            showSidebarBtn.style.display = 'none';
            
            // Save sidebar hidden state to localStorage
            localStorage.setItem('sidebarHidden', 'false');
        });
        
        // Mobile menu toggle
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (event) => {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnMenuToggle = menuToggle.contains(event.target);
            const isClickOnShowSidebarBtn = showSidebarBtn.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnMenuToggle && !isClickOnShowSidebarBtn && window.innerWidth <= 992) {
                sidebar.classList.remove('active');
            }
        });
        
        // Restore sidebar state from localStorage
        document.addEventListener('DOMContentLoaded', () => {
            const isSidebarHidden = localStorage.getItem('sidebarHidden') === 'true';
            const isSidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            
            if (isSidebarHidden) {
                sidebar.classList.add('hidden');
                mainWrapper.classList.add('full-width');
                showSidebarBtn.style.display = 'flex';
            } else if (isSidebarCollapsed) {
                sidebar.classList.add('collapsed');
                mainWrapper.classList.add('expanded');
                const icon = toggleBtn.querySelector('i');
                icon.className = 'fas fa-angle-right';
            }
            
            // Auto-hide sidebar on mobile
            if (window.innerWidth <= 992) {
                sidebar.classList.remove('active');
                showSidebarBtn.style.display = 'flex';
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
                // Show sidebar button only if sidebar is hidden
                if (sidebar.classList.contains('hidden')) {
                    showSidebarBtn.style.display = 'flex';
                } else {
                    showSidebarBtn.style.display = 'none';
                }
            } else {
                // On mobile, show the show-sidebar button
                showSidebarBtn.style.display = 'flex';
            }
        });
    </script>
    
    <!-- Additional scripts section for child views -->
    @stack('scripts')
</body>
</html>