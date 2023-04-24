import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Tasks from '../views/Tasks.vue'
import Task from '../views/Task.vue'
import Admin from '../views/Admin/Index.vue'
import AdminHome from '../views/Admin/Home.vue'
import AdminUsers from '../views/Admin/Users.vue'
import Login from '../views/Login.vue'

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
      path: '/tasks',
      component: Tasks
    },
    {
      path: '/tasks/:id',
      component: Task,
      props: true
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
