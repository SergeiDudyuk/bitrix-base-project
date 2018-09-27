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

`/local/markup/main.php`

```bash


```