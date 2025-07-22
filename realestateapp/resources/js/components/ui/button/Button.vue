<script setup>
import { computed } from 'vue';

const props = defineProps({
    variant: {
        type: String,
        default: 'default',
        validator: (value) => ['default', 'outline', 'ghost'].includes(value),
    },
    size: {
        type: String,
        default: 'default',
        validator: (value) => ['default', 'sm', 'lg'].includes(value),
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    as: {
        type: String,
        default: 'button',
        validator: (value) => ['button', 'a'].includes(value),
    },
    href: {
        type: String,
        default: null,
    },
});

const baseClasses = 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';

const variantClasses = {
    default: 'bg-primary text-primary-foreground hover:bg-primary/90',
    outline: 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
    ghost: 'hover:bg-accent hover:text-accent-foreground',
};

const sizeClasses = {
    default: 'h-10 px-4 py-2',
    sm: 'h-9 px-3',
    lg: 'h-11 px-8',
};

const classes = computed(() => {
    return [
        baseClasses,
        variantClasses[props.variant],
        sizeClasses[props.size],
    ].join(' ');
});
</script>

<template>
    <component
        :is="props.as"
        :class="classes"
        :disabled="props.as === 'button' ? disabled : null"
        :href="props.as === 'a' ? href : null"
    >
        <slot />
    </component>
</template>