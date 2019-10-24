import svg4everybody from 'svg4everybody'
import 'slick-carousel'
import { triggers } from './Triggers'

class Main {
  initModules () {
    svg4everybody()
    triggers.init()
  }
}

export let main = new Main()
