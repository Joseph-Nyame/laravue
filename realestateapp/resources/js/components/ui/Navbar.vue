<script setup>
import { ref } from 'vue';
import Button from './button/Button.vue';

const isMobileMenuOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
};
</script>

<template>
    <nav class="bg-primary text-primary-foreground py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Logo -->
            <h1 class="text-xl font-bold">Real Estate App</h1>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-4">
                <Button variant="ghost" as="a" href="/">Home</Button>
                <Button variant="ghost" as="a" href="/properties">Properties</Button>
                <Button variant="ghost" as="a" href="/login">Login</Button>
            </div>

            <!-- Mobile Menu Button -->
            <button
                class="md:hidden text-primary-foreground focus:outline-none"
                @click="toggleMobileMenu"
            >
                <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        :d="isMobileMenuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'"
                    ></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div v-if="isMobileMenuOpen" class="md:hidden bg-primary px-4 pt-4 pb-6">
            <div class="flex flex-col space-y-2">
                <Button variant="ghost" as="a" href="/">Home</Button>
                <Button variant="ghost" as="a" href="/properties">Properties</Button>
                <Button variant="ghost" as="a" href="/login">Login</Button>
            </div>
        </div>
    </nav>
</template>