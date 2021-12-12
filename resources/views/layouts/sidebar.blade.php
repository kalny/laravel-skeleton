<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('home') }}">
            <span class="align-middle">Foxwood</span>
        </a>
        <ul class="sidebar-nav">
            @foreach($sidebar as $sidebarItem)
            <li class="sidebar-header">
                {{ $sidebarItem['part'] }}
            </li>
            @foreach($sidebarItem['items'] as $item)
            <li class="sidebar-item{{ $item['active'] ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ $item['link'] }}">
                    <i class="align-middle" data-feather="{{ $item['feather'] }}"></i>
                    <span class="align-middle">{{ $item['title'] }}</span>
                </a>
            </li>
            @endforeach
            @endforeach
        </ul>
    </div>
</nav>
