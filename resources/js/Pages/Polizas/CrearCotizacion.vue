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
        <select v-model="selectedPolizaType"
            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Seleccione un tipo de póliza</option>
            <template v-for="form in polizas_form" :key="form.id">
                <option :value="form.id">{{ form.name_poliza_form }}</option>
            </template>
        </select>

        <!-- SELECCIONAR COMPAÑIA -->
        <div class="bg-slate-200 mt-5 p-5">
            <div class="w-full">
                <label>
                    <p class="font-bold">Selecciona las compañías: </p>
                </label>
                <label v-for="(company, index) in companies" :key="index" class="checkbox-option">
                    <input type="checkbox" :value="company" v-model="selectedCompanies"
                        @change="fetchExecutives(company)">
                    {{ company.id }} - {{ company.razon_social }}
                </label>
            </div>

            <!-- SELECCIONAR EJECUTIVA -->
            <div v-if="selectedCompanies.length > 0" class="mt-4">
                <div v-for="(executives, index) in selectedExecutives" :key="index" class="mt-4">
                    <label>
                        <p class="font-bold">Selecciona la ejecutiva para {{ executives.companyName }}:</p>
                    </label>

                    <label v-for="executive in executives.list" :key="executive.id" class="checkbox-option">
                        <input type="radio" :value="executive" v-model="executives.selected"
                            @change="handleExecutiveSelection(executives.companyId, executive.id)">
                        {{ executive.name }}
                    </label>
                </div>
            </div>

            <div v-if="message">{{ message }}</div>
        </div>

        <!-- Formulario VEHICULOS MOTORIZADOS LIVIANOS -->
        <form v-for="(formData, index) in formDataC1" :key="index" @submit.prevent="submitFormC1(formData)">
            <div v-if="isFormVisibleC1" class="grid grid-cols-8 gap-4 mt-5 m-2">
                <div class="mb-4" v-for="field in ['marca', 'modelo', 'anio', 'patente', 'nchasis', 'nmotor', 'color']"
                    :key="field">
                    <input type="text" :id="field" v-model="formData[field]" :placeholder="capitalize(field)"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-4 content-end">
                    <button type="button" @click="addFormularioC1"
                        class="bg-green-500 p-5 h-2 w-2 hover:bg-green-600 text-white rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center justify-center">
                        (+)</button>
                </div>
            </div>
            <div class="flex col-span-8">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Enviar</button>
            </div>
        </form>

        <!-- FORMULARIO VEHICULOS MOTORIZADOS PESADO -->
        <form v-if="isFormVisibleC2" @submit.prevent="submitFormC2">
            <div class="grid grid-cols-5 gap-4 mt-5 m-2">
                <div class="mb-4" v-for="field in ['marca', 'modelo', 'anio', 'patente', 'monto_asegurado']"
                    :key="field">
                    <label :for="field" class="block text-sm font-medium">{{ capitalize(field) }}</label>
                    <input type="text" :id="field" v-model="formDataC2[field]"
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
            selectedPolizaType: '',
            selectedCompanies: [],
            selectedExecutives: [],
            formDataC1: [{}],
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
            return this.selectedPolizaType === 1 &&
                this.selectedCompanies.length > 0 &&
                this.selectedExecutives.some(exec => exec.selected !== null);
        },
        isFormVisibleC2() {
            return this.selectedPolizaType === 2 &&
                this.selectedCompanies.length > 0 &&
                this.selectedExecutives.some(exec => exec.selected !== null);
        }
    },
    watch: {
        selectedCompanies(newVal, oldVal) {
            oldVal.forEach(companyId => {
                if (!newVal.includes(companyId)) {
                    const index = this.selectedExecutives.findIndex(exec => exec.companyId === companyId);
                    if (index > -1) {
                        this.$set(this.selectedExecutives, index, {
                            ...this.selectedExecutives[index],
                            list: [],
                            selected: null
                        });
                    }
                }
            });
            newVal.forEach(companyId => {
                if (!oldVal.includes(companyId)) {
                    const company = this.companies.find(comp => comp.id === companyId);
                    this.fetchExecutives(company);
                }
            });
            this.checkFormVisibility();
        },
        selectedPolizaType() {
            this.checkFormVisibility();
        }
    },
    created() {
        this.fetchCompanies();
    },
    methods: {
        async fetchCompanies() {
            try {
                const response = await axios.get('/form/companies');
                this.companies = response.data;
            } catch (error) {
                console.error("Error fetching companies:", error);
            }
        },
        async fetchExecutives(company) {
            try {
                const response = await axios.get('/form/ejecutivas');
                const executivesList = response.data.filter(exec => exec.cia_id === company.id);
                const existingIndex = this.selectedExecutives.findIndex(exec => exec.companyId === company.id);
                if (existingIndex !== -1) {
                    this.$set(this.selectedExecutives, existingIndex, {
                        companyId: company.id,
                        companyName: company.razon_social,
                        list: executivesList.map(exec => ({
                            id: exec.id,
                            name: exec.name
                        })),
                        selected: null
                    });
                } else {
                    this.selectedExecutives.push({
                        companyId: company.id,
                        companyName: company.razon_social,
                        list: executivesList.map(exec => ({
                            id: exec.id,
                            name: exec.name
                        })),
                        selected: null
                    });
                }
                this.checkFormVisibility();
            } catch (error) {
                console.error('Error fetching executives:', error);
            }
        },
        handleExecutiveSelection(companyId, executiveId) {
            const companyIndex = this.selectedExecutives.findIndex(exec => exec.companyId === companyId);
            if (companyIndex > -1) {
                const executiveIndex = this.selectedExecutives[companyIndex].list.findIndex(exec => exec.id === executiveId);
                if (executiveIndex > -1) {
                    this.selectedExecutives[companyIndex].selected = this.selectedExecutives[companyIndex].list[executiveIndex];
                }
            }
            this.checkFormVisibility();
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
                const response = await axios.post('/api/cotizaciones', { formData });
                // Handle response
            } catch (error) {
                console.error('Error submitting Form C1:', error);
            }
        },
        async submitFormC2() {
            try {
                const response = await axios.post('/api/cotizaciones', { formData: this.formDataC2 });
                // Handle response
            } catch (error) {
                console.error('Error submitting Form C2:', error);
            }
        },
        capitalize(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        checkFormVisibility() {
            this.isFormVisibleC1 = this.selectedPolizaType === 1 &&
                this.selectedCompanies.length > 0 &&
                this.selectedExecutives.some(executive => executive.selected);
            this.isFormVisibleC2 = this.selectedPolizaType === 2 &&
                this.selectedCompanies.length > 0 &&
                this.selectedExecutives.some(executive => executive.selected);
        }
    }
};
</script>

<style scoped>
.checkbox-option {
    margin-bottom: 8px;
}
</style>

