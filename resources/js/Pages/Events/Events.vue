<script setup>
    import { Link, useForm } from '@inertiajs/vue3'

    import Layout from '@/Layouts/MainLayout.vue'
    
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
                <Link v-for="event in props.events" 
                :href="`/events/${event.id}`"
                >
                    <section class="flex gap-1 mb-2 md:px-10">
                        <div class="w-[30%] max-w-[300px] min-w-[200px]">
                            <img :src="event.image" alt="FOto do Evento">
                        </div>
                        <div class="px-3 py-3 md:px-10">
                            <h2 class="text-lg">
                                {{ event.title.slice(0, 22) }}
                                <span v-if="event.title.length > 22">
                                    ...
                                </span>
                            </h2>
                            <h3 class="text-textMuted font-bold">
                                {{ `
                                ${ new Date(event.date).getDay().toString().length != 1 ? 
                                    new Date(event.date).getDay() :
                                    '0'.concat(new Date(event.date).getDay().toString()) }
                                /
                                ${(new Date(event.date).getMonth() + 1).toString().length != 1 ?
                                    new Date(event.date).getMonth() + 1 :
                                    '0'.concat(new Date(event.date).getMonth() + 1)}
                                /
                                ${new Date(event.date).getFullYear()}
                                ` }}
                            </h3>
                            <p class="w-full">
                                {{ event.description.slice(0, 50)}}
                                <span class="text-colorSecondary block">
                                    Mostrar Mais
                                </span>
                            </p>
                            <p class="mt-2 text-textMuted">
                                {{ event.users.length }} Participantes
                            </p>
                        </div>
                    </section>
                </Link>
            </main>
        </div>
    </Layout>
</template>

<style scoped>
</style>