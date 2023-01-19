<template>
    <div>

        <p>Hello User {{ id }}</p>

    </div>
</template>

<script type="module">

import { useRoute } from 'vue-router';



export default {
    data(){
       return {
        id:'',
        name: '',
        address: ''
       }
    },

    mounted(){

        const route = useRoute();
        this.id = route.params.id;
        console.warn('Routekk', route.params);
        console.warn('Rt',this.$route.params.id);
    }

    
}

</script>

<style scoped>

</style>