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
            <div v-if="shouldShowForm" class="flex justify-end mt-2 mb-0">
                <div>
                    <button class="btn-add-vehicle" @click="addVehicle">Agregar Vehículo Liviano</button>
                </div>
            </div>

            <div v-if="shouldShowForm2" class="flex justify-end mt-2 mb-0">
                <div>
                    <button class="btn-add-vehicle" @click="addVehiculoPesado">Agregar Vehículo Pesado</button>
                </div>
            </div>


            <div v-if="shouldShowForm" v-for="(vehicle, vehicleIndex) in vehicles" :key="vehicleIndex"
                class="bg-slate-200 rounded-lg p-4 mb-1">
                <div class="flex flex-nowrap w-full space-x-4">
                    <div v-for="(campo, index) in vehicle.campos" :key="index" class="flex flex-col flex-grow min-w-0">
                        <label :for="campo.id" class="mb-1">{{ campo.label }}:</label>
                        <input :type="campo.type" :id="campo.id" v-model="campo.value"
                            class="border rounded px-2 py-1 w-full" />
                    </div>
                    <div class="flex flex-col justify-end">

                        <button
                            class="btn-remove bg-red-500 text-white px-4 py-2 max-h-8 rounded flex items-center justify-center"
                            @click="removeVehicle(vehicleIndex)">(-)</button>
                    </div>
                </div>
            </div>


            <div v-if="shouldShowForm2" v-for="(vehicle, vehicleIndex) in vehiculoPesado" :key="vehicleIndex"
                class="bg-slate-200 rounded-lg p-4 mb-4">
                <div class="flex flex-nowrap w-full space-x-4">
                    <div v-for="(campo, index) in vehicle.campos" :key="index" class="flex flex-col flex-grow min-w-0">
                        <label :for="campo.id" class="mb-1">{{ campo.label }}:</label>
                        <input :type="campo.type" :id="campo.id" v-model="campo.value"
                            class="border rounded px-2 py-1 w-full" />
                    </div>
                    <div class="flex flex-col justify-end">

                        <button
                            class="btn-remove bg-red-500 text-white px-4 py-2 max-h-8 rounded flex items-center justify-center"
                            @click="removeVehiculoPesado(vehicleIndex)">(-)</button>
                    </div>
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
            vehiculoPesado: [
                {
                    campos: [
                        { id: 'marca', label: 'Marca', type: 'text', value: '' },
                        { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                        { id: 'agnio', label: 'Año', type: 'text', value: '' },
                        { id: 'patente', label: 'Patente', type: 'text', value: '' },
                        { id: 'monto_asegurado', label: 'Monto Ahasis', type: 'text', value: '' }

                    ]
                }
            ],
            vehiculoAsientoDePasajeros: [
                {
                    campos: [
                        { id: 'marca', label: 'Marca', type: 'text', value: '' },
                        { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                        { id: 'agnio', label: 'Año', type: 'text', value: '' },
                        { id: 'patente', label: 'Patente', type: 'text', value: '' },
                        { id: 'monto_asegurado', label: 'Monto Asegurado', type: 'text', value: '' },
                        { id: 'cantidad_de_asientos', label: 'Cantidad de Asientos', type: 'text', value: '' }
                    ]
                }
            ],
            transporteDeCarga: [
                {
                    campos: [
                        { id: 'marca', label: 'Marca', type: 'text', value: '' },
                        { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                        { id: 'agnio', label: 'Año', type: 'text', value: '' },
                        { id: 'patente', label: 'Patente', type: 'text', value: '' },
                        { id: 'monto_asegurado', label: 'Monto Asegurado', type: 'text', value: '' },
                        { id: 'origen', label: 'Origen', type: 'text', value: '' },
                        { id: 'destino', label: 'Destino', type: 'text', value: '' },
                        { id: 'tipo_de_carga', label: 'Tipo de Carga', type: 'text', value: '' }
                    ]
                }
            ]
        };
    },
    computed: {
        shouldShowForm() {
            return this.selectedFormulario.id == 1 && this.selectedCompanias.length > 0 && this.allExecutivesSelected;
        },
        shouldShowForm2() {
            return this.selectedFormulario.id == 2 && this.selectedCompanias.length > 0 && this.allExecutivesSelected;
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
        addVehiculoPesado() {
            const newVehicle = {
                campos: [

                    { id: 'marca', label: 'Marca', type: 'text', value: '' },
                    { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                    { id: 'agnio', label: 'Año', type: 'text', value: '' },
                    { id: 'patente', label: 'Patente', type: 'text', value: '' },
                ]
            };
            this.vehicles.push(newVehicle);
        },
        removeVehicle(index) {
            this.vehicles.splice(index, 1);
        },
        removeVehiculoPesado(index) {
            this.vehiculoPesado.splice(index, 1);
        },
        submitForm() {
    console.log("Enviando Formulario");

    // Función para verificar si al menos un campo de un vehículo tiene un valor diferente al inicial
    const isVehicleUsed = (vehicleList) => {
        return vehicleList.some(vehicle => 
            vehicle.campos.some(campo => campo.value !== '')
        );
    };

    // Determina cuál de las listas de vehículos tiene campos completados por el usuario
    let vehiclesToSend = null;
    if (isVehicleUsed(this.vehicles)) {
        vehiclesToSend = this.vehicles.map(vehicle => ({
            campos: vehicle.campos.reduce((acc, campo) => {
                acc[campo.id] = campo.value;
                return acc;
            }, {})
        }));
    } else if (isVehicleUsed(this.vehiculoPesado)) {
        vehiclesToSend = this.vehiculoPesado.map(vehicle => ({
            campos: vehicle.campos.reduce((acc, campo) => {
                acc[campo.id] = campo.value;
                return acc;
            }, {})
        }));
    } else if (isVehicleUsed(this.transporteDeCarga)) {
        vehiclesToSend = this.transporteDeCarga.map(vehicle => ({
            campos: vehicle.campos.reduce((acc, campo) => {
                acc[campo.id] = campo.value;
                return acc;
            }, {})
        }));
    } else if (isVehicleUsed(this.vehiculoAsientoDePasajeros)) {
        vehiclesToSend = this.vehiculoAsientoDePasajeros.map(vehicle => ({
            campos: vehicle.campos.reduce((acc, campo) => {
                acc[campo.id] = campo.value;
                return acc;
            }, {})
        }));
    }

    if (vehiclesToSend === null) {
        console.log("No se han agregado vehículos con campos completados para enviar.");
        return;
    }

    const formData = {
        formulario: this.selectedFormulario,
        companias: this.selectedCompanias.map(compania => ({
            id: compania.id,
            ejecutivo: this.selectedEjecutivos[compania.id] || null,
        })),
        vehicles: vehiclesToSend
    };

    axios.post('/form/cotizaciones-v1', formData)
        .then(response => {
            console.log('Formulario enviado con éxito:', response.data);
            // this.$inertia.visit('/show-cotizaciones');
        })
        .catch(error => {
            console.error('Error al enviar el formulario:', error);
        });
}

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