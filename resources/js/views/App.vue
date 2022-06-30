<template>
    <div>
        <header-component />
        <main-component />
        <footer-component />
    </div>
</template>

<script>
import FooterComponent from '../components/FooterComponent.vue'
import HeaderComponent from '../components/HeaderComponent.vue'
import MainComponent from '../components/MainComponent.vue'


export default {
    name: "App",
    components: {
        MainComponent,
        HeaderComponent,
        FooterComponent,
      
        

    }
}
</script>

<style lang="sass" scoped>

</style>