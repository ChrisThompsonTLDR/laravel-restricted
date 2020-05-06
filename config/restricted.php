<?php

return [
    'routes' => [
        'middleware'   => ['web', 'auth'],
        'prefix'       => 'restricted',
        'landing_page' => 'restricted.index', // where to send a user after entering restricted mode
    ],

    'views' => [
        'layout' => 'layouts.app',  // blade to use for layouts
    ]
];
