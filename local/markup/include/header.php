<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/assets/build/assets.header.html'); ?>
</head>
<body>
    <div id="app">
        <?php $headerData = [
            'menu' => [
                [
                    'text' => 'Тарифы',
                    'href' => '#',
                    'subMenu' => [
                        [
                            'text' => 'Облачный хостинг',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Аренда серверов',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Выделенный сервер',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Защищенный сервер',
                            'href' => '#'
                        ],
                    ]
                ],
                [
                    'text' => 'Домены',
                    'href' => '#',
                ],
                [
                    'text' => 'Конструктор сайтов',
                    'href' => '#',
                    'subMenu' => [
                        [
                            'text' => 'Облачный хостинг',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Аренда серверов',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Выделенный сервер',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Защищенный сервер',
                            'href' => '#'
                        ],
                    ]
                ],
                [
                    'text' => 'О компании',
                    'href' => '#',
                    'subMenu' => [
                        [
                            'text' => 'Облачный хостинг',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Аренда серверов',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Выделенный сервер',
                            'href' => '#'
                        ],
                        [
                            'text' => 'Защищенный сервер',
                            'href' => '#'
                        ],
                    ]
                ],
            ],
            'phone' => '375172342312',
            'authHref' => '#',
            'contacts' => [
                [
                    'title' => 'Круглосуточная техподдержка',
                    'mainPhone' => '375171234567',
                    'email' => 'support@hostfly.by',
                    'additionalContacts' => []
                ],
                [
                    'title' => 'Отдел продаж',
                    'mainPhone' => '375175671234',
                    'email' => 'sales@hostfly.by',
                    'additionalContacts' => [
                        [
                            'phone' => '375291231212',
                            'operator' => 'Velcom',
                            'schedule' => 'Пн-Пт: с 9:00 до 20:00',
                        ],
                        [
                            'phone' => '375291231212',
                            'operator' => 'MTS',
                            'schedule' => 'Сб-Вс: с 9:00 до 21:00',
                        ],
                        [
                            'phone' => '375291231212',
                            'operator' => 'Life',
                            'schedule' => '',
                        ],
                        [
                            'phone' => '375291231212',
                            'operator' => 'Факс',
                            'schedule' => '',
                        ],
                    ],
                    'workTime' => [
                         'Пн-Пт: с 9:00 до 20:00',
                         'Сб-Вс: с 9:00 до 21:00',

                    ]
                ]
            ]
        ];
        ?>

        <div class="vue-component" data-component="Header" data-initial='<?= json_encode($headerData); ?>'></div>
        <!-- /.vue-component -->