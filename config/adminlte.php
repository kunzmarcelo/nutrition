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

    'title' => 'Farms Nutrition',
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

    'logo' => '<b>Farms</b> Nutrition',
    'logo_img' => 'vendor/adminlte/dist/img/farms_nutrition.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Farms Nutrition',

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
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info',
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
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,
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

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

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
    'dashboard_url' => 'painel/home',
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
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => false,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:



          ['header' => 'MENUS'],

        [
          'text' => 'Lotes',
          'icon'    => 'fas fa-object-ungroup',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/lote/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/lote',
              ],

            ],
        ],
        [
          'text' => 'Medicamentos',
          'icon'    => 'fas fa-clinic-medical',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/medicamento/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/medicamento',
              ],

            ],
        ],
        [
          'text' => 'Animais',
          'icon'    => 'fas fa-horse-head',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/animais/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/animais',
              ],

            ],
        ],
        [
          'text'    => 'Ordenha/Produção',
          'icon'    => 'fas fa-folder-plus',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/producao/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/producao',
              ],

            ],
        ],
        [
          'text'    => 'Entrega do Leite',
          'icon'    => 'fas fa-truck',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/entrega/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/entrega',
              ],

            ],
        ],
        [
          'text'    => 'Aplicação de Medi.',
          'icon'    => 'fas fa-syringe',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/aplicacoes/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/aplicacoes',
              ],

            ],
        ],


        [
            'text'    => 'Prenhez',
            'icon'    => 'fab fa-algolia',
            'submenu' => [
                [
                    'text'    => 'Reprodução',
                    'icon'    => 'fas fa-vector-square',
                    'url'     => '#',
                    'submenu' => [
                        [
                          'text'    => 'Cadastro',
                          'url'     => 'painel/reproducao/create',
                        ],
                        [
                          'text'    => 'Listagem',
                          'url'     => 'painel/reproducao',
                        ],

                    ],
                ],

                [
                    'text'    => 'Inseminação/Cobertura',
                    'icon'    =>'fab fa-usb',
                    'url'     => '#',
                    'submenu' => [
                        [
                          'text'    => 'Cadastro',
                          'url'     => 'painel/reproducao/inseminacao/create',
                        ],
                        [
                          'text'    => 'Listagem',
                          'url'     => 'painel/reproducao/inseminacao',
                        ],

                    ],
                ],
                [
                    'text'    => 'Sêmen',
                    'icon'    =>'fas fa-code-branch',
                    'url'     => '#',
                    'submenu' => [
                        [
                          'text'    => 'Cadastro',
                          'url'     => 'painel/reproducao/semem/create',
                        ],
                        [
                          'text'    => 'Listagem',
                          'url'     => 'painel/reproducao/semem',
                        ],

                    ],
                ],
            ],
        ],


        [
          'text'    => 'Desafio de Prod',
          'icon'    => 'fas fa-lightbulb',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/desafio/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/desafio',
              ],

            ],
        ],
        [
          'text'    => 'Estoque',
          'icon'    => 'fas fa-layer-group',

          'submenu' => [
            [
              'text'    => 'Cadastro',
              'url'  => 'painel/estoque/create',
            ],
              [
                'text'    => 'Listagem',
                'url'  => 'painel/estoque',
              ],

            ],
        ],

        ['header' => 'RELATÓRIOS'],
        [
          'text'    => 'Reprodução',
          'url'     => 'painel/fechamento_dia',
          'icon'    => 'fas fa-file-pdf',
        ],
        [
          'text'    => 'Animais',
          'url'     => 'painel/fechamento_animais',
          'icon'    => 'fas fa-file-pdf',
        ],

        [
          'header' => 'Configurações de Usuários',
          'can' => 'admin',
        ],
        [
            'text' => 'Usuários',
            'url'  => 'painel/users',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
        ],
        [
            'text' => 'Roles',
            'url'  => 'painel/roles',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
        ],
        [
            'text' => 'Permissions',
            'url'  => 'painel/permissions',
            'icon' => 'fas fa-fw fa-user',
            'can' => 'admin',
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
        'Toogle' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css',
                ],

                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js',
                ],

            ],
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
    */

    'livewire' => false,
];
