<template>
    <AppLayout title="Dashboard">
        <div>
            <h1>Crear Cotización</h1>

            <!-- Selección del formulario -->
            <label for="formulario-select">Seleccione un formulario:</label>
            <select v-model="selectedFormulario" id="formulario-select">
                <option v-for="formulario in formularios" :key="formulario.id" :value="formulario">
                    {{ formulario.name_poliza_form }}
                </option>
            </select>

            <!-- Selección de compañías -->
            <h2>Seleccione las Compañías de Seguro:</h2>
            <div v-for="compania in companias" :key="compania.id">
                <input type="checkbox" :id="'compania-' + compania.id" :value="compania" v-model="selectedCompanias"
                    @change="updateSelectedEjecutivos(compania)" />
                <label :for="'compania-' + compania.id">{{ compania.razon_social }}</label>

                <!-- Ejecutivos asociados a la compañía seleccionada -->
                <div class="bg-slate-300" v-if="isSelected(compania)">
                    <h3>Seleccione un Ejecutivo de {{ compania.razon_social }}:</h3>
                    <div v-for="ejecutivo in compania.ejecutivas" :key="ejecutivo.id">
                        <input type="radio" :name="'ejecutivo-' + compania.id" :id="'ejecutivo-' + ejecutivo.id"
                            :value="ejecutivo" v-model="selectedEjecutivos[compania.id]" />
                        <label :for="'ejecutivo-' + ejecutivo.id">{{ ejecutivo.name }}</label>
                    </div>
                </div>
            </div>

            <!-- Botón para agregar un nuevo vehículo -->

            <!-- Campos del formulario para cada vehículo -->
            <div v-if="shouldShowForm" class="flex justify-end">
                <div>
                    <button class="btn-add-vehicle" @click="addVehicle">Agregar (+)</button>
                </div>
            </div>

         <!-- Campos del formulario para cada vehículo -->
         <div v-if="shouldShowForm" v-for="(vehicle, vehicleIndex) in vehicles" :key="vehicleIndex"
                class="vehicle-form grid grid-cols-8  bg-slate-500 ">
                <h2 class="col-span-8 bg-slate-600">Campos del Formulario para Vehículo {{ vehicleIndex + 1 }}</h2>

                <div v-for="(campo, index) in vehicle.campos" :key="index">
                    <label :for="campo.id">{{ campo.label }}:</label>
                    <input :type="campo.type" :id="campo.id" v-model="campo.value" />                    
                </div>
                <button class="btn-remove col-span-1" @click="removeVehicle(vehicleIndex)">(-)</button>


            </div>

            <!-- Botón de envío -->
            <button @click="submitForm">Enviar</button>
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
    props: {
        formularios: Array,
        companias: Array,
    },
    data() {
        return {
            selectedFormulario: '',
            selectedCompanias: [],
            selectedEjecutivos: {}, // Aquí se almacenan los ejecutivos seleccionados por cada compañía
            vehicles: [
                {
                    campos: [
                        { id: 'marca', label: 'Marca', type: 'text', value: '' },
                        { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                        { id: 'agnio', label: 'Año', type: 'text', value: '' },
                        { id: 'patente', label: 'Patente', type: 'text', value: '' },
                        { id: 'n_chasis', label: 'Nº Chasis', type: 'text', value: '' },
                        { id: 'n_motor', label: 'Nº Motor', type: 'text', value: '' },
                        { id: 'color', label: 'Color', type: 'text', value: '' },
                    ]
                }
            ]
        };
    },
    computed: {
        shouldShowForm() {
            return this.selectedFormulario && this.selectedCompanias.length > 0 && this.allExecutivesSelected;
        },
        allExecutivesSelected() {
            return this.selectedCompanias.every(compania => this.selectedEjecutivos[compania.id]);
        }
    },
    methods: {
        isSelected(compania) {
            return this.selectedCompanias.includes(compania);
        },
        updateSelectedEjecutivos(compania) {
            if (!this.isSelected(compania)) {
                this.$delete(this.selectedEjecutivos, compania.id);
            }
        },
        addVehicle() {
            const newVehicle = {
                campos: [
                    { id: 'marca', label: 'Marca', type: 'text', value: '' },
                    { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                    { id: 'agnio', label: 'Año', type: 'text', value: '' },
                    { id: 'patente', label: 'Patente', type: 'text', value: '' },
                    { id: 'n_chasis', label: 'Nº Chasis', type: 'text', value: '' },
                    { id: 'n_motor', label: 'Nº Motor', type: 'text', value: '' },
                    { id: 'color', label: 'Color', type: 'text', value: '' },
                ]
            };
            this.vehicles.push(newVehicle);
        },
        removeVehicle(index) {
            this.vehicles.splice(index, 1);
        },
        submitForm() {
            console.log("Enviando Formulario");
            const formData = {
                formulario: this.selectedFormulario,
                companias: this.selectedCompanias.map(compania => ({
                    id: compania.id,
                    ejecutivo: this.selectedEjecutivos[compania.id] || null,
                })),
                vehicles: this.vehicles.map(vehicle => ({
                    campos: vehicle.campos.reduce((acc, campo) => {
                        acc[campo.id] = campo.value;
                        return acc;
                    }, {})
                }))
            };
            axios.post('/form/cotizaciones-v1', formData)
                .then(response => {
                    console.log('Formulario enviado con éxito:', response.data);
                })
                .catch(error => {
                    console.error('Error al enviar el formulario:', error);
                });
        },
    },
};
</script>

<style scoped>
.checkbox-option {
    margin-bottom: 8px;
}

.vehicle-form {
    margin-bottom: 16px;
    padding: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.btn-add-vehicle,
.btn-remove {
    background-color: #4CAF50;
    color: white;
    padding: 8px 16px;
    margin-right: 8px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.btn-add-vehicle {
    margin-bottom: 16px;
}

.btn-add-vehicle:hover,
.btn-remove:hover {
    background-color: #45a049;
}

.btn-remove {
    background-color: #f44336;
}

.btn-remove:hover {
    background-color: #da190b;
}
</style>
