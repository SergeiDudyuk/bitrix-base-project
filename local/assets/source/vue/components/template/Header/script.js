import BaseComponent from '../../../BaseComponent'
import LeftNav from '../../navs/LeftNav/component.vue'
import Loading from '../../extends/Loading/component.vue'
import Registration from '../../extends/Registration/component.vue'
import ForgotPassword from '../../extends/ForgotPassword/component.vue'
import axios from 'axios'

export default {
  name: 'Header',
  extends: BaseComponent,
  data () {
    return {
      by: null,
      searchText: '',
      cartScore: null,
      personName: null,
      inputHidden: null,
      userIsLogin: null,
      menu: null,
      menuBottom: null,
      countInCard: null,
      showRegistration: false,
      drawer: false,
      search: false,
      snackbar: false,
      showLogin: false,
      modalLogin: false,
      parameters: null,
      controlAlertMessage: false,
      rememberMe: true,
      alertMessage: {
        success: false,
        message: ''
      },
      loginForm: {
        login: '',
        password: ''
      }
    }
  },
  components: {
    LeftNav,
    Registration,
    ForgotPassword,
    Loading
  },
  mounted () {
    this.eventHub.$emit('Loading', true)
    this.eventHub.$data.userPersonByLang = this.by
    this.eventHub.$data.globalUserIsLogin = this.userIsLogin
    if (this.inputHidden) {
      this.showForgotPassword()
    }
    this.eventHub.$on('showRegistration', val => {
      this.showRegistration = val
    })
    this.eventHub.$on('closePopupInIOS', () => {
      this.drawer = false
    })
    this.eventHub.$on('putProductInList', (data) => {
      if (data.new) {
        this.putProductInList(data.listID, data.productID, data.count)
      } else {
        this.changeCountProductInList(data.listID, data.productID, data.count)
      }
    })
    this.eventHub.$on('deleteProductFromList', (data) => {
      this.deleteProductFromList(data.listID, data.productID)
    })
    this.eventHub.$on('updateCountInCard', () => {
      this.getCountProductsInList()
    })
    this.eventHub.$on('ShowAlertMessage', (data) => {
      this.controlAlertMessage = false
      this.controlAlertMessage = true
      this.alertMessage = data
    })
    this.instectPositionLoginForm()
    let startScroll = 0
    if (window.innerWidth > 700) {
      window.addEventListener('scroll', (event) => {
        if (!this.search) startScroll = window.scrollY
        setTimeout(() => {
          if (Math.abs(startScroll - window.scrollY) > 300) {
            startScroll = window.scrollY
            this.search = false
            this.snackbar = true
            setTimeout(() => {
              this.snackbar = false
            }, 3000)
          }
        }, 700)
      }, true)
    }
    document.addEventListener('keydown', (event) => {
      if (event.ctrlKey && event.shiftKey && event.keyCode === 70) {
        this.search = !this.search
      }
      if (event.keyCode === 27) {
        this.search = false
      }
    }, true)
    document.body.addEventListener('click', (event) => {
      if (event.srcElement.closest('.header-search') !== null) return
      this.search = false
    }, true)
  },
  methods: {
    goToSearch () {
      window.location.href = '/search?q=' + this.searchText
    },
    submitLogin () {
      axios.post('/local/api/loginPerson.php', {
        rememberMe: this.rememberMe,
        login: this.loginForm.login,
        password: this.loginForm.password
      }).then(res => {
        this.eventHub.$emit('ShowAlertMessage', {
          success: true,
          message: 'Вы успешно вошли и будете перенаправлены в личный кабинет!'
        })
        setTimeout(() => {
          window.location.href = '/personal'
        }, 333)
      }).catch(e => {
        console.log(e)
        this.eventHub.$emit('ShowAlertMessage', {
          success: false,
          message: e.response.data.message
        })
      })
    },
    goToPage (url) {
      window.location.href = url
    },
    editMap (route) {
      this.eventHub.$emit('updateMap', route.href)
      this.drawer = false
    },
    instectPositionLoginForm () {
      if (window.innerWidth < 1264) {
        let loginForm = document.querySelector('.popup-login.v-card')
        document.getElementById('mobileLoginForm').appendChild(loginForm)
      }
    },
    showForgotPassword () {
      this.showLogin = false
      this.eventHub.$emit('showForgotPass', {
        show: true,
        inputHidden: this.inputHidden
      })
    },
    getCountProductsInList () {
      axios.get('/local/api/checkCountProductOnListNow.php').then(res => {
        this.countInCard = res.data.count
        this.eventHub.$emit('needUpadateListProductAfterChange')
      }).catch(e => console.log(e))
    },
    putProductInList (listID, productID, count) {
      axios.put('/local/api/personListProductAction.php', {
        listID: listID || 0,
        productID: productID,
        count: count
      }).then(res => {
        this.getCountProductsInList()
        this.eventHub.$emit('ShowAlertMessage', {
          success: true,
          message: 'Товар добавлен в список!'
        })
      }).catch(e => {
        console.log(e)
        this.eventHub.$emit('ShowAlertMessage', {
          success: false,
          message: 'Что-то пошло не так'
        })
      })
    },
    changeCountProductInList (listID, productID, count) {
      axios.post('/local/api/personListProductAction.php', {
        listID: listID,
        productID: productID,
        count: count
      }).then(res => {
        this.getCountProductsInList()
        this.eventHub.$emit('ShowAlertMessage', {
          success: true,
          message: 'Количество товара успешно изменено!'
        })
      }).catch(e => {
        console.log(e)
        this.eventHub.$emit('ShowAlertMessage', {
          success: false,
          message: 'Что-то пошло не так'
        })
      })
    },
    deleteProductFromList (listID, productID) {
      axios.delete('/local/api/personListProductAction.php', {
        data: {
          listID: listID,
          productID: productID
        }
      }).then(res => {
        this.getCountProductsInList()
        this.eventHub.$emit('ShowAlertMessage', {
          success: true,
          message: 'Продукт удален из списка'
        })
      }).catch(e => {
        console.log(e)
        this.eventHub.$emit('ShowAlertMessage', {
          success: false,
          message: 'Что-то пошло не так'
        })
      })
    }
  }
}
