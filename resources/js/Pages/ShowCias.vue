<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado Compañias de Seguros</div>

        <div class="flex py-2 justify-start text-gray-900">
            <button1 @click="openCreateModal" class="mr-2">Crear Cía de Seguros</button1>
            <button @click="exportData"
                class="bg-green-500 hover:bg-green-400 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300 text-sm justify-start">
                        <table id="clientesTable" class="display">
                            <thead class="bg-gray-900">
                                <tr>
                                    <th>ID</th>
                                    <th>Razón Social</th>
                                    <th>Rut</th>
                                    <th>Banco</th>
                                    <th>Comuna</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="company in companies" :key="company.id">
                                    <td>{{ company.id }}</td>
                                    <td>{{ company.razon_social }}</td>
                                    <td>{{ company.rut_empresa }}</td>
                                    <td>{{ company.banco.nombre }}</td>
                                    <td>{{ company.comuna }}</td>
                                    <th class="flex justify-center">
                                        <button class="btn btn-ver" @click="verCia(company.id)">Ver</button>
                                        <button class="btn btn-editar" @click="editarCia(company.id)">Editar</button>
                                        <button class="btn btn-eliminar"
                                            @click="confirmarEliminar(company.id)">Eliminar</button>
                                    </th>
                                    <div v-if="mostrarModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close" @click="cerrarModal">&times;</span>
                                            <p>¿Estás seguro que deseas eliminar esta compañía?</p>
                                            <button class="btn btn-confirmar"
                                                @click="deleteCia(company.id)">Confirmar</button>
                                            <button class="btn btn-cancelar" @click="cerrarModal">Cancelar</button>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <CreateCiaModal v-if="CreateCiaModal" :show="CreateCiaModal" @close="close" :bancos="bancos">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateCiaModal>

        <ShowCiaModal v-if="ShowCiaModal" :show="ShowCiaModal" @close="close" :companies="ciaIdSeleccionado">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </ShowCiaModal>

        <EditCiaModal v-if="showModalEditCia" :show="showModalEditCia" :bancos="bancos" :companies="ciaIdSeleccionado" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </EditCiaModal>



    </AppLayout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import Button1 from '@/Components/Button.vue'
import CreateCiaModal from '@/Pages/CreateCiaModal.vue'
import DialogModal from '@/Components/DialogModal.vue'
import ShowCiaModal from '@/Pages/ClientesInternos/ShowCiaModal.vue'
import EditCiaModal from '@/Pages/ClientesInternos/EditCiaModal.vue'

import $ from 'jquery'
import 'datatables.net'
import axios from 'axios'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CreateCiaModal,
        Button,
        ShowCiaModal,
        EditCiaModal
    },
    props: {
        companies: {
            type: Array,
            required: true
        },
        bancos: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            showModal: false,
            mostrarModal: false,
            ciaIdSeleccionado: {},
            ShowCiaModal: false,
            searchQuery: '',
            showModalEditCia: false,
            CreateCiaModal: false
        };
    },
    methods: {
        exportData() {

            axios.get('/export-cias', { responseType: 'blob' })
                .then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'cias-aseguradoras.xlsx');
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(error => {
                    console.error('Error exporting data:', error);
                });

        },
        openCreateModal() {
            this.CreateCiaModal = true;
        },
        close() {
            this.ShowCiaModal = false;
            this.showModalEditCia = false;
            this.CreateCiaModal = false;

        },
        confirmarEliminar() {
            this.mostrarModal = true;
        },
        cerrarModal() {
            this.mostrarModal = false;
        },
        verCia(id) {
            axios.get('/show-cia/' + id)
                .then(res => {
                    console.log("Res Cliente", res.data);
                    this.ciaIdSeleccionado = res.data;
                    // Aquí se puede abrir un modal para mostrar la información del cliente
                    this.ShowCiaModal = true;

                })
                .catch(error => {
                    console.log("Error Ver Cliente", error);
                });
        },
        editarCia(id) {
            axios.get('/show-cia/' + id)
                .then(res => {
                    console.log("Res Cliente", res.data);
                    this.ciaIdSeleccionado = res.data;
                    this.showModalEditCia = true;
                    // Aquí se puede abrir un modal para editar la información del cliente
                })
                .catch(error => {
                    console.log("Error Editar Cliente", error);
                });
        },
        deleteCia(id) {
            axios.delete("/crud/delete-cia/" + id)
                .then(response => {
                    console.log("Eliminado", response.data);
                    this.mostrarModal = false;
                    // Aquí se puede actualizar la lista de compañías
                })
                .catch(error => {
                    console.log("Error Eliminar Cliente", error);
                });
        },
        searchTable() {
            const table = $('#clientesTable').DataTable();
            table.search(this.searchQuery).draw();
        }
    },
    mounted() {
        $('#clientesTable').DataTable({
            dom: 'rtip' // Remueve el campo de búsqueda por defecto
        });
    }
};
</script>

<style>
.btn {
    padding: 0.5rem 0.5rem;
    margin: 0 0.2rem;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: normal;
}

.btn-ver {
    background-color: #f97316;
    /* Verde */
    color: white;
}

.btn-ver:hover {
    background-color: #ea580c;
}

.btn-editar {
    background-color: #f97316;
    /* Amarillo */
    color: white;
}

.btn-editar:hover {
    background-color: #ea580c;
}

.btn-eliminar {
    background-color: #F44336;
    /* Rojo */
    color: white;
}

.btn-eliminar:hover {
    background-color: #d32f2f;
}

/* Estilos del modal */
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    padding: 20px;
    border: 1px solid #888;
    border-radius: 5px;
    width: 80%;
    max-width: 400px;
    text-align: center;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
}

.btn-confirmar {
    background-color: #4CAF50;
    /* Verde */
    color: white;
    margin-right: 10px;
}

.btn-confirmar:hover {
    background-color: #45a049;
}

.btn-cancelar {
    background-color: #F44336;
    /* Rojo */
    color: white;
}

.btn-cancelar:hover {
    background-color: #d32f2f;
}
</style>
