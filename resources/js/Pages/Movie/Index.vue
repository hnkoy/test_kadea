<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import MovieCard from '../../Components/Customs/MovieCard.vue';
import PrimaryButton from '../../Components/PrimaryButton.vue';

const props = defineProps({
    movies: Object,
});

console.log(props.movies.data)
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                liste des derniers films tendances de la journée
            </h2>
        </template>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-if="$page.props.flash.message"
                                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                    role="alert">
                                    <span class="font-medium">
                                        {{ $page.props.flash.message }}
                                    </span>
                                </div>
                <div class="flex justify-end p-5">
                    <PrimaryButton link="movies/create"> Nouveau</PrimaryButton>

                </div>
                  <div class=" grid grid-cols-3 gap-4 p-10">


                   <MovieCard v-for="item in movies.data"
                   :title="item.name"
                   :type="item.adult?'adulte':'standard'"
                   :image="item.poster_path"
                   :vote_count="item.vote_count"
                   :id="item.id"

                   />

                  </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


