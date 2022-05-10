<template>
  <section class="p-6 bg-blue-100 sticky top-0 z-50">
    <header class="flex justify-between">
      <h1 class="font-bold text-lg">PAA</h1>
      <Nav />
    </header>
  </section>

  <section class="p-6 bg-orange-50 relative">
    <div class="max-w-3xl mx-auto bg-orange-50">
      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "./Nav.vue";
export default {
  components: { Nav },
};
</script>

<style>
</style>