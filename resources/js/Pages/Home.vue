<script setup>
    import {defineProps} from 'vue';
    import Layout from '../Layouts/mainLayout.vue'
    const props = defineProps({
        user:{
            required: true,
        }
    })
</script>

<template>
    <Layout 
    :authStatus="props.user != null"
    
    >

    </Layout>
</template>

<style scoped>

</style>