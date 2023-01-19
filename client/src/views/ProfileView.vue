<template>
    <div>

        <p>Here is your profile</p>

        <p>{{ profile.name }}</p>
        <p>{{ profile.email }}</p>


    </div>
</template>

<script type="module">
import axios from 'axios';


export default {
    data(){
        return {
            reqUri: 'http://127.0.0.1:8000/api/details',
            profile: {}

        }
    },

    mounted(){

        let token = localStorage.getItem('access_token');

        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

        console.log(axios.defaults.headers.common['Authorization']);

        axios.post(this.reqUri).then((res) => {
            console.log(res.data);

            //write in component data

            this.profile.name = res.data.success.name;
            this.profile.email = res.data.success.email;


            // Test for middleware

            let user = localStorage.getItem('user');

            console.log(user);

            
        }).catch((err) => console.log(err));

    }
}

</script>

<style scoped>

</style>