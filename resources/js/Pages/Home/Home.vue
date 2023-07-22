<script setup>
    import { Link } from '@inertiajs/vue3';
    
    import Layout from '@/Layouts/mainLayout.vue';

    import UnloggedHome from './UnloggedHome.vue';
    
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
            <UnloggedHome />
        </section>
        <section v-else>
            <section class="block md:hidden">

            </section>
            <section class="md:flex hidden">

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