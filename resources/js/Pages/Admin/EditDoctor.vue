<template>
  <Head title="Edit Doctor" />

  <h1>Edit details for {{ doctor.name }}</h1>

  <form @submit.prevent="submit" class="mx-w-md mx-auto mt-8">
    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name"
        >Name</label
      >

      <input
        v-model="form.name"
        type="text"
        name="name"
        id="name"
        class="border border-gray-400 p-2 w-full"
        required
      />
      <!-- name validation -->
      <div
        v-if="form.errors.name"
        v-text="form.errors.name"
        class="text-red-500 mt-2"
      ></div>
    </div>
    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name"
        >Email</label
      >

      <input
        v-model="form.email"
        type="email"
        name="email"
        id="email"
        class="border border-gray-400 p-2 w-full"
        required
      />
      <!-- Email validation -->
      <div
        v-if="form.errors.email"
        v-text="form.errors.email"
        class="text-red-500 mt-2"
      ></div>
    </div>

    <!-- password validation -->
    <div
      v-if="form.errors.password"
      v-text="form.errors.password"
      class="text-red-500 mt-2"
    ></div>
    <div class="mb-6 mt-2">
      <button
        type="submit"
        class="bg-blue-500 text-white py-2 rounded px-4 hover:bg-blue-300"
        :disabled="form.processing"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  setup(props) {
    let form = useForm({
      name: props.doctor.name,
      email: props.doctor.email,
      password: "",
    });
    return { form };
  },
  props: {
    errors: Object,
    doctor: Object,
  },
  methods: {
    submit() {
      this.form.put(route("edit.doctor", this.doctor.id));
    },
  },
};
</script>


<style>
</style>