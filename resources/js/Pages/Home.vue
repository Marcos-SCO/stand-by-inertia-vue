<script setup>
import PaginationLinks from "../Components/PaginationLinks.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce, throttle } from "lodash";

const props = defineProps({
    users: Object,
    searchTerm: String,
});

const search = ref(props.searchTerm || "");

watch(search, debounce((q) => {
    // console.log("Searching for:", newSearch);
    return router.get("/", { search: q }, { preserveState: true });
}, 500));

const getDate = (dateString) => {
    const options = { year: "numeric", month: "long", day: "numeric" };
    return new Date(dateString).toLocaleDateString("en-us", options);
};
</script>

<template>
    <Head title="Home" />

    <h1 class="text-2xl p-3 font-light text-amber-500">Users List</h1>

    <div class="overflow-x-auto">
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input
                    type="search"
                    name="search"
                    id="search"
                    v-model="search"
                    placeholder="Search users..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600"
                />
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Avatar
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        ID
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Name
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Email
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Created At
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr
                    v-for="user in users.data"
                    :key="user.id"
                    class="hover:bg-gray-50"
                >
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                    >
                        <img
                            :src="'storage/' + user.avatar"
                            :alt="user.name"
                            class="object-cover w-7 h-7 rounded-full"
                            v-if="user.avatar"
                        />
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                    >
                        {{ user.id }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                    >
                        {{ user.name }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                        {{ user.email }}
                    </td>
                    <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                        {{ getDate(user.created_at) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <PaginationLinks :paginationData="users" />
</template>
