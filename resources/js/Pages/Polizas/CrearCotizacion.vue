<template>
    <AppLayout title="Dashboard">
        <div>
            <h1 class="text-2xl ">Crear Cotización</h1>

            <!-- Selección del formulario -->
            <select v-model="selectedFormulario" id="formulario-select">
                <option value="">Seleccionar formulario</option>
                <option v-for="formulario in formularios" :key="formulario.id" :value="formulario">
                    {{ formulario.name_poliza_form }}
                </option>
            </select>

            <div class="flex mt-5 bg-slate-200 p-10">
                <!-- Columna de Compañías -->
                <div class="w-1/2 pr-2">
                    <h2 class="font-bold	">Seleccione las Compañías de Seguro:</h2>
                    <div v-for="compania in companias" :key="compania.id" class="mb-2">
                        <input type="checkbox" :id="'compania-' + compania.id" :value="compania"
                            v-model="selectedCompanias" @change="updateSelectedEjecutivos(compania)" />
                        <label :for="'compania-' + compania.id" class="text-sm"> {{ compania.razon_social }}</label>
                    </div>
                </div>

                <!-- Columna de Ejecutivos -->
                <div class="w-1/2 pl-2">
                    <h2 class="font-bold	">Seleccione un Ejecutivo:</h2>
                    <div v-for="compania in selectedCompanias" :key="compania.id" class="mb-2">
                        <div>
                            <h3>Ejecutivos de <span class="font-bold">{{ compania.razon_social }}:</span></h3>
                            <div class="bg-slate-300 rounded-lg p-2">
                                <div v-for="ejecutivo in compania.ejecutivas" :key="ejecutivo.id">
                                    <input type="radio" :name="'ejecutivo-' + compania.id"
                                        :id="'ejecutivo-' + ejecutivo.id" :value="ejecutivo"
                                        v-model="selectedEjecutivos[compania.id]" />
                                    <label :for="'ejecutivo-' + ejecutivo.id"> {{ ejecutivo.name }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Botón para agregar un nuevo vehículo -->

            <!-- Campos del formulario para cada vehículo -->
            <div v-if="shouldShowForm" class="flex justify-end mt-2">
                <div>
                    <button class="btn-add-vehicle" @click="addVehicle">Agregar (+) L</button>
                </div>
            </div>

            <div v-if="shouldShowVehiculoPesado" class="flex justify-end">
                <div>
                    <button class="btn-add-vehicle" @click="addVehicle">Agregar (+) P</button>
                </div>
            </div>

            <!-- Campos del formulario para cada vehículo -->
            <div v-if="shouldShowForm" v-for="(vehicle, vehicleIndex) in vehicles" :key="vehicleIndex"
                class="vehicle-form flex flex-wrap bg-slate-200 rounded-lg p-4 mb-4">
                <div v-for="(campo, index) in vehicle.campos" :key="index" >
                    <label :for="campo.id" class="block">{{ campo.label }}:</label>
                    <input :type="campo.type" :id="campo.id" v-model="campo.value" class="w-full" />
                </div>
                <div class="w-full flex justify-end">
                    <button class="btn-remove" @click="removeVehicle(vehicleIndex)">(-)</button>
                </div>
            </div>


            <!-- Botón de envío -->
            <button @click="submitForm" class="btn-generar text-xl">Generar</button>
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
                        { id: 'marca', label: 'Marca', type: 'text', value: '', placeholder: 'Marca' },
                        { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                        { id: 'agnio', label: 'Año', type: 'text', value: '' },
                        { id: 'patente', label: 'Patente', type: 'text', value: '' },
                        { id: 'n_chasis', label: 'Nº Chasis', type: 'text', value: '' },
                        { id: 'n_motor', label: 'Nº Motor', type: 'text', value: '' },
                        { id: 'color', label: 'Color', type: 'text', value: '' },
                    ]
                }

            ],
            FormVehiclesPesado: [
                {
                    campos: [
                        { id: 'marca', label: 'Marca', type: 'text', value: '' },
                        { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                        { id: 'agnio', label: 'Año', type: 'text', value: '' },
                        { id: 'patente', label: 'Patente', type: 'text', value: '' },
                        { id: 'monto_asegurado', label: 'Monto Ahasis', type: 'text', value: '' }

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

.btn-generar {
    background-color: #45a049;
    color: white;
    padding: 8px 16px;
    margin-right: 8px;
    border: none;
    cursor: pointer;
    border-radius: 4px;

}
</style>
