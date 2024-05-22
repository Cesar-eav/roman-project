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
                    <div class="p-4  ustify-center rounded-md">

                        <div class="flex">
                            <input type="text" v-model="form.razon_social" placeholder="Razón Social"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.nombre_fantasia" placeholder="Nombre de Fantasía"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.rut_empresa" placeholder="Rut Empresa"
                                class="mt-1  mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.direccion" placeholder="Dirección"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.comuna" placeholder="Comuna"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.region" placeholder="Región"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.fono" placeholder="Fono"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="email" v-model="form.mail" placeholder="Email"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.nombre_banco" placeholder="Nombre Banco"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.num_cuenta" placeholder="Nº Cuenta"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.representante_legal" placeholder="Representante Legal"
                                class="mt-1  mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.rut_representante" placeholder="Rut Representante"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="email" v-model="form.mail_representante" placeholder="Email Representante"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.fono_representante" placeholder="Fono Representante"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.nombre_gerente" placeholder="Nombre Gerente Local"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.direccion_gerente" placeholder="Dirección Gerente"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.comuna_gerente" placeholder="Comuna Gerente"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="text" v-model="form.region_gerente" placeholder="Región Gerente"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="text" v-model="form.fono_gerente" placeholder="Fono Gerente"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="email" v-model="form.mail_gerente" placeholder="Email Gerente"
                                class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex">
                            <input type="date" v-model="form.fecha_nacimiento_gerente"
                                placeholder="Fecha Nacimiento Gerente"
                                class="mt-1 mr-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>



                    </div>



                </div>
                <div v-if="showModalEjecutiva1">
                    Agregar ejecutiva 1
                    <div class="p-2 border border-spacing-2">
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Nombre Ejecutiva
                                1:</label>
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
                    <p class="">Agregar ejecutiva 2</p>
                    <div class="p-2 border border-spacing-2">
                        <div class="flex">
                            <label class="block w-1/4 text-sm font-medium mt-4">Nombre Ejecutiva 2:</label>
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

                <div class="py-4 w-60 justify-items-end">
                    <Button type="submit" class="w-full justify-center gap-2">
                        <span>Registrar Compañia</span>
                    </Button>
                </div>

            </form>

            <div class="flex flex-col">
                <button @click="volver1" v-if="ejecutiva2 || ejecutiva1">Volver </button>
                <button @click="volverEjecutiva1" v-if="showModalEjecutiva2">Volver a Ejecutiva 1</button>
                <button @click="siguiente" v-if="ejecutiva1  || mostrarModal">Agregar Ejecutiva 1</button>
                <button @click="siguiente2" v-if="ejecutiva2">Agregar Ejecutiva 2</button>
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
    },
    data() {
        return {
            mostrarModal: true,
            ejecutiva1: false,
            volverEjecutiva: false,
            showModalEjecutiva1: false,
            showModalEjecutiva2: false,
            form: this.$inertia.form({
                razon_social: 'SuperMan',
                nombre_fantasia: '',
                rut_empresa: '',
                direccion: '',
                comuna: '',
                region: '',
                fono: '',
                mail: '',
                nombre_banco: '',
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

        siguiente() {
            this.mostrarModal = false,
                this.showModalEjecutiva1 = true;
            this.showModalEjecutiva2 = false;
            this.ejecutiva1 = false;
            this.ejecutiva2 = true;
        },
        siguiente2() {
            this.mostrarModal = false;
            this.showModalEjecutiva1 = false;
            this.showModalEjecutiva2 = true;
            this.ejecutiva1 = false;
            this.ejecutiva2 = false;
        },
        volver1() {
            this.mostrarModal = true;
            this.ejecutiva1 = true;
            this.ejecutiva2 = false;
            this.showModalEjecutiva1 = false;
            this.showModalEjecutiva2 = false;
        },
        volverEjecutiva1() {
            this.mostrarModal = false;
            this.volverEjecutiva = false;
            this.ejecutiva1 = true;
            this.ejecutiva2 = false;
            this.showModalEjecutiva1 = true;
            this.showModalEjecutiva2 = false;
        },

        submit() {
            //   this.form.post('/crear-usuario-interno')

            axios.post('/crear-cia', {
                'razon_social': this.form.razon_social || '',
                'nombre_fantasia': this.form.nombre_fantasia || '',
                'rut_empresa': this.form.rut_empresa || '',
                'direccion': this.form.direccion || '',
                'comuna': this.form.comuna || '',
                'region': this.form.region || '',
                'fono': this.form.fono || '',
                'mail': this.form.mail || '',
                'nombre_banco': this.form.nombre_banco || '',
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
