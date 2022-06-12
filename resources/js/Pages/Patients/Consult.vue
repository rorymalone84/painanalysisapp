<template>
  <Head title="Request Consultation" />

  <h1 class="mb-6">
    This is a pain analysis consultation from {{ consult.name.toString() }}
  </h1>

  <label
    class="block mb-2 uppercase font-bold text-xs text-gray-700"
    for="password"
    >Diagnosis:</label
  >
  <h1 class="mb-6">{{ consult.diagnosis }}</h1>

  <label
    class="block mb-2 uppercase font-bold text-xs text-gray-700"
    for="password"
    >Prescription:</label
  >
  <h1 class="mb-6">{{ consult.prescription }}</h1>

  <label
    class="block mb-2 uppercase font-bold text-xs text-gray-700"
    for="password"
    >Please send another request for a checkup in :</label
  >
  <h1 class="mb-6">{{ consult.checkup }}</h1>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  props: {
    consult: Object,
  },
};
</script>

<style>
</style>