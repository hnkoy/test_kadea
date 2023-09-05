<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
        title: String,
        image: String,
        vote_count: String,
        type: String,
        id:String
});
</script>

<template>
    <Link :href="'movie/detail/'+id" class=" rounded-md border">
        <img :src="image" alt="" class=" rounded-md">
        <div class="p-5">

            <div class="mt-4">
            <span class=" text-lg font-bold"> {{ title }}</span>

        </div>
        <div class="flex justify-between text-sm text-blue-400">
            <span>Vote: {{ vote_count }}</span>
            <span></span>
            <span>{{ type }}</span>

        </div>

        </div>



    </Link>
</template>
