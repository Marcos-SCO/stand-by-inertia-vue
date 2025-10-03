<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: false,
});

const submit = () => {
    form.post("/login", {
        onError: () => {
            form.reset("password");
        },
    });
};
</script>

<template>
    <Head title="Login" />

    <h1 class="title text-2xl font-bold mb-8 text-center">
        Login to your account
    </h1>

    <div class="w-full max-w-md mx-auto bg-white p-8 rounded shadow">
        <form action="" @submit.prevent="submit">
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

             <div class="flex items-center justify-between mb-2">
                
                <div class="flex items-center gap-2">
                    <label for="rememberMe">Remember me</label>
                    <input
                        type="checkbox"
                        name="rememberMe"
                        id="rememberMe"
                        v-model="form.remember"
                    />
                </div>

                <p class="text-slate-600">
                    Not a user?
                    <Link
                        :href="route('register')"
                        class="text-link text-purple-600 underline"
                        >Register
                    </Link>
                </p>
            </div>

            <div>
                <button
                    type="submit"
                    class="primary-button w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700 transition"
                    :disabled="form.processing"
                >
                    Login
                </button>
            </div>
        </form>
    </div>
</template>
