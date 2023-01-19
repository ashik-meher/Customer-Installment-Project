<template>
    <div>
        <h2>Customer Installment</h2>
        <h4>List of available customer installments</h4>
        <hr>

        <!-- {{ customerInstallments }}-->

        <table>
        
            <tr>
                
                <th>Customer</th>
                <th>Installments</th>
                <th>Total Installment</th>

           
            </tr>
            <tr v-for="installments, customer  in customerInstallments.customer_installments" :key="sl">

             

                <td> {{ customer }}</td>

                <td> <span class="amount" v-for="installment in installments">{{ Math.floor(installment.amount) }}£  </span></td>

                <td>{{ installments.length }}</td>

                <td>
                    <button class="pay"> PAY</button>
                 
                </td>

                <td>
                    <button class="edit">Edit</button>
                   
                </td>

                <td>
                    <button class="delete">Delete</button>
                </td>
              
            
        
                
              
        
        
            </tr>
        </table>



    </div>
</template>

<script type="module">

import axios from 'axios';
export default{
    data(){
        return {

            customerInstallments: {}
       
        }
    },

 

    mounted(){
        console.log('Mounted');

        const baseUri = 'http://127.0.0.1:8000/api/customer-installments';

        let token = localStorage.getItem('access_token');

        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;


        axios.get(baseUri).then((res) => {

            //console.log(res.data);

            this.customerInstallments = res.data;

            //console.log(this.customerInstallments);

        }).catch(err => console.log(err));


    }

    
}

</script>

<style  scoped>
table {
    border: 1px solid skyblue;
    border-radius: 5px;
    padding: 10px 20px;

}

th {
    background-color: skyblue;
    font-weight: bold;

}

tr {
    padding: 5px 0;

}

.sl {
    font-weight: 900;
}

.amount{
    font-weight: bold;
    background-color: rgb(124, 206, 206);
    margin: 0px 2px;
}
</style>