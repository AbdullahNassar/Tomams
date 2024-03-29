<?php

return [
    # Define your application mode here
    'mode' => 'sandbox',

    # Account credentials from developer portal
    'account' => [
        'client_id' => env('ATYgViAITlMZVq1pHcHtRyLYiTjRcBYgDdS5THAamlh3qGDFC2UlJaHYjd-GLrtNs3xyvRfm_Ckc05-9', ''),
        'client_secret' => env('EPmDdsfJEnqpvdRIYI86unAVuqONUj0siVDhdpecmIpqJr13-BfX3EdQFtT5s6kqK7ciTGhhxhvB9pFw', ''),
    ],

    # Connection Information
    'http' => [
        'connection_time_out' => 30,
        'retry' => 1,
    ],

    # Logging Information
    'log' => [
        'log_enabled' => true,

        # When using a relative path, the log file is created
        # relative to the .php file that is the entry point
        # for this request. You can also provide an absolute
        # path here
        'file_name' => '../PayPal.log',

        # Logging level can be one of FINE, INFO, WARN or ERROR
        # Logging is most verbose in the 'FINE' level and
        # decreases as you proceed towards ERROR
        'log_level' => 'FINE',
    ],
];
