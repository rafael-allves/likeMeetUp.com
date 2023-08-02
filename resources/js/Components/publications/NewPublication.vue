<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';

    import BgBlack from '../BgBlack.vue';

    const formPublication = useForm({
        title: '',
        content: '',
        image: '',
    })

    const image = ref(false);
    
    const submit = () => {
        formPublication.post(route('CreatePublication'), {
            onSuccess: () => { formPublication.reset('title', 'content', 'image') }
        });
    }

    const stopNewPost = () => {window.location = window.location.toString().split('#newPublication')[0];}

    async function preview(event) {
    const file = event.target.files[0];
    if (!file) return;

    try {
        const fileContent = await readFileAsText(file);

        document.getElementById('imgPreview').setAttribute('src', fileContent);
    } catch (error) {
        console.error('Erro ao ler o arquivo:', error);
    }
    }

    function readFileAsText(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = (event) => resolve(event.target.result);
            reader.onerror = (error) => reject(error);
            reader.readAsDataURL(file);
            
            formPublication.image = file;
        });
    }

</script>

<template>
    <BgBlack>
        <form 
        @submit.prevent="submit"
        class="w-[94%] max-w-[500px] px-2 py-2 bg-white h-[63%] rounded-md">
            <div class="flex items-end justify-end h-auto">
                <span class="material-symbols-outlined cursor-pointer hover:text-red-600" id="exit"
                @click="stopNewPost">
                    cancel
                </span>
            </div>
            <section class="grid grid-cols-1 bg-white relative w-full h-[90%] px-1 py-1 mt-2" v-if="image">
                <div class="w-full flex items-center justify-center border-1 z-10 border-black h-full relative bg-white" id="previewDiv">
                    <img class="object-fill cursor-pointer" id="imgPreview"
                    @click="$event.target.nextElementSibling.focus()" />
                    <input type="file" name="image" id="image" @change="preview"
                    class="hidden"
                    />
                    <label for="image" class="w-full h-full absolute flex z-0 items-center justify-center cursor-pointer">
                        <span class="material-symbols-outlined">
                            add_a_photo
                        </span>
                    </label>
                </div>
                <div class="flex items-end justify-between">
                    <button class="bg-red-600 text-white flex items-center justify-center px-2 py-2 gap-1"
                    type="button"
                    @click="formPublication.image = ''; image = false">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                        Deletar
                    </button>
                    <button class="bg-green-600 text-white flex items-center justify-center px-2 py-2 gap-1"
                    type="button"
                    @click="image = false">
                        <span class="material-symbols-outlined">
                            add_a_photo
                        </span>
                        Adicionar
                    </button>
                </div>
            </section>

            <section v-else class="bg-white grid grid-cols-1 mt-2 h-[90%]">
                <div class="w-full h-full flex flex-col gap-2 pt-1">
                    <input type="text" placeholder="Título da publicação"
                    class="w-full"
                    v-model="formPublication.title">
                    <textarea name="" id="" rows="9" placeholder="Descreva sua Publicação" 
                    v-model="formPublication.content"></textarea>
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
                <div class="flex items-end justify-end">
                    <button class="text-white bg-green-600 px-1 py-2 mb-2 mr-2 flex items-center justify-center gap-2"
                    @click="submit"
                    >
                        Publicar
                        <span class="material-symbols-outlined">
                            publish
                        </span>
                    </button>
                </div>
            </section>
        </form>
    </BgBlack>
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
    #previewDiv:hover label{
        z-index: 20;
    }
</style>