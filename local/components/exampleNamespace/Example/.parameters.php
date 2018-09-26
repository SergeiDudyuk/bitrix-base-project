<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/** @var array $arCurrentValues */
/** @var string $componentName */

$arComponentParameters = [
	'PARAMETERS' => [
		'TITLE' => [
			'NAME'  => 'Заголовок',
			'PARENT' => 'BASE',
			'TYPE'  => 'TEXT',
			'SIZE' => '30',
		],
		'BUTTON_TEXT' => [
			'NAME'  => 'Текст кнопки',
			'PARENT' => 'BASE',
			'TYPE'  => 'TEXT',
			'SIZE' => '30',
		],
		'BUTTON_LINK' => [
			'NAME'  => 'Ссылка на кнопке',
			'PARENT' => 'BASE',
			'TYPE'  => 'TEXT',
			'SIZE' => '30',
		]
	]
];

\CBitrixComponent::includeComponentClass($componentName);
$model = BenefitsComponent::getWrappedParamsModel();
$parametersObject = new \Local\NS\ParamsWrapper($model);
$arComponentParameters = $parametersObject->buildBitrixParameters($arComponentParameters, $arCurrentValues);