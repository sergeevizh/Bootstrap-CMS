<div class="navbar {{ (Config::get('theme.inverse') == true) ? 'navbar-inverse' : 'navbar-default'}} navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::route('pages.show', array('pages' => 'home')) }}">{{ $site_name }}</a>
    </div>
    <div class="collapse navbar-collapse">
        <div id="main-nav">
            <ul class="nav navbar-nav">
                @foreach($nav_main as $item)
                    <li{{ ($item['active'] ? ' class="active"' : '') }}>
                        <a href="{{ $item['url'] }}">
                            {{ ((!$item['icon'] == '') ? '<i class="fa fa-'.$item['icon'].' fa-inverse fa-fw"></i> ' : '') }}{{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div id="bar-nav">
            <ul class="nav navbar-nav navbar-right">
                @if (!empty($nav_bar))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Sentry::getUser()->email }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($nav_bar as $item)
                                <li>
                                    <a href="{{ $item['url'] }}">
                                        {{ ((!$item['icon'] == '') ? '<i class="fa fa-'.$item['icon'].' fa-fw"></i> ' : '') }}{{ $item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope fa-fw"></i> Contact Support
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ URL::route('account.logout') }}">
                                    <i class="fa fa-power-off fa-fw"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li {{ (Request::is('account/login') ? 'class="active"' : '') }}>
                        <a href="{{ URL::route('account.login') }}">
                            Login
                        </a>
                    </li>
                    @if (Config::get('cms.regallowed'))
                        <li {{ (Request::is('account/register') ? 'class="active"' : '') }}>
                            <a href="{{ URL::route('account.register') }}">
                                Register
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
