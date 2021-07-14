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

        'due_dates' => [
            13 => '1 Week',
            14 => '2 Weeks',
            1 => '1 Month',
            2 => '2 Months',
            3 => '3 Months',
            4 => '4 Months',
            5 => '5 Months',
            6 => '6 Months',
            7 => '7 Months',
            8 => '8 Months',
            9 => '9 Months',
            10 => '10 Months',
            11 => '11 Months',
            12 => '12 Months',
        ],
    ],

];
