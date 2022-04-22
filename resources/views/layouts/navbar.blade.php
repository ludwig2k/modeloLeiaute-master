<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-s0" data-background-color="blue">

    <div class="container-fluid">
        <a href="/">
            <img src="{{url('assets/img/logo_prefeitura.png')}}" alt="Logo Prefeitura" class="img-navbar">
        </a>
        <h2 style="color: white" class="brand-logo nav-title">Nome do Projeto</h2>
        <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom"
            title="Sair"><span class="fas fa-sign-out-alt" style="color: white; font-size: 22px;"></span></a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
<!-- End Navbar -->
</div>