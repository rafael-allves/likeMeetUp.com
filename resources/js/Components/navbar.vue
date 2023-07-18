<script setup>
    import { Link } from '@inertiajs/vue3'
    import ProfilePic from './profilepic.vue'

    import Logo from '/public/assets/logo.png'
    
    import dropMenu from '../functions/dropdownUserPic.js'

    const props = defineProps({
        authStatus:{
            type: Boolean,
        },
        user:{
            type: Object,
        }
    });

    const linkEditUser = `users/${props.user.id}`
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
                <Link href="/contact">
                    Contato
                </Link>
                <Link href="/events">
                    Eventos
                </Link>
                <div v-if="authStatus">
                    <button @onclick="dropMenu" aria-expanded="false">
                        <ProfilePic :profilePic="props.user.profile_pic" />
                    </button>
                    <div>
                        <h2>
                            <ProfilePic :profilePic="props.user.profile_pic" />
                            {{ props.user.name }}
                        </h2>
                        <Link :href="linkEditUser">
                            Editar Perfil
                        </Link>
                        <Link href="/dashboard">
                            Eventos
                        </Link>
                        <form action="/logout" method="POST">
                            <Link href="/users/create"
                            onclick="this.closest('form').submit();"
                            style="cursor: pointer;">
                                Sair
                            </Link>
                        </form>
                    </div>
                </div>
                <Link v-else href="/users/create">
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