<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                    <a class="navbar-brand" style="cursor: default" href="#"><img src="{{URL::to('vendor/be/assets/images/1.svg')}}" alt="">
                    <span>E - LEARNING</span></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}" data-scroll-nav="0">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}" data-scroll-nav="1">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('register') }}" data-scroll-nav="2">DAFTAR</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}" data-scroll-nav="0">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('logout') }}" data-scroll-nav="3">LOGOUT</a>
                            </li>
                            @endguest   
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>