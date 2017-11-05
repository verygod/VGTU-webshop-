<template>
 <div>
  <input type="text" placeholder="what are you looking for?" v-model="query" v-on:keyup="autoComplete" class="uk-input">
  <div class="uk-card uk-card-body" v-if="results.length">
   <ul class="list-group">
    <li class="list-group-item" v-for="result in results">
     {{ result.name }}
    </li>
   </ul>
  </div>
 </div>
</template>
<script>
 export default{
  data(){
   return {
    query: '',
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 2){
     axios.get('/api/searchvue',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
   }
  }
 }
</script>
