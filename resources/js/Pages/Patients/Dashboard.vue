<template>
  <Head title="Admin Dashboard" />
  <div class="flex justify-between p-4 bg-white mt-3 rounded-xl shadow-lg">
    <h1 class="text-xl font-bold text-gray-700">Welcome back,</h1>
    <div class="flex justify-between w-2/5">
      <div class="flex items-center pr-8">
        <b>{{ name }}</b>
      </div>
    </div>
  </div>
  <div class="flex justify-between mt-4">
    <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-1 text-right">
              <h5 class="text-white underline">Journal Entries</h5>
              <h3 class="text-white text-3xl">{{ journalCount }}</h3>
              <h5 class="text-white pt-4 underline">Latest Entry</h5>
              <h3 class="text-white text-3xl">
                {{
                  moment(latestEntry.created_at).format("dddd, MMMM Do YYYY")
                }}
              </h3>
              <h5 class="text-white pt-4">Click to view all</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white text-1xl underline">Latest Entry</h5>
              <h3 class="text-white text-sm">
                <ul class="list-outside list-disc ml-6">
                  <br />
                  <h4 class="font-bold">Condition</h4>
                  <br />
                  <li>{{ latestEntry.question_1.toString() }} pain</li>
                  <li>On {{ latestEntry.question_2.toString() }}</li>
                  <li>In the {{ latestEntry.question_3.toString() }}</li>
                  <br />
                  <h4 class="font-bold">Treatment</h4>
                  <br />
                  <li>{{ latestEntry.question_9.toString() }}</li>
                  <li>{{ latestEntry.question_10.toString() }} doses</li>
                </ul>
              </h3>
              <h5 class="text-white pt-4">Click to view last entry</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pl-2 xl:pr-3">
        <div class="bg-cyan-100 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-slate-800 underline">Appointments</h5>
              <h3 class="text-slate-800 text-3xl">Coming soon</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: ["journalCount", "latestEntry"],
  computed: {
    name() {
      return this.$page.props.auth.user.name;
    },
  },
  methods: {
    moment: function () {
      return moment();
    },
  },
};
</script>

<style>
</style>