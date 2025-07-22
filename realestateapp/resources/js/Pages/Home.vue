<template>
    <div class="min-h-screen bg-background">
        <!-- Navbar -->
        <Navbar />

        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-foreground mb-4 tracking-tight">
                Find Your Dream Home
            </h1>
            <p class="text-lg sm:text-xl text-muted-foreground mb-8 max-w-2xl mx-auto">
                Discover the perfect property with our intuitive search and verified listings.
            </p>
            <div class="flex justify-center gap-4">
                <Button variant="default" size="lg">Get Started</Button>
                <Button variant="outline" size="lg" as="a" href="/properties">Browse Properties</Button>
            </div>
        </div>

        <!-- Features Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-secondary/50">
            <h2 class="text-3xl font-bold text-foreground mb-8 text-center">Why Choose Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-background p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold text-foreground mb-2">Easy Search</h3>
                    <p class="text-muted-foreground">Find properties with advanced filters and intuitive tools.</p>
                </div>
                <div class="bg-background p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold text-foreground mb-2">Verified Listings</h3>
                    <p class="text-muted-foreground">Browse trusted, up-to-date property listings.</p>
                </div>
                <div class="bg-background p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-semibold text-foreground mb-2">Save Favorites</h3>
                    <p class="text-muted-foreground">Save and manage your favorite properties with ease.</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Navbar from '@/components/ui/Navbar.vue';
import Button from '@/components/ui/button/Button.vue';

export default {
    components: { Navbar, Button },
};
</script>