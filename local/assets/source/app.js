import Vue from 'vue'
import VueResource from 'vue-resource'
import { ComponentsCollection } from './vue/ComponentsCollection'
import { vueInvoker } from './vue/VueInvoker'
import { main } from './scripts/Main'
import Vuetify from 'vuetify'
import VuePaginate from 'vue-paginate'
import YmapPlugin from 'vue-yandex-maps'
import VueSimpleSVG from 'vue-simple-svg'
import VueHtml2Canvas from 'vue-html2canvas'
import VueScrollTo from 'vue-scrollto'
import VueMask from 'v-mask'

Vue.use(VueMask)
Vue.use(VueScrollTo)
Vue.use(VueHtml2Canvas)
Vue.use(VueSimpleSVG)
Vue.use(YmapPlugin)
Vue.use(VuePaginate)
Vue.use(Vuetify, {
  theme: {
    blue: '#007DC6'
  }
})

Vue.filter('striphtml', function (value) {
  let div = document.createElement('div')
  div.innerHTML = value
  let text = div.textContent || div.innerText || ''
  return text
})

Vue.use(VueResource)

main.initModules()

vueInvoker.prepareComponents(ComponentsCollection).then((result) => {})

const eventHub = new Vue() // Single event hub

// Distribute to components using global mixin
Vue.mixin({
  data: function () {
    return {
      eventHub: eventHub
    }
  }
})

let pollifilClosest = (ELEMENT) => {
  ELEMENT.matches = ELEMENT.matches || ELEMENT.mozMatchesSelector || ELEMENT.msMatchesSelector || ELEMENT.oMatchesSelector || ELEMENT.webkitMatchesSelector
  ELEMENT.closest = ELEMENT.closest || function closest (selector) {
    if (!this) return null
    if (this.matches(selector)) return this
    if (!this.parentElement) {
      return null
    } else {
      return this.parentElement.closest(selector)
    }
  }
}

pollifilClosest(Element.prototype)

if (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) {
  console.log(document.querySelector('body'))
  window.addEventListener('click', function (e) {
    if (e.target.className.includes('v-overlay--active')) {
      eventHub.$emit('closePopupInIOS')
    }
  }, false)
}
