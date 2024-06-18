<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 bg-gray-100">
            <div class="text-lg">
                <slot name="title"> </slot>
            </div>

            <div class="mt-4 ">
                <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
                <h2
                    class="text-xl font-semibold rounded-lg text-center text-white leading-tight bg-orange-500 uppercase p-4">
                    Crear Empresa
                </h2>
            </div>

            <form @submit.prevent="submit">
                <div class="p-4 text-gray-900 w-full justify-center">

                    <div class="flex">

                        <input type="text" v-model="form.razonSocial" placeholder="Razón Social"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">


                        <input type="text" v-model="form.nombreFantasia" placeholder="Nombre de Fantasía"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.nombresPersonaNatural" placeholder="Nombres Persona Natural:"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.apellidoPaternoPersonaNatural"
                            placeholder="Apellido Paterno Persona Natural"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">

                        <input type="text" v-model="form.apellidoMaternoPersonaNatural"
                            placeholder="Apellido Materno Persona Natural"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.rutEmpresaPersona" placeholder="RUT Empresa/Persona"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.direccion" placeholder="Dirección"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <div>
                            <select v-model="form.comuna" required
                                class="COMUNA block mt-1 mr-1  w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Seleccionar Comuna</option>
                                <template v-for="comuna in comunas" :key="comuna.id">
                                    <option :value="comuna.comuna">{{ comuna.comuna }}</option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.region" placeholder="Región"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <input type="text" v-model="form.fono" placeholder="Fono"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="email" v-model="form.mail" placeholder="Correo"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <div>
                            <select v-model="form.banco_id" id="banco_id" name="banco_id" required
                                class="block mt-1 mr-1 w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Seleccionar Banco</option>
                                <template v-for="banco in bancos" :key="banco.id">
                                    <option :value="banco.id">{{ banco.nombre }}</option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <div class="flex">

                        <input type="text" v-model="form.numeroCuenta" placeholder="Número Cuenta"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.representanteLegal" placeholder="Representante Legal"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.rutRepresentanteLegal" placeholder="RUT Representante Legal"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="email" v-model="form.mailRepresentanteLegal" placeholder="Mail Representante Legal"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">

                        <input type="text" v-model="form.fonoRepresentanteLegal" placeholder="Fono Representante Legal"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">


                        <input type="date" v-model="form.fechaNacimiento" placeholder="Fecha Nacimiento"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="py-4 w-60 justify-items-end">
                        <Button type="submit" class="w-full justify-center gap-2">
                            <span>Enviar</span>
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
        },
        comunas: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            form: this.$inertia.form({
                razonSocial: '',
                nombreFantasia: '',
                nombresPersonaNatural: '',
                apellidoPaternoPersonaNatural: '',
                apellidoMaternoPersonaNatural: '',
                rutEmpresaPersona: '',
                banco_id: '',
                direccion: '',
                comuna: '',
                region: '',
                fono: '',
                mail: '',
                nombreBanco: '',
                numeroCuenta: '',
                representanteLegal: '',
                rutRepresentanteLegal: '',
                mailRepresentanteLegal: '',
                fonoRepresentanteLegal: '',
                fechaNacimiento: '',
            })
        };
    },
    methods: {
        submit() {
            axios.post('/guardar-empresa', {
                'razon_social': this.form.razonSocial || '',
                'nombre_fantasia': this.form.nombreFantasia || '',
                'nombres_persona_natural': this.form.nombresPersonaNatural || '',
                'apellido_paterno_persona_natural': this.form.apellidoPaternoPersonaNatural || '',
                'apellido_materno_persona_natural': this.form.apellidoMaternoPersonaNatural || '',
                'rut_empresa_persona': this.form.rutEmpresaPersona || '',
                'direccion': this.form.direccion || '',
                'comuna': this.form.comuna || '',
                'region': this.form.region || '',
                'fono': this.form.fono || '',
                'mail': this.form.mail || '',
                'banco_id': this.form.banco_id || '',
                'nombre_banco': this.form.nombreBanco || '',
                'numero_cuenta': this.form.numeroCuenta || '',
                'representante_legal': this.form.representanteLegal || '',
                'rut_representante_legal': this.form.rutRepresentanteLegal || '',
                'mail_representante_regal': this.form.mailRepresentanteLegal || '',
                'fono_representante_legal': this.form.fonoRepresentanteLegal || '',
                'fecha_nacimiento': this.form.fechaNacimiento || ''
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
