<script setup lang="ts">
import { computed } from '@vue/reactivity'
import axios from 'axios'
import { onMounted, reactive, ref, watch } from 'vue'
import TaskPriorityInput from './TaskPriorityInput.vue'
import { Priority, type ITask } from '../../../interfaces'
import moment from 'moment'

const props = defineProps<{
  task: ITask | null
}>()

const emit = defineEmits<{
  (e: 'taskCreated'): void
  (e: 'taskUpdated'): void
}>()

const isBusy = ref(false)
const errorMessage = ref<string | null>(null)
const errors = ref({})
const titleInputElement = ref<HTMLInputElement | null>(null)

const form = reactive({
  title: '',
  deadline: '',
  priority: Priority.low,
  is_completed: false
})

const formNormalized = computed(() => ({
  ...form,
  deadline: form.deadline
    ? moment(form.deadline).format('YYYY-MM-DD HH:mm:ss')
    : null
}))

const isEditing = computed(() => props.task !== null)

const resetForm = () => {
  form.title = ''
  form.deadline = ''
  form.priority = Priority.low
  form.is_completed = false
}

const submit = () => {
  isBusy.value = true

  axios
    .post('http://localhost/tasks', formNormalized.value)
    .then(() => {
      errorMessage.value = null
      errors.value = {}
      resetForm()
      emit('taskCreated')
    })
    .catch((err) => {
      errorMessage.value = err.response.data.message
      errors.value = err.response.data.errors
    })
    .then(() => (isBusy.value = false))
}

watch(
  () => props.task,
  (newValue) => {
    if (newValue === null) {
      resetForm()
    } else {
      form.title = newValue.title
      form.deadline = newValue.deadline || ''
      form.priority = newValue.priority
      form.is_completed = newValue.is_completed
    }
  }
)

onMounted(() => titleInputElement.value?.focus())
</script>

<template>
  <card>
    <template #title>
      {{ isEditing ? 'Edit task' : 'New task' }}
    </template>

    <div class="mb-3">
      <label for="title" class="form-label">Task</label>
      <input
        class="form-control"
        type="text"
        id="title"
        v-model.trim="form.title"
        ref="titleInputElement"
      />
      <div class="form-text text-danger" v-if="errors.title">
        {{ errors.title.join(' ') }}
      </div>
    </div>

    <div class="mb-3">
      <label for="deadline" class="form-label">Deadline</label>
      <date-picker
        v-model="form.deadline"
        format="yyyy-MM-dd HH:mm:ss"
      ></date-picker>
      <div class="form-text text-danger" v-if="errors.deadline">
        {{ errors.deadline.join(' ') }}
      </div>
    </div>

    <task-priority-input v-model="form.priority"></task-priority-input>

    <div class="form-check mb-3">
      <input
        class="form-check-input"
        id="is_completed"
        type="checkbox"
        v-model="form.is_completed"
      />
      <label class="form-check-label" for="is_completed">Completed</label>
      <div class="form-text text-danger" v-if="errors.is_completed">
        {{ errors.is_completed.join(' ') }}
      </div>
    </div>

    <div class="mb-3">
      <submit-button :disabled="isBusy" @click="submit">
        <div class="spinner-border spinner-border-sm" v-if="isBusy"></div>
        Create
      </submit-button>
    </div>

    <div class="mb-3" v-if="errorMessage">
      <small class="text-danger">{{ errorMessage }}</small>
    </div>
  </card>
</template>

<style>
.title-display {
  background-color: green;
  color: white;
  white-space: pre;
}
</style>
