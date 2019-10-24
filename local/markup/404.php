<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Страница не найдена 404</title>

    <?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/assets/build/assets.header.html'); ?>
</head>
<body>
<div id="app">

    <?
    $pageData = [
        'img' => '/local/assets/images/bg_404.jpg',
        'icon' => '/local/assets/images/logo-sosedi-small.svg',
        'title' => '404',
        'description' => 'Неправильно набран адрес, или такой страницы на сайте больше не существует. Рекомендуем продолжить поиск с главной страницы.',
    ];
    ?>

    <div class="vue-component" data-component="Page404" data-initial='<?= json_encode($pageData); ?>'></div>
    <!-- /.vue-component -->

</div>
<!-- /#app -->
<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/local/assets/build/assets.footer.html'); ?>
</body>
</html>
