<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post("/register", {
        onError: () => {
            form.reset("password", "password_confirmation");
        },  
    });
};
</script>

<template>
    <Head title="Register" />

    <h1 class="title text-2xl font-bold mb-8 text-center">
        Register a new account
    </h1>

    <div class="w-full max-w-md mx-auto bg-white p-8 rounded shadow">
        <form action="" @submit.prevent="submit">
            <div class="mb-6">
                <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-700"
                    >Name</label
                >
                <input
                    type="text"
                    name="name"
                    id="name"
                    v-model="form.name"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
                <small v-if="form.errors.name" class="text-red-600">{{ form.errors.name }}</small>
            </div>

            <div class="mb-6">
                <label
                    for="email"
                    class="block mb-2 text-sm font-medium text-gray-700"
                    >Email</label
                >
                <input
                    type="email"
                    name="email"
                    id="email"
                    v-model="form.email"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
                <small v-if="form.errors.email" class="text-red-600">{{ form.errors.email }}</small>
            </div>

            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 text-sm font-medium text-gray-700"
                    >Password</label
                >
                <input
                    type="password"
                    name="password"
                    id="password"
                    v-model="form.password"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
                <small v-if="form.errors.password" class="text-red-600">{{ form.errors.password }}</small>
            </div>

            <div class="mb-6">
                <label
                    for="password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-700"
                    >Confirm Password</label
                >
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
                <small v-if="form.errors.password_confirmation" class="text-red-600">{{ form.errors.password_confirmation }}</small>
            </div>

            <div>
                <p class="text-slate-600 mb-2">
                    Already a user?
                    <a href="#" class="text-link text-purple-600 underline"
                        >Login</a
                    >
                </p>
                <button
                    type="submit"
                    class="primary-button w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700 transition"

                    :disabled="form.processing"
                >
                    Register
                </button>
            </div>
        </form>
    </div>
</template>
