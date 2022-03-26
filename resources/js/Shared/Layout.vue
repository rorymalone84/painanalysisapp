<template>
  <section class="p-6 bg-blue-200">
    <header class="flex justify-between">
      <h1 class="font-bold text-lg">Pain Analysis App</h1>
      <p class="font-bold text-sm"></p>
      <Nav />
    </header>
  </section>

  <section class="p-6">
    <div class="max-w-3xl mx-auto">
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