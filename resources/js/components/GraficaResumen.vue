<template>
  <div class="container">
    <bar-chart :datasets="datos"></bar-chart>
  </div>
</template>

<script>
import BarChart from "./BarChart2";
export default {
  components: { BarChart },
  props: {
    datos: Array
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
