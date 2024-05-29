<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Polizas</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />
            <button1 @click="openCreateModal">Crear Póliza</button1>
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
                        <table id="polizasTable" class="display text-gray-900 text-xs">
                            <thead class="t-head">
                                <tr>
                                    <th class="rounded-l-lg">ID</th>
                                    <th>RUT</th>
                                    <th>Cliente</th>
                                    <th>Nº Póliza</th>
                                    <th>Tipo Poliza</th>
                                    <th>Valor Prima</th>
                                    <th>Valor Neto</th>
                                    <th>Patente</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Compañia</th>
                                    <th>Estado</th>
                                    <th class="rounded-r-lg">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in polizas" :key="cliente.id">
                                    <td>{{ cliente.id }}</td>
                                    <td>{{ cliente.cliente_id }}</td>
                                    <td>{{ cliente.numero_poliza }}</td>
                                    <td>{{ cliente.tipo_poliza }}</td>
                                    <td>{{ cliente.monto_asegurado }}</td>
                                    <td>{{ cliente.prima }}</td>
                                    <td>{{ cliente.valor_neto }}</td>
                                    <td>{{ cliente.fecha_inicio }}</td>
                                    <td>{{ cliente.fecha_vencimiento }}</td>
                                    <td>{{ cliente.dia_pago }}</td>
                                    <td>{{ cliente.metodo_pago }}</td>
                                    <td>{{ cliente.aseguradora }}</td>
                                    <td>{{ cliente.vendedor }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <CreatePolizaModal v-if="createPolizaModal" :show="CreatePolizaModal" @close="close" :clientes="clientes">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreatePolizaModal>
    </AppLayout>
</template>



<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DialogModal from '@/Components/DialogModal.vue'
import Button1 from '@/Components/Button.vue'
import CreatePolizaModal from '@/Pages/ClientesExternos/CreatePolizaModal.vue'
import ShowEmpresaModal from '@/Pages/ClientesExternos/ShowEmpresaModal.vue'
import EditEmpresaModal from '@/Pages/ClientesExternos/EditEmpresaModal.vue'

import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CreatePolizaModal,
        ShowEmpresaModal,
        EditEmpresaModal
    },
    props: {
        polizas: {
            type: Array,
            required: true
        },
        clientes: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            showModal: false,
            mostrarModal: false,
            searchQuery: '',
            ShowEmpresaModal: false,
            empresaIdSeleccionado: {},
            editEmpresaModal: false,
            createPolizaModal: false
        };
    },
    methods: {
        openCreateModal() {
            this.createPolizaModal = true;
        },
        close() {
             this.createPolizaModal = false;


        },
        confirmarEliminar() {
            this.createPolizaModal = true;
        },
        cerrarModal() {
            this.createPolizaModal = false;
        },
        searchTable() {
            const table = $('#polizasTable').DataTable();
            table.search(this.searchQuery).draw();
        },
        verEmpresa(id) {
            axios.get('/crud/show-empresa/' + id)
                .then(res => {
                    console.log("Res Cliente", res.data);
                    this.empresaIdSeleccionado = res.data;
                    // Aquí se puede abrir un modal para mostrar la información del cliente
                    this.ShowEmpresaModal = true;
                })
                .catch(error => {
                    console.log("Error Ver Cliente", error);
                });
        },
        editar(id) {
            axios.get('/crud/show-empresa/' + id)
                .then(res => {
                    console.log("Respuesta", res.data);
                    this.empresaIdSeleccionado = res.data;
                    this.editEmpresaModal = true;
                })
                .catch(error => {
                    console.log("Error", error)
                });
        },
        deleteEmpresa(id) {
            axios.delete("/crud/delete-empresa/" + id)
                .then(response => {
                    console.log("Eliminado", response.data);
                    this.mostrarModal = false;
                    // Aquí se puede actualizar la lista de compañías
                })
                .catch(error => {
                    console.log("Error Eliminar Cliente", error);
                });
        },


    },
    mounted() {
        $('#polizasTable').DataTable({
            dom: 'rtip'  // Remueve el campo de búsqueda por defecto
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

.t-head {
    background-color: #ff8f00;
}
</style>