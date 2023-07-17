<script setup>
    import { Link } from '@inertiajs/vue3'
    import Logo from '../../../public/assets/logo.png'
    import ProfilePic from './profilepic.vue'
</script>

<template>
    <header class="flex flex-row shadow-md px-10">
        <nav>
            <Link href="/">
                <img width="40" height="40" :src=Logo alt="Logo">
            </Link>
        </nav>
    </header>
</template>

<style scoped>

</style>