<template>
    <AppLayout title="Cotizaciones">
        <div>
            <h1>Listado de Cotizaciones</h1>
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-300 text-sm justify-start">
                            <table id="clientesTable" class="display">
                                <thead class="bg-gray-900">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Marca</th>
                                        <th>Ejecutivo</th>
                                        <th>Cìa Seguros</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="cotizacion in cotizaciones" :key="cotizacion.id">
                                        <td>COT-{{ getYear(cotizacion.created_at) }}-{{ getMonth(cotizacion.created_at)
                                            }}-{{ cotizacion.id }}</td>
                                        <td>{{ cotizacion.marca }}</td>
                                        <td v-for="ejecutiva in cotizacion.ejecutivas" :key="ejecutiva.id">
                                            {{ ejecutiva.name }}</td>
                                        <td v-for="cia in cotizacion.cias" :key="cia.id">
                                            {{ cia.razon_social }}</td>
        

                                        <th class="flex justify-center">
                                            <button class="btn btn-ver" @click="verCia(cotizacion.id)">Ver</button>
                                            <button class="btn btn-editar"
                                                @click="editarCia(cotizacion.id)">Enviar</button>
                                            <button class="btn btn-eliminar"
                                                @click="confirmarEliminar(cotizacion.id)">Eliminar</button>
                                        </th>
                                        <div v-if="mostrarModal" class="modal">
                                            <div class="modal-content">
                                                <span class="close" @click="cerrarModal">&times;</span>
                                                <p>¿Estás seguro que deseas eliminar esta compañía?</p>
                                                <button class="btn btn-confirmar"
                                                    @click="deleteCia(cotizacion.id)">Confirmar</button>
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

        </div>
    </AppLayout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import $ from 'jquery'
import 'datatables.net'

export default {
    name: 'ShowCotizaciones',
    components: {
        AppLayout
    },
    props: {
        cotizaciones: {
            type: Array,
            required: true
        },
    },
    methods: {
        searchTable() {
            const table = $('#clientesTable').DataTable();
            table.search(this.searchQuery).draw();
        },
        getYear(dateString) {
            const date = new Date(dateString)
            return date.getFullYear()
        },
        getMonth(dateString) {
            const date = new Date(dateString)
            return date.toLocaleString('default', { month: 'short' }).toUpperCase()
        }
    },
    mounted() {
        $('#clientesTable').DataTable({
            dom: 'rtip', // Remueve el campo de búsqueda por defecto
            // order: [[0, 'desc']],  // Ordena la primera columna en orden descendente
            autoWidth: false,  // Permite que la tabla ajuste su ancho automáticamente
            order: [[0, 'desc']],  // Ordena la primera columna en orden descendente

        });
    }
}
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
