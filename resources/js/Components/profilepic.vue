<script setup>
    import { defineProps } from 'vue';
    const props = defineProps({
        profilePic: {
            type: String,
            required: true,
        }
    });
</script>

<template>
    <img :src="props.profilePic"
    width="40"
    class="rounded-full"
    >
</template>

<style scoped>
</style>