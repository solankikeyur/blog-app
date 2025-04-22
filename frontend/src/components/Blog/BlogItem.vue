<template>
  <div
    class="flex flex-col md:flex-row items-start bg-white rounded-2xl shadow-md overflow-hidden"
  >
    <div class="p-6 flex-1">
      <h2 class="text-2xl font-semibold mb-2">{{ title }}</h2>
      <p class="text-gray-600 mb-4">
        {{ body?.substring(0, 100) }}
      </p>
    </div>
  </div>
</template>
<script setup lang="ts" >
const {title, body} = defineProps({
    title : String,
    body: String
})
</script>
