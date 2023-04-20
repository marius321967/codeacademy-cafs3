import VueDatePicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import { createPinia } from 'pinia'
import { createApp } from 'vue'
import App from './App.vue'
import TaskPriorityIndicator from './components/TaskPriorityIndicator.vue'
import router from './router'

const app = createApp(App)

app.component('TaskPriorityIndicator', TaskPriorityIndicator)
app.component('DatePicker', VueDatePicker)

app.use(createPinia())
app.use(router)

app.mount('#app')
