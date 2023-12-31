<script setup>
import { AuthLayout, Header, HeaderLi } from "@/Layouts/Layout.js";
import { useFormatDate } from "@/Composables/Composables.js";
import { Button, Badge } from "flowbite-vue";
import { router } from "@inertiajs/vue3";


const props = defineProps({
    notifications: Object,
});
</script>

<template>
    <!-- browser title -->

    <Head :title="$t('notifications.title')" />

    <!-- Auth layout -->
    <AuthLayout>
        <!-- page header -->
        <template #header>
            <Header :title="$t('notifications.title')">
                <template #breadcrumb>
                    <HeaderLi :title="$t('sidebar.dashboard')" :isHome="true" :url="'dashboard'" />
                    <HeaderLi :title="$t('notifications.title')" :isActive="true" />
                </template>
                <!-- create button and form -->
                <template #title-btn v-if="notifications.length > 0">
                    <!-- create button -->
                    <Button class="md:mt-0 mt-4" @click="router.post(route('notifications.set'))">
                        {{ $t("notifications.setAll") }}
                    </Button>
                </template>
            </Header>
        </template>

        <div class="px-4 lg:pb-10 pb-5">
            <h1 v-if="notifications.length < 1"
                class="text-xl text-center py-10 font-semibold text-gray-500 dark:text-gray-300">
                <icon name="hi-information-circle" class="w-7 h-7 mx-auto" />
                {{ $t("no data") }}
            </h1>
            <ol v-if="notifications.length > 0" class="relative border-s border-gray-300 dark:border-gray-700 rounded-lg">
                <li class="ps-8 bg-white dark:bg-gray-800 p-3 border-gray-200 dark:border-gray-700 border-y first-of-type:rounded-ss-lg last-of-type:rounded-es-lg border-e rounded-e-lg mb-4"
                    v-for="notification in notifications">
                    <div
                        class="absolute w-3 h-3 bg-gray-400 rounded-full mt-12 md:mt-8 -start-1.5 border border-gray-300 dark:border-gray-700 dark:bg-gray-800">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{
                        useFormatDate(notification.created_at) }}</time>
                    <div class="sm:flex sm:justify-between sm:items-center">
                        <h3
                            class="text-sm sm:flex md:text-base font-semibold text-gray-900 dark:text-gray-300 sm:mb-0 mb-3">
                            {{ $t(notification.data.message) }}

                            <Link :href="notification.data.url">
                            <Badge type="green" class="md:my-0 my-3">{{
                                notification.data.title
                            }}</Badge>
                            </Link>
                        </h3>
                        <span @click="
                        router.post(
                            route('notification.set', notification.id)
                        )
                            " class="icon-style" data-tooltip-target="notifications-set">
                            <icon name="io-checkmark-done-circle" class="w-9 h-9" />
                        </span>
                        <Tooltip id="notifications-set" :title="$t('notifications.set')" />
                    </div>
                </li>
            </ol>
        </div>
    </AuthLayout>
</template>
