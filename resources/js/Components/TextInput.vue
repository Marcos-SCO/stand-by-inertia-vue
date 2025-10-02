<script setup>

const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    message: String
});
</script>

<template>
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
            Name
        </label>

        <input
            :type="type"
            :name="name"
            :id="name"
            v-model="model"
            class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
            :class="{'border-red-600' : message}"
        />

        <small v-if="message" class="text-red-600"
            >{{ message }}
        </small>
    </div>
</template>
