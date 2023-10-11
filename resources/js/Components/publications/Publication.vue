<script setup>
    import { ref } from 'vue';

    import { Link } from '@inertiajs/vue3';

    import ProfilePic from '@/Components/ProfilePic.vue';

    import liked from '/@/../public/assets/publications/liked.svg';
    import unLiked from '/@/../public/assets/publications/unliked.svg';

    const props = defineProps({ 
        publication: {
            type: Object,
            required: true,
        }
    });
    
    const owner = props.publication.owner;
    
    const lines = props.publication.content.split('\n');

    const showMore = ref(false);

    const textHeigth = document.getElementById('content');

    const images = {
        liked: liked,
        unliked: unLiked,
    };

    function hoverToggleLike (evt)
    {
        const btnToggleLike = evt.currentTarget;
        const image = btnToggleLike.children[0];
        const alt = image.getAttribute("alt");
        
        const hoverImg = alt == 'liked' ? 
        images['unliked'] : images['liked'];

        image.setAttribute("src", hoverImg);
    }

    function mouseLeave(evt)
    {
        const btnToggleLike = evt.currentTarget;
        const image = btnToggleLike.children[0];
        const alt = image.getAttribute("alt");
        image.setAttribute("src", images[alt]);
    }

    function defineShowMore(evt)
    {
        textHeigth = evt.target.heigth;
        console.log(evt);
    }

</script>

<template>
    <section class="flex flex-col min-h-[400px] shadow shadow-black relative py-2 rounded">
        <Link
        :href="`users/${owner.id}`" 
        >
            <section class="px-10">
                <div class="flex items-center gap-2 mb-2 border-b-4 border-gray-200">
                    <div class="w-[40px] h-[40px]">
                        <ProfilePic 
                        :profilePic="owner.profile_pic"
                        />
                    </div>
                    <div>
                        <h2 class="font-bold text-md text-textMuted">
                            {{ 
                                owner.name
                            }}
                        </h2>
                    </div>
                </div>
            </section>
        </Link>


        <section>
            <section v-if="publication.image != null"
            class="w-full flex items-center justify-center">
                <div class="w-full max-w-[500px] px-4">
                    <div class="w-full flex items-center justify-center">
                        <img :src="props.publication.image"  
                        class="w-full object-fill"
                        />
                    </div>
                </div>
            </section>
            
            <section class="w-full px-10 mt-5">
                <div class="w-full flex justify-center">
                    <h2 class="text-lg text-center font-bold">
                        {{ 
                            publication.title     
                        }}
                    </h2>
                </div>
                
                <div :class="{'showMore max-h-[200px] overflow-hidden': true, 'max-h-fit': showMore}">
                    <div id="content">
                        <p v-for="line in lines"
                        class="break-words">
                            {{ 
                                line                         
                            }}
                        </p>
                    </div>
                </div>
                <div class="mt-2">
                    <button class="border-none" v-if="textHeigth > 200"
                    @click="showMore = !showMore">
                        Mostrar Mais
                    </button>
                </div>
            </section>
        </section>


        <section class="flex items-center justify-start px-5 w-full min-h-[50px] absolute bottom-0 border-t-4 border-gray-200 bg-slate-100">
            <div class="h-full flex items-center justify-center">
                <button 
                class="toggleLike h-full flex items-center justify-center"
                @mouseenter="hoverToggleLike"
                @mouseleave="mouseLeave">
                    <img :src="liked" alt="liked" width="40"/>
                </button>
                
                <button 
                class="toggleLike h-full flex items-center justify-center"
                @mouseenter="hoverToggleLike"
                @mouseleave="mouseLeave">
                    <img :src="unLiked" alt="unliked" width="40"/>
                </button>
            </div>
        </section>
    </section>
</template>

<style scoped>
    img{
        aspect-ratio: 4 / 3;
    }
</style>