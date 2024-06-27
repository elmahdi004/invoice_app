<template lang="">
    <div>
        <p  style="color:red;padding-top:5px;">{{ message }}</p>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';
const props = defineProps([
    'message'
])
</script>
<style lang="">
    
</style>