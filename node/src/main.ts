import VueDatePicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import { createPinia } from 'pinia'
import { createApp } from 'vue'
import App from './App.vue'
import TaskPriorityIndicator from './components/TaskPriorityIndicator.vue'
import router from './router'
import Card from './components/ui/Card.vue'
import SubmitButton from './components/ui/SubmitButton.vue'
import GuestPage from './components/GuestPage.vue'

const app = createApp(App)

app.component('TaskPriorityIndicator', TaskPriorityIndicator)
app.component('DatePicker', VueDatePicker)
app.component('SubmitButton', SubmitButton)
app.component('Card', Card)
app.component('GuestPage', GuestPage)

app.use(createPinia())
app.use(router)

app.mount('#app')
