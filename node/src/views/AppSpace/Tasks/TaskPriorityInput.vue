<script setup lang="ts">
import { ref, watch } from 'vue'
import { computed } from '@vue/reactivity'
import type { Priority } from '../../../interfaces'

const props = defineProps<{
  modelValue: Priority
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: Priority): void
}>()

const modelValue = computed(() => props.modelValue)
const localModelValue = ref<Priority | null>(null)

watch(modelValue, (newValue) => (localModelValue.value = newValue), {
  immediate: true
})
watch(localModelValue, (newValue) =>
  emit('update:modelValue', newValue as Priority)
)
</script>

<template>
  <div class="form-check mb-3">
    <div>
      <input
        class="form-check-input"
        type="radio"
        value="high"
        id="taskPriorityInputHigh"
        v-model="localModelValue"
      />
      <label class="form-check-label" for="taskPriorityInputHigh">
        <task-priority-indicator priority="high"></task-priority-indicator>
        High priority
      </label>
    </div>

    <div>
      <input
        class="form-check-input"
        type="radio"
        value="medium"
        id="taskPriorityInputMedium"
        v-model="localModelValue"
      />
      <label class="form-check-label" for="taskPriorityInputMedium">
        <task-priority-indicator priority="medium"></task-priority-indicator>
        Medium priority
      </label>
    </div>

    <div>
      <input
        class="form-check-input"
        type="radio"
        value="low"
        id="taskPriorityInputLow"
        v-model="localModelValue"
      />
      <label class="form-check-label" for="taskPriorityInputLow">
        <task-priority-indicator priority="low"></task-priority-indicator>
        Low priority
      </label>
    </div>
    <!-- 
    <div class="form-text text-danger" v-if="errors.is_completed">
      {{ errors.is_completed.join(' ') }}
    </div> -->
  </div>
</template>
