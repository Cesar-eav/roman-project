<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col  gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Usuario
                </h2>

            </div>
        </template>

<div >

        <div class="p-4 text-gray-900 w-3/4 justify-center">
            <div class="flex">
                <label class="block text-sm font-medium w-1/4 text-white mt-4">Tipo de Cliente:</label>
                <select v-model="selectedType"
                    class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="externo">Cliente Externo</option>
                    <option value="interno">Cliente Interno</option>
                    </select>
                </div>
            <div class="flex">
                <label class="block text-sm w-1/4 font-medium text-white mt-4">Nombre:</label>
                <input type="text" v-model="nombre"
                    class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            <div class="flex">
                <label class="block text-sm w-1/4 font-medium text-white mt-4">Correo:</label>
                <input type="text" v-model="correo"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            <div class="flex">
                <label class="block w-1/4 text-sm font-medium text-white mt-4">Telefono:</label>
                <input type="text" v-model="telefono"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            <div class="flex">
                <label class="block w-1/4 text-sm font-medium text-white mt-4">Dirección:</label>
                <input type="text" v-model="direccion"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            <div class="flex">
                <label class="block w-1/4 text-sm font-medium text-white mt-4">Comuna:</label>
                <input type="text" v-model="comuna"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            <div class="flex">
                <label class="block w-1/4 text-sm font-medium text-white mt-4">Ciudad:</label>
                <input type="text" v-model="ciudad"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="flex">

                <label class="block w-1/4 text-sm font-medium text-white mt-4">Contraseña:</label>
                <input type="text" v-model="pass"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="flex">
                <label class="block w-1/4 text-sm font-medium text-white mt-4">Confirmar Contraseña:</label>
                <input type="text" v-model="passconfirm"
                    class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>


            <div v-if="selectedType === 'interno'">
                <div class="flex">
                    <label for="cargo" class="block w-1/4 text-sm font-medium text-white">Cargo:</label>
                    <select v-model="selectedCargo" id="cargo" name="cargo"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Seleccionar Cargo</option>
                        <option value="cobranza">Cobranza</option>
                        <option value="contador">Contador</option>
                        <option value="ejecutivo_comercial">Ejecutivo Comercial</option>
                        <option value="vendedor">Vendedor</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import { GithubIcon } from "@/Components/Icons/Brands"

import { ref } from 'vue';

const selectedType = ref('externo');
const nombre = ref('');
const correo = ref('');
const direccion = ref('');
const selectedCargo = ref('');
const comuna = ref('');
const ciudad = ref('');
const pass = ref('');
const passconfirm = ref('');



// Función para enviar el formulario
const submitForm = () => {
    // Aquí puedes enviar los datos del formulario a través de una petición HTTP
    console.log('Formulario enviado:', formData.value);
};
</script>
