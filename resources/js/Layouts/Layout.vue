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
                    <Link
                        :href="route('home')"
                        :class="[{ 'bg-slate-500 text-white font-bold rounded': $page.component === 'Home' }]"
                        class="p-2 cursor-hover"
                        >Home</Link
                    >
                    <Link
                        :href="route('about')"
                        :class="[{ 'bg-slate-500 text-white font-bold rounded': $page.component === 'About' }]"
                        class="p-2 cursor-hover"
                        >About</Link
                    >
                </div>

                <div v-if="$page.props.auth.user" class="space-x-6">
                    <Link
                        :href="route('dashboard')"
                        :class="[{ 'bg-slate-500 text-white font-bold rounded': $page.component === 'Dashboard' }]"
                        class="nav-link p-2 cursor-hover"
                        >Dashboard</Link
                    >

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        type="button"
                        class="nav-link p-2 cursor-hover"
                        :class="[{ 'bg-slate-500 text-white font-bold rounded': $page.component === 'Logout' }]"
                        >Logout</Link
                    >
                </div>
                <div v-else class="space-x-6">
                    <Link
                        :href="route('register')"
                        :class="[{ 'bg-slate-500 text-white font-bold rounded': $page.component === 'Auth/Register' }]"
                        class="nav-link p-2 cursor-hover"
                        >Register</Link
                    >
                    <Link
                        :href="route('login')"
                        :class="[{ 'bg-slate-500 text-white font-bold rounded': $page.component === 'Auth/Login' }]"
                        class="nav-link p-2 cursor-hover"
                        >Login</Link
                    >
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
