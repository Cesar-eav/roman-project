<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Polizas</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />
            <button1 @click="openCreateModal">Crear Póliza</button1>
            <button @click="exportData"
                class="bg-green-500 hover:bg-green-400 text-white font-semibold p-2  rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300 text-xs justify-start">
                        <table id="polizasTable" class="display">
                            <thead class="bg-gray-900">
                                <tr>
                                    <th class="rounded-l-lg">Nº Póliza</th>
                                    <th>Tipo Poliza</th>
                                    <th>Monto Asegurado</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Día de Pago</th>
                                    <th>Método de Pago</th>
                                    <th>Aseguradora</th>
                                    <th class="rounded-r-lg">Acciónes</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="poliza in polizas" :key="poliza.id">

                                    <td>{{ poliza.numero_poliza }}</td>
                                    <td>{{ poliza.tipo_poliza }}</td>
                                    <td>{{ poliza.monto_asegurado }}</td>
                                    <td>{{ poliza.fecha_inicio }}</td>
                                    <td>{{ poliza.fecha_vencimiento }}</td>
                                    <td>{{ poliza.dia_pago }}</td>
                                    <td>{{ poliza.metodo_pago }}</td>
                                    <td>12 {{ poliza.aseguradora }}</td>
                                    <td class="flex justify-start">
                                        <button class="btn btn-ver" @click="ver(poliza.id)">Ver</button>
                                        <button class="btn btn-editar" @click="editar(poliza.id)">Editar</button>
                                        <button class="btn btn-eliminar"
                                            @click="confirmarEliminar(poliza.id)">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="mostrarModal" class="modal" v-for="poliza in polizas" :key="poliza.id">
                            <div class="modal-content">
                                <span class="close" @click="cerrarModal">&times;</span>
                                <p>¿Estás seguro que deseas eliminar esta compañía?</p>
                                <button class="btn btn-confirmar" @click="deletePoliza(poliza.id)">Confirmar</button>
                                <button class="btn btn-cancelar" @click="cerrarModal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <CreatePolizaModal v-if="createPolizaModal" :show="CreatePolizaModal" @close="close" :clientes="clientes">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreatePolizaModal>

        <ShowPolizaModal v-if="showPolizaModal" :show="ShowPolizaModal" @close="close" :poliza="polizaIdSelect">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </ShowPolizaModal>

        <EditPolizaModal v-if="editPolizaModal" :show="EditPolizaModal" @close="close" :poliza="polizaIdSelect">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </EditPolizaModal>

    </AppLayout>
</template>



<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DialogModal from '@/Components/DialogModal.vue'
import Button1 from '@/Components/Button.vue'
import CreatePolizaModal from '@/Pages/ClientesExternos/CreatePolizaModal.vue'
import ShowPolizaModal from '@/Pages/ClientesExternos/ShowPolizaModal.vue'
import EditPolizaModal from '@/Pages/ClientesExternos/EditPolizaModal.vue'

import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CreatePolizaModal,
        ShowPolizaModal,
        EditPolizaModal
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
            showPolizaModal: false,
            polizaIdSelect: {},
            editPolizaModal: false,
            createPolizaModal: false
        };
    },
    methods: {
        exportData(){
            axios.get('/export-polizas', { responseType: 'blob' })
                .then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'polizas.xlsx');
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(error => {
                    console.error('Error exporting data:', error);
                });
        },
        openCreateModal() {
            this.createPolizaModal = true;
        },
        close() {
            this.showPolizaModal = false;
            this.createPolizaModal = false;
            this.editPolizaModal = false;


        },
        confirmarEliminar() {
            this.mostrarModal = true;
        },
        cerrarModal() {
            this.createPolizaModal = false;
        },
        searchTable() {
            const table = $('#polizasTable').DataTable();
            table.search(this.searchQuery).draw();
        },
        ver(id) {
            axios.get('/show-poliza/' + id)
                .then(res => {
                    console.log("Res Cliente", res.data);
                    this.polizaIdSelect = res.data;
                    // Aquí se puede abrir un modal para mostrar la información del poliza
                    this.showPolizaModal = true;
                })
                .catch(error => {
                    console.log("Error Ver Cliente", error);
                });
        },
        editar(id) {
            axios.get('/show-poliza/' + id)
                .then(res => {
                    console.log("Respuesta", res.data);
                    this.polizaIdSelect = res.data;
                    this.editPolizaModal = true;
                })
                .catch(error => {
                    console.log("Error", error)
                });
        },
        deletePoliza(id) {
            alert("Delete");
            axios.delete("/crud/delete-poliza/" + id)
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
            dom: 'rtip',  // Remueve el campo de búsqueda por defecto
            scrollX: true,  // Habilita el scroll horizontal
            autoWidth: false,  // Permite que la tabla ajuste su ancho automáticamente
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