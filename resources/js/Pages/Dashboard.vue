<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Clientes</div>
        <div class="flex py-2 px-8 justify-between text-gray-900">


            <!-- Campo de búsqueda personalizado -->
            <input v-model="searchQuery" @input="searchTable" type="text" placeholder="Buscar..."
                class="border rounded-lg" />

            <button
                class="bg-green-500 hover:bg-green-400 text-white font-semibold p-2  rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100  justify-start">
                        <table id="clientesTable" class="display text-gray-900">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in clientes" :key="cliente.id">
                                    <td>{{ cliente.rut }}</td>
                                    <td>{{ cliente.name }}</td>
                                    <td>{{ cliente.email }}</td>
                                    <td>{{ cliente.telefono }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import { ref, onMounted } from 'vue'
import $ from 'jquery'
// import 'datatables.net-dt/css/jquery.dataTables.css'
import 'datatables.net'


const props = defineProps({
    clientes: {
        type: Array
    }
});

const searchQuery = ref('');

const searchTable = () => {
    const table = $('#clientesTable').DataTable();
    table.search(searchQuery.value).draw();
};

onMounted(() => {
    $('#clientesTable').DataTable({
         dom: 'rtip'  //Remueve el campo de búsqueda por defecto

    });
});

</script>
