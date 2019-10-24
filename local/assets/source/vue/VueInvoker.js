import Vue from 'vue'
import $ from 'jquery'

const defaultOptions = {
  vueComponentSelector: '.vue-component',
  componentDataAttr: 'data-component',
  initialDataAttr: 'data-initial',
  anchorLinkSelector: 'a[href*=\'#\']',
  tolerance: {
    desktop: 300,
    mobile: 100
  },
  scrollToSpeed: 750,
  scrollToAdditional: -100,
  lazyImageSelector: 'img[data-src]',
  lazyImageSrcAttr: 'data-src',
  lazyBackgroundSelector: '.js-lazy-background[data-src]'
}

class VueInvoker {
  constructor (options = defaultOptions) {
    this.options = options
    this.options.isLazyMode = this.getParameterByName('fetchMode') !== 'Y'
    this.options.tolerance.current = this.isMobile() ? this.options.tolerance.mobile : this.options.tolerance.desktop
  }

  isMobile () {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
  }

  async prepareComponents (collection) {
    this.collection = collection

    await this.initAnchorJump()
    await this.initLazyLoading()
  }

  initLazyLoading () {
    return new Promise((resolve) => {
      let inProgress = false

      let startVueInstances = () => {
        if (!inProgress) {
          inProgress = true

          this.processComponents(this.collection, {}).then(() => {
            inProgress = false
          })
        }
      }

      let progressTimeout = false
      let throttleValue = 30

      const delayedVueStart = () => {
        if (!progressTimeout) {
          progressTimeout = setTimeout(() => {
            progressTimeout = false
            startVueInstances()
          }, throttleValue)
        }
      }

      $(document).scroll(delayedVueStart)
      $(document).resize(delayedVueStart)
      $(document).ready(() => {
        resolve()
        startVueInstances()
      })
    })
  }

  isLinkLocal (link) {
    return link.replace(/#[^#]*$/, '') === window.location.pathname
  }

  getAnchorFromLink (link) {
    return `#${link.substring(link.indexOf('#') + 1)}`
  }

  getParameterByName (name, url = window.location.href) {
    name = name.replace(/[[]]/g, '\\$&')
    let regex = new RegExp(`[?&]${name}(=([^&#]*)|&|#|$)`)
    let results = regex.exec(url)
    if (!results) return null
    if (!results[2]) return ''
    return decodeURIComponent(results[2].replace(/\+/g, ' '))
  }

  async initAnchorJump () {
    let anchor = window.location.hash

    if (anchor.length === 0) {
      return Promise.resolve(false)
    }

    return this.jumpToAnchor(anchor)
  }

  initAnchorClick ($context = document) {
    let $anchorLinks = $context.querySelectorAll(this.options.anchorLinkSelector)

    for (let $link of $anchorLinks) {
      let linkPath = $link.getAttribute('href')

      $link.onclick = async (e) => {
        if (!this.isLinkLocal(linkPath)) {
          return false
        }

        e.preventDefault()

        let anchor = this.getAnchorFromLink(linkPath)

        await this.jumpToAnchor(anchor)
      }
    }
  }

  async jumpToAnchor (anchor, $context = document) {
    let $nodes = $context.querySelectorAll(this.options.vueComponentSelector)

    for (let $item of $nodes) {
      await this.renderComponent($item)

      if (document.querySelectorAll(anchor).length > 0) {
        break
      }
    }

    let $target = $(anchor)

    if (!$target.length) {
      return Promise.resolve(false)
    }

    let topOffset = $target.offset().top + this.options.scrollToAdditional

    let scrollToTarget = new Promise((resolve) => {
      $('html, body').animate({
        scrollTop: topOffset
      }, this.options.scrollToSpeed, 'swing', () => {
        resolve()
      })
    })

    return scrollToTarget.then(() => {
      if (window.history.pushState) {
        window.history.pushState(null, null, anchor)
      } else {
        window.location.hash = anchor
      }
    })
  }

  isElementInViewport ($element) {
    let coordinates = $element.getBoundingClientRect()
    let html = document.documentElement
    let tolerance = this.options.tolerance.current

    return (
      coordinates.top >= 0 &&
      coordinates.left >= 0 &&
      coordinates.bottom <= (window.innerHeight || html.clientHeight) + tolerance &&
      coordinates.right <= (window.innerWidth || html.clientWidth)
    )
  }

  loadLazyImages ($context = document) {
    let $images = $context.querySelectorAll(this.options.lazyImageSelector)

    for (let $image of $images) {
      let imageObj = new Image()
      let imageSrc = $image.getAttribute(this.options.lazyImageSrcAttr)

      imageObj.src = imageSrc

      imageObj.onload = () => {
        $image.setAttribute('src', imageSrc)
        $image.removeAttribute(this.options.lazyImageSrcAttr)
      }
    }

    let $lazyContainers = $context.querySelectorAll(this.options.lazyBackgroundSelector)

    for (let $lazyContainer of $lazyContainers) {
      let imageObj = new Image()
      let imageSrc = $lazyContainer.getAttribute(this.options.lazyImageSrcAttr)

      imageObj.src = imageSrc

      imageObj.onload = () => {
        $lazyContainer.style.backgroundImage = `url(${imageSrc})`
        $lazyContainer.removeAttribute(this.options.lazyImageSrcAttr)
      }
    }

    return true
  }

  async processComponents (options) {
    this.options = Object.assign(this.options, options)

    const $nodes = document.querySelectorAll(this.options.vueComponentSelector)

    if (this.options.isLazyMode) {
      for (let $item of $nodes) {
        if (!this.isElementInViewport($item)) { // todo: fix isElementInViewport
          break
        }

        await this.renderComponent($item)
      }
    } else {
      for (let $item of $nodes) {
        this.renderComponent($item).then()
      }
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
        render: (createElement) => createElement(component, {
          props: {
            initial: data
          }
        }),
        mounted () {
          this.$nextTick(function () {
            resolve()
          })
        }
      })

      if (this.options.debug === true) {
        console.log(instance)
      }
    })
  }
}

export let vueInvoker = new VueInvoker()
