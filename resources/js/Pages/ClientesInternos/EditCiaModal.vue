<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <h2 class="flex flex-col text-white text-2xl font-semibold text-center leading-tight">
                <p>Editar Compañia </p>
                <p class="text-xl">{{ companies.razon_social }}</p>
            </h2>
        </div>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">


                <div>
                    <label for="razon_social">Razón Social:</label>
                    <input type="text" v-model="formCliente.razon_social" :placeholder="companies.razon_social"
                        class="custom-input" />
                </div>
                <div>
                    <label for="nombre_fantasia">Nombre Fantasía:</label>
                    <input type="text" v-model="formCliente.nombre_fantasia" :placeholder="companies.nombre_fantasia"
                        class="custom-input" />
                </div>
                <div>
                    <label for="rut_empresa">RUT Empresa:</label>
                    <input type="text" v-model="formCliente.rut_empresa" :placeholder="companies.rut_empresa"
                        class="custom-input" />
                </div>
                <div>
                    <label for="direccion">Dirección:</label>
                    <input type="text" v-model="formCliente.direccion" :placeholder="companies.direccion"
                        class="custom-input" />
                </div>
                <div>
                    <label for="comuna">Comuna:</label>
                    <input type="text" v-model="formCliente.comuna" :placeholder="companies.comuna"
                        class="custom-input" />
                </div>
                <div>
                    <label for="region">Región:</label>
                    <input type="text" v-model="formCliente.region" :placeholder="companies.region"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fono">Teléfono:</label>
                    <input type="text" v-model="formCliente.fono" :placeholder="companies.fono" class="custom-input" />
                </div>
                <div>
                    <label for="mail">Correo Electrónico:</label>
                    <input type="email" v-model="formCliente.mail" :placeholder="companies.mail" class="custom-input" />
                </div>
                <div>
                    <label for="nombre_banco">Nombre del Banco:</label>
                    <input type="text" v-model="formCliente.nombre_banco" :placeholder="companies.nombre_banco"
                        class="custom-input" />
                </div>
                <div>
                    <label for="num_cuenta">Número de Cuenta:</label>
                    <input type="text" v-model="formCliente.num_cuenta" :placeholder="companies.num_cuenta"
                        class="custom-input" />
                </div>
                <div>
                    <label for="representante_legal">Representante Legal:</label>
                    <input type="text" v-model="formCliente.representante_legal"
                        :placeholder="formCliente.representante_legal" class="custom-input" />
                </div>
                <div>
                    <label for="rut_representante">RUT del Representante:</label>
                    <input type="text" v-model="formCliente.rut_representante" :placeholder="companies.rut_representante"
                        class="custom-input" />
                </div>
                <div>
                    <label for="mail_representante">Correo Electrónico del Representante:</label>
                    <input type="email" v-model="formCliente.mail_representante"
                        :placeholder="formCliente.mail_representante" class="custom-input" />
                </div>
                <div>
                    <label for="fono_representante">Teléfono del Representante:</label>
                    <input type="text" v-model="formCliente.fono_representante"
                        :placeholder="formCliente.fono_representante" class="custom-input" />
                </div>
                <div>
                    <label for="nombre_gerente">Nombre del Gerente:</label>
                    <input type="text" v-model="formCliente.nombre_gerente" :placeholder="companies.nombre_gerente"
                        class="custom-input" />
                </div>
                <div>
                    <label for="direccion_gerente">Dirección del Gerente:</label>
                    <input type="text" v-model="formCliente.direccion_gerente" :placeholder="companies.direccion_gerente"
                        class="custom-input" />
                </div>
                <div>
                    <label for="comuna_gerente">Comuna del Gerente:</label>
                    <input type="text" v-model="formCliente.comuna_gerente" :placeholder="companies.comuna_gerente"
                        class="custom-input" />
                </div>
                <div>
                    <label for="region_gerente">Región del Gerente:</label>
                    <input type="text" v-model="formCliente.region_gerente" :placeholder="companies.region_gerente"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fono_gerente">Teléfono del Gerente:</label>
                    <input type="text" v-model="formCliente.fono_gerente" :placeholder="companies.fono_gerente"
                        class="custom-input" />
                </div>
                <div>
                    <label for="mail_gerente">Correo Electrónico del Gerente:</label>
                    <input type="email" v-model="formCliente.mail_gerente" :placeholder="companies.mail_gerente"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fecha_nacimiento_gerente">Fecha de Nacimiento del Gerente:</label>
                    <input type="date" v-model="formCliente.fecha_nacimiento_gerente"
                        :placeholder="formCliente.fecha_nacimiento_gerente" class="custom-input" />
                </div>
                <div>
                    <label for="ejecutiva_1">Ejecutiva 1:</label>
                    <input type="text" v-model="formCliente.ejecutiva_1" :placeholder="companies.ejecutiva_1"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fono_ejecutiva_1">Teléfono de Ejecutiva 1:</label>
                    <input type="text" v-model="formCliente.fono_ejecutiva_1" :placeholder="companies.fono_ejecutiva_1"
                        class="custom-input" />
                </div>
                <div>
                    <label for="mail_ejecutiva_1">Correo Electrónico de Ejecutiva 1:</label>
                    <input type="email" v-model="formCliente.mail_ejecutiva_1" :placeholder="companies.mail_ejecutiva_1"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fecha_nacimiento_ejecutiva_1">Fecha de Nacimiento de Ejecutiva 1:</label>
                    <input type="date" v-model="formCliente.fecha_nacimiento_ejecutiva_1"
                        :placeholder="formCliente.fecha_nacimiento_ejecutiva_1" class="custom-input" />
                </div>
                <div>
                    <label for="ejecutiva_2">Ejecutiva 2:</label>
                    <input type="text" v-model="formCliente.ejecutiva_2" :placeholder="companies.ejecutiva_2"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fono_ejecutiva_2">Teléfono de Ejecutiva 2:</label>
                    <input type="text" v-model="formCliente.fono_ejecutiva_2" :placeholder="companies.fono_ejecutiva_2"
                        class="custom-input" />
                </div>
                <div>
                    <label for="mail_ejecutiva_2">Correo Electrónico de Ejecutiva 2:</label>
                    <input type="email" v-model="formCliente.mail_ejecutiva_2" :placeholder="companies.mail_ejecutiva_2"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fecha_nacimiento_ejecutiva_2">Fecha de Nacimiento de Ejecutiva 2:</label>
                    <input type="date" v-model="formCliente.fecha_nacimiento_ejecutiva_2"
                        :placeholder="formCliente.fecha_nacimiento_ejecutiva_2" class="custom-input" />
                </div>
                <div>
                    <label for="ejecutiva_3">Ejecutiva 3:</label>
                    <input type="text" v-model="formCliente.ejecutiva_3" :placeholder="companies.ejecutiva_3"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fono_ejecutiva_3">Teléfono de Ejecutiva 3:</label>
                    <input type="text" v-model="formCliente.fono_ejecutiva_3" :placeholder="companies.fono_ejecutiva_3"
                        class="custom-input" />
                </div>
                <div>
                    <label for="mail_ejecutiva_3">Correo Electrónico de Ejecutiva 3:</label>
                    <input type="email" v-model="formCliente.mail_ejecutiva_3" :placeholder="companies.mail_ejecutiva_3"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fecha_nacimiento_ejecutiva_3">Fecha de Nacimiento de Ejecutiva 3:</label>
                    <input type="date" v-model="formCliente.fecha_nacimiento_ejecutiva_3"
                        :placeholder="formCliente.fecha_nacimiento_ejecutiva_3" class="custom-input" />
                </div>

            </div>
            <div class="flex justify-end mt-2 mr-10">
                <Button type="button" @keydown.enter="editUser()">
                    <input type="submit" value="Guardar" title="Guardar" @click="editUser()"
                        @keydown.enter="editUser()" />
                </Button>
            </div>
        </form>
        <div class="px-6 py-4 text-right bg-white dark:bg-dark-eval-3">
            <slot name="footer"></slot>
        </div>
    </Modal>
