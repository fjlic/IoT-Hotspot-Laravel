<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'IOT-HOTSPOT',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
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
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>IOT</b>HOTSPOT',
    'logo_img' => 'vendor/adminlte/dist/img/logo-iot.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'IOT-HOTSPOT',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
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
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
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
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
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
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
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
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
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
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
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
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
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
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        /*[
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],*/
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        /*[
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],*/
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        ['header' => 'Panel de Opciones'],
        [
            'text'    => 'Usuarios',
            'icon'    => 'fas fa-user-astronaut',
            'icon_color' => 'green',
            'submenu' => [
                [
                    'text'    => 'Configuraciones',
                    'icon'    => 'fas fa-user-cog',
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
                        [
                            'text' => 'Alertas',
                            'icon_color' => '',
                            'icon'  => 'fas fa-exclamation-circle',
                            'url'  => 'alert',
                        ],
                    ],
                ],    
                [
                    'text'    => 'Estadistico Telemetria',
                    'icon'    => 'fas fa-chart-bar',
                    'icon_color' => 'green',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'statisticalrequest',
                        ],
                        /*[
                            'text' => 'Historial Estadisticos Telemetria',
                            'icon_color' => '',
                            'icon'  => 'fas fa-route',
                            'url'  => 'historialstatisticalsensor',
                        ],*/
                    ],
                ],
                [
                    'text'    => 'Predicciones Telemetria',
                    'icon'    => 'fas fa-draw-polygon',
                    'icon_color' => 'green',
                    'submenu' => [
                        [
                            'text' => 'Listar',
                            'icon_color' => '',
                            'icon'  => 'fas fa-fw fa-list',
                            'url'  => 'learningrequest',
                        ],
                    ],
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
                    'icon_color' => 'orange',
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
                    'icon_color' => 'orange',
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
                        [
                            'text' => 'Estadistico Contador',
                            'icon_color' => '',
                            'icon'  => 'fas fa-chart-bar',
                            'url'  => 'statisticalcounter',
                        ],
                    ],
                ],
                [
                    'text'    => 'Qr',
                    'icon'    => 'fas fa-qrcode',
                    'icon_color' => 'orange',
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
                    'icon_color' => 'orange',
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
                    'icon_color' => 'orange',
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
                    'icon_color' => 'red',
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
                    'icon_color' => 'red',
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
                        [
                            'text' => 'Estadistico Sensores',
                            'icon_color' => '',
                            'icon'  => 'fas fa-chart-bar',
                            'url'  => 'statisticalsensor',
                        ],
                        [
                            'text' => 'Predicciones Sensores',
                            'icon_color' => '',
                            'icon'  => 'fas fa-draw-polygon',
                            'url'  => 'learningsensor',
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
            'icon'    => 'fas fa-file-code',
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
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
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
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
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

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
