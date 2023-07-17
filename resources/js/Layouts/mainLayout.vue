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
    <div>
        <Navbar 
            :authStatus="props.authStatus"
            :user="props.user"
        />
        <slot />
    </div>
</template>

<style scoped>

</style>