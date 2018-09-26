<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
	<title><? $APPLICATION->ShowTitle(); ?></title>
	<meta charset="<?= LANG_CHARSET ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?
    $APPLICATION->IncludeFile('/local/assets/build/assets.header.html');
    $APPLICATION->ShowHead();
    $APPLICATION->IncludeFile('/local/include/analytics.php');
    ?>
</head>

<body>
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>
	<!-- /#panel -->
 
	<div id="app" class="<? $APPLICATION->ShowProperty('APP_CLASS')?>">