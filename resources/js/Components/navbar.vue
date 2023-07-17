<script setup>
    import { Link } from '@inertiajs/vue3'
    import ProfilePic from './profilepic.vue'
    import { IonIcon } from '@ionic/vue';

    import Logo from '../../../public/assets/logo.png'
    
    import dropdownUserPic from '../functions/dropdownUserPic.js'

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
                <Link href="/Contact">
                    Contato
                </Link>
                <Link href="/Contact">
                    Eventos
                </Link>
                <div v-if="authStatus">
                    <button @onclick="dropdownUserPic">
                        <ProfilePic props.user.profile_Pic />
                    </button>
                    <div>
                        <h2>
                            <ProfilePic :user="props.user.profile_Pic" />
                            {{ props.user.name }}
                        </h2>
                        <Link :href="linkEditUser">
                            <IonIcon name="person-circle-outline"/>
                            Editar Perfil
                        </Link>
                        <Link href="/dashboard">
                            <IonIcon name="people-circle-outline" />
                            Eventos
                        </Link>
                        <form action="/logout" method="POST">
                            <Link class="dropdown-item"
                            onclick="this.closest('form').submit();"
                            style="cursor: pointer;">
                                <IonIcon name="log-out-outline" />
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