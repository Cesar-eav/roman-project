<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 bg-gray-100">
            <div class="text-lg">
                <slot name="title"> </slot>
            </div>

            <div class="mt-4">
                <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Compañia de Seguros
                </h2>
            </div>

            <form @submit.prevent="submit" class="text-gray-900">
                <div v-if="mostrarModal">
                    <div class="p-4  justify-center rounded-md">

                        <div class="flex">
                            <input type="text" v-model="form.razon_social" placeholder="Razón Social" required
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.nombre_fantasia" placeholder="Nombre de Fantasía" required
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.rut_empresa" placeholder="Rut Empresa" required
                                class="mt-1  mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.direccion" placeholder="Dirección" required
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.comuna" placeholder="Comuna" required
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.region" placeholder="Región" required
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.fono" placeholder="Fono" required
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="email" v-model="form.mail" placeholder="Email" required
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <select v-model="form.banco_id" id="banco_id" name="banco_id" required
                                class="block mt-1 mr-1 w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Seleccionar Banco</option>
                                <template v-for="banco in bancos" :key="banco.id">
                                    <option :value="banco.id">{{ banco.nombre }}</option>
                                </template>
                            </select>
                        </div>

                        <div class="mt-4">
                            <h2 class="text-lg font-semibold text-left leading-tight">
                                Reprentante legal:
                            </h2>
                        </div>

                        <div class="flex">

                            <input type="text" v-model="form.representante_legal" placeholder="Nombre"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.representante_legal" placeholder="Apellidos"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex">
                            <input type="text" v-model="form.rut_representante" placeholder="Rut "
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="email" v-model="form.mail_representante" placeholder="Email"
                                class="mt-1 mx-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.fono_representante" placeholder="Fono "
                                class="block mt-1 border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mt-4">
                            <h2 class="text-lg font-semibold text-left leading-tight">
                                Gerente:
                            </h2>
                        </div>
                        <div class="flex">

                            <input type="text" v-model="form.nombre_gerente" placeholder="Nombre Gerente Local"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                            <input type="text" v-model="form.direccion_gerente" placeholder="Dirección Gerente"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">

                            <input type="text" v-model="form.comuna_gerente" placeholder="Comuna Gerente"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.region_gerente" placeholder="Región Gerente"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.fono_gerente" placeholder="Fono Gerente"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="email" v-model="form.mail_gerente" placeholder="Email Gerente"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="date" v-model="form.fecha_nacimiento_gerente"
                                placeholder="Fecha Nacimiento Gerente"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>
                </div>
                <div v-if="showModalEjecutiva1">
                  <p class="flex text-xl justify-center">Ejecutiva 1</p>
                    <div class="p-2 border border-spacing-2">
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Nombre Ejecutiva
                                :</label>
                            <input type="text" v-model="form.ejecutiva_1"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium  mt-4">Fono:</label>
                            <input type="text" v-model="form.fono_ejecutiva_1"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium  mt-4">Email:</label>
                            <input type="email" v-model="form.mail_ejecutiva_1"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium  mt-4">Fecha de
                                Nacimiento:</label>
                            <input type="date" v-model="form.mail_ejecutiva_1"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                    </div>

                </div>

                <div v-if="showModalEjecutiva2">
                    <p class="flex text-xl justify-center">Ejecutiva 2</p>
                    <div class="p-2 border border-spacing-2">
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Nombre Ejecutiva:</label>
                            <input type="text" v-model="form.ejecutiva_2"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Fono:</label>
                            <input type="text" v-model="form.fono_ejecutiva_2"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Email:</label>
                            <input type="email" v-model="form.mail_ejecutiva_2"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Fecha de Nacimiento:</label>
                            <input type="date" v-model="form.mail_ejecutiva_2"
                                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                    </div>
                </div>

                <div class="flex py-4 w-full justify-between ">
                    <Button type="submit">
                        <span>Registrar Compañia</span>
                    </Button>

                    <button class="button-ejecutiva" @click="irEjecutiva1" v-if="mostrarModal">Agregar Ejecutiva 1</button>
                    <button class="button-ejecutiva" @click="inicio" v-if="showModalEjecutiva1 || showModalEjecutiva2">Inicio</button>
                    <button class="button-ejecutiva" @click="volverEjecutiva1" v-if="showModalEjecutiva2">Volver a Ejecutiva 1</button>
                    <button class="button-ejecutiva" @click="siguiente2" v-if="showModalEjecutiva1">Agregar Ejecutiva 2</button>
                </div>

            </form>

            <div class="flex flex-col">

            </div>



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
        maxWidth: {
            type: String,
            default: '2xl',
        },
        closeable: {
            type: Boolean,
            default: true,
        },
        bancos: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            mostrarModal: true,
            volverEjecutiva: false,
            showModalEjecutiva1: false,
            showModalEjecutiva2: false,
            form: this.$inertia.form({
                razon_social: '',
                nombre_fantasia: '',
                rut_empresa: '',
                direccion: '',
                comuna: '',
                region: '',
                fono: '',
                mail: '',
                banco_id: '',
                num_cuenta: '',
                representante_legal: '',
                rut_representante: '',
                mail_representante: '',
                fono_representante: '',
                nombre_gerente: '',
                direccion_gerente: '',
                comuna_gerente: '',
                region_gerente: '',
                fono_gerente: '',
                mail_gerente: '',
                fecha_nacimiento_gerente: '',
                ejecutiva_1: '',
                fono_ejecutiva_1: '',
                mail_ejecutiva_1: '',
                fecha_nacimiento_ejecutiva_1: '',
                ejecutiva_2: '',
                fono_ejecutiva_2: '',
                mail_ejecutiva_2: '',
                fecha_nacimiento_ejecutiva_2: '',
                ejecutiva_3: '',
                fono_ejecutiva_3: '',
                mail_ejecutiva_3: '',
                fecha_nacimiento_ejecutiva_3: ''
            })
        };
    },
    methods: {

        irEjecutiva1() {
            this.mostrarModal = false,
            this.showModalEjecutiva1 = true;
            this.showModalEjecutiva2 = false;

        },

        //Ejecutiva 2
        siguiente2() {
            this.mostrarModal = false;
            this.showModalEjecutiva1 = false;
            this.showModalEjecutiva2 = true;

        },

        //Despliego Modal Inicio
        inicio() {
            this.mostrarModal = true;

            this.showModalEjecutiva1 = false;
            this.showModalEjecutiva2 = false;
        },
        volverEjecutiva1() {
            this.mostrarModal = false;
            this.volverEjecutiva = false;

            this.showModalEjecutiva1 = true;
            this.showModalEjecutiva2 = false;
        },

        submit() {
            axios.post('/crear-cia', {
                'razon_social': this.form.razon_social || '',
                'nombre_fantasia': this.form.nombre_fantasia || '',
                'rut_empresa': this.form.rut_empresa || '',
                'direccion': this.form.direccion || '',
                'comuna': this.form.comuna || '',
                'region': this.form.region || '',
                'fono': this.form.fono || '',
                'mail': this.form.mail || '',
                'banco_id': this.form.banco_id || '',
                'num_cuenta': this.form.num_cuenta || '',
                'representante_legal': this.form.representante_legal || '',
                'rut_representante': this.form.rut_representante || '',
                'mail_representante': this.form.mail_representante || '',
                'fono_representante': this.form.fono_representante || '',
                'nombre_gerente': this.form.nombre_gerente || '',
                'direccion_gerente': this.form.direccion_gerente || '',
                'comuna_gerente': this.form.comuna_gerente || '',
                'region_gerente': this.form.region_gerente || '',
                'fono_gerente': this.form.fono_gerente || '',
                'mail_gerente': this.form.mail_gerente || '',
                'fecha_nacimiento_gerente': this.form.fecha_nacimiento_gerente || '',
                'ejecutiva_1': this.form.ejecutiva_1 || '',
                'fono_ejecutiva_1': this.form.fono_ejecutiva_1 || '',
                'mail_ejecutiva_1': this.form.mail_ejecutiva_1 || '',
                'fecha_nacimiento_ejecutiva_1': this.form.fecha_nacimiento_ejecutiva_1 || '',
                'ejecutiva_2': this.form.ejecutiva_2 || '',
                'fono_ejecutiva_2': this.form.fono_ejecutiva_2 || '',
                'mail_ejecutiva_2': this.form.mail_ejecutiva_2 || '',
                'fecha_nacimiento_ejecutiva_2': this.form.fecha_nacimiento_ejecutiva_2 || '',
                'ejecutiva_3': this.form.ejecutiva_3 || '',
                'fono_ejecutiva_3': this.form.fono_ejecutiva_3 || '',
                'mail_ejecutiva_3': this.form.mail_ejecutiva_3 || '',
                'fecha_nacimiento_ejecutiva_3': this.form.fecha_nacimiento_ejecutiva_3 || ''
            }).then(response => {
                console.log(response.data);
                this.close()
            });
        },
        close() {
            this.$emit('close');
        }
    }
};
</script>

<style>
.button-ejecutiva {

        background-color: #1f2937;
        padding: 0.5rem;
        color: white;
        border-radius: 0.5rem;
    
}
</style>