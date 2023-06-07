<style>

.clearfix{
    padding: 5px 16px!important;
    height: 80px!important;
    display: flex;
    align-items: center;
}
.logo-img{
    width: 50px!important;
    height: 50px!important;
    margin-right: 0!important;
}
.logo-img img{
    width: 40px!important;
    /* height: 100%!important; */
    /* height: 50px!important; */
}
</style>

<div data-active-color="white" data-background-color="aqua-marine" data-image="{{ asset('../app-assets/img/sidebar-bg/15.webp') }}"
    class="app-sidebar side">
    <div class="sidebar-header" style="background: #fff!important; z-index: 100000; opacity: 1; position: relative; border: none;">
        <div class="logo clearfix">
            <a href="index.html" class="logo-text float-left d-flex py-0">
                <div class="logo-img">
                    {{-- <img src="{{ asset('../app-assets/img/logo 360.png') }}" alt=""/> --}}
                    @if(isset(Auth::user()->hotel->image))
                    <img src="{{ asset('uploads/images/' . Auth::user()->hotel->image) }}" alt=""/>
                    @else
                    <img src="" alt=""/>
                    @endif
                </div>
                {{-- <span class="text" style="color: #214621;  text-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important;">HOTEL 360</span> --}}

                @if(isset(Auth::user()->hotel->nom))
                <span class="text" style="color: #214621;  text-shadow: 0px 0px 4px rgba(50, 162, 50, 0.8)!important; display: flex; align-items: center;">
                    {{ Auth::user()->hotel->nom }}
                </span>
                @else
                <span></span>
                @endif
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
                    <a href="#"><i class="icon-screen-tablet"></i><span data-i18n=""
                            class="menu-title">Reservations</span></a>
                    <ul class="menu-content">
                        <li class="text-center"><a href="{{route("resChambres/index")}}" class="menu-item px-0">Reservation de chambre</a></li>
                        <li class="text-center">
                            <a href="{{route("resSalles/index")}}" class="menu-item px-0">Reservation de salle</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="las la-bed fs-4"></i><span data-i18n="" class="menu-title">Chambres
                            </span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{route("chambres/index")}}" class="menu-item" style="padding-left: 20px;"><i class="fa-solid fa-list"></i>Liste</a>
                        </li>
                        <li>
                            <a href="{{route("typesChambres/index")}}" class="menu-item" style="padding-left: 20px;"><i class="las la-bed fs-4"></i>Types de chambres</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route("clients/index")}}"><i class="icon-user"></i><span data-i18n=""
                            class="menu-title">Clients</span></a>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="icon-user"></i><span data-i18n=""
                            class="menu-title">Utilisateurs</span></a>
                            <ul class="menu-content">
                                <li>
                                    <a href="/superadmin/utilisateurs" class="menu-item" style="padding-left: 20px;"><i class="fa-solid fa-list"></i>Liste</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.roles.index') }}" class="menu-item" style="padding-left: 20px;"><i class="las la-user-tag fs-4"></i>Roles</a>
                                </li>
                                <li>
                                    <a href="{{ route('superadmin.permissions.index') }}" class="menu-item" style="padding-left: 20px;"><i class="las la-unlock-alt fs-4"></i>Permissions</a>
                                </li>
                            </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route("etages/index")}}"><i class="icon-layers"></i><span data-i18n=""
                            class="menu-title">Etages</span></a>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="las la-door-open fs-4"></i><span data-i18n="" class="menu-title">Salles
                            </span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{route("salles/index")}}" class="menu-item" style="padding-left: 20px;"><i class="fa-solid fa-list"></i>Liste</a>
                        </li>
                        <li>
                            <a href="{{route("typesSalles/index")}}" class="menu-item" style="padding-left: 20px;"><i class="las la-door-open fs-4"></i>Types de Salles</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="fa fa-usd"></i><span data-i18n="" class="menu-title">
                            </span>Tarifs</a>
                    <ul class="menu-content">
                        <li class="has-sub nav-item">
                            <a href="#" class="" style="padding-left: 30px;"><i class="las la-bed fs-4"></i><span data-i18n="" class="menu-title">
                            Chambres</span></a>
                            <ul class="menu-content">
                                <li>
                                    <a href="{{route("chambresPr/index")}}" style="padding-left: 50px;"><i class="fa fa-usd"></i>Prix regulier</a>
                                </li>
                                <li>
                                    <a href="{{route("chambresPs/index")}}" style="padding-left: 50px;"><i class="fa fa-usd"></i>Prix spécial</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub nav-item">
                            <a href="#" class="" style="padding-left: 30px;"><i class="las la-door-open fs-4"></i><span data-i18n="" class="menu-title">
                            Salles</span></a>
                            <ul class="menu-content">
                                <li>
                                    <a href="{{route("sallesPr/index")}}" style="padding-left: 50px;"><i class="fa fa-usd"></i>Prix regulier</a>
                                </li>
                                <li>
                                    <a href="{{route("sallesPs/index")}}" style="padding-left: 50px;"><i class="fa fa-usd"></i>Prix spécial</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-sub nav-item">
                    <a href="#"><i class="las la-cog fs-4"></i><span data-i18n=""
                            class="menu-title">Paramètres</span></a>
                            <ul class="menu-content">
                                <li>
                                    <a href="{{route("hotels/index")}}" class="menu-item" style="padding-left: 20px;"><i class="las la-hotel fs-4"></i>Hotel</a>
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
