<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    type:{
        type: String,
        required: true,
    }
});

defineEmits(['update:modelValue']);

const input = ref(null);
const label = props.type == 'confirmar senha' ? 'Confirmar Senha' :
props.type == 'email' ? 'Email' : props.type == 'password' ? 'Senha' :
'Nome';

const type = props.type == 'confirmar senha'? 'password' : props.type;

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

    function inputListener(evt){
        const transformValue = evt.target.value !== "" ? "0" : "0.5rem";
        const fontSizeValue = evt.target.value !== "" ? "0.8rem" : "1.2rem";

        evt.target.previousElementSibling.style.top = transformValue;
        evt.target.previousElementSibling.style.fontSize = fontSizeValue;
    }
</script>

<template>
    <div class="flex items-center h-12 w-full rounded-md border border-textMuted bg-white">
        <span class="material-symbols-outlined px-1 border-r border-black">
            {{ props.type == 'name' ? 'person' : props.type == 'email' ? 'email' : 'lock' }}
        </span>
        <div class="relative h-full w-full">
            <label :for="label" class="absolute left-2 bottom-3 color-textMuted transition-all duration-500">
                {{ label }}
            </label>
            <input :type="type" :name="label" :id="label" class="w-full h-full pl-3 bg-transparent border-transparent outline-transparent focus:outline-transparent focus:border-transparent focus:ring-0 color-black "
            required maxlength="64" minlength="4"
            @input="$emit('update:modelValue', $event.target.value); inputListener($event);"
            :value="modelValue"
            ref="input">
        </div>
        <span id="showPass" class="material-symbols-outlined color-black mr-2 cursor-pointer" v-if="props.type == 'password'">
            visibility
        </span>
    </div>
</template>

<style scoped>
    input{
        border: none;
        outline: none;
    }
</style>