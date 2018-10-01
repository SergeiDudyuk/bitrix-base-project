# Front-end development

To start any front-end development you need to:

* Start project
```bash
$ docker-compose up -d
``` 
* Attach to Node.js container's shell
```bash
$ bash shell-scripts/nodejs-container-start.sh
``` 
* Start development process inside container
```bash
 $ yarn development
``` 


More about `development` command you can find in [package.json](./../package.json)

### Client - server communication

Data transfer between server and client is pretty simple.

Back-end generates a bunch of special divs with data in attributes.

On the front-end side, module called [VueInvoker](./../local/assets/source/vue/VueInvoker.js) watches for this divs, reads them, initializes Vue component instances
 and replaces divs with Vue's virtual DOM for each component. 
 
Let's see how it works.
 
 ```php
<div class="vue-component" data-component="ExampleComponent" data-initial='"{"test":"value"}"'></div>
<!-- /.vue-component -->
 ```

`VueInvoker` runs on every page, takes component's name from `data-component` attribute, searches component's object in [ComponentsCollection](./../local/assets/source/vue/ComponentsCollection.js) and makes Vue instance, which will replace target. Data from `data-initial` attribute will fill component's `$data` object fields, which were defined in the component with `null`:

```js

export default {
  name: 'ExampleComponent',
  extends: BaseComponent,
  data () {
    return {
      test: null,
    }
  }
}
```

Here is how [ComponentsCollection](./../local/assets/source/vue/ComponentsCollection.js) looks:

```js

export const ComponentsCollection = {
  ExampleComponent: import('./components/exampleNamespace/ExampleComponent/component.vue' /* webpackChunkName: "Example" */),
}
```

For AJAX-requests feel free to use `VueResource` and implement REST-like endpoints in the `DOCUMENT_ROOT`


### Making markups from scratch

Thanks to Docker, front-end developers can start entire project with working PHP.

So, I think the best way to make markup and connect it to back-end is make a PHP-markup.

Front-end developer with his back-end buddy coordinate with each other how incoming Vue-component's JSON-data looks like and later work in parallel.

Example:

`/local/markup/main.php`

```php
<?php $bannerData = [
    'bannerClass' => 'banner-top',
    'img' => '/local/assets/images/bg/bg_main.png',
    'title' => 'Title',
    'description' => 'Description',
    'button' => [
        'text' => 'Button text',
        'href' => '/link/to/',
        'btnType' => 'default'
    ]
];
?>

<div class="vue-component" data-component="ButtonBanner" data-initial='<?= json_encode($bannerData); ?>'></div>
<!-- /.vue-component -->
```

Plain, simple and powerful, I think.