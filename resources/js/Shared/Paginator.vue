<template>
  <!-- Paginator -->
  <div>
    <Component
      :is="link.url ? 'Link' : 'Span'"
      v-for="link in links"
      :href="link.url"
      v-html="link.label"
      :key="link.index"
      class="px-1"
      :class="{
        'text-gray-400': !link.url,
        'font-bold text-blue-600': link.active,
      }"
    />
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
};
</script>

<style>
</style>