</template>


<script>

import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue'

export default {
    components: {
        Modal,
        Button
    },
    props: {
        companies: {
            type: Array,
            default: true,
        }, show: {
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
            formCliente: {
                id: this.companies.id,
                razon_social: this.companies.razon_social,
                nombre_fantasia: this.companies.nombre_fantasia,
                rut_empresa: this.companies.rut_empresa,
                direccion: this.companies.direccion,
                comuna: this.companies.comuna,
                region: this.companies.region,
                fono: this.companies.fono,
                mail: this.companies.mail,
                nombre_banco: this.companies.nombre_banco,
                num_cuenta: this.companies.num_cuenta,
                representante_legal: this.companies.representante_legal,
                rut_representante: this.companies.rut_representante,
                mail_representante: this.companies.mail_representante,
                fono_representante: this.companies.fono_representante,
                nombre_gerente: this.companies.nombre_gerente,
                direccion_gerente: this.companies.direccion_gerente,
                comuna_gerente: this.companies.comuna_gerente,
                region_gerente: this.companies.region_gerente,
                fono_gerente: this.companies.fono_gerente,
                mail_gerente: this.companies.mail_gerente,
                fecha_nacimiento_gerente: this.companies.fecha_nacimiento_gerente, // Usar el formato de fecha que prefieras
                ejecutiva_1: this.companies.ejecutiva_1,
                fono_ejecutiva_1: this.companies.fono_ejecutiva_1,
                mail_ejecutiva_1: this.companies.mail_ejecutiva_1,
                fecha_nacimiento_ejecutiva_1: this.companies.fecha_nacimiento_ejecutiva_1,
                ejecutiva_2: this.companies.ejecutiva_2,
                fono_ejecutiva_2: this.companies.fono_ejecutiva_2,
                mail_ejecutiva_2: this.companies.mail_ejecutiva_2,
                fecha_nacimiento_ejecutiva_2: this.companies.fecha_nacimiento_ejecutiva_2,
                ejecutiva_3: this.companies.ejecutiva_3,
                fono_ejecutiva_3: this.companies.fono_ejecutiva_3,
                mail_ejecutiva_3: this.companies.mail_ejecutiva_3,
                fecha_nacimiento_ejecutiva_3: this.companies.fecha_nacimiento_ejecutiva_3,
            }
        }

    },
    methods: {
        close() {
            this.$emit('close');
        },
        editUser() {
            axios
                .post("/crud/edit-cia-back", {
                    id: this.formCliente.id,
                    razon_social: this.formCliente.razon_social,
                    nombre_fantasia: this.formCliente.nombre_fantasia,
                    rut_empresa: this.formCliente.rut_empresa,
                    direccion: this.formCliente.direccion,
                    comuna: this.formCliente.comuna,
                    region: this.formCliente.region,
                    fono: this.formCliente.fono,
                    mail: this.formCliente.mail,
                    nombre_banco: this.formCliente.nombre_banco,
                    num_cuenta: this.formCliente.num_cuenta,
                    representante_legal: this.formCliente.representante_legal,
                    rut_representante: this.formCliente.rut_representante,
                    mail_representante: this.formCliente.mail_representante,
                    fono_representante: this.formCliente.fono_representante,
                    nombre_gerente: this.formCliente.nombre_gerente,
                    direccion_gerente: this.formCliente.direccion_gerente,
                    comuna_gerente: this.formCliente.comuna_gerente,
                    region_gerente: this.formCliente.region_gerente,
                    fono_gerente: this.formCliente.fono_gerente,
                    mail_gerente: this.formCliente.mail_gerente,
                    fecha_nacimiento_gerente: this.formCliente.fecha_nacimiento_gerente, // Usar el formato de fecha que prefieras
                    ejecutiva_1: this.formCliente.ejecutiva_1,
                    fono_ejecutiva_1: this.formCliente.fono_ejecutiva_1,
                    mail_ejecutiva_1: this.formCliente.mail_ejecutiva_1,
                    fecha_nacimiento_ejecutiva_1: this.formCliente.fecha_nacimiento_ejecutiva_1,
                    ejecutiva_2: this.formCliente.ejecutiva_2,
                    fono_ejecutiva_2: this.formCliente.fono_ejecutiva_2,
                    mail_ejecutiva_2: this.formCliente.mail_ejecutiva_2,
                    fecha_nacimiento_ejecutiva_2: this.formCliente.fecha_nacimiento_ejecutiva_2,
                    ejecutiva_3: this.formCliente.ejecutiva_3,
                    fono_ejecutiva_3: this.formCliente.fono_ejecutiva_3,
                    mail_ejecutiva_3: this.formCliente.mail_ejecutiva_3,
                    fecha_nacimiento_ejecutiva_3: this.formCliente.fecha_nacimiento_ejecutiva_3,

                })
                .then((response) => {
                    console.log("RESPUESTA EDICION BACK: ", response.data);
                    this.$emit('close');

                    if (response.data) {
                        console.log("DATOS BACK: ", response.data);
                    } else {
                        console.log("NO FUNCIONA, DATA VACIO");
                    }
                })
                .catch(error => {
                    console.error('Hubo un error:', error);
                    alert('Hubo un problema al actualizar el cliente');
                });
            //window.location.href = "/crud/index";
        },

    }
}

</script>

<style>
.custom-input {
    margin-top: 0.25rem;
    margin-right: 0.25rem;
    display: block;
    border-color: #d1d5db;
    border-radius: 0.375rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    transition: border-color 0.3s, box-shadow 0.3s;
    padding: 0.5rem;
    /* Añadir un padding para mejor apariencia */
    width: 100%;
    /* Asegurar que el input ocupe todo el ancho disponible */
    box-sizing: border-box;
    /* Incluir padding y borde en el ancho total */
}

.custom-input:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(199, 210, 254, 0.5);
    outline: none;
}
</style>
