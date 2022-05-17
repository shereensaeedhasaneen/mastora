<div class="c-sidebar-brand">
    {{-- <img class="c-sidebar-brand-full m-1" src="{{asset('assets/brand/_mini-logo.png')}}"
         alt="{{config('app.name')}} Logo"> --}}
        
</div>
<ul class="c-sidebar-nav">
    @foreach(\App\Helpers\SidebarMenuBuilder::getMenu() as $menuItem)
        <li class="{{ $menuItem['class'] }} c-sidebar-nav-dropdown">
            <a href="#" class="c-sidebar-nav-dropdown-toggle">
                <i class="{{$menuItem['icon']}} c-sidebar-nav-icon" aria-hidden="true"></i>
                <span class="nav-label">{{__($menuItem['name'])}}</span>
                <i class="fa arrow"></i>
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                @foreach($menuItem['sub_menu'] as $child)
                    <li class="c-sidebar-nav-item small">
                        <a href=" {{ route($child['route']) }} " class="c-sidebar-nav-link c-sidebar-nav-child">
                            <i class="{{$child['icon']}} c-sidebar-nav-icon small-icon-font" aria-hidden="true"></i>
                            <span style=" margin: -10px">{{__($child['title'])}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
