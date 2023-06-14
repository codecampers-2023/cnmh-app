@php
    $role = session()->get('user_role');
@endphp
@foreach (app_menu() as $group => $items)
    @if ($role == 'admin' || ($role == 'service_social' && $group == 'Service social'))
        @if (strlen($group) < 1)
            @foreach ($items as $item)
                <li class="nav-item">
                    <a href="{{ Route::has($item->url) ? route($item->url) : $item->url }}"
                        class="nav-link {{ Route::is($item->url . '*') ? 'active' : '' }}">
                        {!! $item->icon !!}
                        <p> {{ $item->nom }} </p>
                    </a>
                </li>
            @endforeach
        @else
            @php
                $isActive = $items->filter(fn($item, $key) => Route::is($item->url . '*'))->isNotEmpty();
            @endphp
            <li class="nav-item {{ $isActive ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $isActive ? 'active' : '' }}">
                    {!! $items->first()->menu_group?->icon !!}
                    <p class="pl-2">
                        {{ $group }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="">
                    @foreach ($items as $item)
                        <li class="nav-item">
                            <a href="{{ Route::has($item->url) ? route($item->url) : $item->url }}"
                                class="nav-link {{ Route::is($item->url . '*') ? 'active' : '' }}">
                                <p> {{ $item->nom }} </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endif
@endforeach
