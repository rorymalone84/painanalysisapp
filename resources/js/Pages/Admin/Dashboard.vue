<template>
  <Head title="Admin Dashboard" />
  <div class="flex justify-between p-4 bg-white mt-3 rounded-xl shadow-lg">
    <h1 class="text-xl font-bold text-gray-700">Admin Dashboard</h1>
    <div class="flex justify-between w-2/5">
      <div class="flex items-center space-x-6 pr-8">
        Welcome back, {{ name }}
      </div>
    </div>
  </div>
  <div class="flex justify-between mt-4 space-x-4 s">
    <div
      class="
        bg-white
        w-1/3
        rounded-xl
        shadow-lg
        flex
        items-center
        justify-around
      "
    >
      <img src="https://i.imgur.com/VHc5SJE.png" alt="" />
      <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800">
          {{ doctorCount }}
        </h1>
        <span class="text-gray-500">Doctors</span>
      </div>
    </div>
    <div
      class="
        bg-white
        w-1/3
        rounded-xl
        shadow-lg
        flex
        items-center
        justify-around
      "
    >
      <img src="https://i.imgur.com/Qnmqkil.png" alt="" />
      <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800">{{ patientCount }}</h1>
        <span class="text-gray-500">Patients</span>
      </div>
    </div>
    <div
      class="
        bg-white
        w-1/3
        rounded-xl
        shadow-lg
        flex
        items-center
        justify-around
      "
    >
      <img src="https://i.imgur.com/dJeEVcO.png" alt="" />
      <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800"></h1>
        <span class="text-gray-500">appointments</span>
      </div>
    </div>
  </div>
  <div class="flex space-x-4">
    <div class="justify-between rounded-xl mt-4 p-4 bg-white shadow-lg">
      <h1 class="text-xl font-bold text-gray-800 mt-4">Today’s Status</h1>
      <div class="flex justify-between space-x-4 text-center mt-6">
        <div class="bg-indigo-50 rounded-xl p-10">
          <h3>8.7K</h3>
          <spnan>Analysis Posts</spnan>
        </div>
        <div class="bg-indigo-50 rounded-xl p-10">
          <h3>99</h3>
          <spnan>Appointments</spnan>
        </div>
        <div class="bg-indigo-50 rounded-xl p-10">
          <h3>30</h3>
          <spnan>Doctor Consults</spnan>
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