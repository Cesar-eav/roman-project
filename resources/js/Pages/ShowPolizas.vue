<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Polizas</div>
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
                        <!-- <DataTable :data="polizas" :columns="columns" class="text-gray-900 ">
                        </DataTable> -->
                        <table id="polizasTable" class="display text-gray-900">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo Poliza</th>
                                    <th>N° </th>
                                    <th>Monto Aegurado</th>
                                    <th>Prima</th>
                                    <th>Valor Neto</th>
                                    <th>Fecha Inicio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cliente in polizas" :key="cliente.id">
                                    <td>{{ cliente.id }}</td>
                                    <td>{{ cliente.tipo_poliza }}</td>
                                    <td>{{ cliente.numero_poliza }}</td>
                                    <td>{{ cliente.monto_asegurado }}</td>
                                    <td>{{ cliente.prima }}</td>
                                    <td>{{ cliente.valor_neto }}</td>
                                    <td>{{ cliente.fecha_inicio }}</td>
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
    polizas: {
        type: Array
    }
});

// const columns = [
//     { data: 'id' },
//     { data: 'rut' },
//     { data: 'name' },
//     { data: 'email' },
//     { data: 'telefono' },
// ];

const searchQuery = ref('');

const searchTable = () => {
    const table = $('#polizasTable').DataTable();
    table.search(searchQuery.value).draw();
};

onMounted(() => {
    $('#polizasTable').DataTable({
        dom: 'rtip' // Remueve el campo de búsqueda por defecto

    });
});

</script>
