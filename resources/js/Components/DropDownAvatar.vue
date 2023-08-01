<script setup>
    import { Link } from '@inertiajs/vue3';
    
    import ProfilePic from './ProfilePic.vue';
    
    const props = defineProps({
        user:{
            type: Object,
        },
        responsive:{
            type: Boolean,
        }
    });

    const url = window.location.toString().split('#')[0];
</script>

<template>
        <section id="dropdownAvatar" class="bg-white top-0 divide-gray-100 shadow-md w-full items-center px-10" v-if="props.responsive">
            <Link
            :href="`/users/${user.id}`" 
            class="text-gray-900 flex gap-1 items-center border-b-2 pb-1 mt-3 font-bold text-2xl"
            >
                <div class="w-[40px]">
                    <ProfilePic :profilePic="props.user.profile_pic" />
                </div>
                {{ props.user.name }}
            </Link>
            <ul class="py-2 text-gray-700 dark:text-gray-200 flex flex-col text-center text-[1rem] mt-5 font-normal text-2xl">
                <li>
                    <Link :href="`/users/${user.id}/edit`" class="text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        Editar perfil
                    </Link>
                </li>
                <li>
                    <Link :href="`${url}#newPublication`" class="text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            add_circle
                        </span>
                        Publicação
                    </Link>
                </li>
                <li>
                    <Link href="/events/create" class="text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            group_add
                        </span>
                        Criar um Evento
                    </Link>
                </li>
                <li>
                    <Link href="/dashboard" class="text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                        Dashboard
                    </Link>
                </li>
            </ul>
        </section>
        <section class="invisible z-50 right-3 bg-white px-7 divide-y divide-gray-100 rounded-lg shadow w-44 absolute align-middle border" v-else>
            <h2 class="text-sm text-gray-900 flex gap-1 items-center border-b-2 pb-1 mt-3">
                <div class="w-[40px]">
                    <ProfilePic :profilePic="props.user.profile_pic" />
                </div>
                {{ props.user.name }}
            </h2>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 flex flex-col gap-1">
                <li>
                    <Link :href="`users/${props.user.id}/edit`" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                        Editar perfil
                    </Link>
                </li>
                <li>
                    <Link :href="`${url}#newPublication`" class="text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            add_circle
                        </span>
                        Publicação
                    </Link>
                </li>
                <li>
                    <Link href="/events/create" class="text-black flex items-center gap-2 mb-5 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            group_add
                        </span>
                        Criar um Evento
                    </Link>
                </li>
                <li>
                    <Link href="/dashboard" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                        Dashboard
                    </Link>
                </li>
                <li class="my-3 border-t-2 py-2">
                    <Link href="/logout" class="text-black flex items-center gap-2 pb-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover">
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                        Sair
                    </Link>
                </li>
            </ul>
        </section>
</template>

<style scoped>
    a:hover{
        color: #3949AB;
    }

    #menu span {
        font-size: 2rem;
    }
</style>