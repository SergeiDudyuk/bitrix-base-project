/** static import example: */
// import exampleComponent from './components/exampleNamespace/ExampleComponent/component.vue'

export const ComponentsCollection = {
  /** if component needs to be lazy - use dynamic import() */
  ExampleComponent: import('./components/exampleNamespace/ExampleComponent/component.vue' /* webpackChunkName: "Example" */),

  /** otherwise use static import: */
  // exampleComponent: Promise.resolve(exampleComponent)
}