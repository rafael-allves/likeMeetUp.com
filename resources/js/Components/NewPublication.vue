<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';

    const formPublication = useForm({
        title: '',
        description: '',
        image: ref(''),
    })

    const image = ref(false);
    
    const submit = () => {
        formPublication.post();
    }

    const stopNewPost = () => {
        window.location = window.location - window.location.hash;
    }

</script>

<template>
    <section id="bg" class="w-full h-full absolute top-0 z-40 flex justify-center items-center">
        <form 
        @submit.prefent=""
        class="max-w-[300px] bg-white h-[55%]">
            <section class="grid grid-cols-1 bg-white relative" v-if="image">
                <div class="w-full absolute bg-white">
                    <img class="object-fill"/>
                    <input type="file" name="image" id="image" @change=""
                    class="hidden"
                    />
                    <label for="image">
                        
                    </label>
                </div>
                <div class="flex items-end justify-end">
                    <button>
                        Adicionar Imagem
                    </button>
                </div>
            </section>

            <section v-else class="bg-white grid grid-cols-1">
                <div class="flex items-end justify-end">
                    <span class="material-symbols-outlined" id="exit">
                        cancel
                    </span>
                </div>
                <div class="w-full h-full px-2 flex flex-col gap-2 pt-1">
                    <input type="text" placeholder="Título da publicação"
                    class="w-full">
                    <textarea name="" id="" rows="9" placeholder="Descreva sua Publicação"></textarea>
                </div>
                <div class="flex items-end mt-2 px-1">
                    <button type="button" 
                    @click="image = !image"
                    class="rounded-full shadow-sm hover:shadow-2xl shadow-black border w-[40px] h-[40px] flex items-center justify-center"
                    >
                        <span class="material-symbols-outlined">
                            photo_camera
                        </span>
                    </button>
                </div>
            </section>
        </form>
    </section>
</template>

<style scoped>
    #bg{
        background-color: rgba(0, 0, 0, 0.5);

        transition: all 0.5s;

        height: calc(100% - 56px);
    }

    #exit{
        font-size: 2rem;
    }
</style>