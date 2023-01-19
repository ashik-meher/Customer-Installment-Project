<script type="module">

import axios from 'axios'
/*
let customers =  [
    {name:'Robin', currency: 'euro'},
    { name: 'Lahiru', currency: 'sterling' },
    { name: 'Azim', currency: 'taka' }
];
*/

export default {
    //

    data(){
        return {
            customers: [],
            //articles: []

           
            baseDetailRoutePath: '/customers',
        }
    },
    mounted(){

        let baseUri = 'http://127.0.0.1:8000/api/customers';
        axios.get(baseUri).then((res)=> {
            
            this.customers = res.data;
            console.log(res.data);
        
        });

    }

//
}
</script>


<template>
    <h1>Browse Customer List</h1>
    <!--

    <p>Here is the cus</p>

    <p v-for="customer in customers">{{ customer.name }} </p> -->


    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th></th>
            <th></th>
          
        </tr>

        <tr v-for="customer in customers">

            <td>{{ customer.name }}</td>
            <td>{{ customer.address }}</td>
            <!-- <td><RouterLink :to="{path: '/customers/:id', params: {id: customer.id}}">Detail</RouterLink></td>-->
            <!--<td> <a :href="'/customers/' + customer.id">Detail</a></td>-->
            <td>
                <RouterLink :to="'/customers/' + customer.id">Detail</RouterLink>
            </td>

            <!--

            <td>
                <RouterLink :to="'/customer-installment/' + customer.id">Detail</RouterLink>
            </td>

            -->

        

            
            

        </tr>
    </table>













    <!-- 

    <h3>Article List</h3>

    <div class="card" v-for="article in articles">


       <h4>{{ article.title }}</h4> 

       <p>{{ article.body }}</p>

       <button>{{ article.author_name }}</button>

  

    </div>

    -->





</template>


<style scoped>
th{
    background-color: skyblue;
    color: #FFFFFF;
}
td{
    border-bottom: 1px solid skyblue;
}
</style>