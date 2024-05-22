<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 bg-gray-100">
            <div class="text-lg">
                <slot name="title"> </slot>
            </div>

            <div class="mt-4 ">
                <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Usuario Externo WAT
                </h2>
            </div>

            <form @submit.prevent="submit">
                <div class="p-4 justify-center text-slate-900">

                    <div class="flex text-slate-900">
                        <input type="text" v-model="form.nombres" required placeholder="Nombres"
                            class="mt-1 mr-1 w-1/2 block border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.apellidoPaterno" placeholder="Apellido Paterno"
                            class="mt-1 block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex text-slate-900">
                        <input type="text" v-model="form.apellidoMaterno" placeholder="Apellido Materno"
                            class="mt-1 mr-1 w-1/2 block border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.rut" placeholder="RUT"
                            class="mt-1 block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex text-slate-900">
                        <select v-model="form.nivelEjecutivo" id="nivelEjecutivo" name="nivelEjecutivo"
                            class="mt-1 mr-1 block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Seleccionar Nivel Ejecutivo</option>
                            <option value="comercial">Comercial</option>
                            <option value="cobranza">Cobranza</option>
                            <option value="gestor_siniestro">Gestor de Siniestros</option>
                        </select>
                    </div>

                    <label class="block text-sm font-medium mt-4">Fecha Nacimiento:</label>
                    <div class="flex">
                        <input type="date" v-model="form.fechaNacimiento" placeholder="Fecha Nacimiento"
                            class="mt-1 mr-1 w-1/2 block border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.fono" placeholder="Telefono"
                            class="mt-1 block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="email" v-model="form.mail" required placeholder="Correo"
                            class="mt-1 mr-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.direccion" placeholder="Dirección"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.comuna" placeholder="Comuna"
                            class="mt-1 mr-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.region" placeholder="Región"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.isapre" placeholder="Isapre"
                            class="mt-1 mr-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.afp" placeholder="AFP"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- <div class="flex">
            <label class="block w-1/4 text-sm font-medium mt-4">Contraseña:</label>
            <input type="password" v-model="form.password"
                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="flex">
            <label class="block w-1/4 text-sm font-medium mt-4">Confirmar Contraseña:</label>
            <input type="password" v-model="form.password_confirmation"
                class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div> -->

                    <div class="py-4 w-60 justify-items-end">
                        <Button  class="w-full justify-center gap-2">
                            <span>Registrar</span>
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
    },
    data() {
        return {
            form: this.$inertia.form({
                nivelEjecutivo: '',
                nombres: '',
                apellidoPaterno: '',
                apellidoMaterno: '',
                rut: '',
                fechaNacimiento: '',
                fono: '',
                mail: '1@1.cl',
                direccion: '',
                comuna: '',
                region: '',
                isapre: '',
                afp: ''
            })
        };
    },
    methods: {
        submit() {
            axios.post('/crear-usuario-externo', {
                'nivel_ejecutivo': this.form.nivelEjecutivo || '',
                'nombres': this.form.nombres || '',
                'apellido_paterno': this.form.apellidoPaterno || '',
                'apellido_materno': this.form.apellidoMaterno || '',
                'rut': this.form.rut || '',
                'fecha_nacimiento': this.form.fechaNacimiento || '',
                'fono': this.form.fono || '',
                'mail': this.form.mail || '',
                'direccion': this.form.direccion || '',
                'comuna': this.form.comuna || '',
                'region': this.form.region || '',
                'isapre': this.form.isapre || '',
                'afp': this.form.afp || ''
            }).then(response => {
                console.log(response.data);
                this.close()
                if (response.data === 1) {
                    location.reload();
                }
            });
        },
        close() {
            this.$emit('close');
        }
    }
};
</script>
