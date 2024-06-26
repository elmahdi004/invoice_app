<template lang="">
    <div class="container">
         <div class="invoices" v-if="invoice">
        
        <div class="card__header">
            <div>
                <h2 class="invoice__title">Invoice</h2>
            </div>
            <div>
                
            </div>
        </div>
        <div>
            <div class="card__header--title ">
                <h1 class="mr-2">#{{invoice.number}}</h1>
                <p>{{invoice.date}}</p>
            </div>
    
            <div>
                <ul  class="card__header-list">
                    <li>
                        <!-- Select Btn Option -->
                        <button class="selectBtnFlat">
                            <i class="fas fa-print"></i>
                            Print
                        </button>
                        <!-- End Select Btn Option -->
                    </li>
                    <li>
                        <!-- Select Btn Option -->
                        <button class="selectBtnFlat">
                            <i class=" fas fa-reply"></i>
                            Edit
                        </button>
                        <!-- End Select Btn Option -->
                    </li>
                    <li>
                        <!-- Select Btn Option -->
                        <button class="selectBtnFlat ">
                            <i class=" fas fa-pencil-alt"></i>
                            Delete
                        </button>
                        <!-- End Select Btn Option -->
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="table invoice">
            <div class="logo">
                <!-- <img src="assets/img/logo.png" alt="" style="width: 200px;"> -->
            </div>
            <div class="invoice__header--title">
                <p></p>
                <p class="invoice__header--title-1">Invoice</p>
                <p></p>
            </div>

            
            <div class="invoice__header--item">
                <div>
                    <h2>Invoice To:</h2>
                    <p>{{invoice.customer.firstname}}</p>
                </div>
                <div>
                        <div class="invoice__header--item1">
                            <p>Invoice#</p>
                            <span>#1{{invoice.number}}</span>
                        </div>
                        <div class="invoice__header--item2">
                            <p>Date</p>
                            <span>{{invoice.date}}</span>
                        </div>
                        <div class="invoice__header--item2">
                            <p>Due Date</p>
                            <span>{{invoice.due_date}}</span>
                        </div>
                        <div class="invoice__header--item2">
                            <p>Reference</p>
                            <span>{{invoice.reference}}</span>
                        </div>
                    
                </div>
            </div>

            <div class="table py1">

                <div class="table--heading3">
                    <p>#</p>
                    <p>Item Description</p>
                    <p>Unit Price</p>
                    <p>Qty</p>
                    <p>Total</p>
                </div>
    
                <!-- item 1 -->
                <div class="table--items3" v-for="(item, index) in invoice.items" :key="index">
                    <p class="table--items--col2">
                        {{item.id}}
                    </p>
                    <p  class="table--items--col1 table--items--transactionId3">
                        {{
                            item.product.description
                        }}
                    </p>
                    <p class="table--items--col2">
                        ${{
                            item.product.price
                        }}
                    </p>
                    <p class="table--items--col3">
                    {{
                        item.quantity
                    }}
                    </p>
                    <p class="table--items--col5">
                        ${{
                            item.price
                        }}
                    </p>
                </div>
            </div>

            <div  class="invoice__subtotal">
                <div>
                    <h2>Thank you for your business</h2>   
                </div>
                <div>
                    <div class="invoice__subtotal--item1">
                        <p>Sub Total</p>
                        <span> $ {{invoice.sub_total}}</span>
                    </div>
                    <div class="invoice__subtotal--item2">
                        <p>Discount</p>
                        <span>$ {{invoice.discount}}</span>
                    </div>
                    
                </div>
            </div>

            <div class="invoice__total">
                <div>
                    <h2>Terms and Conditions</h2>
                    <p>{{invoice.terms_and_conditions}} </p>
                </div>
                <div>
                    <div class="grand__total" >
                        <div class="grand__total--items">
                            <p>Grand Total</p>
                            <span>$ {{invoice.total}}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card__footer">
            <div>
                
            </div>
            <div>
                <a class="btn btn-secondary">
                    Save
                </a>
            </div>
        </div>
        
    </div>

    <br><br><br>
    </div>
</template>
<script setup>
import {defineProps, onMounted, ref} from 'vue';
import api from '../axios';
const props = defineProps(['id']);
const invoice = ref('');
onMounted(()=>{
    api.get(`/invoice/${props.id}`).then((({data})=>{
        invoice.value = data;
    }));
});
</script>
<style lang="">
    
</style>