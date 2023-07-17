<script setup>
    import {defineProps} from 'vue';
    import Layout from '../Layouts/mainLayout.vue'
    const props = defineProps({
        authStatus: {
            type: Boolean,
            required: true,
        }
    })
</script>

<template>
    <Layout 
    :authStatus=props.authStatus
    
    >

    </Layout>
</template>

<style scoped>

</style>