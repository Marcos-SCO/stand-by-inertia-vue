<script setup>
// import { Link, Head } from "@inertiajs/vue3";
</script>

<template>
    <Head>
        <title>S.T.A.N.D BY INERTIA</title>
        <meta
            head-key="description"
            name="description"
            content="Stand by Inertia and my future soul"
        />
    </Head>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav
                class="flex items-center justify-between p-4 max-w-screen-lg mx-auto"
            >
                <div class="space-x-6">
                    <Link :href="route('home')">Home</Link>
                    <Link :href="route('about')">About</Link>
                </div>
                
                <div class="space-x-6">
                    <Link :href="route('register')">Register</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
