<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import MovieCard from '../../Components/Customs/MovieCard.vue';

const props = defineProps({
    movie:Object
});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Film: {{ movie.original_title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class=" grid grid-cols-5 gap-4 p-10">


                  <div class=" col-span-2">
                    <img :src="movie.poster_path" alt="">
                  </div>
                  <div class=" col-span-3 flex-col">
                    <div class=" text-2xl font-bold mb-5">
                        <span>{{ movie.title }}</span>
                    </div>

                    <div class="flex">
                        <span>Date de sortie: {{ movie.release_date }}</span>

                        <span class=" ml-10 font-bold">Langue original: {{ movie.original_language }}</span>

                    </div>

                    <div class="mt-4 flex">
                        <span>popularité: {{ movie.popularity }}</span>
                        <span class=" ml-10 font-bold">Votes: {{ movie.vote_count }}</span>
                    </div>


                  </div>

                  </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


