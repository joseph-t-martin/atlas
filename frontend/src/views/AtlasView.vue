<script setup lang="ts">
import { reactive, ref, onMounted } from 'vue'
import TableComponent from "@/components/TableComponent.vue";

const headings = ['Organisation', 'Description', 'Address'];
let data = reactive([]);

let suburb = ref('');
let area = ref('');
let region = ref('');
let totalRecords = ref(0);
let page = ref(1);
let size = ref(10);

function next() {
  page.value++;
  atlasLookup();
}

function previous() {
  if (page.value <= 1) {
    page.value = 1;
  } else {
    page.value--;
  }
  atlasLookup();
}

function search() {
  atlasLookup();
}

async function atlasLookup() {
  //Clear out the table here before we rerender it
  data.splice(0);
  let url = new URL('http://localhost:8080/api/v1/atlas');

  if (suburb.value) {
    url.searchParams.append('suburb', suburb.value);
  }

  if (area.value) {
    url.searchParams.append('area', area.value);
  }

  if (region.value) {
    url.searchParams.append('region', region.value);
  }

  url.searchParams.append('size', String(size.value));
  url.searchParams.append('page', String(page.value));

  let result = await fetch(url)
      .then((response) => response.json())
      .then((responseJSON) => {
        return responseJSON;
      });

  totalRecords.value = parseInt(result.number_of_results);


  for (const productRecord of result.products.product_record) {
    data.push(
        [
          productRecord.owning_organisation_name,
          productRecord.product_description,
          productRecord.addresses.address.address_line + ' '
          + productRecord.addresses.address.city + ' '
          + productRecord.addresses.address.postcode
        ]
    );
  }
}

onMounted(() => {
  atlasLookup();
});
</script>

<template>
  <div class="col-12">
    <div class="row">
      <h1>Atlas Lookup</h1>
    </div>
    <div class="row pt-3 pb-3">
      <div class="col-3">
        <input type="text" class="form-control" placeholder="Suburb" aria-label="Suburb" v-model="suburb">
      </div>
      <div class="col-3">
        <input type="text" class="form-control" placeholder="Area" aria-label="Area" v-model="area">
      </div>
      <div class="col-3">
        <input type="text" class="form-control" placeholder="Region" aria-label="Region" v-model="region">
      </div>
      <div class="col-3">
        <button type="button" class="col btn btn-primary" @click="search()">Search</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <TableComponent :headings=headings :data=data></TableComponent>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <button type="button" class="btn btn-link" @click="previous()" v-show="page > 1">Previous Page</button>
      </div>
      <div class="col-4">
        <select class="form-select text-center" aria-label="Number of results per page" @change="search()" v-model="size">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
        </select>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-link float-end" @click="next()" v-show="page < Math.ceil(totalRecords/size)">Next Page</button>
      </div>
    </div>
  </div>
</template>
