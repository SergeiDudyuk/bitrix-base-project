<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="application/xhtml+xml">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Главная</title>

    <?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/assets/build/assets.header.html'); ?>
</head>
<body>
<div id="app" data-app="true">

    <?
    include 'include/header.php';
    ?>
    <div class="container pt-0">
        <div class="row wrap justify-content-lg-end">
            <div class="flex xs12 lg10">
                <div class="main-fon">
                    <?
                    $CarouselData = [
                        'items' => [
                            [
                                'title' => 'СОСЕДИ: СО ВКУСОМ КЛУБНИКИ',
                                'text' => 'Каждые 2 недели мы выпускаем новый буклет «особых» цен, в котором указаны товары со скидкой до 50%. Пришла пора «Клубничной акции»',
                                'href' => '#',
                                'src' => '/local/assets/images/slides/Main_banner.jpg',
                            ], [
                                'title' => 'посуда Bollire со скидкой до 40%',
                                'text' => 'Совершите покупку в сети Соседи на сумму чека от 20 рублей и получите купон-чек со скидкой до 40% на профессиональную посуду европейского качества Bollire ',
                                'href' => '#',
                                'src' => '/local/assets/images/slides/slide-2.png',
                            ], [
                                'title' => 'Яркие фишки в Соседях!',
                                'text' => 'Соберите 10 ЯРКИХ ФИШЕК, вклейте в ЯРКИЙ БУКЛЕТ и получите скидку 10% на следующую покупку!* ',
                                'href' => '#',
                                'src' => '/local/assets/images/slides/slide-3.jpg',
                            ],
                        ]
                    ];
                    ?>

                    <div class="vue-component" data-component="Carousel"
                         data-initial='<?= json_encode($CarouselData); ?>'></div>

                    <?
                    $ProductsData = [
                        'titleList' => 'Акции',
                        'btnText' => 'Все акции',
                        'btnHref' => '#',
                        'typesSale' => [
                            [
                                'title' => 'Скидки недели',
                                'id' => '0'
                            ],
                            [
                                'title' => 'Ярмарка выходного дня',
                                'id' => '1'
                            ],
                            [
                                'title' => 'Премиум товары',
                                'id' => '2'
                            ],
                            [
                                'title' => 'Barilla в Соседях -25%',
                                'id' => '3'
                            ],
                        ],
                        'items' => [
                            [
                                'icon' => '/local/assets/images/products-icons/im-kupilka-card.png',
                                'type' => '1',
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/1.png',
                                'price' => '2.99',
                                'priceBack' => '4.59',
                                'sale' => '30',
                                'typeSelect' => 'partner',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 1,
                            ],
                            [
                                'icon' => '/local/assets/images/products-icons/ic-umnyj-vybor.png',
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/2.png',
                                'price' => '0.79',
                                'priceBack' => '0.99',
                                'sale' => '20',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 0,
                            ],
                            [
                                'icon' => '/local/assets/images/products-icons/5.png',
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/3.png',
                                'price' => '1.79',
                                'priceBack' => '2.39',
                                'sale' => '25',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '1',
                                'typeSale' => 0,
                            ],
                            [
                                'icon' => '',
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/4.png',
                                'price' => '4.99',
                                'priceBack' => '7.65',
                                'sale' => '35',
                                'typeSelect' => 'partner',
                                'category' => 'nuts',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '2',
                                'typeSale' => 2,
                            ],
                            [
                                'type' => '4',
                                'title' => 'Пюре для детского <br>питания абибок <br>100гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/5.jpg',
                                'srcMobile' => '/local/assets/images/products/52.png',
                                'price' => '2.38',
                                'priceBack' => '3.57',
                                'saleText' => 'Цена за 3 штуки',
                                'typeSelect' => 'partner',
                                'category' => 'nuts',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 3,
                            ],
                            [
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/6.png',
                                'price' => '1.79',
                                'priceBack' => '3.49',
                                'sale' => '47',
                                'typeSelect' => 'partner',
                                'category' => 'nuts',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 2,
                            ],
                            [
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/7.png',
                                'price' => '1.99',
                                'priceBack' => '3.99',
                                'sale' => '35',
                                'typeSelect' => 'blago',
                                'category' => 'nuts',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '4',
                                'typeSale' => 1,
                            ],
                            [
                                'type' => '2',
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/8.png',
                                'price' => '1.49',
                                'saleText' => '0,60 в Купилку',
                                'typeSelect' => 'blago',
                                'category' => 'nuts',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '2',
                                'typeSale' => 4,
                            ],
                            [
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/9.png',
                                'price' => '2.99',
                                'priceBack' => '4.59',
                                'sale' => '30',
                                'typeSelect' => 'partner',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 1,
                            ],
                            [
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/10.png',
                                'price' => '2.99',
                                'priceBack' => '4.59',
                                'sale' => '30',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '1',
                                'typeSale' => 2,
                            ],
                            [
                                'type' => '2',
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/11.png',
                                'price' => '15.%',
                                'saleText' => 'Скидка',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 3,
                            ],
                            [
                                'type' => '4',
                                'title' => 'Гавайская новая <br>590гр.',
                                'href' => '#',
                                'imgIngredients' => '/local/assets/images/pizza/01.png',
                                'src' => '/local/assets/images/products/pizza.jpg',
                                'srcMobile' => '/local/assets/images/pizza_products/4.png',
                                'price' => '6.79',
                                'priceBack' => '8.99',
                                'saleText' => '',
                                'typeSelect' => 'partner',
                                'category' => 'nuts',
                                'description' => 'Соус для пиццы, сыр моцарелла, ветчина, филе ципленка обжаренное, ананас консервированный, перец пеперони, соус йогуртный, масло чесночное, орегано.',
                                'countInCardNow' => '3',
                                'typeSale' => 4,
                            ],
                            [
                                'title' => 'Арбуз<br>1 кг.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/im-arbuz.png',
                                'price' => '15.%',
                                'saleText' => 'Скидка',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '1',
                                'typeSale' => 0,
                            ],
                            [
                                'title' => 'Сладости мучные <br>ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/im-abrikos.png',
                                'price' => '15.%',
                                'saleText' => 'Скидка',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 0,
                            ],
                            [
                                'title' => 'Сладости мучные <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/im-arbuz.png',
                                'price' => '15.%',
                                'saleText' => 'Скидка',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '5',
                                'typeSale' => 4,
                            ],
                            [
                                'title' => 'ОРЕШКИ <br>400гр.',
                                'href' => '#',
                                'src' => '/local/assets/images/products/im-nesquik.png',
                                'price' => '15.%',
                                'saleText' => 'Скидка',
                                'typeSelect' => 'blago',
                                'category' => 'beer',
                                'description' => 'Эффективное удаление жира и бережная забота о коже рук. Удобное дозирование: колпачок оптимально и аккуратно дозирует средствою',
                                'countInCardNow' => '0',
                                'typeSale' => 2,
                            ],

                        ],
                    ];
                    ?>

                    <div class="vue-component" data-component="ProductList"
                         data-initial='<?= json_encode($ProductsData); ?>'></div>

                    <?
                    $BannerMainData_1 = [
                            'items' => [
                                [
                                    'title' => 'КУПИЛКА И<br> СУПЕРКУПИЛКА:<br> КУПИ И НАКОПИ',
                                    'text' => 'Накопив определенное количество бонусов у себя на карточке, покупатель получает возможность «рассчитаться» ими при покупке любых товаров в магазинах «Соседи», «Соседи-экспресс»',
                                    'href' => './404.php',
                                    'btnText' => 'узнать больше',
                                    'background' => '',
                                    'image' => '/local/assets/images/img-banner-1.png',
                                    'btnStyle' => '1',
                                ],
                                [
                                    'title' => 'NRAVIZZA PIZZA',
                                    'text' => 'Накопив определенное количество бонусов у себя на карточке, покупатель полчает аозможность',
                                    'href' => './pizza.php',
                                    'btnText' => 'все вкусные предложения',
                                    'background' => '/local/assets/images/img-banner-2.png',
                                    'image' => '',
                                    'btnStyle' => '2',
                                ]
                            ]
                    ];
                    ?>

                    <div class="vue-component" data-component="BannerMain"
                         data-initial='<?= json_encode($BannerMainData_1); ?>'></div>

                    <?
                    $NewsMainData = [
                        'title' => 'КУПИЛКА И<br> СУПЕРКУПИЛКА:<br> КУПИ И НАКОПИ',
                        'itemsNew' => [
                            [
                                'title' => 'Заботливые СОСЕДИ помогают развитию проекта «Патронажная сл...',
                                'date' => '31 мая 2018',
                                'href' => './stockCard.php',
                                'src' => '/local/assets/images/8.png',
                            ], [
                                'title' => 'Новый магазин СОСЕДИ в г. Жлобин!',
                                'date' => '27 апреля 2018',
                                'href' => './stockCard.php',
                                'src' => '/local/assets/images/7.png',
                            ], [
                                'title' => 'Час Земли в СОСЕДЯХ! Покупая энергосберагающие лампочки с 24 п...',
                                'date' => '23 марта 2018',
                                'href' => './stockCard.php',
                                'src' => '/local/assets/images/6.png',
                            ],
                        ],
                        'itemsCarousel' => [
                            [
                                'title' => ' «Тихие кассы»',
                                'text' => 'Рабочие места для людей с нарушениями слуха появились в Соседях более двух лет назад. Многие покупатели выбирают именно эти кассы и завели любимчиков.',
                                'href' => './stockCard.php',
                                'src' => '/local/assets/images/slide-newa.png',
                            ], [
                                'title' => ' «Тихие кассы»',
                                'text' => 'Рабочие места для людей с нарушениями слуха появились в Соседях более двух лет назад. Многие покупатели выбирают именно эти кассы и завели любимчиков.',
                                'href' => './stockCard.php',
                                'src' => '/local/assets/images/slide-newa.png',
                            ], [
                                'title' => ' «Тихие кассы»',
                                'text' => 'Рабочие места для людей с нарушениями слуха появились в Соседях более двух лет назад. Многие покупатели выбирают именно эти кассы и завели любимчиков.',
                                'href' => './stockCard.php',
                                'src' => '/local/assets/images/slide-newa.png',
                            ],
                        ]
                    ];
                    ?>

                    <div class="vue-component" data-component="NewsMain"
                         data-initial='<?= json_encode($NewsMainData); ?>'></div>

                    <?
                    $SocialData = [
                        'title' => 'КУПИЛКА',
                        'social' => [
                            [
                                'icon' => '/local/assets/images/icons/ic_FB.svg',
                                'count' => '8 741',
                                'href' => '#',
                                'text' => 'Подписчики в Facebook',
                                'gradient' => 'to top, #3b5997, #5872a6'
                            ],
                            [
                                'icon' => '/local/assets/images/icons/ic_VK.svg',
                                'count' => '8 741',
                                'href' => '#',
                                'text' => 'Друзья в Вконтакте',
                                'gradient' => 'to top, #4a76a8, #658ab5'
                            ],
                            [
                                'icon' => '/local/assets/images/icons/ic_OK.svg',
                                'count' => '8 741',
                                'href' => '#',
                                'text' => 'Соседи в одноклассниках',
                                'gradient' => 'to top, #ee8208, #f1952d'
                            ],
                            [
                                'icon' => '/local/assets/images/icons/ic_INSTA.svg',
                                'count' => '8 741',
                                'href' => '#',
                                'text' => 'Красивый и вкусный Instagram',
                                'gradient' => 'to bottom, rgba(119,70,188,1) 0%, rgba(203,48,125,1) 50%, rgba(249,126,44,1) 100%'
                            ],
                        ],
                    ];
                    ?>

                    <div class="vue-component" data-component="SocialCount"
                         data-initial='<?= json_encode($SocialData); ?>'></div>

                </div>
                <?
                include 'include/footer.php';
                ?>
            </div>
        </div>
    </div>


</div>
<!-- /#app -->
<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/assets/build/assets.footer.html'); ?>
</body>
</html>
