import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AbonnementView from '../views/Abonnement.vue'
import ArticlesView from '../views/ArticlesView.vue'
import registerView from '../auth/register.vue'
import loginView from '../auth/login.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      
    },
    {
      path: '/abonnement',
      name: 'abonnement',
      component: AbonnementView
    },
    {
      path: '/viewArticles',
      name: 'ArticlesView',
      component: ArticlesView
    },
    {
      path: '/register',
      name: 'registerView',
      component: registerView
    },
    {
      path: '/login',
      name: 'loginView',
      component: loginView
    },
   
    
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
