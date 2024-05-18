<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col  gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Cía. Aseguradora
                </h2>
                text-white
            </div>
        </template>
        <ValidationErrors class="mb-4 text-gray-900" />
        <form @submit.prevent="submit">
            <div class="p-4 text-gray-900 w-3/4 justify-center bg-slate-800 rounded-md">
                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Razón Social:</label>
                    <input type="text" v-model="form.razon_social" 
                        class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Nombre Fantasía:</label>
                    <input type="text" v-model="form.nombre_fantasia"
                        class="mt-1 block border-gray-300  w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Rut Empresa:</label>
                    <input type="text" v-model="form.rut_empresa"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Dirección:</label>
                    <input type="text" v-model="form.direccion"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Comuna:</label>
                    <input type="text" v-model="form.comuna"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block text-sm w-1/4 font-medium text-white mt-4">Región:</label>
                    <input type="text" v-model="form.region" 
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.fono"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.mail"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Banco:</label>
                    <input type="text" v-model="form.nombre_banco"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Nº Cuenta:</label>
                    <input type="text" v-model="form.num_cuenta"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Representante Legal:</label>
                    <input type="text" v-model="form.representante_legal"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Rut:</label>
                    <input type="text" v-model="form.rut_representante"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>


                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                    <input type="email" v-model="form.mail_representante"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                    <input type="text" v-model="form.fono_representante"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="bg-orange-800 p-2 border border-spacing-2">

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Gerente Local:</label>
                        <input type="text" v-model="form.nombre_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>


                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Dirección:</label>
                        <input type="text" v-model="form.direccion_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Comuna:</label>
                        <input type="text" v-model="form.comuna_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Región:</label>
                        <input type="text" v-model="form.region_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                        <input type="text" v-model="form.fono_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                        <input type="email" v-model="form.mail_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fecha Nacimiento:</label>
                        <input type="date" v-model="form.fecha_nacimiento_gerente"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                </div>


                <div class="bg-orange-900 p-2 border border-spacing-2">
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Ejecutiva 1:</label>
                        <input type="text" v-model="form.ejecutiva_1"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                        <input type="text" v-model="form.fono_ejecutiva_1"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                        <input type="email" v-model="form.mail_ejecutiva_1"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fecha de Nacimiento:</label>
                        <input type="date" v-model="form.mail_ejecutiva_1"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                </div>

                <div class="bg-orange-900 p-2 border border-spacing-2">
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Ejecutiva 2:</label>
                        <input type="text" v-model="form.ejecutiva_2"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                        <input type="text" v-model="form.fono_ejecutiva_2"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                        <input type="email" v-model="form.mail_ejecutiva_2"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fecha de Nacimiento:</label>
                        <input type="date" v-model="form.mail_ejecutiva_2"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                </div>

                <div class="bg-orange-900 p-2 border border-spacing-2">
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Nombre Ejecutiva 1:</label>
                        <input type="text" v-model="form.ejecutiva_3"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fono:</label>
                        <input type="text" v-model="form.fono_ejecutiva_3"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Email:</label>
                        <input type="email" v-model="form.mail_ejecutiva_3"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium text-white mt-4">Fecha de Nacimiento:</label>
                        <input type="date" v-model="form.mail_ejecutiva_3"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                </div>

                <!-- <div class="flex">

                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Contraseña:</label>
                    <input type="password" v-model="form.password"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex">
                    <label class="block w-1/4 text-sm font-medium text-white mt-4">Confirmar Contraseña:</label>
                    <input type="password" v-model="form.password_confirmation"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div> -->


                <div class="py-4 w-60 justify-items-end">
                    <Button type="submit" class="w-full justify-center gap-2">
                        <span>Registrar Compañia</span>
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

const form = useForm({
    razon_social: '',
    nombre_fantasia: '',
    rut_empresa: '',
    direccion: '',
    comuna: '',
    region: '',
    fono: '',
    mail: '',
    nombre_banco: '',
    num_cuenta: '',
    representante_legal: '',
    rut_representante: '',
    mail_representante: '',
    fono_representante: '',
    nombre_gerente: '',
    direccion_gerente: '',
    comuna_gerente: '',
    region_gerente: '',
    fono_gerente: '',
    mail_gerente: '',
    fecha_nacimiento_gerente: null, // Usar el formato de fecha que prefieras
    ejecutiva_1: '',
    fono_ejecutiva_1: '',
    mail_ejecutiva_1: '',
    fecha_nacimiento_ejecutiva_1: null,
    ejecutiva_2: '',
    fono_ejecutiva_2: '',
    mail_ejecutiva_2: '',
    fecha_nacimiento_ejecutiva_2: null,
    ejecutiva_3: '',
    fono_ejecutiva_3: '',
    mail_ejecutiva_3: '',
    fecha_nacimiento_ejecutiva_3: null,


})


// Función para enviar el formulario
const submit = () => {
    form.post(route('crear-cia'), {
        onSuccess: () => {
            // Redireccionar al usuario a la misma página después del registro
            const currentPageUrl = route().url()
            window.location.href = currentPageUrl
        }
        // ,

        // onFinish: () => form.reset('password', 'password_confirmation'),
    })

};
</script>
