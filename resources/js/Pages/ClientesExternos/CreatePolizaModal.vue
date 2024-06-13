<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 bg-gray-100">

                <h2 class="text-xl font-semibold rounded-lg text-center text-white leading-tight bg-orange-500 uppercase p-4">
                    Crear Poliza
                </h2>
      

            <div class="flex justify-start py-2  text-gray-900">
                <!-- Campo de búsqueda personalizado -->
                <label for="numero_poliza" class="block w-1/4 text-sm font-medium  mt-4">Buscar cliente: </label>
                <input v-model="searchQuery" @input="searchClientes" type="text" placeholder="Rut, N° Poliza, Nombre..."
                    class="border rounded-lg block " />
            </div>


            <div class="py-4">
                <div v-if="clientes.length > 0" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg block w-3/4">
                        <div class="p-6 text-gray-100">
                            <ul>
                                <li v-for="cliente in clientes" :key="cliente.id" @click="selectCliente(cliente)"
                                    :class="{ 'bg-gray-300': cliente.id === form2.cliente_id, 'cursor-pointer': true, 'hover:bg-gray-200': true, 'p-2': true, 'text-gray-900': true }">
                                    <input type="checkbox" :checked="cliente.id === form2.cliente_id"
                                        @change="selectCliente(cliente)" />
                                    {{ cliente.name }} ({{ cliente.rut }}) ({{ cliente.email }})
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <ValidationErrors class="mb-4" />
            <form @submit.prevent="submit">
                <input type="hidden" name="cliente_id" :value="form2.cliente_id" />                
                <div class="p-4 text-gray-900 w-3/4 justify-center">
                    <div class="flex">
                        <label for="tipo_poliza" class="block w-1/4 text-sm font-medium ">Tipo Póliza:</label>
                        <select v-model="form2.tipo_poliza"
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
                    </div>



                    <div class="flex text-gray-900">
                        <label for="numero_poliza" class="block w-1/4 text-sm font-medium  mt-4">N°
                            Póliza:</label>
                        <input type="text" v-model="form2.numero_poliza" id="numero_poliza" name="numero_poliza"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label for="monto_asegurado" class="block w-1/4 text-sm font-medium  mt-4">Monto
                            Asegurado:</label>
                        <input type="text" v-model="form2.monto_asegurado" id="monto_asegurado" name="monto_asegurado"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <label for="prima" class="block w-1/4 text-sm font-medium  mt-4">Prima:</label>
                        <input type="text" v-model="form2.prima" id="prima" name="prima"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="valor_neto" class="block w-1/4 mt-4 text-sm font-medium ">Valor Neto:</label>
                        <input type="text" id="valor_neto" v-model="form2.valor_neto"
                            class="mt-1 block w-3/4  border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="fecha_inicio" class="block w-1/4 text-sm font-medium ">Fecha de
                            Inicio:</label>
                        <input type="date" id="fecha_inicio" v-model="form2.fecha_inicio"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="fecha_vencimiento" class="block w-1/4 text-sm font-medium ">Fecha de
                            Vencimiento:</label>
                        <input type="date" id="fecha_vencimiento" v-model="form2.fecha_vencimiento"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="deducible" class="block w-1/4 text-sm font-medium ">Deducible:</label>
                        <input type="text" id="deducible" v-model="form2.deducible"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="cantidad_cuotas" class="block w-1/4 text-sm font-medium ">Cantidad de
                            Cuotas:</label>
                        <input type="number" id="cantidad_cuotas" v-model="form2.cantidad_cuotas"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="dia_pago" class="block w-1/4 text-sm font-medium ">Día de Pago:</label>
                        <input type="number" id="dia_pago" v-model="form2.dia_pago"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="metodo_pago" class="block w-1/4 text-sm font-medium ">Método de Pago:</label>
                        <select v-model="form2.metodo_pago"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Seleccionar Método de Pago</option>
                            <option value="Tarjeta Crédito">Tarjeta Crédito</option>
                            <option value="Contado">Contado</option>
                            <option value="Presencial">Presencial</option>
                            <option value="PAC (Pago Automático Cuenta)">PAC (Pago Automático Cuenta)</option>
                        </select>
                    </div>
                    <div class="flex">
                        <label for="aseguradora" class="block w-1/4 text-sm font-medium ">Aseguradora:</label>
                        <input type="text" id="aseguradora" v-model="form2.aseguradora"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label for="vendedor" class="block w-1/4 text-sm font-medium ">Vendedor:</label>
                        <input type="text" id="vendedor" v-model="form2.vendedor"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex mt-4">
                        <label for="file" class="block w-1/4 text-sm font-medium">Archivo:</label>
                        <input type="file" @change="handleFileChange" id="file" name="file"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="py-4 w-60 justify-items-end">
                        <Button type="submit" class="w-full justify-center gap-2">
                            <span>Registrar Póliza</span>
                        </Button>
                    </div>
                </div>
            </form>

        </div>
        <div class="px-6 py-4 text-right bg-white dark:bg-dark-eval-3">
            <slot name="footer"> </slot>
        </div>
    </Modal>

</template>

<script>
import Modal from '@/Components/Modal.vue'
import Button from '@/Components/Button.vue'
import axios from 'axios';


export default {
    components: {
        Modal,
        Button
    },
    props: {
        show: {
            type: Boolean,
            default: true,
        },
        clientes: {
            type: Array,
            required: true
        },
        maxWidth: {
            type: String,
            default: '2xl',
        },
        closeable: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            searchQuery: '',
            clientes: [],
             form2: {
                cliente_id: '',
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
                file: null,
            },

        };
    },
    methods: {
        submit() {

            axios.post('/crear-poliza', this.form2).then(response => {
                console.log(response.data);
                this.close()
            });
        },
        close() {
            this.$emit('close');
        },

        async searchClientes() {
            if (this.searchQuery.trim() === '') {
                this.clientes = [];
                return;
            }

            try {
                const response = await axios.get('/api/clientes', { params: { query: this.searchQuery } });
                this.clientes = response.data;
            } catch (error) {

                console.error("Error al buscar clientes:", error);
            }
        },
        selectCliente(cliente) {
            this.form2.cliente_id = cliente.id;

        },
        handleFileChange(event) {
            this.form2.file = event.target.files[0];;
        },
    },

}

</script>
