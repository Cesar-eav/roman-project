<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col  gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Usuario Interno
                </h2>

            </div>
        </template>


        <ValidationErrors class="mb-4 " />
        <form @submit.prevent="submit">
            <div class="p-4 text-white w-3/4 justify-center bg-slate-900">
                <div class="flex">
                        <label for="cargo" class="block w-1/4 text-sm font-medium ">Nivel ejecutivo:</label>
                        <select v-model="form.selectedCargo" id="cargo" name="cargo" required
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Seleccionar Nivel Ejecutivo</option>
                            <option value="cobranza">Comercial</option>
                            <option value="contador">Cobranza</option>
                            <option value="gestor_siniestro">Gestor de Siniestros</option>                            
                        </select>
                </div>  

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium  mt-4">Nombre:</label>
                    <input type="text" v-model="form.name" required
                        class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium  mt-4">Apellidos:</label>
                    <input type="text" v-model="form.last_name" required
                        class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium  mt-4">Rut:</label>
                    <input type="text" v-model="form.rut" required
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium  mt-4">Fecha Nacimiento:</label>
                    <input type="date" v-model="form.fecha_nacimiento"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">Telefono:</label>
                    <input type="text" v-model="form.telefono"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium  mt-4">Correo:</label>
                    <input type="email" v-model="form.email" required
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">Dirección:</label>
                    <input type="text" v-model="form.address"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">Comuna:</label>
                    <input type="text" v-model="form.ciudad"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">Región:</label>
                    <input type="text" v-model="form.region" 
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">Isapre:</label>
                    <input type="text" v-model="form.isapre"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">AFP:</label>
                    <input type="text" v-model="form.afp"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                  <div class="flex">

                  <label class="block w-1/4 text-sm font-medium  mt-4">Contraseña:</label>
                    <input type="password" v-model="form.password" required
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium  mt-4">Confirmar Contraseña:</label>
                    <input type="password" v-model="form.password_confirmation" required
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
    last_name:'',
    rut: '',
    fecha_nacimiento:'',
    telefono: '',
    email: '',
    address: '',
    ciudad: '',
    region: '',
    rol_id:2,
    password: 'qwedsar1ASD',
    password_confirmation: 'qwedsar1ASD',


})


// Función para enviar el formulario
const submit = () => {
    form.post(route('crear-usuario-interno'), {
        onSuccess: () => {
   
        },

        onFinish: () => form.reset('password', 'password_confirmation'),
    })

};
</script>
