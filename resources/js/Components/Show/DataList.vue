<script setup>
defineProps({
  term: {
    type: String,
  }
});
</script>

<template>
  <dl>
    <dt class="text-gray-400 text-sm font-bold">{{  term }}</dt>
    <dd><slot/></dd>
  </dl>
</template>