<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header text-dark">Dashboard & Apps</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('dashboard') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Template</a></li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'slider', 'slider.add', 'slider.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="fa fa-image"><span class="path1"></span><span class="path2"></span></i>
                            <span>Slider</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                                $subSubMenu = ['slider', 'slider.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('slider')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['slider.add'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('slider.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'category', 'category.add', 'category.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="fa fa-fw fa-list"><span class="path1"></span><span class="path2"></span></i>
                            <span>Category</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['category', 'category.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('category')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['category.add'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('category.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'blog', 'blog.add', 'blog.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="fa fa-newspaper-o"><span class="path1"></span><span class="path2"></span></i>
                            <span>Insight</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['blog', 'blog.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('blog')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['blog.add'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('blog.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'service', 'service.add', 'service.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                            <span>Service</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['service', 'service.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('service')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['service.add'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('service.add')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'client', 'client.create', 'client.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="fa-solid fa-user-gear"><span class="path1"></span><span class="path2"></span></i>
                            <span>Client</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['client', 'client.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('client')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['client.create'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('client.create')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'member', 'member.create', 'member.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="fa-solid fa-user-gear"><span class="path1"></span><span class="path2"></span></i>
                            <span>Member</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['member', 'member.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('member')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['member.create'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('member.create')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'industries', 'industries.create', 'industries.edit'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
                            <span>Industries</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['industries', 'industries.edit'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('industries')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List</a>
                            </li>
                            <?php
                            $subSubMenu = ['industries.create'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{route('industries.create')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Create</a>
                            </li>
                        </ul>
                    </li>

                    <li class="header text-dark">General Settings</li>
                    <?php
                    $subMenu = [
                        'about.information'
                    ];
                    ?>
                    <li class="treeview" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}>
                        <a href="#">
                            <i class="fa fa-gear"><span class="path1"></span><span class="path2"></span></i>
                            <span>Settings</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}>
                            <?php
                            $subSubMenu = ['about.information'];
                            ?>
                            <li class="{{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                <a href="{{ route('about.information') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>About Us</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><span class="icon-Settings-2"></span></a>
        <a href="mailbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><span class="icon-Mail"></span></a>
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
    </div>
</aside>
