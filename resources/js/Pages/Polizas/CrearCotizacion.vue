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
                <div v-if="isSelected(compania)">
                    <h3>Seleccione un Ejecutivo de {{ compania.razon_social }}:</h3>
                    <div v-for="ejecutivo in compania.ejecutivas" :key="ejecutivo.id">
                        <input type="radio" :name="'ejecutivo-' + compania.id" :id="'ejecutivo-' + ejecutivo.id"
                            :value="ejecutivo" v-model="selectedEjecutivos[compania.id]" />
                        <label :for="'ejecutivo-' + ejecutivo.id">{{ ejecutivo.name }}</label>
                    </div>
                </div>
            </div>

            <!-- Campos del formulario -->
            <div v-if="shouldShowForm" class="grid grid-cols-6">
                <h2 class="col-span-6">Campos del Formulario</h2>
                <div v-for="campo in campos" :key="campo.id">
                    <label :for="campo.id">{{ campo.label }}:</label>
                    <input :type="campo.type" :id="campo.id" v-model="campo.value" />
                </div>
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
            campos: [
                { id: 'marca', label: 'Marca', type: 'text', value: '' },
                { id: 'modelo', label: 'Modelo', type: 'text', value: '' },
                { id: 'agnio', label: 'agnio', type: 'text', value: '' },
                { id: 'patente', label: 'Patente', type: 'text', value: '' },
                { id: 'n_chasis', label: 'Nº Chasis', type: 'text', value: '' },
                { id: 'n_motor', label: 'Nº Motor', type: 'text', value: '' },
                { id: 'color', label: 'Color', type: 'text', value: '' },
            ],
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
        submitForm() {
            const formData = {
                formulario: this.selectedFormulario,
                companias: this.selectedCompanias.map(compania => ({
                    id: compania.id,
                    ejecutivo: this.selectedEjecutivos[compania.id] || null,
                })),
                campos: this.campos.reduce((acc, campo) => {
                    acc[campo.id] = campo.value;
                    return acc;
                }, {}),
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
</style>

