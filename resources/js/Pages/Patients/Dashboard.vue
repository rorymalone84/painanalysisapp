<template>
  <Head title="Admin Dashboard" />
  <div class="flex justify-between p-4 bg-white mt-3 rounded-xl shadow-lg">
    <h1 class="text-xl font-bold text-gray-700">Patient Home</h1>
    <div class="flex justify-between w-2/5">
      <div class="flex items-center space-x-6 pr-8">
        Welcome back, {{ name }}
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
              <h3 class="text-white text-3xl">Journal Entries</h3>
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
              <h5 class="text-white">Last Entry</h5>
              <h3 class="text-white text-3xl">
                last entry
                <span class="text-blue-400"
                  ><i class="fas fa-caret-up"></i
                ></span>
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
        <div class="bg-cyan-500 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right pr-1">
              <h5 class="text-white">This weeks entries</h5>
              <h3 class="text-white text-3xl">
                this weeks entries
                <span class="text-orange-400"
                  ><i class="fas fa-caret-up"></i
                ></span>
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
export default {
  props: ["doctorCount", "patientCount"],
  computed: {
    name() {
      return this.$page.props.auth.user.name;
    },
  },
};
</script>

<style>
</style>