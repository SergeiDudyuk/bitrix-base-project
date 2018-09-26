<?php require __DIR__ . '/common.php';

\CAgent::CheckAgents();
\CEvent::CheckEvents();

if (\CModule::IncludeModule('subscribe')) {
	$cPosting = new \CPosting;
	$cPosting->AutoSend();
}