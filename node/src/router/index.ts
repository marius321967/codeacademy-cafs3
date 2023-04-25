import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Guest/Home/Index.vue'
import Login from '../views/Guest/Login/Index.vue'
import About from '../views/Guest/About.vue'
import AppSpace from '../views/AppSpace/Index.vue'

import Tasks from '../views/AppSpace/Tasks/Index.vue'
import Task from '../views/AppSpace/Task/Index.vue'
import Admin from '../views/Admin/Index.vue'
import AdminHome from '../views/Admin/Home.vue'
import AdminUsers from '../views/Admin/Users.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: Home
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/about',
      component: About
    },
    {
      path: '/user',
      component: AppSpace,
      children: [
        {
          path: 'tasks',
          component: Tasks
        },
        {
          path: '/tasks/:id',
          component: Task,
          props: true
        }
      ]
    },
    {
      path: '/admin',
      component: Admin,
      children: [
        {
          path: '',
          component: AdminHome
        },
        {
          path: 'users',
          component: AdminUsers
        }
      ]
    }
  ],
  linkActiveClass: 'active',
  linkExactActiveClass: 'active'
})

export default router
