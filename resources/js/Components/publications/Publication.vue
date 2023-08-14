<script setup>
    import { Link } from '@inertiajs/vue3';

    import ProfilePic from '@/Components/ProfilePic.vue';

    import liked from '/@/../public/assets/publications/liked.svg'
    import unLiked from '/@/../public/assets/publications/unliked.svg'


    
    
    const props = defineProps({ 
        publication: {
            type: Object,
            required: true,
        }
    });
    
    const owner = props.publication.owner;
    
    const lines = props.publication.content.split('\n');
    
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

</script>

<template>
    <section class="flex flex-col min-h-[400px] shadow shadow-black py-2 rounded relative">
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
            <p v-for="line in lines"
            class="break-words">
                {{ 
                    line                         
                }}
            </p>
        </section>
        <section class="flex items-center justify-start px-5 w-full min-h-[50px] border-t-4 border-gray-200 absolute bottom-0 bg-slate-100">
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