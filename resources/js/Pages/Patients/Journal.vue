  <!--Journal - an index of the users pain analysis posts by date - with tabs
  containining visualisations for day/week and month -->



<template>
  <div class="flex justify-between mb-6">
    <Head title="Registered Patients" />
    <div class="flex items-center">
      <h1 class="text-3xl">My Journal entries</h1>
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
        >+ Create Entry</Link
      >
    </div>
  </div>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="painAnalysis in painAnalyses" :key="painAnalysis.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ painAnalysis.id }}
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
                >
                  <Link
                    :href="route('edit.entry', painAnalysis.id)"
                    class="text-indigo-600 hover:text-indigo-900"
                  >
                    Edit
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
import Paginator from "../../Shared/Paginator.vue";
import inertia, { Inertia } from "@inertiajs/inertia";
import throttle from "lodash/throttle";

let props = defineProps({
  user: Object,
  filters: Object,
  painAnalyses: Object,
});
</script>

<style>
</style>