<script setup>
    import { Link } from '@inertiajs/vue3'
    import Logo from '../../../public/assets/logo.png'
    import ProfilePic from './profilepic.vue'
    import dropdownUserPic from '../functions/dropdownUserPic.js'

    import {defineProps} from 'vue'
    defineProps({
        authStatus:{
            type: Boolean,
            required: true,
        }
    });
</script>

<template>
    <header class="flex flex-row spaceItem shadow-md px-10">
        <Link href="/">
            <img width="40" height="40" :src=Logo alt="Logo">
        </Link>
        <nav class="flex flex-row">
            <div class="flex flex-row gap-3">
                <Link href="/about">
                    Sobre
                </Link>
                <Link href="/Contact">
                    Contato
                </Link>
                <Link href="/Contact">
                    Eventos
                </Link>
                <div v-if="authStatus">
                    <button @onclick="dropdownUserPic">
                        <ProfilePic/>
                    </button>
                </div>
                <Link v-else href="/auth">
                    Login/Registro
                </Link>
            </div>
        </nav>
    </header>
</template>

<style scoped>
    .spaceItem{
        align-items: center;
        justify-content: space-between !important;
    }

    a:hover{
        color: #F2A340;
    }
</style>