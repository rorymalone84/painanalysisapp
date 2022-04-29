<template>
  <li>
    <ul class="overlay-panel-actions-primary">
      <li
        v-for="(tab, index) in tabs"
        :key="index"
        @click="currentTab = index"
        :class="{ active: currentTab === index }"
      >
        {{ tab }}
      </li>
    </ul>
    <div class="content-bd">
      <div class="tab-content">
        <div v-show="currentTab === 0">Weekly data</div>
        <div v-show="currentTab === 1">Monthly data</div>
        <div v-show="currentTab === 2">Quarterly data</div>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  data() {
    return {
      currentTab: 0,
      tabs: ["Weekly", "Monthly", "Quarterly"],
    };
  },
};
</script>

<style>
.active {
  color: red;
}
</style>