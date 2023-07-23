<script setup>

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: Boolean,
        required: true,
    },
    items:{
        type: Array,
    },
    value: {
        default: null,
    },
});

</script>

<template>
    <input
        type="checkbox"
        :checked="props.checked"
        :value="value"
        v-model="props.items"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    />
</template>
