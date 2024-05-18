<template>
    <AppLayout title="Polizas">
        <div class="flex justify-center text-4xl pb-4">Listado Compañias de Seguros</div>

        <div class="flex py-2 justify-start text-gray-900">

            <button1 @click="openModal">Crear Usuario interno</button1>

            <button
                class="bg-green-500 hover:bg-green-400 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                Generar Excel
            </button>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-100  justify-start">
                        <DataTable :data="companies" :columns="columns" class="text-gray-900 ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Razón Social</th>
                                    <th>Nombre Fantasia</th>
                                    <th>Rut</th>
                                    <th>Comuna</th>
                                </tr>
                            </thead>
                        </DataTable>
                    </div>
                </div>
            </div>
        </div>

        <DialogModal v-if="showModal" :show="showModal" @close="close">

            <template #content>
                <component :is="CrearUsuario" />

            </template>
            <template #footer>
                <button @click="close">Cerrar</button>
            </template>
        </DialogModal>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import Button1 from '@/Components/Button.vue'
import DialogModal from '@/Components/DialogModal.vue'
import CrearUsuario from '@/Pages/CrearUsuarioForm.vue'
import { ref, onMounted } from 'vue'



const props = defineProps({
    companies: {
        type: Array
    }
});

const columns = [
    { data: 'id' },
    { data: 'razon_social' },
    { data: 'nombre_fantasia' },
    { data: 'rut_empresa' },
    { data: 'comuna' },
];


const showModal = ref(false) // Define a reactive property to track modal visibility

const openModal = () => {

    showModal.value = true // Show the modal
}

const close = () => {
    showModal.value = false // Hide the modal
}


</script>
