import BaseComponent from '../../../BaseComponent'
import LineDotts from '../../extends/LineDotts/component.vue'

export default {
  name: 'Footer',
  extends: BaseComponent,
  data () {
    return {
      prettyLinks: null,
      cards: null,
      footerMenu: null,
      socialNetworks: null,
      parameters: null,
      menuFooter: null
    }
  },
  components: {
    LineDotts
  },
  mounted () {
    this.eventHub.$emit('Loading', false)
  }
}
