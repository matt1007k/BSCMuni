<template>
  <div class="container">
    <bar-chart :datasets="datos"></bar-chart>
  </div>
</template>

<script>
import BarChart from "./BarChart";
export default {
  components: { BarChart },
  props: {
    datos: Array
  },
  mounted() {
    console.log(this.datos);
  }
};
</script>
