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
        >+Create Entry</Link
      >
    </div>
  </div>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <!-- tabs -->
          <h2 class="mb-4 font-bold text-center text-blue-900 text-1xl">
            Your condition over the last...
          </h2>
          <div class="container mx-auto">
            <ul class="flex justify-center space-x-2 text-black">
              <li>
                <button
                  @click="currentTab(1)"
                  class="inline-block px-4 py-2 bg-blue-200 focus:outline-none"
                >
                  7 days
                </button>
              </li>
              <li>
                <button
                  @click="currentTab(2)"
                  class="inline-block px-4 py-2 bg-blue-200 focus:outline-none"
                >
                  30 days
                </button>
              </li>
              <li>
                <button
                  @click="currentTab(3)"
                  class="inline-block px-4 py-2 bg-blue-200 focus:outline-none"
                >
                  Quarter
                </button>
              </li>
            </ul>
            <div class="p-3 mt-6 text-center bg-white">
              <div v-if="tab === 1">
                {{ painAnalyses.question_10 }}
              </div>
              <div v-if="tab === 2">
                Tab 2 Content show Lorem ipsum dolor sit amet consectetur,
                adipisicing elit. aliquam rem. Exercitationem corporis eius
                voluptatibus.
              </div>
              <div v-if="tab === 3">
                Tab 3 Content show Lorem ipsum dolor sit amet consectetur
                adipisicing elit.
              </div>
            </div>
          </div>
        </div>

        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="painAnalysis in painAnalyses" :key="painAnalysis">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{
                          moment(painAnalysis.created_at).format(
                            "dddd, MMMM Do YYYY, h:mm:ss a"
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
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import moment from "moment";
import inertia, { Inertia } from "@inertiajs/inertia";

const tab = ref(1);
const currentTab = (tabNumber) => (tab.value = tabNumber);

let props = defineProps({
  painAnalyses: Object,
});
</script>

<style>
</style>