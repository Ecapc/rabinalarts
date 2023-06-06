<header class="bg-blueGray-800 sticky top-0" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">
        <a :class="{ '!bg-opacity-100 !text-cyan-300': open }" x-on:click="show()"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-black bg-opacity-25 text-white cursor-pointer h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path lass="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">
                Categorias
            </span>
        </a>
        <a href="/" class="mx-6">
            <x-application-mark class="block h-9 w-auto" />
        </a>

        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        <div>
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6 hidden md:block">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="60">

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        <!-- Team Switcher -->
                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" />
                                            @endforeach
                                        @endif
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-dropdown algn="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer items-center justify-center px-4">
                        </i>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>
    <nav id="navigation-menu" x-cloak x-show="open" class="bg-blueGray-400 bg-opacity-25 w-full absolute">
        {{-- Menu Navegador PC --}}
        <div class="container h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative ">
                <ul class="bg-gray-300 ">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-blueGray-700 hover:bg-blueGray-600 hover:text-white">
                            <!-- texto de subcategorias -->
                            <a href=" " class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>

                            <div class="navigation-submenu bg-blueGray-500 absolute w-3/4 top-0 h-full right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-blueGray-500">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>

        {{-- Menu Mobil --}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-blueGray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-blueGray-700 hover:bg-blueGray-600 hover:text-white">
                        <!-- texto de subcategorias -->
                        <a href=" " class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class="text-trueGray-500 px-6 my-2">USUARIO</p>
            @livewire('cart-mobil')

            @auth
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-blueGray-700 hover:bg-blueGray-600 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-id-card"></i>
                    </span>
                    Perfil
                </a>

                <a href=" "
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit()"
                    class="py-2 px-4 text-sm flex items-center text-blueGray-700 hover:bg-blueGray-600 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"
                class="py-2 px-4 text-sm flex items-center text-blueGray-700 hover:bg-blueGray-600 hover:text-white" >
                <span class="flex justify-center w-9">
                    <i class="fas fa-user-circle"></i>
                </span>
                    Iniciar Sesión
                </a>

                <a href="{{ route('register') }}"
                class="py-2 px-4 text-sm flex items-center text-blueGray-700 hover:bg-blueGray-600 hover:text-white" >
                <span class="flex justify-center w-9">
                    <i class="fas fa-fingerprint"></i>
                </span>
                    Registrate
                </a>

            @endauth
        </div>
    </nav>
</header>
