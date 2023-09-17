<script setup>
import { AuthLayout } from "@/Layouts/Layout.js";
import { reactive, ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";



const props = defineProps({
    components: {
        type: Array,
        default: () => [],

    },

});

const new_component_form = reactive({
    'name': '   ',

});

const submit = (url, form, title, message) => {
    Inertia.post(route(url), form, {
        onSuccess: () => {
            new_component_form.reset();
            toast.success({
                title: title,
                message: message,
            });
        },
    });
};







</script>


<template>
    <Head title="المكونات" />

    <AuthLayout>
        <div
            class="flex flex-row-reverse justify-between items-center bg-white shadow-sm border-b border-gray-200 rounded-md p-4 mb-4  dark:bg-gray-700 dark:text-gray-400">
            <h2 class="font-medium text-gray-900 dark:text-white">المكونات</h2>
            <div class="flex flex-row-reverse justify-between items-center">
                <button data-modal-target="new-component-model" data-modal-toggle="new-component-model"
                    class="flex flex-row-reverse justify-between items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:text-white"
                    type="button">
                    <icon name="hi-plus" class="sidebar-li-icon" />
                    <span class="mr-2">إنشاء مكون جديد</span>
                </button>
            </div>
        </div>
        <!-- Main modal -->
        <div id="new-component-model" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">إنشاء مكون جديد</h3>
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            يرجى ملئ الحقول التالية
                        </p>
                        <form
                            @submit.prevent="submit('components.store', new_component_form, 'تم إنشاء المكون بنجاح', 'تم إنشاء المكون بنجاح')"
                            class="mt-4">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="name" name="name" id="name" v-model="new_component_form.name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="" required />
                                <label for="name"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ألاسم</label>
                            </div>


                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">حفظ</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #معرف
                        </th>
                        <th scope="col" class="px-6 py-3">
                            اسم المكون
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">تعديل</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="component in components" :key="component.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ component.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ component.name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">تعديل</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>


    </AuthLayout>
</template>
