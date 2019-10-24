<?

$headerData = [
    'inputHidden' => '',
    'userIsLogin' => true,
    'countInCard' => 11,
    'menu' => [
        [
            'text' => 'Акции',
            'href' => '#',
            'icon' => '/local/assets/images/icons/icon-nav-0.svg',
            'subMenu' => [
                [
                    'text' => 'Все акции',
                    'href' => './stock.php'
                ],
                [
                    'text' => 'Особая цена',
                    'href' => './sales.php'
                ],
                [
                    'text' => 'Скидки недели',
                    'href' => './404.php'
                ],
                [
                    'text' => 'Ярмарка выходного дня',
                    'href' => './404.php'
                ], [
                    'text' => 'Премиум товары',
                    'href' => './sales.php'
                ], [
                    'text' => 'Акции по Купилке',
                    'href' => './sales.php'
                ], [
                    'text' => 'Архив акций',
                    'href' => './stock.php'
                ],
            ]
        ],
        [
            'text' => 'Магазины',
            'href' => '#',
            'icon' => '/local/assets/images/icons/icon-nav-1.svg',
            'subMenu' => [
                [
                    'text' => 'Все магазины',
                    'href' => './map.php'
                ],
                [
                    'text' => 'Круглосуточные',
                    'href' => './map.php#infinity',
                    'onlyUpdateMap' => true
                ],
                [
                    'text' => 'Где есть Nravizza Pizza',
                    'href' => './map.php#pizza',
                    'onlyUpdateMap' => true
                ],
                [
                    'text' => 'Магазины с кулинарией',
                    'href' => './map.php#cookery',
                    'onlyUpdateMap' => true
                ], [
                    'text' => 'Магазины с собственной выпечкой',
                    'href' => './map.php#bake',
                    'onlyUpdateMap' => true
                ],
            ]
        ],
        [
            'text' => 'Купилка',
            'href' => '#',
            'icon' => '/local/assets/images/icons/kupilka_icon.svg',
            'subMenu' => [
                [
                    'text' => 'Акции по Купилке',
                    'href' => './sales.php'
                ],
                [
                    'text' => 'О Купилке',
                    'href' => './stockCard.php'
                ],
                [
                    'text' => 'Супер Купилка',
                    'href' => './404.php'
                ],
                [
                    'text' => 'Партнеры',
                    'href' => './404.php'
                ],
            ]
        ],
        [
            'text' => 'Вкусно готовим',
            'href' => '#',
            'icon' => '/local/assets/images/icons/icon-nav-3.svg',
            'subMenu' => [
                [
                    'text' => 'Nravizza Pizza',
                    'href' => './pizza.php'
                ],
                [
                    'text' => 'Знатоки',
                    'href' => './404.php'
                ],
                [
                    'text' => 'Полуфабрикаты',
                    'href' => './404.php'
                ],
                [
                    'text' => 'Готовая продукция',
                    'href' => './404.php'
                ], [
                    'text' => 'Пекарня',
                    'href' => './lk.php'
                ], [
                    'text' => 'Рецепты',
                    'href' => './soups.php'
                ],
            ]
        ],
    ],
    'menuBottom' => [
        [
            'text' => 'Соседи сегодня',
            'href' => './today.php',
        ],
        [
            'text' => 'Работа в Соседях',
            'href' => './work.php',
        ],
        [
            'text' => 'Сотрудничество',
            'href' => './cooperation.php',
        ],
        [
            'text' => 'Контакты',
            'href' => './contacts.php',
        ],
    ]
];
?>

<div class="vue-component" data-component="Header" data-initial='<?= json_encode($headerData); ?>'></div>
<!-- /.vue-component -->
