<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                /*
                |--------------------------------------------------------------------------
                | Edit to set the api's title
                |--------------------------------------------------------------------------
                */

                'title' => 'Biblioteca - L5 Swagger UI',
            ],

            'routes' => [
                /*
                |--------------------------------------------------------------------------
                | Route for accessing api documentation interface
                |--------------------------------------------------------------------------
                */
                'api' => 'web/documentation',

                /*
                |--------------------------------------------------------------------------
                | Route for accessing parsed swagger annotations.
                |--------------------------------------------------------------------------
                */

                'docs' => 'web-docs',

                /*
                |--------------------------------------------------------------------------
                | Route for Oauth2 authentication callback.
                |--------------------------------------------------------------------------
                */

                'oauth2_callback' => 'web/oauth2-callback',

            ],
            'paths' => [
                /*
                |--------------------------------------------------------------------------
                | Absolute path to location where parsed swagger annotations will be stored
                |--------------------------------------------------------------------------
                */

                'docs' => storage_path('web-docs'),

                /*
                |--------------------------------------------------------------------------
                | File name of the generated json documentation file
                |--------------------------------------------------------------------------
                */

                'docs_json' => 'web-docs.json',

                /*
                |--------------------------------------------------------------------------
                | File name of the generated YAML documentation file
                |--------------------------------------------------------------------------
                 */

                'docs_yaml' => 'web-docs.yaml',

                /*
                |--------------------------------------------------------------------------
                | Absolute paths to directory containing the swagger annotations are stored.
                |--------------------------------------------------------------------------
                */

                'annotations' => [
                    base_path('app/Http/Controllers/Web'),
                    base_path('app/Http/Requests/Web'),
                ],

            ],
        ]
    ]
];
