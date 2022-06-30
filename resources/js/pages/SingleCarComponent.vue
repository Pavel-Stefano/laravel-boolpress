<template>
    <section>
        <div>
            <h1>{{ car.name}}</h1>
            <div v-if="car.image">
                <img :src="`/storage/${car.image}`" alt="">
            </div>
            
            <p v-html="car.description">{{ }}</p>
            <ul v-if="car.tags">
                <li v-for="tag in car.tags" :key="tag.id">{{ tag.name}}</li>
            </ul>

            <div>
                <form @submit.prevent = "addComment()">
                    <label for="username">Inserisci il nome</label>
                    <input type="content" v-model="formData.username">

                    <label for="content">Inserisci il contenuto</label>
                    <input type="text" v-model="formData.content">
                    <button type="submit">Invia</button>
                </form>
                
                
            </div>
            <div>
                <h4>Commenti:</h4>
                <div v-for="comment in car.comments" :key="comment.id">
                    {{ comment.content }}
                </div>
            </div>
        </div>
        
       
    </section>
</template>

<script>
export default {
    name: "SingleCarComponent",
    data(){
        return {
            car: null,
            formData: {
                "username" : "",
                "content" : "",
                "car_id" : ""

            }
        }
        
    },

    methods: {
      addComment(){
        axios.post('/api/comments', this.formData).then((response)=> {
            console.log(response);
            this.car.comments.push(response.data);
        }).catch((error)=> {
            console.log(error);
        });
      }
    },

    mounted() {
        // console.log(this.$route.params);
        const slug = this.$route.params.slug;
        axios.get(`/api/cars/${slug}`).then((response)=> {
            this.car = response.data;
            this.formData.car_id = this.car.id;
        }).catch((error) => {
            this.$router.push({name: 'page-404'});
            // console.log(error);
        })
    }
 
}
</script>

<style lang="scss" scoped>

</style>