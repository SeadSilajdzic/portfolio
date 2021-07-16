<!-- Navigation -->
<div class="header">
    <div class="container header-content">
        <div id="logo">
            <span>Sead Silajdzic</span>
        </div>

        <div class="navigation">
            <ul>
                <li><a href="#" class="underline-right">Home</a></li>
                <li><a href="#" class="underline-right">About</a></li>
                <li><a href="#" class="underline-right">Portfolio</a></li>
                <li><a href="#" class="underline-right">Services</a></li>
                <li><a href="#" class="underline-right">Contact</a></li>
                <li><a href="#" class="underline-right">Blog</a></li>

                @guest
                <li><a href="{{ route('login') }}" class="underline-right">Login</a></li>
                <li><a href="{{ route('register') }}" class="underline-right">Register</a></li>
                @else
                    <li><a href="{{ route('logout') }}" class="underline-right">Logout</a></li>
                @endguest

            </ul>
        </div>
    </div>
</div>
