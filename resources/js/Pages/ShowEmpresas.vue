<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Empresas</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />
            <button1 @click="openModal">Crear Empresa</button1>

            <button
                class="bg-green-500 hover:bg-green-400 text-white font-semibold p-2  rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100  justify-start">
                        <!-- <DataTable :data="polizas" :columns="columns" class="text-gray-900 ">
                        </DataTable> -->
                        <table id="polizasTable" class="display text-gray-900">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Razón Social</th>
                                    <th>Nombre Fantasía</th>
                                    <th>Nombre Persona Natural</th>
                                    <th>Apellido </th>
                                    <th>Rut Empresa</th>
                                    <th>Comuna</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="empresa in empresas" :key="empresa.id">
                                    <td>{{ empresa.id }}</td>
                                    <td>{{ empresa.razon_social }}</td>
                                    <td>{{ empresa.nombre_fantasia }}</td>
                                    <td>{{ empresa.nombres_persona_natural }}</td>
                                    <td>{{ empresa.apellido_paterno_persona_natural }}</td>
                                    <td>{{ empresa.rut_empresa_persona }}</td>
                                    <td>{{ empresa.comuna }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <CreateEmpresaModal v-if="showModal" :show="showModal" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateEmpresaModal>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DialogModal from '@/Components/DialogModal.vue'
import Button1 from '@/Components/Button.vue'
import CreateEmpresaModal from '@/Pages/CreateEmpresaModal.vue'
import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CreateEmpresaModal
    },
    props: {
        clientes: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            showModal: false,
            mostrarModal: false,
            searchQuery: ''
        };
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        close() {
            this.showModal = false;
        },
        confirmarEliminar() {
            this.mostrarModal = true;
        },
        cerrarModal() {
            this.mostrarModal = false;
        },
        searchTable() {
            const table = $('#clientesTable').DataTable();
            table.search(this.searchQuery).draw();
        }
    },
    mounted() {
        $('#clientesTable').DataTable({
            dom: 'rtip'  // Remueve el campo de búsqueda por defecto
        });
    }
};
</script>