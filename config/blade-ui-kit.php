<?php

use App\Components\Markdown;
use BladeUIKit\Components;

return [
    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        // 'alert' => Components\Alerts\Alert::class,
        // 'form-button' => Components\Buttons\FormButton::class,
        // 'logout' => Components\Buttons\Logout::class,
        // 'carbon' => Components\DateTime\Carbon::class,
        // 'countdown' => Components\DateTime\Countdown::class,
        // 'easy-mde' => Components\Editors\EasyMDE::class,
        // 'trix' => Components\Editors\Trix::class,
        // 'error' => Components\Forms\Error::class,
        // 'form' => Components\Forms\Form::class,
        // 'label' => Components\Forms\Label::class,
        // 'input' => Components\Forms\Inputs\Input::class,
        // 'checkbox' => Components\Forms\Inputs\Checkbox::class,
        // 'color-picker' => Components\Forms\Inputs\ColorPicker::class,
        // 'email' => Components\Forms\Inputs\Email::class,
        // 'password' => Components\Forms\Inputs\Password::class,
        // 'pikaday' => Components\Forms\Inputs\Pikaday::class,
        // 'textarea' => Components\Forms\Inputs\Textarea::class,
        // 'html' => Components\Layouts\Html::class,
        // 'social-meta' => Components\Layouts\SocialMeta::class,
        // 'mapbox' => Components\Maps\Mapbox::class,
        // 'markdown' => Components\Markdown\Markdown::class,
        'markdown' => App\Components\Markdown::class,
        // 'toc' => Components\Markdown\ToC::class,
        // 'dropdown' => Components\Navigation\Dropdown::class,
        // 'avatar' => Components\Support\Avatar::class,
        // 'cron' => Components\Support\Cron::class,
        // 'unsplash' => Components\Support\Unsplash::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all the Livewire components that should be loaded
    | for your app. By default all components from Blade UI Kit are loaded in.
    |
    */

    'livewire' => [
    ],

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all Blade UI Kit components.
    | By default it's empty. This is useful if you want to avoid
    | collision with components from other libraries.
    |
    | If set with "buk", for example, you can reference components like:
    |
    | <x-buk-easy-mde />
    |
    */

    'prefix' => 'buk',

    /*
    |--------------------------------------------------------------------------
    | Third Party Asset Libraries
    |--------------------------------------------------------------------------
    |
    | These settings hold reference to all third party libraries and their
    | asset files served through a CDN. Individual components can require
    | these asset files through their static `$assets` property.
    |
    */

    'assets' => [
        'alpine' => 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js',

        'easy-mde' => [
            'https://unpkg.com/easymde/dist/easymde.min.css',
            'https://unpkg.com/easymde/dist/easymde.min.js',
        ],

        'moment' => [
            'https://cdn.jsdelivr.net/npm/moment@2.26.0/moment.min.js',
            'https://cdn.jsdelivr.net/npm/moment-timezone@0.5.31/builds/moment-timezone-with-data.min.js',
        ],

        'pikaday' => [
            'https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css',
            'https://cdn.jsdelivr.net/npm/pikaday/pikaday.js',
        ],

        'trix' => [
            'https://unpkg.com/trix@1.2.3/dist/trix.css',
            'https://unpkg.com/trix@1.2.3/dist/trix.js',
        ],

        'pickr' => [
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css',
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js',
        ],

        'mapbox' => [
            'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css',
            'https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js',
        ],
    ],
];
