<script setup>
    import Navbar from '../Components/navbar.vue';
    const props = defineProps({
        authStatus:{
            type: Boolean,
            required: true,
        },
        user:{
            type: Object,
            required: true,
        }
    });
</script>

<template>
    <Navbar 
        :authStatus="props.authStatus"
        :user="props.user"
    />
</template>

<style scoped>

</style>