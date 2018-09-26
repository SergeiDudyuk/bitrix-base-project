<?php declare(strict_types=1);

namespace Local\NS;

abstract class BaseComponent extends \CBitrixComponent {

	protected static $wrappedParamsModel;
	
	protected $wrappedParams;
	
	/**
	 * @param $params
	 * @return array
	 */
	public function onPrepareComponentParams($params) {
		
		$params['CACHE_TYPE'] = $params['CACHE_TYPE'] ? $params['CACHE_TYPE'] : 'A';
		$params['CACHE_TIME'] = $params['CACHE_TIME'] ? $params['CACHE_TIME'] : DEFAULT_CACHE_TIME;
		
		$params['API'] = $params['API'] === 'Y';
		
		$model = self::getWrappedParamsModel();
		$paramsWrapper = new ParamsWrapper($model);
		$this->wrappedParams = $paramsWrapper->getWrappedParams($params);
		
		return $params;
	}
	
	/**
	 * @return mixed
	 */
	public static function getWrappedParamsModel() {
		return static::$wrappedParamsModel;
	}
	
	/**
	 * @param string|null $paramName
	 * @return array|null
	 */
	public function getWrappedParams($paramName = null) {
		
		if($paramName) {
			return $this->wrappedParams[$paramName];
		}
		
		return $this->wrappedParams;
	}

    /**
     * @param $templateName
     * @param $context
     * @return string
     */
    protected function render($templateName, $context) {

        $loader = new \Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/local/views');

        $twig = new \Twig_Environment($loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'] . '/bitrix/cache/twig',
            'debug' => true,
        ]);

        $twig->addExtension(new \Twig_Extension_Debug());

        $html = $twig->render("$templateName.twig", $context);

        return $html;
    }
	
	/**
	 * @return $this
	 */
	protected function fetchData() {
		return $this;
	}
	
	/**
	 * @param $message
	 * @return $this
	 */
	protected function addError(string $message) {
		$this->arResult['data']['errors'][] = $message;
		return $this;
	}
	
	/**
	 * @param $messages
	 * @return $this
	 */
	protected function addErrors(array $messages) {
		
		foreach($messages as $message) {
			$this->arResult['data']['errors'][] = $message;
			
		}
		
		return $this;
	}
	
	/**
	 * @return $this
	 */
	protected function prepareData() {
		return $this;
	}
	
	/**
	 * @return $this
	 */
	protected function prepareDataJson() {
		
		if(!empty($this->arResult['data'])) {
			$this->arResult['json'] = json_encode($this->arResult['data']);
		}
		
		return $this;
	}
	
	/**
	 * @return $this
	 */
	protected function printJson() {
		
		if(empty($this->arResult['json'])) {
			$this->prepareDataJson();
		}
		
		echo $this->arResult['json'];
		
		return $this;
	}
	
	/**
	 * @param $fileId
	 * @return $this
	 */
	protected function addFile($fileId) {
		
		$this->arResult['FILES'][$fileId] = $fileId;
		
		return $this;
	}
	
	protected function getFile($fileId) {
		return $this->arResult['FILES'][$fileId];
	}
	
	/**
	 * @return $this
	 */
	protected function fetchFiles() {
		
		if (!empty($this->arResult['FILES'])) {
			
			$dbl = \CFile::GetList([], [
				'@ID' => implode(',', $this->arResult['FILES'])
			]);
			
			$this->arResult['FILES'] = [];
			
			$uploadDir = \COption::GetOptionString('main', 'upload_dir', 'upload');
			
			while ($result = $dbl->fetch()) {
				$id = $result['ID'];
				$subDir = $result['SUBDIR'];
				$fileName = $result['FILE_NAME'];
				
				$this->arResult['FILES'][$id] = "/$uploadDir/$subDir/$fileName";
			}
		}
		
		return $this;
	}
	
	
	/**
	 * @return $this
	 */
	protected function processApi() {
		return $this;
	}
	
	/**
	 * @return $this
	 */
	protected function processRegular() {
		
		if($this->startResultCache()) {
			$this->fetchData();
			$this->fetchFiles();
			$this->prepareData();
			$this->prepareDataJson();
			$this->endResultCache();
		}
		
		if(!empty($this->arResult['data'])) {
			$this->renderComponent();
		}
		
		return $this;
	}
	
	/**
	 * @return $this
	 */
	public function executeComponent() {
		
		if($this->arParams['API']) {
			$this->processApi();
		} else {
			$this->processRegular();
		}
		
		return $this;
	}
	
	/**
	 * Wrapper method above includeComponentTemplate
	 *
	 * @param string $templateName
	 * @return $this
	 */
	public function renderComponent($templateName = '') {
		
		$this->arResult['componentName'] = explode(':', $this->__name)[1];
		
		$this->includeComponentTemplate($templateName);
		
		return $this;
	}
}