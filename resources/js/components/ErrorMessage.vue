<template lang="">
    <div>
        <p  style="color:red">{{ message }}</p>
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