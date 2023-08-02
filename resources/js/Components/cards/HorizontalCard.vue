<script setup>
    
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        content:{
            type: Object,
            required: true,
        },
        
        type: {
            type: String,
            required: true,
        }
    })

    if(props.type == 'publication')props.content.description = props.content.content;
</script>

<template>
    <Link
    :href="`/${type}/${content.id}`"
    >
        <section class="block md:flex gap-1 mb-2 py-5">
            <div :class="{'w-[30%] h-full max-w-[300px] min-w-[200px] shadow-sm shadow-black': true}" v-if="content.image !== null">
                <img :src="'/' + content.image" alt="" class="w-full h-full">
            </div>
            <div v-else class="h-full w-[30%] max-w-[300px] min-w-[200px]"> 

            </div>
            <div :class="{'shadow-md w-[70%]': true} ">
                <h2 class="text-lg font-bold break-words w-full">
                    {{ content.title.slice(0, 22) }}
                    <span v-if="content.title.length > 22">
                        ...
                    </span>
                </h2>
                <h3 class="text-textMuted font-bold break-words" v-if="type === 'events'">
                    {{
                        `
                        ${ new Date(content.date).getDate().toString().length != 1 ? 
                            new Date(content.date).getDate() :
                            '0'.concat(new Date(content.date).getDay().toString()) }
                        /
                        ${(new Date(content.date).getMonth() + 1).toString().length != 1 ?
                            new Date(content.date).getMonth() + 1 :
                            '0'.concat(new Date(content.date).getMonth() + 1)}
                        /
                        ${new Date(content.date).getFullYear()}
                        `
                    }}
                </h3>
                <p class="break-words">
                    {{ content.description.slice(0, 100)}}
                    <span class="text-colorSecondary block">
                        Mostrar Mais
                    </span>
                </p>
                <p class="mt-2 text-textMuted" v-if="type === 'events'">
                    {{ content.participants.length }} 
                    {{ content.participants.length == 1 ? 'Participante' : 'Participantes' }}
                </p>
            </div>
        </section>
    </Link>
</template>