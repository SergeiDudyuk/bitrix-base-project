<?include 'include/header.php';?>

<?
$bannerData = [
    'bannerClass' => 'banner-top',
    'img' => '/local/assets/images/bg/bg_main.png',
    'title' => 'Молниеносный управляемый хостинг в одном клике',
    'description' => 'Получите доступ к самой быстрой и масштабируемой технологии хостинга для вашего бизнеса — всего за один клик. Плюс быстрая смена мощности, возможность оплаты только за используемые ресурсы, индивидуальные решения.',
    'button' => [
        'text' => 'Попробовать бесплатно',
        'href' => '#',
        'btnType' => 'default'
    ]
];
?>

<div class="vue-component" data-component="ButtonBanner" data-initial='<?= json_encode($bannerData); ?>'></div>
<!-- /.vue-component -->

<?
$ratesListData = [
    'rates' => [
        [
            'color' => 'leaf',
            'type' => 'Веб хостинг',
            'name' => 'Cloud хостинг',
            'price' => [
                'value' => '10.50',
                'currency' => 'рублей',
                'period' => 'месяц',
            ],
            'description' => 'Идеально подходит для личных веб- сайтов и блогов. Сэкономьте 10% — зарегестрируйтесь на 2 года.',
            'features' => [
                '1 сайт   2GB памяти',
                'Неограниченный трафик',
                'Безлимитное SSD хранилище',
                '2GB памя',
                '2 core CPU',
            ],
            'button' => [
                'text' => 'Тарифы',
                'href' => '#'
            ],
        ],
        [
            'color' => 'pinky',
            'type' => 'Виртуальный Сервер',
            'name' => 'Cloud VPS',
            'price' => [
                'value' => '49.50',
                'currency' => 'рублей',
                'period' => 'месяц',
            ],
            'description' => 'Для тех, чей бизнес быстроразвивается и  перерастет свой облачный хостинг или требует настроенного сервера.',
            'features' => [
                'RAM: 2GB',
                'VCPUs: 2',
                '60GB SSD хранилище',
                'Пропускная способость 5TB',
                '4 core CPU',
                'SSL протокол шифрования',
            ],
            'button' => [
                'text' => 'Тарифы',
                'href' => '#'
            ],
        ],
        [
            'color' => 'sea',
            'type' => 'Выделенный сервер',
            'name' => 'Бизнес Cloud',
            'price' => [
                'value' => '99.99',
                'currency' => 'рублей',
                'period' => 'месяц',
            ],
            'description' => 'Высокопроизводительный выделенный сервер для вашего бизнеса. Отличная производительность по доступным ценам.',
            'features' => [
                'CPU Intel Xeon E3/E5',
                '8 GB DDR3',
                '2 x 1TB 7.2K RPM 6Gb/s SATA3',
                'Неограниченная пропускная способность',
                '5 IP-адресов',
                '6 core CPU',
                'Сертификат SSL GeoTrust',
            ],
            'button' => [
                'text' => 'Тарифы',
                'href' => '#'
            ],
        ],
    ]
];
?>

<div class="vue-component" data-component="RatesShortList" data-initial='<?= json_encode($ratesListData); ?>'></div>
<!-- /.vue-component -->

<?
$benefitsData = [
    'title' => "Быстрый и масштабируемый хостинг мирового класса — у вас под рукой",
    'benefits' => [
        [
            'title' => 'Мощные процессоры',
            'description' => 'Бесперебойня работа на уровне 99,98% благодаря профессиональному серверному и сетевому оборудованию.',
            'imageUrl' => '/local/assets/images/icons/download_cloud.svg',
        ],
        [
            'title' => 'Персональные  SSL
сертификаты',
            'description' => 'Подключение SSL-сертификата обеспечивает работу сайта через защищённый, шифрованный канал.',
            'imageUrl' => '/local/assets/images/icons/protect_page.svg',
        ],
        [
            'title' => 'Оптимизированный WordPress ',
            'description' => 'Доступны тысячи бесплатных тем и плагинов, которые позволяют упростить разработку сайта.',
            'imageUrl' => '/local/assets/images/icons/connect-world.svg',
        ],
        [
            'title' => 'Конструктор сайтов',
            'description' => 'Самый простой способ создать сайт бесплатно, не прибегая к помощи программистов, дизайнеров и верстальщиков. ',
            'imageUrl' => '/local/assets/images/icons/customise_site.svg',
        ]
    ],
    'button' => [
        'text' => 'Подробнее',
        'href' => '#',
    ]
];
?>

<div class="vue-component" data-component="Benefits" data-initial='<?= json_encode($benefitsData); ?>'></div>
<!-- /.vue-component -->

<?
$sliderData = [
    'slides' => [
        [
            'title' => 'Бесплатный переезд',
            'description' => 'Если ваш сайт в настоящее время размещен не у нас, мы позаботимся о процессе миграции бесплатно. Мы обещаем быструю и эффективную миграцию без нарушений. Если ваш сайт в настоящее время размещен не у нас, мы позаботимся о процессе миграции бесплатно. Мы обещаем быструю и эффективную миграцию без нарушений. Если ваш сайт в настоящее время размещен не у нас, мы позаботимся о процессе миграции бесплатно. Мы обещаем быструю и эффективную миграцию без нарушений. Если ваш сайт в настоящее время размещен не у нас, мы позаботимся о процессе миграции бесплатно. Мы обещаем быструю и эффективную миграцию без нарушений.',
            'imageUrl' => '/local/assets/images/markup_image/slide1.png',
            'button' => [
                'text' => 'Подробнее',
                'href' => '#',
            ],
        ],
        [
            'title' => 'Конструктор сайтов',
            'description' => 'Самый простой способ создать сайт бесплатно, не прибегая к помощи программистов, дизайнеров и верстальщиков.',
            'imageUrl' => '/local/assets/images/markup_image/slide2.png',
            'button' => [
                'text' => 'Подробнее',
                'href' => '#',
            ],
        ],
        [
            'title' => 'Круглосуточная техподдержка',
            'description' => 'Наша команда по обслуживанию клиентов всегда готова помочь вам. Пишите или звоните в любое время суток.',
            'imageUrl' => '/local/assets/images/markup_image/slide3.png',
            'button' => [
                'text' => 'Задать вопрос',
                'href' => '#',
            ],
        ]
    ]
];
?>

<div class="vue-component" data-component="Slider" data-initial='<?= json_encode($sliderData); ?>'></div>
<!-- /.vue-component -->

<?
$newsData = [
    'title' => 'Новости и акции HOSTFLY',
    'elements' => [
        [
            'imageUrl' => '/local/assets/images/markup_image/news1.png',
            'date' => '20 мая 2018',
            'title' => 'Админ-дизайн: проектируем отказоустойчивые сети на VRRP и IP-телефонию',
            'detailUrl' => '#',
        ],
        [
            'imageUrl' => '/local/assets/images/markup_image/news2.png',
            'date' => '9 мая 2018',
            'title' => 'Бывают ли решения “для всех” и как облака меняют бизнес в Беларуси',
            'detailUrl' => '#',
        ],
        [
            'imageUrl' => '/local/assets/images/markup_image/news3.png',
            'date' => '31 марта 2018',
            'title' => 'Подборка хороших IT-событий на ближайшие дни',
            'detailUrl' => '#',
        ],
    ],
    'button' => [
        'text' => 'Все новости',
        'href' => '#',
    ],
];
?>

<div class="vue-component" data-component="NewsList" data-initial='<?= json_encode($newsData); ?>'></div>
<!-- /.vue-component -->

<?php include 'include/footer.php'; ?>