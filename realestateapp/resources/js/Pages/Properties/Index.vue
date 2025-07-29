<template>
  <div class="min-h-screen bg-background">
    <Navbar />

    <!-- Toast Notification -->
    <div
      v-if="$page.props.flash.message"
      class="fixed top-4 right-4 p-4 rounded-md shadow-md transition-opacity duration-300"
      :class="[
        $page.props.flash.status === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white',
        { 'opacity-0': hideToast }
      ]"
      @animationend="hideToast = true"
    >
      {{ $page.props.flash.message }}
    </div>

    <!-- Filter Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-foreground mb-4">Filter Properties</h2>
        <form @submit.prevent="applyFilters" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <div>
            <label class="block text-sm font-medium text-muted-foreground">Min Price</label>
            <input
              v-model.number="filters.price_min"
              type="number"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              placeholder="Min Price"
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-muted-foreground">Max Price</label>
            <input
              v-model.number="filters.price_max"
              type="number"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              placeholder="Max Price"
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-muted-foreground">State</label>
            <input
              v-model="filters.state"
              type="text"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              placeholder="e.g., NY"
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-muted-foreground">Bedrooms</label>
            <input
              v-model.number="filters.bedrooms"
              type="number"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
              placeholder="Bedrooms"
            />
          </div>
          <div class="col-span-full flex justify-end">
            <Button type="submit" variant="default" size="lg">Apply Filters</Button>
          </div>
        </form>
      </div>

      <!-- Properties Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="property in properties"
          :key="property.id"
          class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow"
        >
          <img
            v-if="property.images.length"
            :src="property.images[0].url"
            alt="Property Image"
            class="w-full h-48 object-cover rounded-md mb-4"
          />
          <h3 class="text-xl font-semibold text-foreground">{{ property.title }}</h3>
          <p class="text-muted-foreground">
            {{ property.address }}, {{ property.city }}, {{ property.state }} {{ property.zip_code }}
          </p>
          <p class="text-lg font-bold text-foreground">${{ property.price.toLocaleString() }}</p>
          <p class="text-muted-foreground">
            {{ property.bedrooms }} Beds | {{ property.bathrooms }} Baths | {{ property.square_feet }} sqft
          </p>
          <Button class="mt-4" variant="default" size="default" @click="addToCart(property.id)">
            Add to Cart
          </Button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '@/components/ui/Navbar.vue';
import Button from '@/components/ui/button/Button.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

export default {
  components: { Navbar, Button },
  props: {
    properties: Array,
    filters: Object,
  },
  setup(props) {
    const filters = useForm({
      price_min: props.filters.price_min || null,
      price_max: props.filters.price_max || null,
      state: props.filters.state || '',
      bedrooms: props.filters.bedrooms || null,
    });

    const applyFilters = () => {
      filters.get('/properties', {
        preserveState: true,
        preserveScroll: true,
      });
    };

    const addToCart = (propertyId) => {
      const form = useForm({ property_id: propertyId });
      form.post('/cart', {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
          showToast();
        },
      });
    };

    // Toast auto-dismiss logic
    const hideToast = ref(true);
    const showToast = () => {
      hideToast.value = false;
      setTimeout(() => {
        hideToast.value = true;
      }, 3000); // Hide after 3 seconds
    };

    // Watch for flash message changes to trigger toast
    watch(
      () => usePage().props.flash.message,
      () => {
        if (usePage().props.flash.message) {
          showToast();
        }
      },
    );

    return { filters, applyFilters, addToCart, hideToast };
  },
};
</script>