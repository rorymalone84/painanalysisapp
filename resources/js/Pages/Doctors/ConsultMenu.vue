<template>
  <Head title="Settings" />
  <h1 class="text-3xl">Doctors Home</h1>
  <div class="flex justify-between p-4 bg-white mt-3 rounded-xl shadow-lg">
    <h1 class="text-xl font-bold text-gray-700">Consult Menu</h1>
    <div class="flex justify-between w-2/5">
      <div class="flex items-center space-x-6 pr-8">
        Welcome back,<br />
        <b>Dr. {{ name }}</b>
      </div>
    </div>
  </div>
  <div class="flex justify-between mt-4 space-x-4 s">
    <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <Link href="/doctors/consults/requests">
          <div class="bg-cyan-900 border rounded shadow p-2">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pl-1 pr-4">
                <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
              </div>
              <div class="flex-1 text-right">
                <h3 class="text-white">Consult Requests</h3>
                <h5 class="text-white text-3xl">Click to view</h5>
              </div>
            </div>
          </div>
        </Link>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <Link href="/doctors/consults/requests">
          <div class="bg-cyan-700 border rounded shadow p-2">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pl-1 pr-4">
                <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
              </div>
              <div class="flex-1 text-right">
                <h3 class="text-white">Consults Fulfilled</h3>
                <h5 class="text-white text-3xl">Click to view</h5>
              </div>
            </div>
          </div>
        </Link>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Return to dashboard</h5>
              <h3 class="text-white text-3xl">Go back</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
</script>

<style>
</style>