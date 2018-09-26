
            <?php $footerData = [
                'prettyLinks' => [
                    [
                        'class' => 'sea',
                        'title' => 'HOSTFLY — хостинг от профессионалов',
                        'buttonText' => 'Как мы работаем',
                        'buttonHref' => '#'
                    ],
                    [
                        'class' => 'leaf',
                        'title' => 'Круглосуточно <br><a class="link-as-text link-white" href="tel:+375171234567">+375 17 123-45-67</a>',
                        'buttonText' => 'Online-чат',
                        'buttonHref' => '#'
                    ]
                ],
                'cards' => [
                    [
                        'imgUrl' => '/local/assets/images/icons/logo-visa.png'
                    ],
                    [
                        'imgUrl' => '/local/assets/images/icons/logo-verifiedbyvisa.png'
                    ],
                    [
                        'imgUrl' => '/local/assets/images/icons/logo-securecode.png'
                    ],
                    [
                        'imgUrl' => '/local/assets/images/icons/logo-belcart.png'
                    ],
                    [
                        'imgUrl' => '/local/assets/images/icons/logo-assist.png'
                    ],
                    [
                        'imgUrl' => '/local/assets/images/icons/logo-mastercard.png'
                    ],
                ],
                'bottomMenu' => [
                    [
                        'text' => 'О компании',
                        'href' => '#',
                    ],
                    [
                        'text' => 'Новости',
                        'href' => '#',
                    ],
                    [
                        'text' => 'FAQ',
                        'href' => '#',
                    ], [
                        'text' => 'Награды и сертификаты',
                        'href' => '#',
                    ],
                    [
                        'text' => 'Регистрация доменов',
                        'href' => '#',
                    ],
                    [
                        'text' => 'Конструктор сайтов',
                        'href' => '#',
                    ],
                    [
                        'text' => 'Техническая техподдержка',
                        'href' => '#',
                    ],
                    [
                        'text' => 'Тарифы',
                        'href' => '#',
                    ],
                    [
                        'text' => 'Контакты',
                        'href' => '#',
                    ],
                ],
                'socialNetworks' => [
                    [
                        'class' => 'svg-icon-vk',
                        'href' => '#',
                    ],
                    [
                        'class' => 'svg-icon-fb',
                        'href' => '#',
                    ],
                    [
                        'class' => 'svg-icon-insta',
                        'href' => '#',
                    ],
                    [
                        'class' => 'svg-icon-ok',
                        'href' => '#',
                    ],
                    [
                        'class' => 'svg-icon-tw',
                        'href' => '#',
                    ]
                ],
                'copyright' => '© 2018 ООО «Хостфлай». Провайдер хостинга и облачных решений в Беларуси.<br><a class="link--copyright" href="http://newsite.by" target="_blank">Разработка сайта</a> — Новый сайт'
            ];
            ?>

            <div class="vue-component" data-component="Footer" data-initial='<?= json_encode($footerData); ?>'></div>
            <!-- /.vue-component -->

        </div>
        <!-- /#app -->

        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/assets/build/assets.footer.html'); ?>
    </body>
</html>