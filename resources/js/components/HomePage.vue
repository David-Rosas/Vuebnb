<template>
  <div class="home-container">
    <listing-summary-group
      v-for="(group, country) in listing_groups"
      :key="country"
      :listings="group"
      :country="country"
      class="listing-summary-group"
    ></listing-summary-group>
  </div>
</template>
<script>
import { groupByCountry } from "../helpers";
import ListingSummaryGroup from "./ListingSummaryGroup";

export default {
  computed: {
    listing_groups() {
      return groupByCountry(this.$store.state.listing_summaries);
    },
  },

  components: {
    ListingSummaryGroup,
  },
};
</script>
<style>
.home-container {
  margin: 0 auto;
  padding: 0 25px;
}

@media (min-width: 1131px) {
  .home-container {
    width: 1080px;
  }
}
</style>
