<script setup>
    import { Link } from '@inertiajs/vue3';
    import DropDownAvatar from './DropDownAvatar.vue'
    import ProfilePic from './ProfilePic.vue'

    import Logo from '/public/assets/logo.png';
    
    import dropMenu from '@/functions/dropMenu.js';

    const props = defineProps({
        authStatus:{
            type: Boolean,
        },
        user:{
            type: Object,
        }
    });
</script>

<template>
    <header class="flex flex-row items-center justify-between shadow-md px-10 py-2">
        <Link href="/">
            <img width="40" height="40" :src=Logo alt="Logo">
        </Link>
        <nav class="flex flex-row">
            <button class="max-md:block hidden hamburger"
            @click.prevent="dropMenu"
            @touchstart.prevent="dropMenu"
            aria-expanded="false"
            >
            </button>
            <section class="menuBg invisible w-full justify-center max-md:items-center max-md:flex-col absolute top-14 right-0 z-10">
                <div id="menu" class="menu absolute max-md:flex h-full max-md:items-center max-md:flex-col">
                    <DropDownAvatar :user="props.user" :responsive="true" v-if="props.authStatus"/>
                    <ul class="flex flex-col w-full px-10 h-full relative mt-8 font-medium text-2xl">
                        <li>
                            <Link href="/users/create" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover"
                            v-if="!props.authStatus">
                                <span class="material-symbols-outlined">
                                    person_add
                                </span>
                                Login/Registro
                            </Link>
                        </li>
                        <li>
                            <Link href="/about" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                                <span class="material-symbols-outlined">
                                    menu_book
                                </span>
                                Sobre
                            </Link>
                        </li>
                        <li>
                            <Link href="/contact" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                                <span class="material-symbols-outlined">
                                    contacts
                                </span>
                                Contato
                            </Link>
                        </li>
                        <li>
                            <Link href="/events" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                                <span class="material-symbols-outlined">
                                    groups
                                </span>
                                Eventos
                            </Link>
                        </li>

                        <Link href="/logout" class="text-black w-10/12 flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover absolute bottom-2" v-if="props.authStatus">
                            <span class="material-symbols-outlined">
                                logout
                            </span>
                            Sair
                        </Link>
                    </ul>
                </div>
            </section>

            <div class="gap-3 max-md:hidden flex flex-row">
                <Link href="/about" class="flex items-center">
                    Sobre
                </Link>
                <Link href="/contact" class="flex items-center">
                    Contato
                </Link>
                <Link href="/events" class="flex items-center">
                    Eventos
                </Link>
                <div v-if="authStatus">
                    <button id="dropdownUserAvatarButton" class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300 " type="button"
                    aria-expanded="false"
                    @click="dropMenu($event)">
                        <span class="sr-only">Open user menu</span>
                        <ProfilePic :profilePic="props.user.profile_pic" :responsive="false" />
                    </button>
                    <DropDownAvatar :user="props.user" />
                </div>
                <Link v-else href="/users/create">
                    Login/Registro
                </Link>
            </div>
        </nav>
    </header>
</template>

<style scoped>
    span{
        font-size: 2rem;
    }
    a:hover{
        color: #3949AB;
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
        top: -0.6rem;
     }

     .menuBg{
        height: calc(100% - 56px);

        background-color: transparent;

        overflow-x: hidden;

        transition: all 0.5s;
     }

     .menu{
        width: 80%;
        
        background-color: #fff;

        right: -80%;

        visibility: hidden;
        transition: all 0.5s;
     }

     .hamburger.active + .menuBg{
        background-color: rgba(0, 0, 0, 0.5);
     }

     .hamburger.active + .menuBg .menu{
        right: 0 !important;

        visibility: visible !important;
        
        overflow-y: auto !important;
     }
</style>