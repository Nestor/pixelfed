<nav class="navbar navbar-expand navbar-light navbar-laravel sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('timeline.personal') }}" title="Logo">
            <img src="/img/pixelfed-icon-color.svg" height="30px" class="px-2">
            <span class="font-weight-bold mb-0 d-none d-sm-block" style="font-size:20px;">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav ml-auto d-none d-md-block">
              <form class="form-inline search-form">
                <input class="form-control mr-sm-2 search-form-input" type="search" placeholder="Search" aria-label="Search">
              </form>
            </ul>
            @endauth

            <ul class="navbar-nav ml-auto">
                @guest
                    <li><a class="nav-link font-weight-bold text-primary" href="{{ route('login') }}" title="Login">{{ __('Login') }}</a></li>
                    <li><a class="nav-link font-weight-bold" href="{{ route('register') }}" title="Register">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{route('discover')}}" title="Discover" data-toggle="tooltip" data-placement="bottom"><i class="far fa-compass fa-lg"></i></a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link nav-notification" href="{{route('notifications')}}" title="Notifications" data-toggle="tooltip" data-placement="bottom">
                            <i class="far fa-heart fa-lg text"></i>
                        </a>
                    </li>
                    <li class="nav-item px-2">
                        <div title="Create new post" data-toggle="tooltip" data-placement="bottom">
                            <a href="{{route('compose')}}" class="nav-link" data-toggle="modal" data-target="#composeModal">
                              <i class="fas fa-camera-retro fa-lg text-primary"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown px-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="User Menu" data-toggle="tooltip" data-placement="bottom">
                            <i class="far fa-user fa-lg"></i> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item font-weight-ultralight text-truncate" href="{{Auth::user()->url()}}">
                                <img class="img-thumbnail rounded-circle pr-1" src="{{Auth::user()->profile->avatarUrl()}}" width="32px">
                                &commat;{{Auth::user()->username}}
                                <p class="small mb-0 text-muted">{{__('navmenu.viewMyProfile')}}</p>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold" href="{{route('timeline.personal')}}">
                                <span class="fas fa-list-alt pr-1"></span>
                                {{__('navmenu.myTimeline')}}
                            </a>
                            <a class="dropdown-item font-weight-bold" href="{{route('timeline.public')}}">
                                <span class="far fa-list-alt pr-1"></span>
                                {{__('navmenu.publicTimeline')}}
                            </a>
                            {{-- <a class="dropdown-item font-weight-bold" href="{{route('messages')}}">
                                <span class="far fa-envelope pr-1"></span>
                                {{__('navmenu.directMessages')}}
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item font-weight-bold" href="{{route('remotefollow')}}">
                                <span class="fas fa-user-plus pr-1"></span>
                                {{__('navmenu.remoteFollow')}}
                            </a>
                            <a class="dropdown-item font-weight-bold" href="{{route('settings')}}">
                                <span class="fas fa-cog pr-1"></span>
                                {{__('navmenu.settings')}}
                            </a>
                            @if(Auth::user()->is_admin == true)
                            <a class="dropdown-item font-weight-bold" href="{{ route('admin.home') }}">
                                <span class="fas fa-cogs pr-1"></span>
                                {{__('navmenu.admin')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            @endif
                            <a class="dropdown-item font-weight-bold" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt pr-1"></span>
                                {{ __('navmenu.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@auth
<nav class="breadcrumb d-md-none d-flex">
  <form class="form-inline search-form mx-auto">
   <input class="form-control mr-sm-2 search-form-input" type="search" placeholder="Search" aria-label="Search">
  </form>
</nav>
@endauth