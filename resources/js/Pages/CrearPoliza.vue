<template>
    <AppLayout title="Crear Poliza">
        <template #header>
            <div class="flex flex-col  gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Poliza
                </h2>
            </div>
        </template>


        <ValidationErrors class="mb-4" />
        <form @submit.prevent="submit">
            <div class="p-4 text-gray-900 w-3/4 justify-center">
                <div class="flex">
                    <label for="tipo_poliza" class="block w-1/4 text-sm font-medium text-white">Tipo Póliza:</label>
                    <select v-model="form.tipo_poliza"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Tipo de Poliza</option>
                        
                        <option value="1">VEHICULOS MOTORIZADOS LIVIANOS</option>
                        <option value="2">VEHICULOS MOTORIZADOS PESADOS</option>
                        <option value="3">MAQUINARIA Y EQUIPO MÓVIL</option>
                        <option value="4">ACCIDENTES PERSONALES</option>
                        <option value="5">ASIENTO DE PASAJEROS</option>
                        <option value="6">SEGURO DE CONDUCTOR (DECRETO 80)</option>
                        <option value="7">TODO RIESGO Y CONSTRUCCIÓN</option>
                        <option value="8">RESPONSABILIDAD CIVIL EMPRESA</option>
                        <option value="9">RESPONSABILIDAD CIVIL MÉDICA</option>
                        <option value="10">INCENDIO</option>
                        <option value="11">GARANTÍA</option>
                        <option value="12">SOAP (Seguro Obligatorio Accidentes Personales)</option>
                        <option value="13">SOAPEX (Seguro Obligatorio Accidentes Personales Vehiculos Motorizados con Matricula Extranjera)</option>
                        <option value="14">SEGURO DE CARGA TRANSPORTE TERRESTRE</option>
                        <option value="15">RESPONSABILIDAD CIVIL VEHICULAR</option>
                        <option value="16">GUARDIA</option>
                        <option value="17">GARANTÍA FISCAL</option>
                        <option value="18">SEGURO DE VIDA</option>
                        <option value="19">VIDA 7 SALUD</option>

                    </select>
                </div>

                

                <div class="flex">
                    <label for="numero_poliza" class="block w-1/4 text-sm font-medium text-white mt-4">N°
                        Póliza:</label>
                    <input type="text" v-model="form.numero_poliza" id="numero_poliza" name="numero_poliza"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label for="monto_asegurado" class="block w-1/4 text-sm font-medium text-white mt-4">Monto
                        Asegurado:</label>
                    <input type="text" v-model="form.monto_asegurado" id="monto_asegurado" name="monto_asegurado"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="flex">
                    <label for="prima" class="block w-1/4 text-sm font-medium text-white mt-4">Prima:</label>
                    <input type="text" v-model="form.prima" id="prima" name="prima"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Valor Neto -->
                <div class="flex">
                    <label for="valor_neto" class="block w-1/4 mt-4 text-sm font-medium text-white">Valor Neto:</label>
                    <input type="text" id="valor_neto" v-model="form.valor_neto"
                        class="mt-1 block w-3/4  border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Fecha de Inicio -->
                <div class="flex">
                    <label for="fecha_inicio" class="block w-1/4 text-sm font-medium text-white">Fecha de
                        Inicio:</label>
                    <input type="date" id="fecha_inicio" v-model="form.fecha_inicio"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Fecha de Vencimiento -->
                <div class="flex">
                    <label for="fecha_vencimiento" class="block w-1/4 text-sm font-medium text-white">Fecha de
                        Vencimiento:</label>
                    <input type="date" id="fecha_vencimiento" v-model="form.fecha_vencimiento"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Deducible -->
                <div class="flex">
                    <label for="deducible" class="block w-1/4 text-sm font-medium text-white">Deducible:</label>
                    <input type="text" id="deducible" v-model="form.deducible"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Cantidad de Cuotas -->
                <div class="flex">
                    <label for="cantidad_cuotas" class="block w-1/4 text-sm font-medium text-white">Cantidad de
                        Cuotas:</label>
                    <input type="number" id="cantidad_cuotas" v-model="form.cantidad_cuotas"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Día de Pago -->
                <div class="flex">
                    <label for="dia_pago" class="block w-1/4 text-sm font-medium text-white">Día de Pago:</label>
                    <input type="number" id="dia_pago" v-model="form.dia_pago"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Método de Pago -->
                <div class="flex">
                    <label for="metodo_pago" class="block w-1/4 text-sm font-medium text-white">Método de Pago:</label>
                    <select v-model="form.metodo_pago"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Seleccionar Método de Pago</option>
                        <option value="Tarjeta Crédito">Tarjeta Crédito</option>
                        <option value="Contado">Contado</option>
                        <option value="Presencial">Presencial</option>
                        <option value="PAC (Pago Automático Cuenta)">PAC (Pago Automático Cuenta)</option>
                    </select>
                </div>
                <!-- Aseguradora -->
                <div class="flex">
                    <label for="aseguradora" class="block w-1/4 text-sm font-medium text-white">Aseguradora:</label>
                    <input type="text" id="aseguradora" v-model="form.aseguradora"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Vendedor -->
                <div class="flex">
                    <label for="vendedor" class="block w-1/4 text-sm font-medium text-white">Vendedor:</label>
                    <input type="text" id="vendedor" v-model="form.vendedor"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <!-- Selección de Archivos -->
                <div class="flex">
                    <label for="archivos_seleccionados" class="block w-1/4 text-sm font-medium text-white">Selección de
                        Archivos:</label>
                    <input type="file" id="archivos_seleccionados" ref="archivos_seleccionados"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        multiple>
                </div>

                <div class="py-4 w-60 justify-items-end">
                    <Button type="submit" class="w-full justify-center gap-2">
                        <span>Registrar Póliza</span>
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
    tipo_poliza: '',
    numero_poliza: '',
    monto_asegurado: '',
    prima: '',
    valor_neto: '',
    fecha_inicio: '',
    fecha_vencimiento: '',
    deducible: '',
    cantidad_cuotas: '',
    dia_pago: '',
    metodo_pago: '',
    aseguradora: '',
    vendedor: '',
    archivos_seleccionados: []


})

const handleFileChange = (event) => {
    const files = event.target.files;
    form.archivos_seleccionados = files;
};


const submit = () => {
    form.post(route('crear-poliza'), {
        onSuccess: () => {
            // Redireccionar al usuario a la misma página después del registro
            const currentPageUrl = route().url()
            window.location.href = currentPageUrl
        }
    })
}
</script>
