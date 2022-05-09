<template>
  <div class="flex justify-between mb-6">
    <Head title="Journal Entry" />
    <div class="flex items-center">
      <h1 class="text-3xl">
        Entry for
        {{ moment(painAnalysis.created_at).format("dddd, MMMM Do YYYY") }}
      </h1>
    </div>
  </div>
  <div class="flex justify-between mt-4 space-x-4 s">
    <div class="flex flex-wrap mb-2">
      <!-- Question 1 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">The pain was described as..</h5>
              <h3 class="text-white text-3xl">{{ painAnalysis.question_1 }}</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 2 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">The pain was located..</h5>
              <h3 class="text-white text-3xl">{{ painAnalysis.question_2 }}</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 3 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">During the</h5>
              <h3 class="text-white text-3xl">{{ painAnalysis.question_3 }}</h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 4 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-cyan-900 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">At a frequency of</h5>
              <h3 class="text-white text-3xl">{{ painAnalysis.question_4 }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Question 5 -->

  <div class="flex justify-between mb-6 pt-4">
    <Head title="Registered Patients" />
    <div class="flex items-center">
      <h1 class="text-3xl">How you rated your pain out of 10</h1>
    </div>
  </div>

  <div class="flex justify-between mt-4 space-x-4 s">
    <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Pain at its highest</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_5 }}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 6 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Pain at its lowest</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_6 }}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 7 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">How intense the pain was on this day</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_7 }}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 8 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-700 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">
                How intense the pain felt during recording this entry
              </h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_8 }}
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Meds and relief section-->
  <div class="flex justify-between mb-6 pt-4">
    <Head title="Registered Patients" />
    <div class="flex items-center">
      <h1 class="text-3xl">Medication and Relief</h1>
    </div>
  </div>

  <!-- Question 9 -->
  <div class="flex justify-between mt-4 space-x-4">
    <div class="flex flex-wrap mb-2">
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-500 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Medication taken</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_9 }}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 10 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-500 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Doses</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_10 }}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 11 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-500 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">Relief felt</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_11 }} out of 10
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- Question 12 -->
      <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-cyan-500 border rounded shadow p-2">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pl-1 pr-4">
              <i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
            </div>
            <div class="flex-1 text-right">
              <h5 class="text-white">How pain interfered with daily life</h5>
              <h3 class="text-white text-3xl">
                {{ painAnalysis.question_12 }} out of 10
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Question 9 -->
</template>

<script>
import moment from "moment";

export default {
  props: ["painAnalysis"],
  methods: {
    moment: function () {
      return moment();
    },
  },
};
</script>

<style>
</style>