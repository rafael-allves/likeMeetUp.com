<script setup>
    import { Link } from '@inertiajs/vue3';

    import banner from '/public/assets/home/banner.svg'
    import searchingImg from '/public/assets/home/searching.svg'
    import talking from '/public/assets/home/talking.svg'
    import join from '/public/assets/home/join.svg'
    import homeImg from '/public/assets/home/homeimg.png'
</script>

<template>
    <section class="block md:hidden">
        <div class="flex items-center flex-col text-center h-[25%] relative">
            <img :src="banner" alt="banner" class="absolute w-full top-0 z-[-1]">
            <h1 class="text-white font-bold text-center">
                Descubra um mundo de experiências inesquecíveis!
            </h1>
            <h3 class="mt-1 text-black">
                Faça parte de uma comunidade movida pela emoção de eventos inesquecíveis!
            </h3>
            <Link href="/users/create" class="bg-colorPrimary rounded-sm py-2 px-2 border-black text-white border shadow-md shadow-black cursor-pointer mt-4">
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
                <Link href="users/create" class="text-[0.8rem] text-black flex items-center ml-2 gap-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover hover:text-colorPrimary">
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
                <Link href="users/create" class="text-[0.8rem] text-black flex justify-end  mr-2 items-center gap-2 hover:border-r-2 border-colorSecondary hover:pr-1 hover:bg-colorHover hover:text-colorPrimary">
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
                <Link href="users/create" class="text-[0.8rem] text-black flex items-center ml-2 gap-2 hover:border-l-2 border-colorSecondary hover:pl-1 hover:bg-colorHover hover:text-colorPrimary">
                    Entrar Agora
                    <span class="material-symbols-outlined">
                        arrow_right_alt
                    </span>
                </Link>
            </div>
            <img :src="join" alt="Encontre pessoas novas" class="w-[50%]">
        </div>
    </section>
    <section class="md:flex hidden justify-around">
        <div class="w-[30%]">
            <h1 class="text-[100px] leading-[80px]">
                Rafa Events
            </h1>
            <p class="my-5 text-">
                Descubra um mundo de experiências inesquecíveis e conecte-se com pessoas apaixonadas por eventos. Cadastre-se agora na nossa rede social baseada em eventos e embarque em uma jornada única!
                Você adora eventos e deseja compartilhar suas paixões com pessoas que têm interesses semelhantes? Junte-se à nossa vibrante comunidade de entusiastas de eventos. Cadastre-se hoje mesmo e mergulhe em um oceano de oportunidades!
            </p>
            <Link href="/users/create" class="bg-colorPrimary rounded-sm py-2 px-2 border-black text-white border shadow-md shadow-black cursor-pointer mt-4">
                Cadastrar Agora
            </Link>
        </div>
        <div class="w-[46%]">
            <img :src="homeImg" alt="" class="w-full">
        </div>
    </section>
</template>

<style scoped>

</style>
