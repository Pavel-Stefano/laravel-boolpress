<template>
    <section>
        <div v-if="car">
            <h1>{{ car.name}}</h1>
            <p>{{ car.description}}</p>
            <ul v-if="car.tags">
                <li v-for="tag in car.tags" :key="tag.id">{{ tag.name}}</li>
            </ul>
            <img src="`/storage/${car.image}`" alt="">

        </div>
        
       
    </section>
</template>

<script>
export default {
    name: "SingleCarComponent",
    data(){
        return {
            car: null,
        }
        
    },
    methods: {
      
    },
    mounted() {
        // console.log(this.$route.params);
        const slug = this.$route.params.slug;
        axios.get(`/api/cars/${slug}`).then((response)=> {
            this.car = response.data;
        })
    }
 
}
</script>

<style lang="scss" scoped>

</style>