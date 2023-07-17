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