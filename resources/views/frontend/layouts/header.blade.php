<header id="header" class="header modern-header modern-header-theme-colored">
    <div class="header-top bg-theme-colored sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="widget text-white">
                        <i class="fa fa-clock-o text-theme-colored2"></i> Opening Hours: Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget pull-right flip sm-pull-none">
                        <ul class="nav navbar-nav list-bordered language-switcher">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('frontend/assets/images/flags/en.png') }} " alt="En"> ENG <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><img src="{{ asset('frontend/assets/images/flags/fr.png') }} " alt="En"> France</a></li>
                                    <li><a href="#"><img src="{{ asset('frontend/assets/images/flags/de.png') }} " alt="En"> German</a></li>
                                    <li><a href="#"><img src="{{ asset('frontend/assets/images/flags/it.png') }} " alt="En"> Italy</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <ul class="list-inline  text-right flip sm-text-center">
                            <li class="m-0 pl-10"> <a href="{{ asset('frontend/assets/ajax-load/login-form.html') }} " class="text-white ajaxload-popup"><i class="fa fa-user-o mr-5 text-theme-colored2"></i> Login /</a> </li>
                            <li class="m-0 pl-0 pr-10">
                                <a href="{{ asset('frontend/assets/ajax-load/register-form.html') }} " class="text-white ajaxload-popup"><i class="fa fa-edit mr-5 text-theme-colored2"></i>Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle p-0 bg-light xs-text-center">
        <div class="container pt-30 pb-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="widget sm-text-center">
                        <i class="fa fa-envelope text-theme-colored2 font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                        <a href="#" class="font-12 text-gray text-uppercase">Mail Us Today</a>
                        <h5 class="font-13 text-black m-0"> <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e980878f86a990869c9b8d8684888087c78a8684">[email&#160;protected]</a></h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-6">
                    <div class="widget text-center">
                        <a class href="index-mp-layout1.html"><img src="{{ asset('frontend/assets/images/logo-wide1.png') }} " alt></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="widget sm-text-center">
                        <i class="fa fa-building-o text-theme-colored2 font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                        <a href="#" class="font-12 text-gray text-uppercase">Company Location</a>
                        <h5 class="font-13 text-black m-0"> 121 King Street</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed">
            <div class="container">
                <nav id="menuzord" class="menuzord red">
                    <ul class="menuzord-menu">
{{--                        <li class="home"><a href="{{ route('/') }}"><i class="fa fa-home font-28"></i></a></li>--}}
                        @php $subMenu = ['/']; @endphp
                        <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                            <a href="{{ route('/') }}">Home</a>
                        </li>
                        @php $subMenu = ['frontend.blog']; @endphp
                        <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                            <a href="{{ route('frontend.blog') }}">Insight</a>
                        </li>
                        @php $subMenu = ['frontend.finance','frontend.construction']; @endphp
                        <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                            <a href="#">Industries</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('frontend.finance') }}">Finance</a></li>
                                <li><a href="{{ route('frontend.construction') }}">Construction</a></li>
                            </ul>
                        </li>
                        @php $subMenu = ['frontend.services']; @endphp
                        <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                            <a href="{{ route('frontend.services') }}">Services</a>
                        </li>
                        @php $subMenu = ['contact_us']; @endphp
{{--                        <li class="{{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">--}}
{{--                            <a href="{{ route('contact_us') }}">Contact</a>--}}
{{--                        </li>--}}
                        @php $subMenu = ['frontend.about']; @endphp
                        <li>
                            <a href="{{ route('frontend.about') }}">About</a>
                        </li>
                        <li class="active pull-right"><a href="tel:+(012) 345 6789" class="font-20 line-height-1"><i class="pe-7s-call mr-10 font-28"></i> +(012) 345 6789</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
