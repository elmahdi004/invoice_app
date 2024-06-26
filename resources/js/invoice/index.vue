<template lang="">
    <div class="container">
        <div class="invoices">
            <div class="card__header">
                <div>
                    <h2 class="invoice__title">Invoices</h2>
                </div>
                <div>
                    <router-link :to="{name:'add'}" class="btn btn-secondary"> New Invoice </router-link>
                </div>
            </div>

            <div class="table card__content">
                <div class="table--filter">
                    <span class="table--filter--collapseBtn">
                        <i class="fas fa-ellipsis-h"></i>
                    </span>
                    <div class="table--filter--listWrapper">
                        <ul class="table--filter--list">
                            <li>
                                <p
                                    class="table--filter--link table--filter--link--active"
                                >
                                    All
                                </p>
                            </li>
                            <li>
                                <p class="table--filter--link">Paid</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="table--search">
                    <div class="table--search--wrapper">
                        <select class="table--search--select" name="" id="">
                            <option value="">Filter</option>
                        </select>
                    </div>
                    <div class="relative">
                        <i class="table--search--input--icon fas fa-search"></i>
                        <input
                            class="table--search--input"
                            type="text"
                            placeholder="Search invoice"
                            v-model="search"
                            @input="invoiceSearch"
                        />
                    </div>
                </div>

                <div class="table--heading">
                    <p>ID</p>
                    <p>Date</p>
                    <p>Number</p>
                    <p>Customer</p>
                    <p>Due Date</p>
                    <p>Total</p>
                </div>

                <!-- item 1 -->
                <div v-if="searchInvoices.length > 0">
                    <div
                        v-for="(invoice, index) in searchInvoices"
                        :key="index"
                        class="table--items"
                    >
                        <router-link :to="{name:'show',params:{id:invoice.id}}" class="table--items--transactionId">{{
                            invoice.id
                        }}</router-link>
                        <p>{{ invoice.date }}</p>
                        <p>{{ invoice.number }}</p>
                        <p>{{ invoice.customer.firstname }}</p>
                        <p>{{ invoice.due_date }}</p>
                        <p>$ {{ invoice.total }}</p>
                    </div>
                </div>
                <div v-else style="text-align:center;">
                    <h3>Invoices not founded</h3>
                </div>
            </div>
        </div>

        <br /><br /><br />
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import api from "../axios.js";
const invoices = ref([]);
const searchInvoices = ref([]);
const search = ref('');

onMounted(() => {
    api.get("/invoices").then(({ data }) => {
        invoices.value = data;
        searchInvoices.value = data;
    });
});

const invoiceSearch = ()=>{
    searchInvoices.value = [];
    if(search.value == ''){
searchInvoices.value = invoices.value;
    }else{
        searchInvoices.value = invoices.value.filter((ele)=>ele.id == search.value);
    }
}
</script>
<style lang=""></style>
