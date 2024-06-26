import { createRouter,createWebHistory } from "vue-router";
import index from './invoice/index.vue';
import notFound from './notFound.vue';
import addInvoice from "./invoice/addInvoice.vue";
import show from './invoice/show.vue';


const router = createRouter({
    history : createWebHistory(),
    routes : [
        {
            path : '/',
            component : index
        },
        {
            path : '/invoice/add',
            component : addInvoice,
            name: 'add'
        },
        {
            path : '/invoice/:id/show',
            component : show,
            name: 'show',
            props:true
        },
        {
            path : '/:pathMatch(.*)*',
            component : notFound
        }
    ]

});

export default router;