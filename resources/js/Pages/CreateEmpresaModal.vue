<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4 bg-gray-100">
            <div class="text-lg">
                <slot name="title"> </slot>
            </div>

            <div class="mt-4 ">
                <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
                <h2 class="text-xl font-semibold text-center leading-tight">
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
 
                        <input type="text" v-model="form.apellidoPaternoPersonaNatural" placeholder="Apellido Paterno Persona Natural"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        
                        <input type="text" v-model="form.apellidoMaternoPersonaNatural" placeholder="Apellido Materno Persona Natural"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.rutEmpresaPersona" placeholder="RUT Empresa/Persona"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        <input type="text" v-model="form.direccion" placeholder="Dirección"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <input type="text" v-model="form.comuna" placeholder="Comuna"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        
                        <input type="text" v-model="form.region" placeholder="Región"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        
                        <input type="text" v-model="form.fono" placeholder="Fono"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        
                        <input type="email" v-model="form.mail" placeholder="Mail"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.nombreBanco" placeholder="Nombre Banco"
                            class="mt-1 block border-gray-300 w-1/2 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex">
                        
                        <input type="text" v-model="form.numeroCuenta" placeholder=">Número Cuenta"
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
                'razonSocial': this.form.razonSocial || '',
                'nombreFantasia': this.form.nombreFantasia || '',
                'nombresPersonaNatural': this.form.nombresPersonaNatural || '',
                'apellidoPaternoPersonaNatural': this.form.apellidoPaternoPersonaNatural || '',
                'apellidoMaternoPersonaNatural': this.form.apellidoMaternoPersonaNatural || '',
                'rutEmpresaPersona': this.form.rutEmpresaPersona || '',
                'direccion': this.form.direccion || '',
                'comuna': this.form.comuna || '',
                'region': this.form.region || '',
                'fono': this.form.fono || '',
                'mail': this.form.mail || '',
                'nombreBanco': this.form.nombreBanco || '',
                'numeroCuenta': this.form.numeroCuenta || '',
                'representanteLegal': this.form.representanteLegal || '',
                'rutRepresentanteLegal': this.form.rutRepresentanteLegal || '',
                'mailRepresentanteLegal': this.form.mailRepresentanteLegal || '',
                'fonoRepresentanteLegal': this.form.fonoRepresentanteLegal || '',
                'fechaNacimiento': this.form.fechaNacimiento || ''
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
