<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";

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

            <TextInput
                name="name"
                label="Name"
                type="text"
                v-model="form.name"
                :message="form.errors.name"
                class="mb-6"
            />

            <TextInput
                name="email"
                label="Email"
                type="email"
                v-model="form.email"
                :message="form.errors.email"
                class="mb-6"
            />

            <TextInput
                name="password"
                label="Password"
                type="password"
                v-model="form.password"
                :message="form.errors.password"
                class="mb-6"
            />

            <TextInput
                name="password_confirmation"
                label="Confirm Password"
                type="password"
                v-model="form.password_confirmation"
                :message="form.errors.password_confirmation"
                class="mb-6"
            />

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
