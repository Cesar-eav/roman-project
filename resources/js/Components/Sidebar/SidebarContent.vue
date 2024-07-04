<template>
    <PerfrectScrollbar tagname="nav" aria-label="main" class="relative flex flex-col flex-1 max-h-full gap-4 px-3">

        <SidebarLink title="Roman Seguros" :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon>
                <DashboardIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>
        <div v-if="this.$page.props.user.all_teams[0]?.membership?.role === 'admin' &&
            this.$page.props.user.all_teams[0]?.membership?.role !== 'comercial'">

            <!-- CONFIGURACION INTERNA -->
            <SidebarCollapsible title="Configuración Interna" class="text-xs" :active="route().current('crearusuario') ||
                route().current('dashboard') ||
                route().current('cliente') ||
                route().current('show-cias') ||
                route().current('add-compania')
                " :isOpen="openSubmenu === 'configuracion-interna'" @toggle="toggleSubmenu('configuracion-interna')">

                <SidebarCollapsibleItem title="Crear Usuario Interno" :onClick="openCreateUserModal" :active="false" />

                <SidebarCollapsibleItem title="Listar Usuarios Internos " :href="route('dashboard')"
                    :active="route().current('dashboard')" />
                <SidebarCollapsibleItem title="Asignación de Atribuciones" />
                <SidebarCollapsibleItem title="Agregar Cía. Seguro" :onClick="openCiaSeguroModal" :active="false" />
                <SidebarCollapsibleItem title="Listar Cía. Seguros" :href="route('show-cias')"
                    :active="route().current('show-cias')" />
                <SidebarCollapsibleItem title="Crear mensaje de Avisos" />
            </SidebarCollapsible>
        </div>

        <!-- CLIENTES EXTERNOS -->
        <SidebarCollapsible title="Clientes Externos" class="text-xs" :active="route().current('crear-empresa') ||
            route().current('show-empresas') ||
            route().current('show-cliente-externo')" :isOpen="openSubmenu === 'configuracion-interna'"
            @toggle="toggleSubmenu('clientes-externos')">
            >


            <SidebarCollapsibleItem title="Crear Empresa Nueva" :onClick="openEmpresaModal" :active="false" />

            <SidebarCollapsibleItem title="Aprobación de Solicitud" />
            <SidebarCollapsibleItem title="Listado Empresas" :href="route('show-empresas')"
                :active="route().current('show-empresas')" />
            <SidebarCollapsibleItem title="Crear Usuarios Exeternos" />
            <SidebarCollapsibleItem title="Listado Clientes Externos" :href="route('show-cliente-externo')"
                :active="route().current('show-cliente-externo')" />
            <SidebarCollapsibleItem title="Listado Activos Asegurados" />
            <SidebarCollapsibleItem title="Envío de Cotizaciones" />
        </SidebarCollapsible>



        <!-- POLIZAS -->

        <SidebarCollapsible title="Polizas" class="text-xs" :active="route().current('crear-cotizacion') ||
            route().current('show-polizas')
            ">

            <SidebarCollapsibleItem title="Crear Cotizacion" :href="route('crear-cotizacion')"
                :active="route().current('/crear-cotizacion')" />

            <SidebarCollapsibleItem title="Listado de Cotizaciones" :href="route('show-cotizaciones')"
                :active="route().current('show-cotizaciones')" />
            <SidebarCollapsibleItem title="Envío de Cotizaciones" />
            <SidebarCollapsibleItem title="Crear Propuestas" />
            <SidebarCollapsibleItem title="Listado de Propuestas" />
            <SidebarCollapsibleItem title="Crear Poliza" :onClick="openPolizaModal" :active="false" />
            <SidebarCollapsibleItem title="Listado Polizas General" :href="route('show-polizas')"
                :active="route().current('show-polizas')" />

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
        <p class="text-white">{{ this.$page.props.user.all_teams[0]?.membership?.role }}</p>
        <SidebarCollapsible title="Reportes">
            <div v-if="this.$page.props.user.all_teams[0].membership.role === 'admin' &&
                this.$page.props.user.all_teams[0].membership.role !== 'comercial'">
                <p>-Reporte mensual x Compañía</p>
                <p>-Reporte comportamiento acumulado anual</p>
                <p>-Comisiones</p>
                <p>-Siniestros</p>

                <p>-Listado de Pólizas para asignación de Vendedor</p>
                <p>-Reporte mensual x Ejecutivo</p>

            </div>

            <p>-Listado de Siniestros x Cliente Mensual</p>
            <p>-Listado de Siniestros x Cliente Anual</p>
            <p>-Listado de Siniestros x Cliente y siniestralidad efectiva</p>

            <span v-if="this.$page.props.user.all_teams[0]?.membership?.role === 'admin' &&
                this.$page.props.user.all_teams[0]?.membership?.role !== 'comercial'">

                <p>-Asignación y Carga de Liquidaciones de Sueldo x Ejecutivo</p>
                <p>-Asignación y Carga de Permisos x Ejecutivo</p>
                <p>-Asignación y Carga de Licencias Médicas x Ejecutivo</p>
            </span>

        </SidebarCollapsible>



        <CreateUserModal v-if="showModal" :show="showModal" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateUserModal>

        <CreateCiaModal v-if="showCiaModal" :show="showCiaModal" :bancos="bancos" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateCiaModal>


        <CreateEmpresaModal v-if="showEmpresaModal" :show="showEmpresaModal" :bancos="bancos" @close="close"
            :comunas="comunas" :regiones="regiones">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateEmpresaModal>


        <CreatePolizaModal v-if="showPolizaModal" :show="showPolizaModal" :bancos="bancos" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreatePolizaModal>



    </PerfrectScrollbar>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

import { ref, reactive } from 'vue';


import PerfrectScrollbar from '@/Components/PerfectScrollbar'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import CreateUserModal from '@/Pages/CreateUserModal.vue'
import { DashboardIcon } from '@/Components/Icons/Outline'
import CreateCiaModal from '@/Pages/CreateCiaModal.vue'
import CreateEmpresaModal from '@/Pages/CreateEmpresaModal.vue'
import CreatePolizaModal from '@/Pages/ClientesExternos/CreatePolizaModal.vue'


const page = usePage();
const comunas = computed(() => page.props.value.comunas);
const bancos = computed(() => page.props.value.bancos);
const regiones = computed(() => page.props.value.regiones);
const openSubmenu = ref(null);


// Declarar variables reactivas usando ref
const showModal = ref(false);
const showCiaModal = ref(false);
const showEmpresaModal = ref(false);
const showPolizaModal = ref(false);


function toggleSubmenu(submenu) {
    if (openSubmenu.value === submenu) {
        openSubmenu.value = null;
    } else {
        openSubmenu.value = submenu;
    }
}

function openCreateUserModal(event) {
    showModal.value = true
    event.preventDefault();

}

function openCiaSeguroModal(event) {
    showCiaModal.value = true
    event.preventDefault();
}

function openEmpresaModal(event) {
    showEmpresaModal.value = true
    event.preventDefault();
}


function openPolizaModal(event) {
    showPolizaModal.value = true
    event.preventDefault();
}


function close() {
    showModal.value = false
    showCiaModal.value = false
    showEmpresaModal.value = false
    showPolizaModal.value = false

}

</script>
