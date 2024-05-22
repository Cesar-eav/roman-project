<template>
    <AppLayout title="Crear Empresa Nueva">
      <template #header>
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
          <h2 class="text-xl font-semibold text-center leading-tight">
           Crear Empresa Nueva
          </h2>
        </div>
      </template>
  
      <ValidationErrors class="mb-4" />
      <form @submit.prevent="submit">
        <div class="p-4 text-gray-900 w-3/4 justify-center">
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Razón Social:</label>
            <input type="text" v-model="form.razonSocial" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Nombre Fantasía:</label>
            <input type="text" v-model="form.nombreFantasia" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Nombres Persona Natural:</label>
            <input type="text" v-model="form.nombresPersonaNatural" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Apellido Paterno Persona Natural:</label>
            <input type="text" v-model="form.apellidoPaternoPersonaNatural" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Apellido Materno Persona Natural:</label>
            <input type="text" v-model="form.apellidoMaternoPersonaNatural" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">RUT Empresa Persona:</label>
            <input type="text" v-model="form.rutEmpresaPersona" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Dirección:</label>
            <input type="text" v-model="form.direccion" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Comuna:</label>
            <input type="text" v-model="form.comuna" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Región:</label>
            <input type="text" v-model="form.region" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Fono:</label>
            <input type="text" v-model="form.fono" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Mail:</label>
            <input type="email" v-model="form.mail" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Nombre Banco:</label>
            <input type="text" v-model="form.nombreBanco" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Número Cuenta:</label>
            <input type="text" v-model="form.numeroCuenta" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Representante Legal:</label>
            <input type="text" v-model="form.representanteLegal" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">RUT Representante Legal:</label>
            <input type="text" v-model="form.rutRepresentanteLegal" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Mail Representante Legal:</label>
            <input type="email" v-model="form.mailRepresentanteLegal" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Fono Representante Legal:</label>
            <input type="text" v-model="form.fonoRepresentanteLegal" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="flex">
            <label class="block text-sm w-1/4 font-medium  mt-4">Fecha Nacimiento:</label>
            <input type="date" v-model="form.fechaNacimiento" 
                   class="mt-1 block border-gray-300 w-3/4 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
          </div>
  
          <div class="py-4 w-60 justify-items-end">
            <Button type="submit" class="w-full justify-center gap-2">
              <span>Enviar</span>
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
import { ref } from 'vue'


const form = useForm({
    razonSocial: '',
    nombreFantasia: '',
    nombresPersonaNatural: '',
    apellidoPaternoPersonaNatural: '',
    apellidoMaternoPersonaNatural: '',
    rutEmpresaPersona: '',
    direccion: '',
    comuna: '',
    region: '',
    fono: '',
    mail: '',
    nombreBanco: '',
    numeroCuenta: '',
    representanteLegal: '',
    rutRepresentanteLegal: '',
    mailRepresentanteLegal: '',
    fonoRepresentanteLegal: '',
    fechaNacimiento: '',
})



const submit = () => {
    form.post(route('guardar-empresa'), {
        onSuccess: () => {
            // Redireccionar al usuario a la misma página después del registro
            const currentPageUrl = route().url()
            window.location.href = currentPageUrl
        }
    })
}
</script>
