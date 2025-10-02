<script setup>
import { reactive } from 'vue';

const form = reactive({
    name: null,
    email: null,
    password: null,
    confirm_password: null,
});

const submit = () => { console.log(form); }
</script>

<template>
    <Head title="Register" />

    <h1 class="title text-2xl font-bold mb-8 text-center">Register a new account</h1>

    <div class="w-full max-w-md mx-auto bg-white p-8 rounded shadow">

        <form action="" @submit.prevent="submit">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    v-model="form.name"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    v-model="form.email"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    v-model="form.password"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>

            <div class="mb-6">
                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    v-model="form.confirm_password"
                    class="form-input w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>

            <div>
                <p class="text-slate-600 mb-2">
                    Already a user? <a href="#" class="text-link text-purple-600 underline">Login</a>
                </p>
                <button type="submit" class="primary-button w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700 transition">Register</button>
            </div>
        </form>
        
    </div>
</template>
