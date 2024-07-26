<template>
<input :type="type" :name="name" :id="id" v-model="modelValue" class="form-input" @input="$emit('update:modelValue', $event.target.value)" />
</template>
<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
  type: {
    type: String,
    default: 'text',
  },
  name: String,
  id: String,
  modelValue: [String, Number],
});

const emit = defineEmits(['update:modelValue']);
</script>

<style scoped>
.form-input {
  width: 100%;
  padding: 8px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}
</style>
