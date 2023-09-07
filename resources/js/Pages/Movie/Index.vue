<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import MovieCard from '../../Components/Customs/MovieCard.vue';
import LinkButton from '../../Components/LinkButton.vue';
import CustomButton from '../../Components/CustomButton.vue';
import { useForm } from '@inertiajs/vue3';
import Pagination from '../../Components/Pagination.vue';


const props = defineProps({
    movies: Object,
});

const form = useForm({

    name: '',

});

const handlesubmit = () => {
    form.get(route("movies.getByName"));
};
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
                        <LinkButton link="/movies/create"> Nouveau</LinkButton>

                    </div>
                    <form  @submit.prevent="handlesubmit">
                        <div class="grid grid-cols-2">
                            <div class="flex p-10">
                                <input type="text" placeholder="taper un titre"  v-model="form.name"  name="name" id="name"
                                class="block w-full mr-6 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <CustomButton type="submit">Rechercher</CustomButton>

                            </div>


                        </div>
                    </form>

                    <div class=" grid grid-cols-3 gap-4 p-10">


                        <MovieCard v-for="item in movies.data" :title="item.name" :type="item.adult ? 'adulte' : 'standard'"
                            :image="item.poster_path" :vote_count="item.vote_count" :id="item.id" />

                    </div>

                    <div class="p-10 mt-8">
                        <pagination class="mt-6" :links="movies.links" />

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


