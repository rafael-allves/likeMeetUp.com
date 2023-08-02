<script setup>    
    import Layout from '@/Layouts/MainLayout.vue';

    import UnloggedHome from './UnloggedHome.vue';
    import LoggedHome from './LoggedHome.vue';

    const props = defineProps({
        user:{
            type: Object,
            required: true,
        },
        
        status:{
            type: Object,
        },

        publications: {
            type: Array,
            required: true,
        }
    })
</script>

<template>
    <Layout 
    :authStatus="props.user.name != undefined "
    :user="props.user"
    :status="props.status"
    >
    <main>
        <section v-if="props.user.name == undefined" class="w-full flex flex-col">
            <UnloggedHome />
        </section>

        <section v-else class="h-[85vh] pt-10 bg-slate-100">
            <LoggedHome 
            :publications="props.publications"
            />
        </section>
    </main>
    </Layout>
</template>

<style scoped>
    p{
        font-size: clamp(0.6rem, 0.3rem + 1vw, 0.8rem);
    }
</style>