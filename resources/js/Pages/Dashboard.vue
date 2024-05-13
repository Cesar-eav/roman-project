<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado de Clientes</div>
        <div class="flex py-2 justify-start text-gray-900">

                <button
                    class="bg-green-500 hover:bg-green-400 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                    Generar Excel
                </button>

        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100">
                        <DataTable
                            :data="clientes"
                            :columns="columns"
                            class="text-gray-900"
                        >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                        </DataTable>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import { ref } from 'vue';


const props = defineProps({
    clientes: {
        type: Array
    }
});

const columns = [
    { data: 'id' },
    { data: 'rut' },
    { data: 'name' },
    { data: 'email' },
    { data: 'telefono' },
];


</script>
