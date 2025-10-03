<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    paginationData: Object,
});
</script>

<template>
    <!-- Pagination -->
    <div v-if="paginationData?.links && paginationData.links.length > 0" class="mt-12 flex justify-center items-center space-x-6">
        <nav class="space-x-2">
            <template
                v-for="(link, index) in paginationData.links"
                :key="link?.url || index"
            >
                <component
                    :is="link?.url ? Link : 'span'"
                    :href="link?.url"
                    v-html="link.label"
                    class="px-3 py-1 text-sm font-medium rounded-md border"
                    :class="{
                        'bg-purple-600 text-white border-purple-600': link.active,
                        'text-gray-500 hover:text-purple-600 hover:border-purple-600 border-gray-300': link?.url && !link.active,
                        'text-gray-300 border-gray-300 cursor-not-allowed': !link?.url
                    }"
                />
            </template>
        </nav>

        <p v-if="paginationData?.total > 0" class="text-slate-600 text-sm">
            Showing {{ paginationData.from }} to {{ paginationData.to }} of {{ paginationData.total }} results
        </p>
    </div>
</template>
