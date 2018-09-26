import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)

import { ComponentsCollection } from './vue/ComponentsCollection'
import { vueInvoker } from './vue/VueInvoker'

vueInvoker.prepareComponents(ComponentsCollection).then((result) => {})