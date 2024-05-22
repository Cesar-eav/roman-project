<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Clientes</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />
            <button1 @click="openModal">Crear Usuario interno</button1>
            <button
                class="bg-green-500 hover:bg-green-400 text-white font-semibold p-2  rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300  justify-start">
                        <table id="clientesTable" class="display">
                            <thead class="bg-gray-500 rounded-xl">
                                <tr>
                                    <th>Id</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <!-- <th>Email</th>
                                    <th>Telefono</th> -->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in clientes" :key="cliente.id">
                                    <td>{{ cliente.id }}</td>
                                    <td>{{ cliente.rut }}</td>
                                    <td>{{ cliente.name }}</td>
                                    <!-- <td>{{ cliente.email }}</td>
                                    <td>{{ cliente.telefono }}</td> -->
                                    <th class="flex justify-start">
                                        <button class="btn btn-ver" @click="verCliente(cliente.id)">Ver</button>
                                        <button class="btn btn-editar"
                                            @click="editarCliente(cliente.id)">Editar</button>
                                        <button class="btn btn-eliminar" @click="mostrarModal = true">Eliminar</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div v-if="mostrarModal" class="modal">
            <div class="modal-content">
                <span class="close" @click="mostrarModal = false">&times;</span>
                <p>¿Estás seguro que deseas eliminar este cliente?</p>
                <button class="btn btn-confirmar" @click="mostrarModal = false">Confirmar</button>
                <button class="btn btn-cancelar" @click="mostrarModal = false">Cancelar</button>
            </div>
        </div>

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
import CrearUsuario from '@/Pages/CrearUsuarioForm.vue'
import CreateUserModal from '@/Pages/CreateUserModal.vue'
import { ref, onMounted } from 'vue'
import Button from "@/Components/Button.vue"
import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CrearUsuario,
        CreateUserModal
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