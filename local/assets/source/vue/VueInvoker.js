import Vue from 'vue'

const defaultOptions = {
  vueComponentSelector: '.vue-component',
  componentDataAttr: 'data-component',
  initialDataAttr: 'data-initial',
}

class VueInvoker {
  constructor (options = defaultOptions) {
    this.options = options
    this.instances = []
  }

  async prepareComponents (collection) {
    this.collection = collection

    await this.processComponents(this.collection)
  }

  async processComponents (options) {
    this.options = Object.assign(this.options, options)

    const $nodes = document.querySelectorAll(this.options.vueComponentSelector)

    for (let $item of $nodes) {
      this.renderComponent($item).then()
    }
  }

  async renderComponent ($item) {
    let componentData = $item.getAttribute(this.options.initialDataAttr)

    if (componentData !== undefined) {
      try {
        componentData = JSON.parse(componentData)
      } catch (e) {
        componentData = false
      }
    }

    let componentName = $item.getAttribute(this.options.componentDataAttr)

    let component = this.collection[componentName]

    if (component === undefined) {
      console.error('Missing component in the collection:', componentName)

      return Promise.resolve(false)
    }

    return this.createComponentInstance($item, component, componentData)
  }

  createComponentInstance (element, component, data) {
    return new Promise((resolve) => {
      let instance = new Vue({
        el: element,
        render: (r) => r(component, {
          props: {
            initial: data
          }
        }),
        mounted () {
          resolve()
        }
      })
      this.instances.push(instance)
    })
  }
}

export let vueInvoker = new VueInvoker()
