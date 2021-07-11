<?php

return [

    'timeframes' => [

        'week_sessions' => [
            1 => 'One weekly session',
            2 => 'Two weekly session',
            3 => 'Three weekly session',
        ],

        'days' => [
            1 => 'Fridays',
            2 => 'Saturday/Tuesday',
            3 => 'Sunday/Wednesday',
            4 => 'Monday/Thursday',
            5 => 'Saturday/Monday/Wednesday',
            6 => 'Sunday/Tuesday/Thursday',
        ],
    ],

    'lead_payments' => [

        'types' => [
            'App\\Models\\ServiceFee' => 'Training Service',
            'App\\Models\\ExtraItem' => 'Extra Item',
            'App\\Models\\Offer' => 'Offer',
        ],
    ],

];
