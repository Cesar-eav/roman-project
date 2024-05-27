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
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300  justify-start">
                        <table id="clientesTable" class="display">
                            <thead class="bg-gray-900">
                                <tr>
                                    <th class="rounded-l-full">ID</th>
                                    <th>Razón Social</th>
                                    <th>Nombre Fantasía</th>
                                    <th>Rut Empresa</th>
                                    <th class="rounded-r-full">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="empresa in empresas" :key="empresa.id">
                                    <td>{{ empresa.id }}</td>
                                    <td>{{ empresa.razon_social }}</td>
                                    <td>{{ empresa.nombre_fantasia }}</td>
                                    <td>{{ empresa.rut_empresa_persona }}</td>
                                    <td>                                        <button class="btn btn-ver" @click="verEmpresa(empresa.id)">Ver</button>
                                        <button class="btn btn-editar" @click="editar(empresa.id)">Editar</button>
                                        <button class="btn btn-eliminar"
                                            @click="confirmarEliminar(empresa.id)">Eliminar</button></td>
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

        <ShowEmpresaModal v-if="ShowEmpresaModal" :show="ShowEmpresaModal" @close="close" :empresas="empresaIdSeleccionado">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </ShowEmpresaModal>

        <EditEmpresaModal v-if="editEmpresaModal" :show="EditEmpresaModal" :empresa="empresaIdSeleccionado" @close="close">
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </EditEmpresaModal>


        

    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DialogModal from '@/Components/DialogModal.vue'
import Button1 from '@/Components/Button.vue'
import CreateEmpresaModal from '@/Pages/CreateEmpresaModal.vue'
import ShowEmpresaModal from '@/Pages/ClientesExternos/ShowEmpresaModal.vue'
import EditEmpresaModal from '@/Pages/ClientesExternos/EditEmpresaModal.vue'
import $ from 'jquery'
import 'datatables.net'

export default {
    components: {
        AppLayout,
        DialogModal,
        Button1,
        CreateEmpresaModal,
        ShowEmpresaModal,
        EditEmpresaModal
    },
    props: {
        empresas: {
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
            editEmpresaModal: false
        };
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        close() {
            this.showModal = false;
            this.ShowEmpresaModal = false;
            this.editEmpresaModal = false;

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
        editar(id){
            axios.get('/crud/edit-show-cia/'+id)
            .then(res => {
                console.log("Respuesta", res.data);
                this.editEmpresaModal = true;
            })
            .catch(error =>{
                console.log("Error", error)
            });
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