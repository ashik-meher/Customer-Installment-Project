<template>
    <div>

        <form @submit.prevent="loginWithPassword">

            <table>
                <tbody>
                
                    <tr>
                        <td><label for="user_name">User Name</label></td>
                        <td><input type="text" name="user_name" v-model="userName"></td>
                    </tr>
                
                    <tr>
                        <td><label for="password">Passowrd</label></td>
                        <td><input type="password" name="password" v-model="password"></td>
                    </tr>
                
                </tbody>
                </table>
          


           

            
            <input type="submit" value="Sign In" class="submit-button">

        </form>


    </div>
</template>

<script type="module">

import axios from 'axios';


export default {
    data(){
        return {
            userName: '',
            password: ''
        }
    },
    methods: {
        loginWithPassword(){
            console.log(this.userName);
            console.log(this.password);
            //this.$router.push('/about');

            axios.post('http://127.0.0.1:8000/api/login', {
              
                    email: this.userName,
                    password: this.password
                
            }
            /*
            {
                headers: {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            },
            timeout:5000

            }*/).then((res) => {

                console.log(res.data);
                // Bind Browser

                let token = res.data.success.token;
                let user = res.data.user;

                console.log(token);

                localStorage.setItem('access_token', token);
                localStorage.setItem('user', JSON.stringify(user));

                //sessionStorage.setItem('access_token', token);
                //sessionStorage.setItem('user_email', user.email);

                axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

                //let authVal = axios.defaults.headers.common['Authorization'];

                //console.log(authVal);

                location.reload();
                

                this.$router.push('/home');
                




            }).catch(err => console.log(err));
               




        }
    }
}

//https://codingdriver.com/laravel-vuejs-api-authentication-using-passport.html

</script>

<style scoped>
.submit-button{
        padding: 5px 10px;
        background-color: skyblue;
        border:5px solid skyblue;
        border-radius: 5px;
    }
    form>table>tbody>tr>td>label{
        font-weight: bold;
    }
    form>table>tbody>tr>td>input{
        width: 200px;
        border-radius: 3px;
    }
</style>