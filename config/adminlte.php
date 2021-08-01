<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'HOTSPOT-IOT',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>IOT</b>HOTSPOT',
    'logo_img' => 'vendor/adminlte/dist/img/logo-iot.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 500,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    //-----------Custom Urls
    //'dashboard_url' => 'user',
    //'dashboard_url' => 'role',
    //'dashboard_url' => 'permission',
    //'dashboard_url' => 'region',
    //'dashboard_url' => 'crd',
    //'dashboard_url' => 'erb',
    //'dashboard_url' => 'qr',
    //'dashboard_url' => 'nfc',
    //'dashboard_url' => 'counter',
    //'dashboard_url' => 'sensor',
    //'dashboard_url' => 'statistical',
    //'dashboard_url' => 'probeestimating',
    //'dashboard_url' => 'classname',
    //'dashboard_url' => 'file',
    //'dashboard_url' => 'historialregion',
    //'dashboard_url' => 'historialcrd',
    //'dashboard_url' => 'historialerb',
    //'dashboard_url' => 'historialqr',
    //'dashboard_url' => 'historialnfc',
    //'dashboard_url' => 'historialcounter',
    //'dashboard_url' => 'historialsensor',
    //'dashboard_url' => 'historialstatistical',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        ['header' => 'Panel de Opciones'],
        [
            'text'    => 'Usuarios',
            'icon'    => 'fas fa-user-astronaut',
            'icon_color' => 'green',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon_color' => '',
                    'icon'  => 'fas fa-fw fa-users',
                    'url'  => 'user',
                ],
                [
                    'text' => 'Roles',
                    'icon_color' => '',
                    'icon'  => 'fas fa-address-card',
                    'url'  => 'role',
                ],
                [
                    'text' => 'Permisos',
                    'icon_color' => '',
                    'icon'  => 'fas fa-address-card',
                    'url'  => 'permission',
                ],
                [
                    'text' => 'Asignaciones',
                    'icon_color' => '',
                    'icon'  => 'fas fa-address-card',
                    'url'  => 'assignment',
                ],
                /*[
                    'text' => 'change_password',
                    'icon_color' => '',
                    'icon'  => 'fas fa-file-signature',
                    'url'  => 'password',
                ],*/
            ],
        ],
        [
            'text'    => 'Crd Modulos',
            'icon'    => 'fas fa-space-shuttle',
            'icon_color' => 'orange',
            'submenu' => [
                [
                    'text'    => 'Info Crd',
                    'icon'    => 'fas fa-bezier-curve',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'crd',
                        ],
                        [
                            'text' => 'Historial Crd',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialcrd',
                        ],
                    ],
                ],
                [
                    'text'    => 'Contadores',
                    'icon'    => 'fas fa-camera-retro',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'counter',
                        ],
                        [
                            'text' => 'Historial Contador',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialcounter',
                        ],
                    ],
                ],
                [
                    'text'    => 'Qr',
                    'icon'    => 'fas fa-qrcode',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'qr',
                        ],
                        [
                            'text' => 'Historial Qr',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialqr',
                        ],
                    ],
                ],
                [
                    'text'    => 'Nfc',
                    'icon'    => 'fas fa-window-restore',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'nfc',
                        ],
                        [
                            'text' => 'Historial Nfc',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialnfc',
                        ],
                    ],
                ],
                [
                    'text'    => 'Publicidad',
                    'icon'    => 'fas fa-image',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'file',
                        ],
                    ],
                ],
            ],
            
        ],
        [
            'text'    => 'Erb Modulos',
            'icon'    => 'fas fa-rocket',
            'icon_color' => 'red',
            'submenu' => [
                [
                    'text'    => 'Info Erb',
                    'icon'    => 'fas fa-bezier-curve',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'erb',
                        ],
                        [
                            'text' => 'Historial Erb',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialerb',
                        ],
                    ],
                ],
                [
                    'text'    => 'Sensores',
                    'icon'    => 'fas fa-cogs',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'sensor',
                        ],
                        [
                            'text' => 'Historial Sensores',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialsensor',
                        ],
                    ],
                ],
                [
                    'text'    => 'Estadisticos',
                    'icon'    => 'fas fa-chart-bar',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'statistical',
                        ],
                        /*[
                            'text' => 'Historial Estadisticos',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialstatistical',
                        ],*/
                    ],
                ],
                [
                    'text'    => 'Redes Neuronales',
                    'icon'    => 'fas fa-draw-polygon',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'learning',
                        ],
                    ],
                ],
                /*[
                    'text'    => 'Probe',
                    'icon'    => 'fas fa-file',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'probeestimating',
                        ],
                    ],
                ],
                [
                    'text'    => 'ClassName',
                    'icon'    => 'fas fa-file',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'classname',
                        ],
                    ],
                ],*/
            ],
        ],
        [
            'text'    => 'Documentacion',
            'icon'    => 'fas fa-fw fa-file-code',
            'icon_color' => 'blue',
            'url'  => 'docs',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
