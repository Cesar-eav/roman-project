<template>
    <PerfrectScrollbar tagname="nav" aria-label="main" class="relative flex flex-col flex-1 max-h-full gap-4 px-3">

        <SidebarLink title="Roman Seguros" :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon>
                <DashboardIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>


        <SidebarCollapsible title="Clientes" :href="route('crearusuario')" class="text-xs"
            :active="route().current('crearusuario') || route().current('dashboard') || route().current('cliente') || route().current('add-compania')">
            <SidebarCollapsibleItem title="Crear Usuario Interno" :href="route('crearusuario')"
                :active="route().current('crearusuario')" />
            <SidebarCollapsibleItem title="Listar Usuarios Internos " :href="route('dashboard')"
                :active="route().current('dashboard')" />
            <SidebarCollapsibleItem title="Asignación de Atribuciones" 
                />
            <SidebarCollapsibleItem title="Agregar Cía. Seguros" :href="route('add-compania')"
                :active="route().current('add-compania')" />
            <SidebarCollapsibleItem title="Listar Cía. Seguros" :href="route('cliente')"
                :active="route().current('cliente')" />
            <SidebarCollapsibleItem title="Crear mensaje de Avisos" 
                />
        </SidebarCollapsible>

        <SidebarCollapsible title="Polizas" class="text-xs"
        :active="route().current('add-poliza') || route().current('show-polizas')">

            <SidebarCollapsibleItem title="Crear Poliza" :href="route('add-poliza')"
                :active="route().current('add-poliza')" />
            <SidebarCollapsibleItem title="Listado de Polizas" :href="route('show-polizas')"
                :active="route().current('show-polizas')" />
            <SidebarCollapsibleItem title="Habilitar/Inhabilitar Polizas" 
                />
            <SidebarCollapsibleItem title="Polizas por renovar" :href="route('add-compania')"
                :active="route().current('add-compania')" />
            <SidebarCollapsibleItem title="Calendario de Vencimiento" :href="route('cliente')"
                :active="route().current('cliente')" />

        </SidebarCollapsible>

        <SidebarCollapsible title="Propuestas">
            <li>-Listado de Propuestas</li>
            <li>-Crear Propuestas</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Cobranza">
            <li>-Listado de Polizas</li>

        </SidebarCollapsible>

        <SidebarCollapsible title="Siniestros">
            <li>-Crear Siniestros</li>
            <li>-Listado de Siniestros</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Reportes">

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
