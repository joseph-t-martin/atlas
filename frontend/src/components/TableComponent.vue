<script setup lang="ts">
defineProps({
  headings: Array<string>,
  data: Array<Array<string | number>>,
})
</script>

<template>
  <table class="table table-striped table-bordered">
    <thead>
      <th data-bs-scope="col" v-for="heading in headings">{{ heading }}</th>
    </thead>
    <tbody>
      <tr v-if="data.length >= 1" v-for="row in data">
        <td v-for="column in row">{{ column }}</td>
      </tr>
      <tr v-else >
        <td colspan="3" class="text-center">No Results found</td>
      </tr>
    </tbody>
  </table>
</template>

<style scoped>
</style>
