# Front-end development

Data transfer between server and client is pretty simple.

Back-end generates a bunch of special divs with data in attributes.

On the front-end side, module called [VueInvoker](./../local/assets/source/vue/VueInvoker.js) watches for this divs, reads them, initializes Vue component instances
 and replaces divs with Vue's virtual DOM for each component. 
 
Let's see how it works.
 
 ```php
    <div class="vue-component" data-component="ExampleComponent" data-initial='"{"key":"value"}"'></div>
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