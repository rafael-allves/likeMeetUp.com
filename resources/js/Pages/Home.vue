<script setup>
    import Layout from '../Layouts/mainLayout.vue'
    const props = defineProps({
        user:{
            type: Object,
            required: true,
        }
    })
</script>

<template>
    <Layout 
    :authStatus="props.user.name != undefined "
    :user="props.user"
    
    >

    </Layout>
</template>

<style scoped>

</style>