<template>
    <AppLayout title="Polizas">




        <div class="flex justify-center text-4xl pb-4">Listado de Externo</div>





        <div class="flex py-2 justify-start text-gray-900">
            <input type="text" class="border border-gray-300 mr-2 rounded-md w-40" placeholder="Nombre">
            <input type="text" class="border border-gray-300 mr-2 rounded-md w-40" placeholder="RUT">
            <input type="text" class="border border-gray-300 mr-2 rounded-md w-40" placeholder="Email">
            <input type="text" class="border border-gray-300 mr-2 rounded-md w-40" placeholder="Telefono">
            <button class="bg-green-500 hover:bg-green-400 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
      Generar Excel
    </button>
        </div>

        <div class="grid grid-cols-12 gap-4 ">
            <div class="col-span-12">
                <div class="grid grid-cols-12 bg-gray-100 border-b border-gray-200 text-xs">
                    <div class="col-span-2 px-4 py-2 font-semibold text-gray-700">RUT</div>
                    <div class="col-span-2 px-4 py-2 font-semibold text-gray-700">NOMBRE</div>
                    <div class="col-span-2 px-4 py-2 font-semibold text-gray-700">EMAIL</div>
                    <div class="col-span-1 px-4 py-2 font-semibold text-gray-700">TELEFONO</div>
                    <div class="col-span-1 px-4 py-2 font-semibold text-gray-700">$</div>
                    <div class="col-span-1 px-4 py-2 font-semibold text-gray-700">FECHA INICIO</div>
                    <div class="col-span-1 px-4 py-2 font-semibold text-gray-700"></div>

                </div>
                <div v-for="(row, index) in data" :key="index"
                    class="grid grid-cols-12 border-b border-gray-200 text-xs">
                    <div class="col-span-2 px-4 py-2">{{ row.rut }}</div>
                    <div class="col-span-2 px-4 py-2">{{ row.cliente }}</div>
                    <div class="col-span-2 px-4 py-2">{{ row.email }}</div>
                    <div class="col-span-1 px-4 py-2">{{ row.tipoPoliza }}</div>
                    <div class="col-span-1 px-4 py-2">{{ row.valorPrima }}</div>
                    <div class="col-span-1 px-4 py-2">{{ row.valorNeto }}</div>
                    <div class="col-span-1 px-4 py-2">{{ row.patente }}</div>
                    <div class="col-span-1 px-4 py-2">{{ row.fechaInicio }}</div>
                    <div class="col-span-1 px-4 py-2 bg-orange-700">{{ row.fechaVencimiento }}</div>

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

const selectedType = ref('interno');
const nombreInterno = ref('');
const direccionInterno = ref('');
const nombreExterno = ref('');
const direccionExterno = ref('');

const data = [
    { rut: '12345678-9', cliente: 'Juan Pérez', numeroPoliza: 'POL-001', tipoPoliza: '569585', valorPrima: '$500', valorNeto: '$450', patente: 'ABC123', fechaInicio: '2024-05-10', fechaVencimiento: 'IR', compania: 'SegurosXYZ', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '5369585', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '7458596', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '1254585', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '6859874', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '9586545', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '3652448', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    { rut: '98765432-1', cliente: 'María González', numeroPoliza: 'POL-002', tipoPoliza: '95595659', valorPrima: '$300', valorNeto: '$280', patente: 'DEF456', fechaInicio: '2024-04-15', fechaVencimiento: 'IR', compania: 'SegurosABC', estado: 'Activo', accion: 'Editar', email: 'empresa@gmail.com' },
    // Agrega aquí más filas de datos...
]
</script>
