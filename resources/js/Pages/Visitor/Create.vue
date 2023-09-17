<template>
<AuthLayout>
    <Head title="إنشاء زائر جديد" />
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

<div class="px-6 py-6 lg:px-8">
    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">إنشاء زائر جديد</h3>

 
<!--    <Camera/> continar   -->

    <Camera 
    v-model="new_visitor_form.picture"
    :width="200"
    :height="200"
    class="w-40 h-40 rounded-md overflow-hidden border-4 border-gray-300"




    />

 
    <p class="text-sm text-gray-700 dark:text-gray-400">
        يرجى ملئ الحقول التالية
    </p>

    <form>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="name" name="name" id="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" required />
                <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ألاسم</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="id_card_type"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">نوع
                    الهوية</label>
                <select name="id_card_type" id="id_card_type"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required>
                    <option selected>أختر نوع الهوية</option>
                    <option value="passport">جواز سفر</option>
                    <option value="idcard">بطاقة شخصية</option>
                    <option value="other">أخرى</option>

                </select>
            </div>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <input type="id_card_number" name="id_card_number" id="id_card_number"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="id_card_number"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">رقم
                الهوية</label>
        </div>
        <div class="relative z-0 w-full mb-6 group">

        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="work_place" id="work_place"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="work_place"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">جهة
                    العمل</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="nationality_id"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    إختر جنسية</label>
                <select name="floating_last_name" id="floating_last_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required>
                    <option selected>أختر دولة</option>
                    <option v-for="nationality in nationalities" :key="nationality.id"
                        v-bind:value="nationality.id">{{ nationality.name }}</option>

                </select>

            </div>


        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <div class="flex items-center mb-4">
                    <input id="armed" type="checkbox" name="armed" v-model="new_visitor_form.armed"
                        class=" py-2.5 px-0 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="armed"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> مسلح
                    </label>
                </div>
            </div>
            <!-- if armed true the make gun_id visbel  -->
            <div v-if="new_visitor_form.armed" class="relative z-0 w-full mb-6 group">
                <label for="gun_id"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    إختر سلاح</label>
                <select name="gun_id" id="gun_id"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required>
                    <option selected>أختر سلاح</option>
                    <option v-for="gun in guns" :key="gun.id" v-bind:value="gun.id">
                        {{ gun.name }}</option>

                </select>

            </div>

        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">حفظ</button>
    </form>

</div>
</div>
</AuthLayout>
    
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";
import { AuthLayout } from "@/Layouts/Layout.js";
import { ref, reactive } from "vue";
import Camera from "@/Components/Camera.vue";




const new_visitor_form = reactive({
    name: '',
    id_card_number: '',
    id_card_type: '',
    work_place: '',
    picture: '',
    armed: false,
    gun_id: '',
    nationality_id: '',
});

 const props = defineProps({
     guns: {
         type: Array,
         default: () => [],
     },
     nationalities: {
         type: Array,
         default: () => [],
     },
 });

const submitForm = (url, form, title, message) => {
    Inertia.post(route(url), form, {
        onSuccess: () => {
            new_visitor_form.reset();
            toast.success({
                title: title,
                message: message,
            });
        },
    });
};





</script>