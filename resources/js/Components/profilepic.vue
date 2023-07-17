<script setup>
    import { defineProps } from 'vue';
    const props = defineProps({
        user: {
            type: Object,
            required: true,
        }
    });
</script>

<template>
    <img :src=props.user.profilePic
    :alt=props.user.name width="40px"
    class="rounded-full"
    >
</template>

<style scoped>
</style>