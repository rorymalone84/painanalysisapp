<template>
  <Head title="Delete Entry?" />

  <h1 class="mb-6 mt-6 mx-auto">
    Are you sure you wish to delete the entry for <br />
    <b>{{ moment(painAnalysis.created_at).format("dddd, MMMM Do YYYY") }}</b
    >?
  </h1>

  <div class="mb-6 mt-6">
    <Link
      href="/patients/journal"
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
    </Link>

    <button
      @click="deleteEntry(painAnalysis)"
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
import moment from "moment";
export default {
  props: {
    painAnalysis: Array,
  },

  methods: {
    moment: function () {
      return moment();
    },
    deleteEntry(painAnalysis) {
      this.$inertia.delete(route("delete.entry", this.painAnalysis));
    },
  },
};
</script>

<style>
</style>