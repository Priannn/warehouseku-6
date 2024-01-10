<div class="d-flex">
    <div class="dropdown">
        <a class="has-dropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell-fill text-dark" style="font-size:24px;"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a href="" class=" dropdown-item disabled">Notifikasi <i class="bi bi-bell-fill"></i></a></li>
            @foreach(auth()->user()->pemesananstok as $p)
                    @if($p->pembayaran($p->id))
                    @else
                        <li><a  class="dropdown-item" href="{{route('pemesanan',['userId'=>$user->id])}}"><i class="bi bi-bag-fill"></i> Pesanan <i class="text-success">{{ $p->id }}</i >, segera lakukan pembelian!!</a></li>
                    @endif
            @endforeach
        </ul>
    </div>
    <div class="dropdown">
        <a class="has-dropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <li class="bi bi-person-circle mx-3 text-dark" style="font-size:24px;"></li>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{route('profile',['userId'=>$user->id])}}" class="dropdown-item">Profil</a></li>
            <li>
            <form action="/logout" method="POST" id="myForm">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>    
        </li>
        </ul>
    </div>
</div>