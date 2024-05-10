<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col  gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Cía. Aseguradora
                </h2>

            </div>
        </template>


        <ValidationErrors class="mb-4" />
        <form @submit.prevent="submit">
            <div class="p-4 text-gray-900 w-3/4 justify-center">
               <!--   <div class="flex">
                   <label class="block text-sm font-medium w-1/4 text-white mt-4">Tipo de Cliente:</label>
                    <select v-model="selectedType"
                        class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="externo">Cliente Externo</option>
                        <option value="interno">Cliente Interno</option>
                    </select>
                </div> -->


                           

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Razón Social:</label>
                    <input type="text" v-model="form.name" required
                        class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Nombre Fantasía:</label>
                    <input type="text" v-model="form.apellidos"
                        class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Rut Empresa:</label>
                    <input type="text" v-model="form.rut"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Dirección:</label>
                    <input type="text" v-model="form.fecha_nacimiento"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Comuna:</label>
                    <input type="text" v-model="form.telefono"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Región:</label>
                    <input type="email" v-model="form.email" required
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.address"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.ciudad"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Banco:</label>
                    <input type="text" v-model="form.region" 
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Nº Cuenta:</label>
                    <input type="text" v-model="form.isapre"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Representante Legal:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Rut:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="bg-orange-800 p-2 border border-spacing-2">

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Gerente Local:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fecha Nacimiento:</label>
                    <input type="date" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

</div>  


<div class="bg-orange-900 p-2 border border-spacing-2">
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Ejecutiva 1:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            </div>


            <div class="bg-orange-900 p-2 border border-spacing-2">

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Ejecutiva 2:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            </div>

            <div class="bg-orange-900 p-2 border border-spacing-2">

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Ejecutiva 3:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

            </div>
                  <div class="flex">

                  <label class="block w-1/4 text-sm font-medium text-white mt-4">Contraseña:</label>
                    <input type="password" v-model="form.password"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Confirmar Contraseña:</label>
                    <input type="password" v-model="form.password_confirmation"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>


                <div class="py-4 w-60 justify-items-end">
                    <Button  type="submit" class="w-full justify-center gap-2" >
                        <span>Registrar Usuario</span>
                    </Button>
                </div>
             
                </div>               
        </form>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Button from "@/Components/Button.vue"
import { Link, useForm } from '@inertiajs/inertia-vue3'
import ValidationErrors from '@/Components/ValidationErrors.vue'
import { ref } from 'vue';



const form = useForm({
    selectedCargo:'',
    name: '',
    apellidos:'',
    rut: '',
    fecha_nacimiento:'',
    telefono: '',
    email: '',
    address: '',
    ciudad: '',
    region: '',
    rol_id:2,
    password: '',
    password_confirmation: '',


})


// Función para enviar el formulario
const submit = () => {
    form.post(route('crear-usuario-interno'), {
        onSuccess: () => {
            // Redireccionar al usuario a la misma página después del registro
            const currentPageUrl = route().url()
            window.location.href = currentPageUrl
        },

        onFinish: () => form.reset('password', 'password_confirmation'),
    })

};
</script>
