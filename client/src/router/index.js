import Vue from 'vue'
import Router from 'vue-router'
import Credit from '@/components/pages/CreditPage'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Credit',
      component: Credit
    }
  ]
})
