<template>
    <header class="navbar-dark bg-primary">
        
        <nav class="navbar navbar-expand-lg container">
            <!-- <a class="navbar-brand" href="#">Mix auto</a> -->
            <router-link :to="{ name: menuItem[0].routeName }" class="navbar-brand">
                Mix Auto
            </router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <div v-for="(item, index) in menuItem" :key="index">
                        <router-link :to="{ name: item.routeName }" class="nav-link">{{item.label}}</router-link>
                    </div>            
                </div>  
            </div>
            <span class="navbar-text">
                <a class="nav-link" href="/admin">Area riservata</a>
            </span>
        </nav>
        
    </header>
</template>

<script>
export default {
    name: "HeaderComponent",
    
    data(){
        return {
            menuItem: [
                {
                    label: 'Home',
                    routeName: 'home'
                },
                {
                    label: 'Cars',
                    routeName: 'cars'
                },
                {
                    label: 'Chi siamo',
                    routeName: 'about'
                },
                {
                    label: 'Contatti',
                    routeName: 'contact'
                },
            
            ]
            
        }
    }
}
</script>

<style lang="scss" scoped>

.router-link-exact-active {
    color: #fff !important;
}

</style>