


<nav class="navbar navbar-expand-lg main_menu" id="main_menu_area">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset($generalSetting ->logo)}}" alt="Matheos">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{Route::currentRouteName() == 'home' ? '#home-page' : url('/')  }}">Home</a>
                </li>
                @if (Route::currentRouteName() =='home')
                    <li class="nav-item">
                    <a class="nav-link" href="#about-page">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio-page">Portfolio </i></a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="#skills-page">Skills</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-page">Contact</a>
                </li> 
                @endif
               
            </ul>
        </div>
    </div>
</nav>
