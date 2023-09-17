<script setup>
import { AuthLayout } from "@/Layouts/Layout.js";
import { reactive, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";




const props = defineProps({
    visitors: {
        type: Array,
        default: () => [],

    },

});







// snapshot is a base64 encoded image string 
const snapshot = ref(null);

// this is the function that will be called when the snapshot is taken
const onSnapshot = (image) => {
    snapshot.value = image;
};



</script>

<template>
    <Head title="الزوار" />

    <AuthLayout>


        <div
            class="flex flex-row-reverse justify-between items-center bg-white shadow-sm border-b border-gray-200 rounded-md p-4 mb-4  dark:bg-gray-700 dark:text-gray-400">
            <h2 class="font-medium text-gray-900 dark:text-white">الزوار</h2>
            <div class="flex flex-row-reverse justify-between items-center">
                <Link :href="route('visitors.create')"
                    class="flex flex-row-reverse justify-between items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:text-white"
                    type="button">
                    <icon name="hi-plus" class="sidebar-li-icon" />
                    <span class="mr-2">إضافة زائر</span>

            </Link>
            </div>  

        </div>

    </AuthLayout>
</template>
