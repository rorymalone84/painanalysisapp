<template>
  <Head title="Admin Dashboard" />
  <div class="flex justify-between p-4 bg-white mt-3 rounded-xl shadow-lg">
    <h1 class="text-xl font-bold text-gray-700">Patient Home</h1>
    <div class="flex justify-between w-2/5">
      <div class="flex items-center space-x-6 pr-8">
        Welcome back,<br />
        <b>{{ name }}</b>
      </div>
    </div>
  </div>
  <div class="flex justify-between mt-4 space-x-4 s">
    <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Journal Entries</h5>
              <h3 class="text-white text-3xl">{{ journalCount }}</h3>
              <h5 class="text-white">Latest Entry</h5>
              <h3 class="text-white text-3xl">
                {{
                  moment(latestEntry.created_at).format("dddd, MMMM Do YYYY")
                }}
              </h3>
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
              <h5 class="text-white text-1xl">Last Entry Summary</h5>
              <br />
              <h3 class="text-white text-2xl">
                {{ latestEntry.question_1 }} pain, on the
                {{ latestEntry.question_2 }}, was felt during the
                {{ latestEntry.question_3 }}. To relive this,
                {{ latestEntry.question_9 }} was taken
                {{ latestEntry.question_10 }} times.
              </h3>
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
              <h5 class="text-slate-800">Appointments</h5>
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