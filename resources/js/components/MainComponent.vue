<template>
    <main>
        <h1>main</h1>
        <ul>
            <li v-for="(car, index) in cars" :key="index">
                {{ car.name}}
                <a href="#" @click="getDetail(car.slug, index)"> vedi dettaglio</a>
                <!-- <span v-if="car.detail">{{car.detail.slug}}</span> -->
            </li>
        </ul>
       
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
        getDetail(slug, index){
            axios.get('/api/cars/'+ slug).then((response)=>{
            // console.log(response.data);
            this.cars[index].detail = response.data;
            console.log(this.cars[index], 'detail')
        })
        }
    },
    created(){
        axios.get('/api/cars').then((response)=>{
            console.log(response.data);
            this.cars = response.data;
        })
    }
}
</script>

<style lang="sass" scoped>

</style>