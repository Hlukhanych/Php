<?php

//6. Асоціативний масив “Абонент” (номер телефону, домашня адреса, власник; сумарна тривалість розмов, рахунок).
// Запит абонентів з вказаним прізвищем із тривалістю розмов більше, ніж вказана.

$abonent = [
    'phone_number' => null,
    'adress' => null,
    'owner' => null,
    'sum' => null,
    'score' => null,
];

$abonents = [

    [
        'phone_number' => 380504730564,
        'adress' => 'Uzhgorod',
        'owner' => 'Vasya',
        'sum' => 10,
        'score' => 57,
    ],

    [
        'phone_number' => 380998321745,
        'adress' => 'Uzhgorod',
        'owner' => 'Dima',
        'sum' => 13,
        'score' => 68,
    ],

    [
        'phone_number' => 380506734659,
        'adress' => 'Uzhgorod',
        'owner' => 'Misha',
        'sum' => 7,
        'score' => 20,
    ],

    [
        'phone_number' => 380994765128,
        'adress' => 'Uzhgorod',
        'owner' => 'Maks',
        'sum' => 14,
        'score' => 43,
    ],

    [
        'phone_number' => 380975532687,
        'adress' => 'Uzhgorod',
        'owner' => 'Sasha',
        'sum' => 8,
        'score' => 40,
    ],

    [
        'phone_number' => 380663524307,
        'adress' => 'Uzhgorod',
        'owner' => 'Simba',
        'sum' => 30,
        'score' => 88,
    ]
];

if (isset($_POST['phone_number'])) {
    $abonents[] = [
        'phone_number' => $_POST['phone_number'] ?? '',
        'adress' => $_POST['adress'] ?? '',
        'owner' => $_POST['owner'] ?? '',
        'sum' => $_POST['sum'] ?? '',
        'score' => $_POST['score'] ?? '',
    ];
}

$abonents = array_filter($abonents, function ($element) {
    $return_flag = true;
    if (isset($_GET['owner']) && $element['owner'] != $_GET['owner']) {
        $return_flag = false;
    }
    if ($return_flag && isset($_GET['score']) && $element['score'] != $_GET['score']) {
        $return_flag = false;
    }
    return $return_flag;
});

if(isset($_POST['editPhoneNumber'])){
    $editKey = null;
    foreach($abonents as $key => $value){
        if ($value['phone_number'] == $_POST['editPhoneNumber']){
            $editKey = $key;
            break;
        }
    }
    if (!is_null($editKey) && !empty($_POST['editPhoneNumber']) && !empty($_POST['editAdress']) && !empty($_POST['editOwner']) && $_POST['editSum'] > 0 && !empty($_POST['editScore'])) {
        $abonents[$editKey] = array_merge($abonents[$editKey],  [
            'phone_number' => $_POST['editPhoneNumber'] ?? '',
            'adress' => $_POST['editAdress'] ?? '',
            'owner' => $_POST['editOwner'] ?? '',
            'sum' => $_POST['editSum'] ?? '',
            'score' => $_POST['editScore'] ?? '',
        ]);
    }
    else{
        $error_message =  "Not found or something is empty.";
    }
}

include 'abonents_table.phtml';
include 'abonent_form_create.phtml';
include 'abonent_change.phtml';


if ($error_message ){
    print $error_message;
}