<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Cotización
                </h2>
            </div>
        </template>

        <label for="tipo_poliza" class="block w-1/4 text-sm font-medium">Seleccionar el Tipo Póliza:</label>
        <select v-model="selectedPolicyType"
            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Seleccione un tipo de póliza</option>
            <template v-for="form in polizas_form" :key="form.id">
                <option :value="form.id">{{ form.name_poliza_form }}</option>
            </template>
        </select>

        <div class="bg-slate-200 mt-5 p-5">
            <div class="w-full">
                <label>
                    <p class="font-bold">Selecciona las compañías: </p>
                </label>
                <label v-for="(company, index) in companies" :key="index" class="checkbox-option">
                    <input type="checkbox" :value="company.id" v-model="selectedCompanies"
                        @change="fetchExecutives(company)">
                    {{ company.name }}
                </label>
            </div>

            <div v-if="selectedCompanies.length > 0" class="mt-4">
                <div v-for="(executives, index) in selectedExecutives" :key="index" class="mt-4">
                    <label>
                        <p class="font-bold">Selecciona la ejecutiva para {{ executives.companyName }}:</p>
                    </label>
                    <label v-for="executive in executives.list" :key="executive.id" class="checkbox-option">
                        <input type="radio" :value="executive.name" v-model="executives.selected">
                        {{ executive.name }}
                    </label>
                </div>
            </div>

            <div v-if="message">{{ message }}</div>
        </div>

        <!-- Formulario VEHICULOS MOTORIZADOS LIVIANOS -->
        <form v-for="(formData, index) in formDataC1" :key="index" @submit.prevent="submitFormC1(formData)">
            <div v-if="isFormVisibleC1" class="grid grid-cols-8 gap-4 mt-5 m-2">
                <div class="mb-4">
                    <input type="text" id="marca" v-model="formData.marca" placeholder="Marca"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="text" id="modelo" v-model="formData.modelo" placeholder="Modelo"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="number" id="anio" v-model="formData.anio" placeholder="Año"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="text" id="patente" v-model="formData.patente" placeholder="Patente"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="text" id="nchasis" v-model="formData.nchasis" placeholder="N° Chasis"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="text" id="nmotor" v-model="formData.nmotor" placeholder="N° Motor"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <input type="text" id="color" v-model="formData.color" placeholder="Color"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4 content-end">
                    <button type="button" @click="addFormularioC1"
                        class="bg-green-500 p-5 h-2 w-2 hover:bg-green-600 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center justify-center">
                        (+)</button>
                </div>


            </div>
        </form>


        <div class="flex col-span-8">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Enviar</button>
        </div>

        <!-- FORMULARIO VEHICULOS MOTORIZADOS PESADO -->
        <form v-if="isFormVisibleC2" @submit.prevent="submitFormC2">
            <div class="grid grid-cols-5 gap-4 mt-5 m-2">
                <div class="mb-4">
                    <label for="marcaC2" class="block text-sm font-medium">Marca</label>
                    <input type="text" id="marcaC2" v-model="formDataC2.marca"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="modeloC2" class="block text-sm font-medium">Modelo</label>
                    <input type="text" id="modeloC2" v-model="formDataC2.modelo"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="anioC2" class="block text-sm font-medium">Año</label>
                    <input type="number" id="anioC2" v-model="formDataC2.anio"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="patenteC2" class="block text-sm font-medium">Patente</label>
                    <input type="text" id="patenteC2" v-model="formDataC2.patente"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4">
                    <label for="monto_asegurado" class="block text-sm font-medium">Monto asegurado</label>
                    <input type="text" id="monto_asegurado" v-model="formDataC2.monto_asegurado"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end col-span-5">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Enviar</button>
                </div>
            </div>

            <!-- Botón para agregar más vehículos pesados -->
            <div class="flex justify-end">
                <button type="button" @click="addFormularioC2"
                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">MÁS
                    (+)</button>
            </div>
        </form>
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
    props: {
        polizas_form: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            companies: [],
            selectedCompanies: [],
            selectedExecutives: [],
            selectedPolicyType: '',
            formDataC1: [{
                marca: '',
                modelo: '',
                anio: '',
                patente: '',
                nchasis: '',
                nmotor: '',
                color: ''
            }],
            formDataC2: {
                marca: '',
                modelo: '',
                anio: '',
                patente: '',
                monto_asegurado: ''
            },
            message: ''
        };
    },
    computed: {
        isFormVisibleC1() {
            return this.selectedPolicyType === 1 &&
                this.selectedCompanies.length > 0 &&
                this.selectedExecutives.some(executive => executive.selected);
        },
        isFormVisibleC2() {
            return this.selectedPolicyType === 2 &&
                this.selectedCompanies.length > 0 &&
                this.selectedExecutives.some(executive => executive.selected);
        }
    },
    watch: {
        selectedCompanies() {
            this.checkFormVisibility();
        },
        selectedPolicyType() {
            this.checkFormVisibility();
        }
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
        fetchExecutives(company) {
            // Simulación de obtener las ejecutivas del servidor para cada compañía
            const executivesList = {
                1: [
                    { id: 1, name: 'Ejecutiva HDI 1' },
                    { id: 2, name: 'Ejecutiva HDI 2' },
                    { id: 3, name: 'Ejecutiva HDI 3' }
                ],
                2: [
                    { id: 1, name: 'Ejecutiva Renta Nacional 1' },
                    { id: 2, name: 'Ejecutiva Renta Nacional 2' },
                    { id: 3, name: 'Ejecutiva Renta Nacional 3' }
                ],
                3: [
                    { id: 1, name: 'Ejecutiva Zurich 1' },
                    { id: 2, name: 'Ejecutiva Zurich 2' },
                    { id: 3, name: 'Ejecutiva Zurich 3' }
                ],
                4: [
                    { id: 1, name: 'Ejecutiva Mapfre 1' },
                    { id: 2, name: 'Ejecutiva Mapfre 2' },
                    { id: 3, name: 'Ejecutiva Mapfre 3' }
                ],
                // Añadir más compañías y sus ejecutivas según sea necesario
            };

            const executives = executivesList[company.id] || [];

            const index = this.selectedExecutives.findIndex(e => e.companyId === company.id);
            if (index > -1) {
                this.selectedExecutives.splice(index, 1);
            } else {
                this.selectedExecutives.push({
                    companyId: company.id,
                    companyName: company.name,
                    list: executives,
                    selected: ''
                });
            }

            this.checkFormVisibility();
        },
        checkFormVisibility() {
            // No es necesario hacer nada en este método
        },
        addFormularioC1() {
            this.formDataC1.push({
                marca: '',
                modelo: '',
                anio: '',
                patente: '',
                nchasis: '',
                nmotor: '',
                color: ''
            });
        },
        addFormularioC2() {
            this.formDataC2 = {
                marca: '',
                modelo: '',
                anio: '',
                patente: '',
                monto_asegurado: ''
            };
        },
        async submitFormC1(formData) {
            try {
                // Lógica para enviar el formulario C1
                const response = await axios.post('/api/cotizaciones', { formData });
                // Limpieza y manejo de respuesta
            } catch (error) {
                // Manejo de errores
            }
        },
        async submitFormC2() {
            try {
                // Lógica para enviar el formulario C2
                const response = await axios.post('/api/cotizaciones', { formData: this.formDataC2 });
                // Limpieza y manejo de respuesta
            } catch (error) {
                // Manejo de errores
            }
        }
    }
};
</script>

<style scoped>
.checkbox-option {
    margin-bottom: 8px;
}
</style>
