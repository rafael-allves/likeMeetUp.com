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
    class="rounded-full w-full"
    >
</template>

<style scoped>
</style>