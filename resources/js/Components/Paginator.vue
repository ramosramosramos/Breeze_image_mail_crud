<template>
  <Link v-for="link in items.links" 
  :key="link.label" :href="link.url || '#'" as='button' type="button"
  class="rounded-sm font-semibold text-yellow-50 "
   :class="{'bg-gray-800 text-gray-50':link.active,
    'text-slate-600':!link.url}" >
    <span v-html="link.label" class="p-3 "></span>
 </Link>
</template>
<script setup>
const props = defineProps({
  items: Object,
});
</script>