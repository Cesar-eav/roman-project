<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado Usuarios Externos</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />
            <button1 @click="openCreateUsuarioModal">Crear Usuario Externo</button1>
            <button @click="exportData"
                class="bg-green-500 hover:bg-green-400 text-white font-semibold p-2  rounded-lg transition-colors duration-300">
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
                                    <th class="rounded-l-full">Id</th>
                                    <th>Nivel Ejecutivo</th>
                                    <th>Nombre</th>
                                    <th>Comuna</th>
                                    <th class="rounded-r-full">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in usuarios_externos" :key="cliente.id">
                                    <td>{{ cliente.id }}</td>
                                    <td>{{ cliente.nivel_ejecutivo }}</td>
                                    <td>{{ cliente.nombres }} {{ cliente.apellido_paterno }}</td>
                                    <td>{{ cliente.nombres }} {{ cliente.comuna }}</td>
                                    <th class="flex justify-start">
                                        <button class="btn btn-ver" @click="verUsuario(cliente.id)">Ver</button>
                                        <button class="btn btn-editar" @click="editarUsuario(cliente.id)">Editar</button>
                                        <button class="btn btn-eliminar" @click="mostrarModal = true">Eliminar</button>
                                    </th>

                                    <div v-if="mostrarModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close" @click="cerrarModal">&times;</span>
                                            <p>¿Estás seguro que deseas eliminar esta compañía?</p>
                                            <button class="btn btn-confirmar"
                                                @click="deleteUsuario(cliente.id)">Confirmar</button>
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


        <CreateUsuarioExternoModal v-if="showModalUsuarioExterno" :show="showModalUsuarioExterno" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </CreateUsuarioExternoModal>

        <ShowUsuarioExternoModal v-if="showUsuarioExternoModal" :show="showUsuarioExternoModal" @close="close" :usuario_externo="usuarioIdSeleccionado">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </ShowUsuarioExternoModal>

        <EditUsuarioExternoModal v-if="showUsuarioExternoEditModal" :show="showUsuarioExternoEditModal" :usuario_externo="usuarioIdSeleccionado" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </EditUsuarioExternoModal>

    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button1 from '@/Components/Button.vue'
import CreateUsuarioExternoModal from '@/Pages/ClientesExternos/CreateUsuarioExternoModal.vue'
import ShowUsuarioExternoModal from '@/Pages/ClientesExternos/ShowUsuarioExternoModal.vue'
import EditUsuarioExternoModal from '@/Pages/ClientesExternos/EditUsuarioExternoModal.vue'

import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        Button1,
        CreateUsuarioExternoModal,
        ShowUsuarioExternoModal,
        EditUsuarioExternoModal
    },
    props: {
        usuarios_externos: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            showModalUsuarioExterno: false,
            showUsuarioExternoModal: false,
            showUsuarioExternoEditModal: false,
            mostrarModal: false,
            searchQuery: '',
            usuarioIdSeleccionado: {},
            showEmpresaModal: false

        };
    },
    methods: {

        exportData() {
            
            axios.get('/export-clientes-externos', { responseType: 'blob' })
                .then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'clientes-externos.xlsx');
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(error => {
                    console.error('Error exporting data:', error);
                });
            },
        openCreateUsuarioModal() {
            this.showModalUsuarioExterno = true;
        },
        close() {
            this.showUsuarioExternoModal = false;
            this.showModalUsuarioExterno = false;
            this.showUsuarioExternoEditModal = false;
        },
        confirmarEliminar() {
            this.mostrarModal = true;
        },
        cerrarModal() {
            this.mostrarModal = false;
        },
        verUsuario(id) {
            axios.get('/show-cliente-externo/' + id)
                .then(res => {
                    console.log("Res Cliente", res.data);
                    this.usuarioIdSeleccionado = res.data;
                    // Aquí se puede abrir un modal para mostrar la información del cliente
                    this.showUsuarioExternoModal = true;

                })
                .catch(error => {
                    console.log("Error Ver Cliente", error);
                });
        },
        editarUsuario(id) {
            axios.get('/show-cliente-externo/' + id)
                .then(res => {
                    console.log("SE LLENA : -->", res.data);
                    this.usuarioIdSeleccionado = res.data;
                    this.showUsuarioExternoEditModal = true;
                    // Aquí se puede abrir un modal para editar la información del cliente
                })
                .catch(error => {
                    console.log("Error Editar Cliente", error);
                });
        },
        deleteUsuario(id) {

            axios.delete("/crud/delete-usuario-externo/" + id)
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