@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
        "icon" => "fas fa-chart-bar"
    ],
    [
        "href" => "pelanggan",
        "text" => "Pelanggan",  
        "is_multi" => false,
        "icon" => "fas fa-users"
    ],
    [
        "href" => "pemesanan",
        "text" => "Pemesanan",  
        "is_multi" => false,
        "icon" => "fas fa-shopping-cart"
    ],
    [
        "href" => [
            [
                "section_text" => "Data Master",
                "icon" => "fas fa-database",
                "section_list" => [
                    ["href" => "jenis", "text" => "Jenis Mobil"],
                    ["href" => "merek", "text" => "Merek Mobil"],
                    ["href" => "layanan", "text" => "Layanan"],
                    ["href" => "paket", "text" => "Paket"]
                ]
            ]
        ],
        "text" => "Data Master",
     
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Laporan",
                "icon" => "fas fa-book",
                "section_list" => [
                    ["href" => "laporanharian", "text" => "Laporan Harian"],
                    ["href" => "laporanbulanan", "text" => "Laporan Bulanan"],
                ]
            ]
        ],
        "text" => "Laporan",
      
        "is_multi" => true,
    ],
    [
        "href" => "user",
        "text" => "User",
        "is_multi" => false,
        "icon" => "fas fa-user"
    ],
    
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"><img class="ml-5 mt-3"src="<?php echo asset('assets/img/logo.svg')?> " alt="Logo"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="assets/img/logo.svg" alt="Cuci Mobil">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{$link->icon}}" ></i><span>{{ $link->text }}</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{$section->icon}}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
