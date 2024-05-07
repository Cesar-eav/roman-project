<template>
    <PerfrectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >
        <SidebarLink
            title="Dashboard"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            <template #icon>
                <DashboardIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>
        <SidebarCollapsible
            title="Dashboard"
            :href="route('dashboard2')"
            :active="route().current('dashboard2')"
        >
            <SidebarCollapsibleItem
                title="Dahboard 2"
                :href="route('dashboard2')"
                :active="route().current('dashboard2')"
            />
        </SidebarCollapsible>
    </PerfrectScrollbar>
</template>

<script setup>
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import PerfrectScrollbar from '@/Components/PerfectScrollbar'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { DashboardIcon } from '@/Components/Icons/Outline'
</script>
