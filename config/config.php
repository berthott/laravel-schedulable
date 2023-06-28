<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Model Namespace Configuration
    |--------------------------------------------------------------------------
    |
    | String or array with one ore multiple namespaces that should be monitored 
    | for the configured trait.
    |
    */

    'namespace' => 'App\Models',

    /*
    |--------------------------------------------------------------------------
    | The cron frequency
    |--------------------------------------------------------------------------
    |
    | Every minute by default
    |
    */

    'cron' => '* * * * *',
];
