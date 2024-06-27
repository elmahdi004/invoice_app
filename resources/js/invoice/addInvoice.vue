<template lang="">
    <div class="container">
        <div class="invoices">
            <div class="card__header">
                <div>
                    <h2 class="invoice__title">New Invoice</h2>
                </div>
                <div></div>
            </div>

            <div class="card__content">
                <div class="card__content--header">
                    <div>
                        <p class="my-1">Customer</p>
                        <select
                            @change="printCustomer"
                            v-model="invoice.customer"
                            :disabled="loading"
                            class="input"
                        >
                            <option
                                v-for="(customer, index) in customers"
                                :key="index"
                                :value="customer.id"
                            >
                                {{ customer.firstname }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <p class="my-1">Date</p>
                        <input
                            v-model="invoice.date"
                            id="date"
                            placeholder="dd-mm-yyyy"
                            type="date"
                            class="input"
                        />
                        <!---->
                        <p class="my-1">Due Date</p>
                        <input
                            v-model="invoice.due_date"
                            id="due_date"
                            type="date"
                            class="input"
                        />
                    </div>
                    <div>
                        <p class="my-1">Numero</p>
                        <input
                            v-model="invoice.numero"
                            type="text"
                            class="input"
                        />
                        <p class="my-1">Reference(Optional)</p>
                        <input
                            v-model="invoice.reference"
                            type="text"
                            class="input"
                        />
                    </div>
                </div>
                <br /><br />
                <div class="table">
                    <div class="table--heading2">
                        <p>Item Description</p>
                        <p>Unit Price</p>
                        <p>Qty</p>
                        <p>Total</p>
                        <p></p>
                    </div>

                    <!-- item 1 -->
                    <div
                        class="table--items2"
                        v-for="(item,idx) in invoice.items"
                        :key="idx"
                    >
                        <select v-model="item.product_id" @change="changeItem(idx,item.product_id)" id="">
                            <option
                                v-for="(product, i) in products"
                                :key="i"
                                :value="product.id"
                            >
                                {{ product.code }} {{ product.description }}
                            </option>
                        </select>
                        <p>
                            <input v-model="item.price" @input="changePrice(idx)" type="text" class="input" />
                        </p>
                        <p>
                            <input v-model="item.quantity" @input="changePrice(idx)" type="text" class="input" />
                        </p>
                        <p>$ {{item.total}}</p>
                        <p @click="deleteItem(idx)" style="color: red; font-size: 24px; cursor: pointer">
                            &times;
                        </p>
                    </div>
                    <div style="padding: 10px 30px !important">
                        <button @click="addNewLine" class="btn btn-sm btn__open--modal">
                            Add New Line
                        </button>
                    </div>
                </div>

                <div class="table__footer">
                    <div class="document-footer">
                        <p>Terms and Conditions</p>
                        <textarea
                            cols="50"
                            rows="7"
                            class="textarea"
                        ></textarea>
                    </div>
                    <div>
                        <div class="table__footer--subtotal">
                            <p>Sub Total</p>
                            <span>$ {{invoice.sub_total}}</span>
                        </div>
                        <div class="table__footer--discount">
                            <p>Discount</p>
                            <input v-model="invoice.discount" @input="applyDiscount" type="text" class="input" />
                        </div>
                        <div class="table__footer--total">
                            <p>Grand Total</p>
                            <span>$ {{invoice.total}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card__header" style="margin-top: 40px">
                <div></div>
                <div>
                    <a class="btn btn-secondary"> Save </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
import api from "../axios";
const customers = ref([]);
const products = ref([]);
const invoice = ref({
    customer: null,
    date: null,
    due_date: null,
    numero: null,
    reference: null,
    items: [],
    sub_total : 0,
    discount : 0 ,
    total : 0
});
const loading = ref(true);
onMounted(() => {
    api.get("/customers").then(({ data }) => {
        customers.value = data;
    });
    loading.value = false;
    api.get("/products").then(({ data }) => {
        products.value = data;
    });
});
const printCustomer = () => {
    console.log(invoice.value);
};
const addNewLine = ()=>{
    const newItem = {
        product_id : products.value[0].id,
        price : products.value[0].price,
        quantity : 1,
        total : products.value[0].price
    }
    invoice.value.items.push(newItem);
    invoice.value.sub_total = invoice.value.items.reduce((acc,ele)=>acc + +ele.total,0)
    invoice.value.total = invoice.value.sub_total - invoice.value.discount;
}
// changeItem(item.id,item.product_id)
const changeItem = (item_id,product_id)=>{
const product = products.value.find(ele => ele.id == product_id);

invoice.value.items[item_id] = {
        product_id : product.id,
        price : product.price,
        quantity : 1,
        total : product.price
}
invoice.value.sub_total = invoice.value.items.reduce((acc,ele)=>acc + +ele.total,0);
invoice.value.total = invoice.value.sub_total - invoice.value.discount;

console.log('items_id',item_id)
console.log('invoice is : ',invoice.value);
console.log('product is ',product);
}
const changePrice = (item)=>{
    invoice.value.items[item].total = invoice.value.items[item].price * invoice.value.items[item].quantity;
    invoice.value.sub_total = invoice.value.items.reduce((acc,ele)=>acc + +ele.total,0);
    invoice.value.total = invoice.value.sub_total - invoice.value.discount;
}
const applyDiscount = ()=>{
    invoice.value.total = invoice.value.sub_total - invoice.value.discount;
}
const deleteItem = (item)=>{
    invoice.value.items = invoice.value.items.filter((ele,index) => index != item);
    invoice.value.sub_total = invoice.value.items.reduce((acc,ele)=>acc + +ele.total,0);
    invoice.value.total = invoice.value.sub_total - invoice.value.discount;
}
</script>
<style lang=""></style>
