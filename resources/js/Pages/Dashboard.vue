<script setup></script>

<template>
    <div>
        <h1 class="title">Welcome back {{ $page.props.auth.user.name }}</h1>
        <p class="subtitle">You are logged in!</p>
    </div>
</template>
