<script setup>    
    import Layout from '../../Layouts/MainLayout.vue'

    const props = defineProps({
        user:{
            type: Object,
            required: true,
        }
    });

    function sendImg(evt){
        const fileInput = document.getElementById('eventPic');
        fileInput.addEventListener('change', ()=>{
            const newEventPic = fileInput.files[0];
            if(newEventPic){
                const preview = new FileReader();

                preview.addEventListener('load', function (){
                    document.getElementById('previewImg').setAttribute('src', preview.result);
                })
                preview.readAsDataURL(newEventPic);
            }
        })
        const label = evt.currentTarget;
        label.style.display = 'none'
        label.nextElementSibling.style.filter = 'blur(0)';
    } 
    function showLabel(evt){
        const label = evt.currentTarget.children[0];
        label.style.display = 'flex';
        label.nextElementSibling.style.filter = 'blur(3px)';
    }
    function hideLabel(evt){
        const label = evt.target.children[0];
        label.style.display = 'none'
        label.nextElementSibling.style.filter = 'blur(0)';
    }
</script>

<template>
    <div>
        <Layout :authStatus="props.user != null" 
        :user="props.user">
            <main class="flex flex-col items-center">
                <form method="POST" class="w-full mt-3 flex flex-col items-center">
                    <div class="w-80 border border-black flex justify-center align-center relative"
                    @mouseenter="showLabel"
                    @mouseleave="hideLabel"
                    @touchstart="showLabel">
                        <label for="eventPic" class="text-center cursor-pointer w-full h-full absolute left-0 top-0 z-10 flex justify-center items-center"
                        @click="sendImg">
                            <span class="material-symbols-outlined">
                                add_photo_alternate
                            </span>
                        </label>

                        <img alt="Preview Events" id="previewImg"/>
                        
                        <input type="file"
                        name="eventPic"
                        id="eventPic"
                        class="hidden"
                        @load="sendImg"
                        >
                    </div>

                    <div>
                        <label for="">
                            Título do Evento
                        </label>
                        <input type="text" class="outline-none border-none">
                    </div>
                </form>
            </main>
        </Layout>
    </div>
</template>

<style scoped>
    #previewImg{
        height: 320px;
    }
</style>