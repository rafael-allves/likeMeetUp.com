<script setup>
    import { Link } from '@inertiajs/vue3';
    
    import Layout from '@/Layouts/MainLayout.vue';

    import Publication from '@/Components/publications/Publication.vue';

    import UnloggedHome from './UnloggedHome.vue';
    
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
        <section v-else>
            <section class="flex justify-center">
                <Publication v-for="publication in publications"
                :user="props.user"
                :publication="publication"
                />
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