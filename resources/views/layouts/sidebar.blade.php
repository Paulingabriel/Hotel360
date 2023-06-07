<style>

.clearfix{
    padding: 16px!important;
}


</style>

<div data-active-color="white" data-background-color="aqua-marine" data-image="../app-assets/img/sidebar-bg/15.webp"
    class="app-sidebar side">
    <div class="sidebar-header" style="background: #fff!important; z-index: 100000; opacity: 1; position: relative; border: none;">
        <div class="logo clearfix d-flex justify-content-center">
            <a href="index.html" class="logo-text float-left">
                <div class="logo-img d-none">
                    <img src="../app-assets/img/logo.png" alt="" />
                </div>
                <span class="text align-middle" style="color: #214621;  text-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;">HOTEL 360</span>
            </a>
        </div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class="nav-item">
                    <a href="/accueil"><i class="icon-home"></i><span data-i18n=""
                            class="menu-title">Dashboard</span>
                    </a>

                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">Reservations</span></a>
                    <ul class="menu-content">
                        <li><a href="{{route("resChambres/index")}}" class="menu-item" style="padding-left: 0;"><i class="icon-screen-desktop"></i>Reservation de chambre</a></li>
                        <li>
                            <a href="{{route("resSalles/index")}}" class="menu-item" style="padding-left: 0;"><i class="icon-screen-desktop"></i>Reservation de salle</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="icon-screen-desktop"></i><span data-i18n="" class="menu-title">Chambres
                            </span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{route("chambres/index")}}" class="menu-item" style="padding-left: 20px;"><i class="fa-solid fa-list"></i>Liste</a>
                        </li>
                        <li>
                            <a href="{{route("typesChambres/index")}}" class="menu-item" style="padding-left: 20px;"><i class="icon-screen-desktop"></i>Types de chambres</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route("clients/index")}}"><i class="icon-layers"></i><span data-i18n=""
                            class="menu-title">Clients</span></a>
                </li>
                <li class="nav-item">
                    <a href="cards.html"><i class="icon-layers"></i><span data-i18n=""
                            class="menu-title">Utilisateurs</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{route("etages/index")}}"><i class="icon-layers"></i><span data-i18n=""
                            class="menu-title">Etages</span></a>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Salles
                            </span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{route("salles/index")}}" class="menu-item" style="padding-left: 20px;"><i class="fa-solid fa-list"></i>Liste</a>
                        </li>
                        <li>
                            <a href="{{route("typesSalles/index")}}" class="menu-item" style="padding-left: 20px;"><i class="icon-screen-desktop"></i>Types de Salles</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="icon-magnet"></i><span data-i18n="" class="menu-title">
                            </span>Tarifs</a>
                    <ul class="menu-content">
                        <li class="has-sub nav-item">
                            <a href="#" class="" style="padding-left: 30px;"><i class="icon-screen-desktop"></i><span data-i18n="" class="menu-title">
                            Chambres</span></a>
                            <ul class="menu-content">
                                <li>
                                    <a href="{{route("chambresPr/index")}}" style="padding-left: 50px;"><i class="icon-screen-desktop"></i>Prix regulier</a>
                                </li>
                                <li>
                                    <a href="{{route("chambresPs/index")}}" style="padding-left: 50px;"><i class="icon-screen-desktop"></i>Prix spécial</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item">
                            <a href="#" class="" style="padding-left: 30px;"><i class="icon-screen-desktop"></i><span data-i18n="" class="menu-title">
                            Salles</span></a>
                            <ul class="menu-content">
                                <li>
                                    <a href="{{route("sallesPr/index")}}" style="padding-left: 50px;"><i class="icon-screen-desktop"></i>Prix regulier</a>
                                </li>
                                <li>
                                    <a href="{{route("sallesPs/index")}}" style="padding-left: 50px;"><i class="icon-screen-desktop"></i>Prix spécial</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    <i class="icon-logout"></i><span data-i18n=""
                            class="menu-title">Déconnexion</span></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
