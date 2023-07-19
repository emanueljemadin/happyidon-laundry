 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="../../index3.html" class="brand-link">

         <span class="brand-text font-weight-light">HappyIdon Laundry</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('transaction.index') }}"
                         class="nav-link {{ Route::is('transaction.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tags"></i>
                         <p>Transaksi</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('customer.index') }}"
                         class="nav-link {{ Route::is('customer.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-user-friends"></i>
                         <p>Pelanggan</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('package.index') }}"
                         class="nav-link {{ Route::is('package.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-table"></i>
                         <p>Paket Laundry</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('profile.edit') }}"
                         class="nav-link {{ Route::is('profile.edit') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-user-alt"></i>
                         <p>Profil</p>
                     </a>
                 </li>
                 <li class="nav-item">

                     <form method="POST" action="{{ route('logout') }}">
                         @csrf

                         <a href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                                this.closest('form').submit();"
                             class="nav-link">
                             <i class="nav-icon fas fa-sign-out-alt"></i>
                             <p>Log Out</p>
                         </a>
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
