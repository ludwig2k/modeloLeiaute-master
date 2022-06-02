<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">

                {{-- MOSTRA NOME USUARIO LOGADO  --}}

                {{-- <li class="nav-item">
                    <hr style="margin-top: 0px; margin-bottom: 0px; margin: 0px">
                    <a style="margin-top: 0px !important;">
                        <i class="fas fa-user"></i>
                        <p>@if (strlen(Auth::user()->name) > 19)
                            {{ substr(Auth::user()->name, 0, 16).'...'}}
                @else
                {{ Auth::user()->name }}
                @endif
                </p>
                </a>
                <hr style="margin-top: 0px; margin-bottom: 5px;">
                </li> --}}

                <li class="nav-item {{ (request()->Is('/')) ? 'active' : '' }}" class="sr-only">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <p>Menu Incial</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('lista')) || (request()->is('cadastro'))  ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne" href="#base">
                        <i class="fas fa-users"></i>
                        <p>Pessoas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse {{ (request()->routeIs('cadastro')) || (request()->routeIs('lista')) || (request()->routeIs('pdf')) ? 'show' : '' }}"
                        aria-controls="collapseOne" id="base">
                        <ul class="nav nav-collapse ">
                            <li class="{{ (request()->routeIs('cadastro')) ? 'active' : '' }}">
                                <a href="{{ route('cadastro') }}">
                                    <span class="sub-item">Cadastro de Pessoas</span>
                                </a>
                            </li>
                            <li class="{{ (request()->routeIs('lista')) ? 'active' : '' }}">
                                <a href="{{ route('lista') }}">
                                    <span class="sub-item">Lista</span>
                                </a>
                            </li>
                            <li class="{{ (request()->routeIs('pdf')) ? 'active' : '' }}">
                                <a href="{{ route('gerar_pdf') }}">
                                    <span class="sub-item">PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-sun" style="font-size:20px" actived></i>
                        <p>Protocolos</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="{{ (request()->routeIs('cadastro_prot')) ? 'active' : '' }}">
                                <a href="{{ route('cadastro_prot') }}">
                                    <span class="sub-item">Criação de Protocolos</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('lista_protocolos') }}">
                                    <span class="sub-item">Lista</span>
                                </a>
                            </li>
                            <li class="{{ (request()->routeIs('pdf_protocolos')) ? 'active' : '' }}">
                                <a href="{{ route('gerar_pdf_protocolos') }}">
                                    <span class="sub-item">PDF</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('acomp_cadastro') }}">
                                    <span class="sub-item">Acompanhamento</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts2">
                        <i class="fas fa-bed" actived></i>
                        <p>Opção 3</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse" id="sidebarLayouts2">
                        <ul class="nav nav-collapse">
                            <li class="">
                                <a href="#">
                                    <span class="sub-item">Página 1</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <span class="sub-item">Página 2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Sair</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- End Sidebar -->