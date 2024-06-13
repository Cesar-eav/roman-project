<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Usuarios Internos</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />
            <button1 @click="openModal">Crear Usuario interno</button1>
            <button @click="exportData"
                class="bg-green-500 hover:bg-green-400 text-white font-semibold p-2  rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300 text-sm  justify-start">
                        <table id="clientesTable" class="display">
                            <thead class="bg-gray-900">
                                <tr>
                                    <th>Id</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Comuna</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in clientes" :key="cliente.id">
                                    <td>{{ cliente.id }}</td>
                                    <td>{{ cliente.rut }}</td>
                                    <td>{{ cliente.name }}</td>
                                    <td>{{ cliente.ciudad }}</td>
                                    <!-- <td>{{ cliente.email }}</td>
                                    <td>{{ cliente.telefono }}</td> -->
                                    <th class="flex justify-center">
                                        <button class="btn btn-ver" @click="verCliente(cliente.id)">Ver</button>
                                        <button class="btn btn-editar"
                                            @click="editarCliente(cliente.id)">Editar</button>
                                        <button class="btn btn-eliminar" @click="mostrarModal = true">Eliminar</button>
                                    </th>

                                    <div v-if="mostrarModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close" @click="mostrarModal = false">&times;</span>
                                            <p>¿Estás seguro que deseas eliminar este cliente?</p>
                                            <button class="btn btn-confirmar"
                                                @click="deleteCliente(cliente.id)">Confirmar</button>
                                            <button class="btn btn-cancelar"
                                                @click="mostrarModal = false">Cancelar</button>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <ShowClientModal v-if="showModalClientModal" :show="showModalClientModal" :cliente="clienteSeleccionado"
            @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </ShowClientModal>

        <EditModal v-if="showModalEditClient" :show="showModalEditClient" :cliente="clienteSeleccionado" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </EditModal>


        <CreateUserModal v-if="showModal" :show="showModal" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateUserModal>

    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DialogModal from '@/Components/DialogModal.vue'
import Button1 from '@/Components/Button.vue'
import CreateUserModal from '@/Pages/CreateUserModal.vue'
import ShowClientModal from '@/Pages/ClientesInternos/ShowModal.vue'
import EditModal from './ClientesInternos/EditModal.vue'
import $ from 'jquery'
import 'datatables.net'
import axios from 'axios';


export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CrearUsuario,
        CreateUserModal,
        ShowClientModal,
        EditModal

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
            searchQuery: '',
            clienteIdSeleccionado: null,
            showVerClienteModal: false,
            clienteSeleccionado: {},
            showModalClientModal: false,
            showModalEditClient: false

        };
    },
    methods: {
        exportData() {
            axios.get('/export-users', { responseType: 'blob' })
                .then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'users.xlsx');
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(error => {
                    console.error('Error exporting data:', error);
                });

        },

        openModal() {
            this.showModal = true;
        },
        close() {
            this.showModal = false;
            this.showModalClientModal = false;
            this.showModalEditClient = false;
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
        },
        verCliente(id) {
            axios.get('/show-cliente/' + id).
                then(res => {
                    this.clienteSeleccionado = res.data;
                    console.log("Res Cliente", this.clienteSeleccionado);
                    this.showModalClientModal = true;

                }).catch(error => {
                    console.log("Error Ver Cliente", error)
                })
        },
        editarCliente(id) {
            axios.get('/show-cliente/' + id).
                then(res => {
                    this.clienteSeleccionado = res.data;
                    console.log("Res Cliente", this.clienteSeleccionado);
                    this.showModalEditClient = true;

                }).catch(error => {
                    console.log("Error Ver Cliente", error)
                })
        },
        deleteCliente(id) {
            axios.delete("/crud/delete-cliente/" + id).
                then((response) => {
                    console.log("ELiminado", response.data);
                    this.mostrarModal = false;
                })
        }
    },
    mounted() {
        $('#clientesTable').DataTable({
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
</style>