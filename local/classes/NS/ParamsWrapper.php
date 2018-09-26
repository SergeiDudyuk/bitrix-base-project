<?php declare(strict_types=1);

namespace Local\NS;

class ParamsWrapper {
	
	protected $model;

	public function __construct($model) {
		$this->model = $model;
	}
	
	/**
	 * @param $arComponentParameters
	 * @param $arCurrentValues
	 * @return array;
	 */
	public function buildBitrixParameters($arComponentParameters, $arCurrentValues) {
		
		foreach($this->model as $parameterName => $parameterData) {
			
			$countParameterName = "{$parameterName}_COUNT";
			
			$arComponentParameters['PARAMETERS'][$countParameterName] = [
				'NAME'  => "{$parameterData['NAME']}: количество",
				'PARENT' => 'BASE',
				'TYPE'  => 'TEXT',
				'SIZE' => '30',
				'DEFAULT' => '',
				'VALUE' => '',
				'REFRESH' => 'Y'
			];
			
			$count = (int)$arCurrentValues[$countParameterName];
			
			if($count <= 0) {
				continue;
			}
			
			$index = 1;
			
			while($index <= $count) {
				
				$groupName = "{$parameterName}_{$index}";
				
				$arComponentParameters['GROUPS'][$groupName] = [
					'NAME' => "{$parameterData['NAME']} #{$index}"
				];
				
				foreach($parameterData['FIELDS'] as $subParameterName => $subParameterData) {
					$subParameterKey = "{$groupName}_{$subParameterName}";
					$arComponentParameters['PARAMETERS'][$subParameterKey] = $subParameterData;
					$arComponentParameters['PARAMETERS'][$subParameterKey]['PARENT'] = $groupName;
				}
				
				$index++;
			}
		}
		
		return $arComponentParameters;
	}
	
	/**
	 * @param $arParams
	 * @return array
	 */
	public function getWrappedParams($arParams) {
		
		$data = [];
		
		foreach($this->model as $groupName => $groupData) {
			
			$data[$groupName] = [];
			
			$groupFieldsNames = array_keys($groupData['FIELDS']);
			
			foreach($groupFieldsNames as $fieldName) {
				
				$index = 1;

				while(true) {
					
					$paramName = "{$groupName}_{$index}_$fieldName";
					
					if(!isset($arParams[$paramName])) {
						break;
					}
					
					// coz param's index starts from 1
					$groupIndex = $index - 1;
					
					if(!isset($data[$groupName][$groupIndex])) {
						$data[$groupName][$groupIndex] = [];
					}
					
					$data[$groupName][$groupIndex][$fieldName] = $arParams[$paramName];
					$index++;
				}
			}
		}
		
		return $data;
	}
}