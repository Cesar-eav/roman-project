<template>
    <div class="relative">
        <SidebarLink @click="isOpen = !isOpen" :title="title">
            <template #icon>
                <!-- <slot name="icon">
                    <EmptyCircleIcon
                        aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6"
                    />
                </slot> -->
            </template>

            <template>
    <div>
        <div @click="$emit('toggle')">
            <slot name="title">{{ title }}</slot>
        </div>
        <transition name="fade">
            <div v-if="isOpen">
                <slot></slot>
            </div>
        </transition>
    </div>
</template>

            <template #arrow>
                <span
                    v-show="sidebarState.isOpen || sidebarState.isHovered"
                    aria-hidden="true"
                    class="relative block w-6 h-6 ml-auto"
                >
                    <span
                        :class="[
                            'absolute right-[9px] bg-gray-400 mt-[-5px] h-2 w-[2px] top-1/2 transition-all duration-200',
                            {
                                '-rotate-45': isOpen,
                                'rotate-45': !isOpen,
                            },
                        ]"
                    ></span>
                    <span
                        :class="[
                            'absolute left-[9px] bg-gray-400 mt-[-5px] h-2 w-[2px] top-1/2 transition-all duration-200',
                            {
                                'rotate-45': isOpen,
                                '-rotate-45': !isOpen,
                            },
                        ]"
             
                    >                                      
                        </span>
                </span>

 
      
            </template>
        </SidebarLink>


            <div
                v-show="
                    isOpen && (sidebarState.isOpen || sidebarState.isHovered)
                "
                class="overflow-hidden transition-all duration-200 max-h-60"
            >
                <ul
                    class="relative px-0 pt-2 pb-0 ml-5  before:w-0 before:block before:absolute before:inset-y-0 before:left-0 before:border-l-2 before:border-l-gray-200 dark:before:border-l-gray-600"
                >
                    <slot />
                </ul>

                <!-- <ul
                    class="relative px-0 pt-2 pb-0 ml-5  before:w-0 before:block before:absolute before:inset-y-0 before:left-0 before:border-l-2 before:border-l-gray-200 dark:before:border-l-gray-600"
                >
                </ul> -->
            </div>

    </div>
</template>



<script setup>
import { ref } from 'vue'
import { sidebarState } from '@/Composables'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { EmptyCircleIcon } from '@/Components/Icons/Outline'

const props = defineProps({
            title: {
                type: String,
                isOpen: Boolean,

            },
            icon: {
                required: false,
            },
            active: {
                type: Boolean,
            },
        })

const { active } = props

const isOpen = ref(active)

const beforeEnter = (el) => {
    el.style.maxHeight = `0px`
}
const enter = (el) => {
    el.style.maxHeight = `${el.scrollHeight}px`
}
const beforeLeave = (el) => {
    el.style.maxHeight = `${el.scrollHeight}px`
}
const leave = (el) => {
    el.style.maxHeight = `0px`
}
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active en versiones anteriores de Vue */ {
    opacity: 0;
}
</style>