import { vueInvoker } from './VueInvoker'
import $ from 'jquery'

const baseComponent = {
  props: [
    'initial'
  ],
  created () {
    if (this['initial'] !== undefined) {
      for (let dataName in this.$data) {
        if (!this.$data.hasOwnProperty(dataName)) { continue }

        if (this.initial[dataName] !== undefined) {
          this.$data[dataName] = this.initial[dataName]
        }
      }
    }
  },
  updated () {
    vueInvoker.loadLazyImages(this.$el)
    vueInvoker.initAnchorClick(this.$el)
  },
  mounted () {
    vueInvoker.loadLazyImages(this.$el)
    vueInvoker.initAnchorClick(this.$el)

    this.$on('scrollTo', function (target) {
      $('html, body').animate({
        scrollTop: $(target).offset().top - 100
      }, 1000)
    })
  },
  methods: {
    getParameterByName (name, url = window.location.href) {
      return vueInvoker.getParameterByName(name, url)
    },
    renderError (error) {
      return error
    },
    getRubles (price) {
      return price.value.split('.')[0]
    },
    getPennies (price) {
      return price.value.split('.')[1]
    },
    getCurrency (price) {
      return price.currency
    },
    getPeriod (price) {
      return price.period
    },
    getFormattedPhone (phone, returnObj = true) {
      let formattedPhone = phone.replace(/[^0-9]/g, '')
        .replace(/(\d{3})(\d{2})(\d{3})(\d{2})(\d{2})/, '+$1 $2 $3-$4-$5')

      if (returnObj) {
        let partsNumber = formattedPhone.split(' ')

        return {
          'countryCode': partsNumber[0],
          'operatorCode': partsNumber[1],
          'simpleNumber': partsNumber[2]
        }
      } else {
        return formattedPhone
      }
    },
    createFullUrl (path, getParams) {
      let resultUrl = path

      Object.keys(getParams).forEach((keyValue, index) => {
        let getParam = ''

        let encodedParam = encodeURIComponent(getParams[keyValue])

        if (index > 0) {
          getParam += `&${keyValue}=${encodedParam}`
        } else {
          getParam += `${keyValue}=${encodedParam}`
        }

        resultUrl += getParam
      })

      return resultUrl
    }
  }
}

export default baseComponent
