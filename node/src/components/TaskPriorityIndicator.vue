<script setup lang="ts">
import type { Priority } from '../interfaces'

const props = defineProps<{
  priority: Priority
}>()
</script>

<template>
  <span :class="['task-priority', 'task-priority-' + props.priority]"></span>
</template>

<style lang="scss">
.task-priority {
  display: inline-block;
  width: 16px;
  height: 16px;
  border-radius: 4px;
  margin-right: 4px;
  vertical-align: middle;

  &.task-priority-high {
    background-color: red;
  }
  &.task-priority-medium {
    background-color: rgb(0, 255, 166);
  }
  &.task-priority-low {
    background-color: rgb(175, 194, 187);
  }
}
</style>
