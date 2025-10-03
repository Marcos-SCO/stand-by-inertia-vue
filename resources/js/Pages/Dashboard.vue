<script setup>

import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const flashSuccess = ref(page.props.flash.success);

</script>

<template>
    <div>
        <p v-if="flashSuccess" class="text-green-500">{{ flashSuccess }}</p>

        <h1 class="title">Welcome back {{ $page.props.auth.user.name }}</h1>
        <p class="subtitle">You are logged in!</p>
    </div>
</template>
