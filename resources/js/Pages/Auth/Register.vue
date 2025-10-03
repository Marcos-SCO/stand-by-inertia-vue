<script setup>
import { useForm } from "@inertiajs/vue3";
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null,
});

const submit = () => {
    form.post("/register", {
        onError: () => {
            form.reset("password", "password_confirmation");
        },
    });
};

const changeAvatarFile = (e) => {
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
};
</script>

<template>
    <Head title="Register" />

    <h1 class="title text-2xl font-bold mb-8 text-center">
        Register a new account
    </h1>

    <div class="w-full max-w-md mx-auto bg-white p-8 rounded shadow">
        <form action="" @submit.prevent="submit">
            
            <div class="grid place-items-center">
                <div
                    class="relative w-28 h-28 rounded-full overflow-hidden border-slate-300"
                >
                    <label
                        for="avatar"
                        class="absolute inset-0 grid content-end cursor-pointer"
                    >
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input
                        type="file"
                        id="avatar"
                        class="hidden"
                        hidden
                        @input="changeAvatarFile"
                    />

                    <img class="object-cover w-28 h-28" :src="form.preview" v-if="form.preview" />
                </div>

                 <p v-if="form.errors.avatar" class="text-red-600 my-4">
                    {{ form.errors.avatar }}
                </p>
            </div>

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
                    <Link
                        :href="route('login')"
                        class="text-link text-purple-600 underline"
                        >Login
                    </Link>
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
