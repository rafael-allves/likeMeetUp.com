<script setup>
    import { Link } from '@inertiajs/vue3'
    import Logo from '../../../public/assets/logo.png'
    import ProfilePic from './profilepic.vue'
</script>

<template>
    <header class="flex flex-row spaceItem shadow-md px-10">
        <Link href="/">
            <img width="40" height="40" :src=Logo alt="Logo">
        </Link>
        <nav class="flex flex-row">
            <div class="flex flex-row gap-3">
                <Link href="/about" class="hover:text-colorPrimary">
                    Sobre
                </Link>
                <Link href="/Contact" class="hover:text-colorPrimary">
                    Contato
                </Link>
                <Link href="/Contact" class="hover:text-colorPrimary">
                    Eventos
                </Link>
            </div>
            <button>

            </button>
            
        </nav>
    </header>
</template>

<style scoped>
    .spaceItem{
        align-items: center;
        justify-content: space-between !important;
    }
</style>