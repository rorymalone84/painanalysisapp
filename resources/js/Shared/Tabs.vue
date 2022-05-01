<template>
  <div
    :class="{
      'flex space-x-4': variant === 'horizontal',
    }"
  >
    <ul
      class="font-medium list-none bg-blue-700 bg-opacity-30 p-1.5 rounded-lg text-center overflow-auto whitespace-nowrap"
      :class="{
        'flex items-center mb-6': variant === 'vertical',
      }"
    >
      <li
        v-for="(tab, index) in tabList"
        :key="index"
        class="w-full px-4 py-1.5 rounded-lg"
        :class="{
          'text-black-500 bg-blue-100 shadow-xl font-medium': index + 1 === activeTab,
          'text-black': index + 1 !== activeTab,
        }"
      >
        <label
          :for="`${index}`"
          v-text="tab"
          class="cursor-pointer block"
        />
        <input
          :id="`${index}`"
          type="radio"
          :value="index + 1"
          v-model="activeTab"
          class="hidden"
        />
      </li>
    </ul>
    <template v-for="(tab, index) in tabList">
      <div
        :key="index"
        v-if="index + 1 === activeTab"
        class="flex-grow bg-white rounded-lg shadow-xl p-4"
      >
        <slot :name="`tabPanel-${index + 1}`" />
      </div>
    </template>
  </div>
</template>

<script>
export default {
  props: {
    tabList: {
      type: Array,
      required: true,
    },
    variant: {
      type: String,
      required: false,
      default: () => "vertical",
      validator: (value) => ["horizontal", "vertical"].includes(value),
    },
  },
  data() {
    return {
      activeTab: 1,
    };
  },
};
</script>