<template>
    <PerfrectScrollbar tagname="nav" aria-label="main" class="relative flex flex-col flex-1 max-h-full gap-4 px-3">
        <SidebarLink title="Roman Seguros" :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon>
                <DashboardIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>


        <SidebarCollapsible title="Clientes">
            <a :href="route('crearusuario')">-Crear Usuario</a>
            <li>-Internos</li>
            <li>-Externos</li>

        </SidebarCollapsible>


        <SidebarCollapsible title="Polizas" :href="route('dashboard')">
            <li>-Listado de Polizas</li>
            <li>-Crear Poliza</li>
            <li>-Habilitar/Inhabilitar Polizas</li>
            <li>-Polizas por renovar</li>
            <li>-Calendario de Vencimiento</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Propuestas" :href="route('dashboard')">
            <li>-Listado de Propuestas</li>
            <li>-Crear Propuestas</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Cobranza" :href="route('dashboard')">
            <li>-Listado de Polizas</li>

        </SidebarCollapsible>

        <SidebarCollapsible title="Siniestros" :href="route('dashboard')">
            <li>-Crear Siniestros</li>
            <li>-Listado de Siniestros</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Reportes" :href="route('dashboard')">

            <p>-Producción</p>
            <p>-Asignacion de Ventas</p>
            <p>-Comisiones</p>
            <p>-Siniestros</p>

        </SidebarCollapsible>

    </PerfrectScrollbar>
</template>

<script setup>
import PerfrectScrollbar from '@/Components/PerfectScrollbar'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import { DashboardIcon } from '@/Components/Icons/Outline'
</script>
