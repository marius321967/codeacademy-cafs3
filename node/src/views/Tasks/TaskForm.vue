<script setup lang="ts">
import { computed } from '@vue/reactivity'
import axios from 'axios'
import { reactive, ref } from 'vue'
import TaskPriorityInput from './TaskPriorityInput.vue'
import { Priority } from '../../interfaces'
import moment from 'moment'

const emit = defineEmits<{
  (e: 'taskCreated'): void
}>()

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

const errorMessage = ref<string | null>(null)

const errors = ref({})

const resetForm = () => {
  form.title = ''
  form.deadline = ''
  form.priority = Priority.low
  form.is_completed = false
}

const submit = () => {
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
}
</script>

<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">New task</h5>

      <div class="mb-3">
        <label for="title" class="form-label">Task</label>
        <input
          class="form-control"
          type="text"
          id="title"
          v-model.trim="form.title"
        />
        <div class="form-text text-danger" v-if="errors.title">
          {{ errors.title.join(' ') }}
        </div>
      </div>

      <div class="mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <date-picker
          v-model="form.deadline"
          format="yyyy-mm-dd HH:mm:ss"
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
        <button class="btn btn-outline-success" @click="submit">Create</button>
      </div>

      <div class="mb-3" v-if="errorMessage">
        <small class="text-danger">{{ errorMessage }}</small>
      </div>
    </div>
  </div>
</template>

<style>
.title-display {
  background-color: green;
  color: white;
  white-space: pre;
}
</style>
