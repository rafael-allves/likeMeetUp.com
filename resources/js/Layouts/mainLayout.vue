<script setup>
    import {Head} from '@inertiajs/vue3';

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
    <div>
        <Head>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        </Head>
        <Navbar 
            :authStatus="props.authStatus"
            :user="props.user"
        />
        <slot />
    </div>
</template>

<style scoped>
</style>