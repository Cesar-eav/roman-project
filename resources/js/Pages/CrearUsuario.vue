<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Dashboard
                </h2>

            </div>
        </template>
        <div class="flex p-2 justify-center items-center h-screen text-gray-900">
 
            <form class="w-3/4  bg-white p-8 rounded-lg shadow-md">

                <div class="mb-4">
                    <label for="rol" class="block text-sm font-medium text-gray-700">Tipo de Usuario:</label>
                    <select id="rol" v-model="formData.rol" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Interno / Externo </option>
                        <option value="interno">Interno</option>
                        <option value="externo">Externo</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="rut" class="block text-sm font-medium text-gray-700">Rut:</label>
                    <input type="text" id="rut" v-model="formData.nombre" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" id="name" v-model="formData.nombre" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo:</label>
                    <input type="text" id="email" v-model="formData.apellido" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono:</label>
                    <input type="text" id="email" v-model="formData.phone" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección:</label>
                    <input type="text" id="direccion" v-model="formData.direccion" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="pass" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                    <input type="text" id="pass" v-model="formData.apellido" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="passconfirm" class="block text-sm font-medium text-gray-700">Confirmar
                        Contraseña:</label>
                    <input type="text" id="passconfirm" v-model="formData.apellido" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <button type="submit"
                    class="w-full bg-orange-600 text-white py-2 px-4 rounded-md hover:bg-orange-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Crear
                    Usuario</button>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import { GithubIcon } from "@/Components/Icons/Brands"

import { ref } from 'vue';

// Datos del formulario
const formData = ref({
    nombre: '',
    apellido: '',
    email: '',
    edad: '',
    rol: '',
});

// Función para enviar el formulario
const submitForm = () => {
    // Aquí puedes enviar los datos del formulario a través de una petición HTTP
    console.log('Formulario enviado:', formData.value);
};
</script>
