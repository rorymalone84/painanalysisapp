<template>
  <Head title="Delete Doctor?" />

  <h1 class="mb-6 mt-6 mx-auto">
    Are you sure you wish to delete <b>{{ doctor.name }}</b
    >'s account?
  </h1>

  <div class="mb-6 mt-6">
    <button
      @click="back"
      class="
        bg-blue-500
        hover:bg-blue-700
        text-white
        font-bold
        py-2
        px-6
        border border-blue-700
        rounded
        m-4
      "
    >
      No
    </button>

    <button
      @click="deleteDoctor(doctor)"
      class="
        bg-red-500
        hover:bg-red-700
        text-white
        font-bold
        py-2
        px-6
        border border-blue-700
        rounded
      "
    >
      Yes
    </button>
  </div>
</template>

<script>
export default {
  props: {
    doctor: Array,
  },

  methods: {
    deleteDoctor(doctor) {
      this.$inertia.delete(route("delete.doctor", doctor));
    },
  },
};
</script>

<style>
</style>