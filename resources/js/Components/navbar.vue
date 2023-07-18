<script setup>
    import { Link } from '@inertiajs/vue3';
    import ProfilePic from './profilepic.vue';

    import Logo from '/public/assets/logo.png';
    
    import dropMenu from '../functions/dropMenu.js';

    const props = defineProps({
        authStatus:{
            type: Boolean,
        },
        user:{
            type: Object,
        }
    });

    const linkEditUser = `users/${props.user.id}/edit`;
</script>

<template>
    <header class="flex flex-row spaceItem shadow-md px-10">
        <Link href="/">
            <img width="40" height="40" :src=Logo alt="Logo">
        </Link>
        <nav class="flex flex-row">
            <button class="max-md:block hidden hamburger"
            @click="dropMenu">
            </button>

            <div class="hidden menu max-md:flex max-md:justify-center max-md:items-center max-md:flex-col w-full absolute top-8 right-0 z-10 transition delay-300">

            </div>

            <div class="gap-3 max-md:hidden flex flex-row">
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
                    <button id="dropdownUserAvatarButton" class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300 " type="button"
                    aria-expanded="false"
                    @click="dropMenu($event)">
                        <span class="sr-only">Open user menu</span>
                        <ProfilePic :profilePic="props.user.profile_pic" />
                    </button>
                    <div id="dropdownAvatar" class="z-1 right-3 hidden bg-white px-7 divide-y divide-gray-100 rounded-lg shadow w-44 absolute align-middle border">
                        <h2 class="text-sm text-gray-900 flex gap-1 items-center border-b-2 pb-1 mt-3">
                            <ProfilePic :profilePic="props.user.profile_pic" />
                            {{ props.user.name }}
                        </h2>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 flex flex-col gap-1">
                            <li>
                                <Link :href="linkEditUser" class="text-black flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1">
                                    <span class="material-symbols-outlined">
                                        person
                                    </span>
                                    Editar perfil
                                </Link>
                            </li>
                            <li>
                                <Link href="/dashboard" class="text-black flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1">
                                    <span class="material-symbols-outlined">
                                        dashboard
                                    </span>
                                    Dashboard
                                </Link>
                            </li>
                            <li class="my-3 border-t-2 py-2">
                                <Link href="/logout" class="text-black flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1">
                                    <span class="material-symbols-outlined">
                                        logout
                                    </span>
                                    Sair
                                </Link>
                            </li>
                        </ul>
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
        align-items: center !important;
        justify-content: space-between !important;
    }

    a:hover{
        color: #F2A340;
    }

    .hamburger{
        border-top: 0.2rem solid;
    
        width: 2rem;
    
        transition: 0.5s;
    }

    .hamburger::before,
    .hamburger::after{
        content: "";

        display: block;

        width: 2rem;
        height: 0.2rem;

        margin-top: 0.4rem;

        background: currentColor;

        transition: 0.5s;

        position: relative;
    }

    .hamburger.active{
        border-top-color: transparent;
    }

     .hamburger.active::before{
         transform: rotate(135deg);
     }

     .hamburger.active::after{
        transform: rotate(-135deg);
        top: -0.5rem;
     }

     .hamburger.active ~ .menu{
        height: calc(100% - 8rem);
        visibility: visible !important;
        overflow-y: auto !important;
     }
</style>