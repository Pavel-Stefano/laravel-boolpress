<template>
    <section>
        <h1>Cars</h1>
        <ul v-if="cars.length > 0">
            <li v-for="(car, index) in cars" :key="car.id">
                {{index}} - {{car.name}}
                <router-link :to="{ name: 'single-car', params: { slug: car.slug} }"> Visualizza Auto </router-link>

            </li>
        </ul>
        
       
    </section>
</template>

<script>
export default {
    name: "CarsComponent",
    data(){
        return {
            cars: [],
        }
    },
    methods: {
      
    },
    created() {
        axios.get('/api/cars').then((response)=> {
            console.log(response.data);
            this.cars = response.data;
        }).catch((error) => {
            console.log(error);
        })
    }
 
}
</script>

<style lang="scss" scoped>

</style>