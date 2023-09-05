<script setup>

defineProps({
       title: String,
        image: String,
        vote_count: String,
        type: String,
});
</script>

<template>
    <div class=" rounded-md border p-5">
        <img :src="image" alt="">
        <div class="mt-4">
            <span class=" text-lg font-bold"> {{ title }}</span>

        </div>
        <div class="flex justify-between text-sm text-blue-400">
            <span>{{ vote_count }}</span>
            <span></span>
            <span>{{ type }}</span>

        </div>


    </div>
</template>
