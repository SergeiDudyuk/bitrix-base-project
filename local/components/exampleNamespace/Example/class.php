<?php declare(strict_types=1);

class BenefitsComponent extends \Local\NS\BaseComponent {
	
	protected static $wrappedParamsModel = [
		'BENEFITS' => [
			'NAME' => 'Преимущество',
			'FIELDS' => [
				'TITLE' => [
					'NAME'  => 'Заголовок',
					'TYPE'  => 'TEXT',
					'DEFAULT' => ''
				],
				'DESCRIPTION' => [
					'NAME'  => 'Описание',
					'TYPE'  => 'TEXT',
					'DEFAULT' => ''
				],
				'IMG' => [
					'NAME'  => 'Путь до картинки',
					'TYPE'  => 'TEXT',
					'DEFAULT' => ''
				]
			]
		],
	];
	
	/**
	 * @return $this
	 */
	protected function prepareData() {
		
		$this->arResult['data'] = [
			'title' => $this->getTitle(),
			'fitsClass' => $this->getFitsClass(),
			'benefits' => $this->getBenefits(),
			'button' => $this->getButton()
		];

		return $this;
	}

    /**
     * @return string
     */
    protected function getFitsClass() {
        return $this->arParams['FITS_CLASS'];
    }

	/**
	 * @return string
	 */
	protected function getImagePath() {
		return $this->arParams['IMG'];
	}
	
	/**
	 * @return string
	 */
	protected function getTitle() {
		return $this->arParams['TITLE'];
	}
	
	/**
	 * @return string
	 */
	protected function getDescription() {
		return $this->arParams['DESCRIPTION'];
	}
	
	/**
	 * @return array
	 */
	protected function getButton() {
		return [
			'text' => empty($this->arParams['BUTTON_TEXT']) ? false : $this->arParams['BUTTON_TEXT'],
			'href' => empty($this->arParams['BUTTON_LINK']) ? false : $this->arParams['BUTTON_LINK']
		];
	}
	
	/**
	 * @return array
	 */
	protected function getBenefits() {
		
		$params = $this->getWrappedParams('BENEFITS');
		
		$data = [];
		
		foreach($params as $fields) {
			
			$data[] = [
				'description' => $fields['DESCRIPTION'],
				'imageUrl' => $fields['IMG'],
				'title' => $fields['TITLE'],
			];
			
		}
		
		return $data;
	}
}