<template>
    <div>
        <p v-if="notifications.length > 0">
            <p v-for="notification in notifications">{{ notification }}</p>
        </p>

        <h2>Create Customer Installment</h2>
        <h4>You have create at least 2 installment</h4>
        <hr>
<!-- <p>selected id {{ selected }}</p>-->
        <form>

            <label>Select a Customer</label> <br>
           <!--  <p>Selected customer id is {{ selected }}</p> -->
            <select v-model="selected">
          
                <option selected>Select Customer</option>

                <option v-for="customer in customers" :value="customer.id">
                    {{ customer.name }}

                </option>
            
            </select>


            <table>

                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Expire Date</th>
                    <th>Note</th>
                </tr>
                <tr v-for="(payment, index) in payments" :key="index">
                    <!-- 
                    <td><input type="number" placeholder="Enter Amount"></td>
                    <td><input type="date"></td>
                    <td><input type="text" placeholder="Add Notes"></td>
                    <td><button @click.stop.prevent="removeInput"> - Remove</button></td>
            
                    -->


                        <td class="sl">{{ index + 1 }}</td>
                        <td><input v-model="payment.amount" type="number" placeholder="Enter Amount"></td>
                        <td><input v-model="payment.expireDate" type="date"></td>
                        <td><input v-model="payment.note" type="text" placeholder="Add Notes"></td>
                        <td v-if="index > 0"><button class="remove-input"  @click.stop.prevent="removeInput(index)"> - Remove</button></td>


                </tr>
            </table>

        </form>

        <button class="add-input" @click.stop.prevent="addInput"> + Add More Installment</button>

        <div class="btn-group">
                <button class="cancel" @click.stop.prevent="cancelFormSubmission">Cancel</button>
                <button class="save" @click.stop.prevent="commitFormSubmission">Save</button>

        </div>

        

    

    </div>
</template>

<script type="module">
// Helpful Doc
//https://dev.to/snehalkadwe/how-to-create-dynamic-input-using-vue-2hf7

import axios from 'axios';

export default {
    data(){
        return {
            customers: [],
            selected: 'Select Customer',
            payments: [
                {
                    amount:'',
                    expireDate:'',
                    note:''
                },
            ],

            notifications:[],
          

        }
    },
    mounted(){
        const customersUri = 'http://127.0.0.1:8000/api/customers';
        axios.get(customersUri).then((res) => {
            this.customers = res.data;
            //console.log(this.customers)
        });




    },

    methods: {
        addInput(){
            console.log('Added');
            
            this.payments.push({
                amount: '',
                expireDate: '',
                note: ''
            });
            
           console.log(this.payments);
        },

        removeInput(index){
            console.log('Removed');
            if(index != 0){
                this.payments.splice(index, 1);
            }
            return false;
            
          
        },

        cancelFormSubmission(){
            console.log('Canceled Form Submission');
            this.$router.push({path:'/', replace: true});
        },

        commitFormSubmission(){
            console.log('Confirmed Form Submission');
            //console.log('Selected Customer ID:',this.selected);
            //console.log('payments:', this.payments);

            // api post request part

            const installmentStoreUri = 'http://127.0.0.1:8000/api/installments';

            axios.post(installmentStoreUri,
                {
                    customer_id: this.selected,
                    installments: this.payments,
                }
            ).then((res) => {
                console.log(res.data);
                this.notifications.push(res.data.message);
              

               this.payments = [];
                this.payments.push({
                    amount: '',
                    expireDate: '',
                    note: ''
                });


            }).catch(err => console.log(err));

            // Final Component Load

            //this.$router.push({path: '/'});
        }
    }
}

</script>

<style scoped>
table{
    border: 1px solid skyblue;
    border-radius: 5px;
    padding:10px 20px;

}
th{
    background-color: skyblue;
    font-weight: bold;

}
tr{
    padding: 5px 0;

}
.sl{
    font-weight: 900;
}

/*
.btn-group{
    display: flex;
    align-items: center;
    justify-content: center;

}
*/

select{
    width: 100%;
    padding: 10px;
}
.add-input{
    color: seagreen;
    border: 1px solid seagreen;

}
.remove-input{
    color: maroon;
    border: 1px solid maroon;
   
}

.cancel{
    background-color: maroon;
    padding: 5px 10px;
    margin: 10px 0;
    border: 5px solid maroon;
    border-radius: 5px;
    color: #FFFFFF;
    transition: 1s ease-in-out;

}
.cancel:hover{
    background-color: #FFFFFF;
    color: maroon;
    border:0;
    border-radius: 5px;
    border: 1px solid maroon;
}
.save{
    background-color:seagreen;
    padding: 5px 10px;
    margin:10px 5px;
    border: 5px solid seagreen;
    border-radius: 5px;
    color: #FFFFFF;
    transition: 1s ease-in-out;
}
.save:hover{
    background-color: #FFFFFF;
    color: seagreen;
    border: 0;
    border-radius: 5px;
    border: 1px solid seagreen;
}
</style>



