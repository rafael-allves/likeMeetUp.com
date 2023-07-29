<script setup>
    import { Link, useForm } from '@inertiajs/vue3'

    import Layout from '@/Layouts/MainLayout.vue'
    import EventCard from '@/Components/Card.vue';
    
    const props = defineProps({
        
        user: {
            default: null,
            type: Object,
            required: true,
        },
        
        events: {
            type: Array,
            required: true, 
        },

        status:{
            type: Object,
        }
    })

    const formSearch = useForm({
        search: '',
    })
    const search = () => {
        formSearch.get(route('events'));
    }
</script>

<template>
    <Layout 
    :authStatus="props.user.name != undefined "
    :user="props.user"
    :status="props.status"
    >
        <div class="w-full lg:px-40 bg-slate-100 min-h-[84vh]">
            <form class="flex justify-center w-full mb-3 px-2 pt-3 bg-slate-100"
            @submit.prevent="search">
                <div class="w-full h-full md:w-[500px] relative">
                    <input type="text"
                    v-model="formSearch.search" 
                    name="search" 
                    id="search" 
                    placeholder="Procure um Evento"
                    class="w-full border-textMuted border rounded-lg">
                    <button type="submit" class="flex bg-colorPrimary justify-center items-center absolute h-full right-0 w-7 top-0 rounded-r-lg">
                        <span class="material-symbols-outlined text-white">
                            search
                        </span>
                    </button>
                </div>
            </form>
    
            <main class="overflow-y-auto bg-white max-h-[80vh]">
                <div v-if="props.events.length > 0">
                    <EventCard v-for="event in props.events"
                    :event="event" :key="event.id"
                    type="event"/>
                </div>
                <div v-else>
                    <h2>
                        Nenhum Evento Encontrado
                    </h2>
                    <Link href="/events/create" class="bg-colorPrimary text-white text-center flex items-center justify-center  shadow h-[40px]">
                        Criar Evento
                    </Link>
                </div>
            </main>
        </div>
    </Layout>
</template>

<style scoped>
</style>