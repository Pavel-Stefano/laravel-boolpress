<template>
    <main class="container my-5">
        <router-view></router-view>
       
    </main>
</template>

<script>
export default {
    name: "MainComponent",
    data(){
        return {
           cars:[],
        //    detail:null,
        }
    },
    methods: {
      
    },
    // created(){
    //     axios.get('/api/cars').then((response)=>{
    //         console.log(response.data);
    //         this.cars = response.data;
    //     })
    // }
}
</script>

<style lang="scss" scoped>

</style>

// php artisan migrate --path=/database/migrations/2022_06_29_093759_create_comments_table.php
