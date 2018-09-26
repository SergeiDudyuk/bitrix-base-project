<?php
if (php_sapi_name() !== 'cli') {
	die('Error! It is not a CLI mode... Aborting.');
}

$_SERVER['DOCUMENT_ROOT'] = __DIR__ . '/../../sites/s1';
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('BX_CRONTAB_SUPPORT', true);
define('BX_CRONTAB', true);
define('BX_NO_ACCELERATOR_RESET', true);
define('BX_BUFFER_USED', false);
@set_time_limit(0);
@ini_set('memory_limit', '1024M');
@ignore_user_abort(false);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

while (ob_get_level()) {
	ob_end_flush();
}