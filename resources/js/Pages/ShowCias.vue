<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado Compañias de Seguros</div>

        <div class="flex py-2 justify-start text-gray-900">

            <button1 @click="openModal">Crear Cía de Seguros</button1>

            <button
                class="bg-green-500 hover:bg-green-400 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300  justify-start">
                        <table id="clientesTable" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Razón Social</th>
                                    <th>Nombre Fantasia</th>
                                    <th>Rut</th>
                                    <th>Comuna</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="company in companies" :key="company.id">
                                    <td>{{ company.id }}</td>
                                    <td>{{ company.nombre_fantasia }}</td>
                                    <td>{{ company.rut_empresa }}</td>
                                    <td>{{ company.direccion }}</td>
                                    <td>{{ company.comuna }}</td>
                                    <th>
                                        <button class="btn btn-ver" @click="verCliente(company.id)">Ver</button>
                                        <button class="btn btn-editar"
                                            @click="editarCliente(company.id)">Editar</button>
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
        <CreateCiaModal v-if="showModal" :show="showModal" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateCiaModal>

    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import Button1 from '@/Components/Button.vue'
import CreateCiaModal from '@/Pages/CreateCiaModal.vue'
import DialogModal from '@/Components/DialogModal.vue'
import CrearUsuario from '@/Pages/CrearUsuarioForm.vue'
import { ref, onMounted } from 'vue'
import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CrearUsuario,
        CreateCiaModal,
        Button
    },
    props: {
        companies: {
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