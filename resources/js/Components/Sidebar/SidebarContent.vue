<template>
    <PerfrectScrollbar tagname="nav" aria-label="main" class="relative flex flex-col flex-1 max-h-full gap-4 px-3">

        <SidebarLink title="Roman Seguros" :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon>
                <DashboardIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>

        <!-- CONFIGURACION INTERNA -->
        <SidebarCollapsible title="Configuración Interna" :href="route('crearusuario')" class="text-xs"
            :active="route().current('crearusuario') || route().current('dashboard') || route().current('cliente') || route().current('add-compania')">
            <SidebarCollapsibleItem title="Crear Usuario Interno" :href="route('crearusuario')"
                :active="route().current('crearusuario')" />
            <SidebarCollapsibleItem title="Listar Usuarios Internos " :href="route('dashboard')"
                :active="route().current('dashboard')" />
            <SidebarCollapsibleItem title="Asignación de Atribuciones" />
            <SidebarCollapsibleItem title="Agregar Cía. Seguros" :href="route('add-compania')"
                :active="route().current('add-compania')" />
            <SidebarCollapsibleItem title="Listar Cía. Seguros" :href="route('cliente')"
                :active="route().current('cliente')" />
            <SidebarCollapsibleItem title="Crear mensaje de Avisos" />
        </SidebarCollapsible>

        <!-- CLIENTES EXTERNOS -->
        <SidebarCollapsible title="Clientes Externos" class="text-xs"
            :active="route().current('crear-empresa') || route().current('show-polizas')">
            <SidebarCollapsibleItem title="Crear Empresa Nueva" :href="route('crear-empresa')"
                :active="route().current('crear-empresa')" />
            <SidebarCollapsibleItem title="Aprobación de Solicitud" />
            <SidebarCollapsibleItem title="Listado Empresas" />
            <SidebarCollapsibleItem title="Crear Usuarios Exeternos" />
            <SidebarCollapsibleItem title="Listado Clientes Externos" :href="route('view-add-poliza')"
                :active="route().current('view-add-poliza')" />
            <SidebarCollapsibleItem title="Listado Activos Asegurados" />
            <SidebarCollapsibleItem title="Envío de Cotizaciones" />
        </SidebarCollapsible>



        <!-- POLIZAS -->

        <SidebarCollapsible title="Polizas" class="text-xs"
            :active="route().current('view-add-poliza') || route().current('show-polizas')">
            <SidebarCollapsibleItem title="Crear Cotizaciones" />
            <SidebarCollapsibleItem title="Listado de Cotizaciones" />
            <SidebarCollapsibleItem title="Crear Propuestas" />
            <SidebarCollapsibleItem title="Listado de Propuestas" />
            <SidebarCollapsibleItem title="Crear Poliza" :href="route('view-add-poliza')"
                :active="route().current('view-add-poliza')" />
            <SidebarCollapsibleItem title="Listado Polizas General" :href="route('show-polizas')"
                :active="route().current('show-polizas')" />
            <SidebarCollapsibleItem title="Envío de Cotizaciones" />
        </SidebarCollapsible>

        <SidebarCollapsible title="Cobranza por Cliente">
            <li>-Listado de Cuotas</li>
            <li>-Listado de Polizas</li>
            <li>-Listado de Avisos</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Siniestros">
            <li>-Crear Siniestros</li>
            <li>-Listado de Siniestros</li>
            <li>-Estatus Gestión de Siniestros</li>
        </SidebarCollapsible>

        <SidebarCollapsible title="Reportes">

            <p>-Reporte mensual x Compañía</p>
            <p>-Reporte comportamiento acumulado anual</p>
            <p>-Comisiones</p>
            <p>-Siniestros</p>

            <p>-Listado de Pólizas para asignación de Vendedor</p>
            <p>-Reporte mensual x Ejecutivo</p>

            <p>-Listado de Siniestros x Cliente Mensual</p>
            <p>-Listado de Siniestros x Cliente Anual</p>
            <p>-Listado de Siniestros x Cliente y siniestralidad efectiva</p>

            <p>-Asignación y Carga de Liquidaciones de Sueldo x Ejecutivo</p>
            <p>-Asignación y Carga de Permisos x Ejecutivo</p>
            <p>-Asignación y Carga de Licencias Médicas x Ejecutivo</p>





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
