# Back-end development

It's easy one. 

You should store project- or component-specific functionality in Bitrix components (`/local/components`). 

Each component should be in `class.php` style and be inherited from some Base component class, which is stored in `/local/classes`.

Project-specific Bitrix component example:

```php
<?php declare(strict_types=1);

class ExampleComponent extends \Local\NS\BaseComponent {
	// ....
}
```


Reusable bitrix base component example:

```php
<?php declare(strict_types=1);

namespace Local\NS;

abstract class BaseComponent extends \CBitrixComponent {

	/**
	 * @param $params
	 * @return array
	 */
	public function onPrepareComponentParams($params) {
		
		$params['CACHE_TYPE'] = $params['CACHE_TYPE'] ? $params['CACHE_TYPE'] : 'A';
		$params['CACHE_TIME'] = $params['CACHE_TIME'] ? $params['CACHE_TIME'] : DEFAULT_CACHE_TIME;
		
		$params['API'] = $params['API'] === 'Y';

		return $params;
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
```

[Next: Front-end development](./front-end-development.md)