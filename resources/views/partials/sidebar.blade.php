<div class="d-flex align-items-center">
    <img class="img mx-2" src="{{ asset('logo.svg') }}" alt="" srcset="">
    <a href="/dashboard" class="sidebar-logo fw-bold text-decoration-none text-black">Warehouseku</a>
</div>
<hr>
<ul class="sidebar-menu p-2 mt-1">
    <li class="sidebar-menu-item active has-dropdown">
        <a href="{{route('dashboard',['userId'=>$user->id])}}">
            <i class="ri-home-2-fill sidebar-menu-item-icon"></i>
            Dashboard
            <i class="ri-arrow-down-s-line sidebar-menu-item-icon2"></i>
        </a>
    </li>
    <li class="sidebar-menu-divider has-dropdown mt-3 ml-2">
        <a href="#">
            <i class="bi bi-bag-plus-fill  sidebar-menu-item-icon3"></i><i class=""></i>
            Pembelian Stok
            <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
        </a>
        <ul class="sidebar-dropdown-menu ">
            <li class="sidebar-dropdown-menu-item has-dropdown">
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('pemesanan',['userId'=>$user->id])}}">
                    Pemesanan Stok
                </a>
            </li>
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('pembelian',['userId'=>$user->id])}}">
                    Faktur Pembelian
                </a>
            </li>
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('pembayaran',['userId'=>$user->id])}}">
                    Faktur Pembayaran
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-menu-divider has-dropdown mt-4 ml-2">
        <a href="#">
            <i class="bi bi-bag-fill  sidebar-menu-item-icon3"></i><i class=""></i>
            Stok
            <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
        </a>
        <ul class="sidebar-dropdown-menu ">
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('daftarstok',['userId'=>$user->id])}}">
                    Daftar Stok

                </a>
            </li>
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('stokterbuang',['userId'=>$user->id])}}">
                    Stok Terbuang

                </a>
            </li>
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('supplier',['userId'=>$user->id])}}">
                    Supplier

                </a>
            </li>


        </ul>
    </li>

    <li class="sidebar-menu-divider has-dropdown mt-4 ml-2">
        <a href="#">
            <i class="ri-user-3-line  sidebar-menu-item-icon3"></i>
            Akun
            <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
        </a>
        <ul class="sidebar-dropdown-menu ">
            <li class="sidebar-dropdown-menu-item">
                <a href="{{route('profile',['userId'=>$user->id])}}">
                    Profil
                </a>
            </li>
        </ul>
    </li>

</ul>