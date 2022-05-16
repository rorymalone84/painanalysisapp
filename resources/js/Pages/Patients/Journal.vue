<template>
  <div class="flex justify-between mb-6">
    <Head title="Registered Patients" />
    <div class="flex items-center">
      <h1 class="text-3xl">Journal</h1>
      <Link
        href="/patients/form"
        class="
          bg-blue-600
          rounded
          text-sm text-white
          p-2
          hover:bg-blue-400
          ml-4
        "
        >+Entry</Link
      >
      <Link
        href="/patients/requestAppointment"
        class="
          bg-blue-600
          rounded
          text-sm text-white
          p-2
          hover:bg-blue-400
          ml-4
        "
        >+Appoinment</Link
      >
    </div>
  </div>

  <div class="flex flex-col min-w-full divide-y divide-gray-200">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div
        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
      >
        <h2 class="mb-4 font-bold text-center text-blue-900 text-1xl">
          Your condition over the last...
        </h2>
        <!-- tabs -->
        <div class="container mx-auto">
          <ul class="flex justify-center space-x-2 text-black py-2">
            <li
              v-for="(tab, index) in tabs"
              :key="index"
              @click="currentTab = index"
              class="
                inline-block
                px-4
                py-3
                bg-blue-100
                focus:outline-none
                rounded
              "
              :class="{ active: currentTab === index }"
            >
              {{ tab }}
            </li>
          </ul>
          <div class="min-w-full divide-y divide-blue-200">
            <Tabs
              class="w-11/12 lg:w-10/12 mx-auto mb-16 bg-blue"
              :tabList="tabList"
            >
              <template v-slot:tabPanel-1>
                <line-chart
                  class="min-w-full divide-y divide-gray-200"
                  :data="weeklyData"
                ></line-chart>
                <table class="min-w-full divide-y divide-gray-200">
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr
                      v-for="painAnalysis in pastWeekAnalyses"
                      :key="painAnalysis"
                    >
                      <td class="min-w-full divide-y divide-gray-200">
                        <div class="flex items-center">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{
                                moment(painAnalysis.created_at).format(
                                  "dddd, MMMM Do YYYY"
                                )
                              }}
                            </div>
                          </div>
                        </div>
                      </td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <Link
                          class="text-indigo-600 hover:text-indigo-900"
                          :href="route('show.entry', painAnalysis.id)"
                        >
                          view
                        </Link>
                      </td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      ></td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <Link
                          class="text-indigo-600 hover:text-indigo-900"
                          :href="route('deletePrompt.entry', painAnalysis.id)"
                        >
                          delete
                        </Link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </template>
              <!-- monthly tab -->
              <template v-slot:tabPanel-2>
                <line-chart
                  class="min-w-full divide-y divide-gray-200"
                  :data="monthlyData"
                ></line-chart>
                <table class="min-w-full divide-y divide-gray-200">
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr
                      v-for="painAnalysis in pastMonthAnalyses"
                      :key="painAnalysis"
                    >
                      <td class="min-w-full divide-y divide-gray-200">
                        <div class="flex items-center">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{
                                moment(painAnalysis.created_at).format(
                                  "dddd, MMMM Do YYYY"
                                )
                              }}
                            </div>
                          </div>
                        </div>
                      </td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <Link
                          class="text-indigo-600 hover:text-indigo-900"
                          :href="route('show.entry', painAnalysis.id)"
                        >
                          view
                        </Link>
                      </td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      ></td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <Link
                          class="text-indigo-600 hover:text-indigo-900"
                          :href="route('deletePrompt.entry', painAnalysis.id)"
                        >
                          delete
                        </Link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </template>
              <!-- Tab 3 -->
              <template v-slot:tabPanel-3>
                <line-chart
                  class="min-w-full divide-y divide-gray-200"
                  :data="quarterlyData"
                >
                </line-chart>
                <table class="min-w-full divide-y divide-gray-200">
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr
                      v-for="painAnalysis in quarterlyAnalyses"
                      :key="painAnalysis"
                    >
                      <td class="min-w-full divide-y divide-gray-200">
                        <div class="flex items-center">
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                              {{
                                moment(painAnalysis.created_at).format(
                                  "dddd, MMMM Do YYYY"
                                )
                              }}
                            </div>
                          </div>
                        </div>
                      </td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <Link
                          class="text-indigo-600 hover:text-indigo-900"
                          :href="route('show.entry', painAnalysis.id)"
                        >
                          view
                        </Link>
                      </td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      ></td>

                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        "
                      >
                        <Link
                          class="text-indigo-600 hover:text-indigo-900"
                          :href="route('deletePrompt.entry', painAnalysis.id)"
                        >
                          delete
                        </Link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </template>
            </Tabs>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import moment from "moment";
import inertia, { Inertia } from "@inertiajs/inertia";
import VueChartkick from "vue-chartkick";
import "chartkick/chart.js";

const tabList = ["Week", "Month", "Quarter"];

let props = defineProps({
  //weekly data objects from PainAnalysisController
  pastWeekAnalyses: Object,
  weeklyMeds: Object,
  weeklyPainIntensity: Object,
  weeklyPainRelief: Object,
  //monthly
  pastMonthAnalyses: Object,
  monthlyMeds: Object,
  monthlyPainIntensity: Object,
  monthlyPainRelief: Object,
  //quarterly
  quarterlyAnalyses: Object,
  quarterlyMeds: Object,
  quarterlyPainIntensity: Object,
  quarterlyPainRelief: Object,
});

let weeklyData = [
  //props data to charts
  //weekly data
  {
    name: "med doses",
    data: props.weeklyMeds,
  },
  {
    name: "pain intensity",
    data: props.weeklyPainIntensity,
  },
  {
    name: "reported relief",
    data: props.weeklyPainRelief,
  },
];

let monthlyData = [
  //props data to charts
  {
    name: "med doses",
    data: props.monthlyMeds,
  },
  {
    name: "pain intensity",
    data: props.monthlyPainIntensity,
  },
  {
    name: "reported relief",
    data: props.monthlyPainRelief,
  },
];

let quarterlyData = [
  //props data to charts
  {
    name: "med doses",
    data: props.quarterlyMeds,
  },
  {
    name: "pain intensity",
    data: props.quarterlyPainIntensity,
  },
  {
    name: "reported relief",
    data: props.quarterlyPainRelief,
  },
];
</script>

<style>
.active {
  font-weight: bold;
}
</style>