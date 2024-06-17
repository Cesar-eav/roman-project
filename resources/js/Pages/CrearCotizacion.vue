<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col  gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Cotización
                </h2>
            </div>
        </template>


        <label for="tipo_poliza" class="block w-1/4 text-sm font-medium ">Seleccionar el Tipo Póliza:</label>
        <select
            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

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
            <option value="13">SOAPEX (Seguro Obligatorio Accidentes Personales Vehiculos Motorizados
                con
                Matricula
                Extranjera)</option>
            <option value="14">SEGURO DE CARGA TRANSPORTE TERRESTRE</option>
            <option value="15">RESPONSABILIDAD CIVIL VEHICULAR</option>
            <option value="16">GUARDIA</option>
            <option value="17">GARANTÍA FISCAL</option>
            <option value="18">SEGURO DE VIDA</option>
            <option value="19">VIDA 7 SALUD</option>

        </select>

        <div class="bg-slate-200 mt-5 p-5">
            <h2 class="font-bold">Enviar documento para cotizar:</h2>
            <form @submit.prevent="uploadAndSendPDF" enctype="multipart/form-data">
                <input type="file" ref="pdf" accept="application/pdf" multiple required />
                <div class="w-full">
                    <label for="companies"><p  class="font-bold">Selecciona las compañías: </p></label>
                    <label v-for="(company, index) in companies" :key="index" class="checkbox-option">
                        <input type="checkbox" :value="company.email" v-model="selectedCompanies">
                        {{ company.name }}
                    </label>
                </div>
                <button type="submit">Subir y Enviar</button>
            </form>
            <div v-if="message">{{ message }}</div>
        </div>

    </AppLayout>
</template>

<script>
import axios from 'axios';


import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    name: 'CrearCotizacion',
    components: {
        AppLayout
    },

    data() {
        return {
            companies: [],
            selectedCompanies: [],
            message: ''
        };
    },
    created() {
        this.fetchCompanies();
    },
    methods: {
        async fetchCompanies() {
            // Simulación de obtener las compañías del servidor
            this.companies = [
                { id: 1, name: 'HDI', email: 'contacto@companiaa.com' },
                { id: 2, name: 'Renta Nacional', email: 'contacto@companiab.com' },
                { id: 3, name: 'Zurich', email: 'contacto@companiac.com' },
                { id: 4, name: 'Mapfre', email: 'contacto@companiad.com' },
                { id: 5, name: 'FID', email: 'contacto@companiae.com' },
                { id: 6, name: 'Chubb', email: 'contacto@companiaf.com' },
                { id: 7, name: 'Consorsio', email: 'contacto@companiag.com' },
                { id: 8, name: 'Reale', email: 'contacto@companiah.com' },
                { id: 9, name: 'Sura', email: 'contacto@companiai.com' },
                { id: 10, name: 'BCI Seguros', email: 'contacto@companiaj.com' },
                { id: 11, name: 'Liberty Seguros', email: 'contacto@Liberty.com' },
            ];
        },
        async uploadAndSendPDF() {
            const formData = new FormData();
            const files = this.$refs.pdfs.files;

            for (let i = 0; i < files.length; i++) {
                formData.append('pdfs[]', files[i]);
            }

            formData.append('emails', JSON.stringify(this.selectedCompanies));

            try {
                const response = await axios.post('/upload-and-send-pdf', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                this.message = response.data.message;
            } catch (error) {
                this.message = 'Error al subir el archivo o enviar correos.';
            }
        }
    }
}
</script>

<style scoped>
.checkbox-option {
    margin-bottom: 8px;
}
</style>