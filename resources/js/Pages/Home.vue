<script setup>
    import { Link } from '@inertiajs/vue3';
    
    import Layout from '../Layouts/mainLayout.vue'
    
    import banner from '/public/assets/home/banner.svg'
    import searchingImg from '/public/assets/home/searching.svg'
    import talking from '/public/assets/home/talking.svg'
    import join from '/public/assets/home/join.svg'

    const props = defineProps({
        user:{
            type: Object,
            required: true,
        }
    })
</script>

<template>
    <Layout 
    :authStatus="props.user.name != undefined "
    :user="props.user"
    >
    <main>
        <section v-if="props.user.name == undefined" class="w-full flex flex-col">
            <section class="block md:hidden">
                <div class="flex items-center flex-col text-center h-[25%] relative">
                    <img :src="banner" alt="banner" class="absolute w-full top-0 z-[-1]">
                    <h1 class="text-white font-bold text-center">
                        Descubra um mundo de experiências inesquecíveis!
                    </h1>
                    <h3 class="mt-1 text-black">
                        Faça parte de uma comunidade movida pela emoção de eventos inesquecíveis!
                    </h3>
                    <Link href="/users/create" class="bg-colorPrimary rounded-sm py-1 px-1 border-colorSecondary border cursor-pointer mt-4">
                        Cadastrar Agora
                    </Link>
                </div>
                <div class="flex">
                    <div class="w-[50%] mt-3">
                        <h2 class="text-[1rem] font-bold">
                            Procurando Eventos Empolgantes?
                        </h2>
                        <p>
                            Entre agora e participe dos eventos mais empolgantes da sua região! Ou se preferir aproveite dos eventos online.
                        </p>
                        <Link href="users/create" class="text-[0.8rem] text-black flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover hover:text-colorPrimary">
                            Entrar Agora
                            <span class="material-symbols-outlined">
                                arrow_right_alt
                            </span>
                        </Link>
                    </div>
                    <img :src="searchingImg" alt="Encontre pessoas novas" class="w-[50%]">
                </div>
                <div class="flex gap-1">
                    <img :src="talking" alt="Encontre pessoas novas" class="w-[50%]">
                    <div class="w-[50%] mt-3">
                        <h2 class="text-[1.1rem] font-bold">
                            Querendo conhecer pessoas novas?
                        </h2>
                        <p>
                            No Rafa Events você encontrará pessoas com as mesmas paixões que você
                        </p>
                        <Link href="users/create" class="text-[0.8rem] text-black flex justify-end items-center gap-2 hover:border-r-2 border-colorSecondary hover:pl-1 hover:bg-colorHover hover:text-colorPrimary">
                            <span class="material-symbols-outlined">
                                arrow_left_alt
                            </span>
                            Entrar Agora
                        </Link>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-[50%] mt-3">
                        <h2 class="text-[0.9rem] font-bold">
                            Está esperando oque ?
                        </h2>
                        <p>
                            Comece a se conectar agora mesmo!
                        </p>
                        <Link href="users/create" class="text-[0.8rem] text-black flex items-center gap-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover hover:text-colorPrimary">
                            Entrar Agora
                            <span class="material-symbols-outlined">
                                arrow_right_alt
                            </span>
                        </Link>
                    </div>
                    <img :src="join" alt="Encontre pessoas novas" class="w-[50%]">
                </div>
            </section>
            <section class="md:flex hidden">
                <div width="30%">
                    <h1 class="text-[100px] leading-[80px]">
                        Rafa Events
                    </h1>
                    <h3>

                    </h3>
                    <Link href="/users/create" class="bg-colorPrimary rounded-sm py-1 px-1 border-colorSecondary border cursor-pointer mt-4">
                        Cadastrar Agora
                    </Link>
                </div>
                <div width="70%">
                    <img :src="talking" alt="" class="w-full">
                </div>
            </section>
        </section>
    </main>
    </Layout>
</template>

<style scoped>
    p{
        font-size: clamp(0.6rem, 0.3rem + 1vw, 0.8rem);
    }
</style>