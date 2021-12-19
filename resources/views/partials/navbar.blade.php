<nav>
    <a href="/">PLAYSHOP</a>
    <ul>
        @auth
            <li><a>Genres</a>
                <ul>
                    @foreach ($genres as $genre)
                        <li><a href="/view_game/{{ $genre->genre_id }}">{{ $genre->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            {{-- Admin --}}
            @if (auth()->user()->role_id == 1)
                <li><a class="role-name">ADMIN</a>
                    <ul>
                        <li><a href="/add_game">Add Game</a></li>
                        <li><a href="/manage_genre">Manage Genres</a></li>
                        <li><a href="/change_password">Change Password</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit"><a>Logout</a></button>
                            </form>
                        </li>
                        
                    </ul>
                </li>
            {{-- Customer --}}
            @else
                <li><a class="role-name">USER</a>
                    <ul>
                        <li><a href="/my_cart">My Cart</a></li>
                        <li><a href="/transaction_history">Transaction History</a></li>
                        <li><a href="/change_password">Change Password</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit"><a>Logout</a></button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        @else
            {{-- Guest --}}
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        @endauth
        <li><p>{{ date('D, d-M-Y') }}</p></li>
    </ul>
</nav>
