<template>
  <Head title="Add new Doctor" />

  <h1>Register a new user</h1>

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

    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="user_role"
        >User role</label
      >
      <div class="p-6">
        <input
          v-model="form.role_id"
          class="pr-2"
          type="radio"
          id="user_role1"
          name="role_id"
          value="1"
        />
        <label class="p-4" for="user_role1">Patient</label>

        <input
          v-model="form.role_id"
          class="p-2"
          type="radio"
          id="user_role2"
          name="role_id"
          value="2"
        />
        <label class="p-2" for="user_role2">Doctor</label>

        <input
          v-model="form.role_id"
          class="p-2"
          type="radio"
          id="user_role3"
          name="role_id"
          value="3"
        />
        <label class="p-2" for="user_role3">Admin</label>
      </div>

      <!-- Email validation -->
      <div
        v-if="form.errors.role_id"
        v-text="form.errors.role_id"
        class="text-red-500 mt-2"
      ></div>
    </div>

    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="password"
        >Password</label
      >

      <input
        v-model="form.password"
        type="password"
        name="password"
        id="password"
        class="border border-gray-400 p-2 w-full"
        required
      />
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

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
  errors: Object,
});

let form = useForm({
  name: "",
  email: "",
  password: "",
  role_id: "",
});

let submit = () => {
  form.post("/admin/createUser", form);
};
</script>

<style>
</style>