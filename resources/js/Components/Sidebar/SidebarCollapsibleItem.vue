<template>
    <li
        :class="[
            'relative leading-8 m-0 pl-6',
            'before:block before:w-4 before:h-0 before:absolute before:left-0 before:top-4 before:border-t-2 before:border-t-gray-200 before:-mt-0.5',
            'last:before:bg-white last:before:h-auto last:before:top-4 last:before:bottom-0',
            'dark:last:before:bg-dark-eval-1 dark:before:border-t-gray-600',
        ]"
    >
        <component
            :is="Tag"
            :href="href"
            v-bind="$attrs"
            :class="[
                'transition-colors hover:text-gray-500 dark:hover:text-gray-100',
                {
                    'text-white dark:text-gray-200 font-bold': active,
                    'text-gray-300 dark:text-gray-400': !active,
                },
            ]"
            @click="handleClick"
        >
            {{ title }}
        </component>
    </li>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    href: String,
    title: String,
    active: {
        type: Boolean,
        default: false,
    },
    external: {
        type: Boolean,
        default: false,
    },
    onClick: Function
})

const Tag = props.external ? 'a' : props.href ? Link : 'button'

const handleClick = (event) => {
    if (Tag === 'button') {
        event.preventDefault();
        if (props.onClick) {
            props.onClick(event);
        }
    }
}
</script>
