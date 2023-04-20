import { createApp } from 'vue'
import { createPinia } from 'pinia'
import TaskPriorityIndicator from './components/TaskPriorityIndicator.vue'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.component('TaskPriorityIndicator', TaskPriorityIndicator)
app.use(createPinia())
app.use(router)

app.mount('#app')
