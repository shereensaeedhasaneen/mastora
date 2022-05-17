<?php

return [
    'countries' => [
        'name' => 'main.country.countries.value',
        'icon' => 'cil-building',
        'activeWhen' => ['countries.index', 'countries.create', 'countries.update'],
        'class' => '',
        'child' => [
            [
                'title' => 'main.country.create_country.value',
                'route' => 'countries.create',
                'permissions' => ['create countries'],
                'icon' => '',
            ],
            [
                'title' => 'main.country.all_countries.value',
                'route' => 'countries.index',
                'permissions' => ['read all mine countries', 'read all theirs countries'],
                'icon' => '',
            ],
        ]
    ],
    'cities' => [
        'name' => 'main.city.cities.value',
        'icon' => 'cil-building',
        'activeWhen' => ['cities.index', 'cities.create', 'cities.update'],
        'class' => '',
        'child' => [
            [
                'title' => 'main.city.create_city.value',
                'route' => 'cities.create',
                'permissions' => ['create cities'],
                'icon' => '',
            ],
            [
                'title' => 'main.city.all_cities.value',
                'route' => 'cities.index',
                'permissions' => ['read all mine cities', 'read all theirs cities'],
                'icon' => '',
            ],
        ]
    ],
    'bank_branchs' => [
        'name' => 'main.bank_branch.bank_branchs.value',
        'icon' => 'cil-building',
        'activeWhen' => ['bank_branchs.index', 'bank_branchs.create', 'bank_branchs.update'],
        'class' => '',
        'child' => [
            [
                'title' => 'main.bank_branch.create_bank_branch.value',
                'route' => 'bank-branchs.create',
                'permissions' => ['create cities'],
                'icon' => '',
            ],
            [
                'title' => 'main.bank_branch.all_bank_branchs.value',
                'route' => 'bank-branchs.index',
                'permissions' => ['read all mine cities', 'read all theirs cities'],
                'icon' => '',
            ],
        ]
    ],
];
