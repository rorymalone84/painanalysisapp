<template>
  <Head title="Admin Dashboard" />
  <div class="flex justify-between p-4 bg-white mt-3 rounded-xl shadow-lg">
    <h1 class="text-xl font-bold text-gray-700">Patient Consultation Menu</h1>
    <div class="flex justify-between w-2/5">
      <div class="flex items-center pr-8">
        <b>{{ name }}</b>
      </div>
    </div>
  </div>
  <div class="flex justify-between mt-4">
    <div class="flex flex-wrap mb-2">
      <Link href="/patients/doctorIndex">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-1 text-right">
              <h2 class="text-white font-bold">Request a Consultation</h2>
            </div>
          </div>
        </div>
      </Link>
    </div>
    <div class="flex flex-wrap mb-2">
      <Link href="/patients/doctorIndex">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-1 text-right">
              <h2 class="text-white font-bold">View Latest Consultation</h2>
            </div>
          </div>
        </div>
      </Link>
    </div>
    <div class="flex flex-wrap mb-2">
      <Link href="/patients/consults">
        <div class="bg-cyan-500 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-1 text-right">
              <h2 class="text-white font-bold">View all Consultations</h2>
            </div>
          </div>
        </div>
      </Link>
    </div>
  </div>
  <Link href="/patients/home">
    <div class="bg-blue-500 border rounded shadow p-2">
      <div class="flex flex-row items-center">
        <div class="flex-1 text-center">
          <h5 class="text-white">Back</h5>
        </div>
      </div>
    </div>
  </Link>
</template>

<script>
</script>

<style>
</style>