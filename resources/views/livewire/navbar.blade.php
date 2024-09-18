    {{-- The Master doesn't talk, he acts. --}}
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="/images/meme.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Resume Builder
            </a>
            
            <form class="d-flex" action="{{ route('logout') }}" method="POST">
            @csrf    
            <button class="btn btn-light" type="submit">Logout</button>
            </form>
        </div>
    </nav>

