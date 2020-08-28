<template>
    <div>
    <div v-for="(group, country) in listing_groups">
           <h1>Places in {{country}}</h1>
           <div class="listing-summaries">
               <listing-summary v-for="listing in group"
               :key="listing.id"
               :listing="listing">
               </listing-summary>
            </div>
        </div>
</div>
</template>
<script>

import {groupByCountry} from '../helpers'
import ListingSummary from './ListingSummary';
import axios from 'axios';
import routeMixin from '../route-mixin';

export default{
    mixins: [routeMixin],
    data(){
        return{
            listing_groups:[]
            }
    },
    methods:{
       assignData({listings}){
            this.listing_groups = groupByCountry(listings);
        }
    },
    components: {
        ListingSummary
    },

}
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

  .listing-summary-group {
    padding-bottom: 20px;
  }

  .listing-summaries {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    overflow: hidden;
  }
  .listing-summaries > .listing-summary {
    margin-right: 15px;
  }
  .listing-summaries > .listing-summary:last-child {
    margin-right: 0;
  }
</style>
