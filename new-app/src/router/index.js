import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
// import ContcatList from '../components/ContcatList.vue'
// import AddContact from '../components/AddContact.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/contact-list',
      name: 'ContcatList',
      component: () => import('../views/ContcatList.vue')
    },
    {
      name: 'edit',
      path: '/edit/:id',
      component: () => import('../views/Edit.vue')
    },
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/add-contact',
      name: 'AddContact',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AddContact.vue')
    },
    // {
    //   path: '/add-contact',
    //   name: 'AddContact',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../components/AddContact.vue')
    // }
  ]
})

export default router
