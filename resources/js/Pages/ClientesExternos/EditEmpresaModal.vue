<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">

                <span>{{ formCliente.razon_social || formCliente.nombres_persona_natural }} </span>
                <span>&nbsp;</span>
                <span v-if="formCliente.nombres_persona_natural">{{ formCliente.apellido_paterno_persona_natural }}
                </span>

            </h2>


        </div>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">

                <div class="mt-4 col-span-3">
                <h2 class="text-lg font-semibold text-left leading-tight">
                  Datos Generales
                </h2>
            </div>
    <template v-if="formCliente.razon_social">
        <div>
            <label for="razon_social">Razón Social:</label>
            <input type="text" v-model="formCliente.razon_social" :placeholder="empresa.razon_social" class="custom-input" />
        </div>
        <div>
            <label for="nombre_fantasia">Nombre Fantasía:</label>
            <input type="text" v-model="formCliente.nombre_fantasia" :placeholder="empresa.nombre_fantasia" class="custom-input" />
        </div>
    </template>
    <template v-else>
        <div>
            <label for="razon_social">Nombre:</label>
            <input type="text" v-model="formCliente.nombres_persona_natural" :placeholder="empresa.nombres_persona_natural" class="custom-input" />
        </div>
        <div>
            <label for="razon_social">Apellido</label>
            <input type="text" v-model="formCliente.apellido_paterno_persona_natural" :placeholder="empresa.apellido_paterno_persona_natural" class="custom-input" />
        </div>
        <div>
            <label for="rut_empresa">RUT</label>
            <input type="text" v-model="formCliente.rut_empresa_persona" :placeholder="empresa.rut_empresa_persona" class="custom-input" />
        </div>
        <div>
            <label for="direccion">Dirección</label>
            <input type="text" v-model="formCliente.direccion" :placeholder="empresa.direccion" class="custom-input" />
        </div>
    </template>

    <div>
        <label for="comuna">Comuna</label>
        <input type="text" v-model="formCliente.comuna" :placeholder="empresa.comuna" class="custom-input" />
    </div>
    <div>
        <label for="region">Región</label>
        <input type="text" v-model="formCliente.region" :placeholder="empresa.region" class="custom-input" />
    </div>
    <div>
        <label for="fono">Teléfono</label>
        <input type="text" v-model="formCliente.fono" :placeholder="empresa.fono" class="custom-input" />
    </div>
    <div>
        <label for="mail">Email</label>
        <input type="email" v-model="formCliente.mail" :placeholder="empresa.mail" class="custom-input" />
    </div>
    <div>
        <label for="nombre_banco">Nombre del Banco:</label>
        <div>
            <select v-model="formCliente.banco_id" id="banco_id" name="banco_id" required class="block mt-1 mr-1 w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Seleccionar Banco</option>
                <template v-for="banco in bancos" :key="banco.id">
                    <option :value="banco.id">{{ banco.nombre }}</option>
                </template>
            </select>
        </div>
    </div>
    <div>
        <label for="numero_cuenta">Número de Cuenta:</label>
        <input type="text" v-model="formCliente.numero_cuenta" :placeholder="empresa.numero_cuenta" class="custom-input" />
    </div>

    <!-- REPRESENTANTE LEGAL -->

    
      

    <template v-if="formCliente.razon_social">
        <div class="mt-4 col-span-3">
                <h2 class="text-lg font-semibold text-left leading-tight">
                  Representante Legal
                </h2>
            </div>

    <div>
        <label for="representante_legal">Nombre</label>
        <input type="text" v-model="formCliente.representante_legal" :placeholder="formCliente.representante_legal" class="custom-input" />
    </div>
    

    <div>
        <label for="apellido_representante_legal">Apellido</label>
        <input type="text" v-model="formCliente.apellido_representante" :placeholder="formCliente.apellido_representante" class="custom-input" />
    </div>


    <div>
        <label for="rut_representante">RUT</label>
        <input type="text" v-model="formCliente.rut_representante_legal" class="custom-input" />
    </div>
    <div>
        <label for="mail_representante">Email</label>
        <input type="email" v-model="formCliente.mail_representante_legal" class="custom-input" />
    </div>
    <div>
        <label for="fono_representante">Teléfono</label>
        <input type="text" v-model="formCliente.fono_representante_legal" class="custom-input" />
    </div>
    </template>
    <div>
        <label for="fecha_nacimiento_gerente">Fecha de Nacimiento:</label>
        <input type="date" v-model="formCliente.fecha_nacimiento" class="custom-input" />
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
        empresa: {
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
        bancos: {
            type: Array,
            default: true,
        }

    },

    data() {
        return {
            formCliente: {
                pj: this.empresa.pj,
                id: this.empresa.id,
                razon_social: this.empresa.razon_social,
                nombre_fantasia: this.empresa.nombre_fantasia,
                nombres_persona_natural: this.empresa.nombres_persona_natural,
                apellido_paterno_persona_natural: this.empresa.apellido_paterno_persona_natural,
                rut_empresa_persona: this.empresa.rut_empresa_persona,
                direccion: this.empresa.direccion,
                comuna: this.empresa.comuna,
                region: this.empresa.region,
                fono: this.empresa.fono,
                mail: this.empresa.mail,
                banco_id: this.empresa.banco.id,
                numero_cuenta: this.empresa.numero_cuenta,
                representante_legal: this.empresa.representante_legal,
                apellido_representante: this.empresa.apellido_representante,
                rut_representante_legal: this.empresa.rut_representante_legal,
                mail_representante_legal: this.empresa.mail_representante_legal,
                fono_representante_legal: this.empresa.fono_representante_legal,
                fecha_nacimiento: this.empresa.fecha_nacimiento, // Usar el formato de fecha que prefieras

            }
        }

    },
    methods: {
        close() {
            this.$emit('close');
        },
        editUser() {
            axios
                .post("/crud/edit-empresa-back", {
                    id: this.formCliente.id,
                    razon_social: this.formCliente.razon_social,
                    nombre_fantasia: this.formCliente.nombre_fantasia,
                    rut_empresa_persona: this.formCliente.rut_empresa_persona,
                    direccion: this.formCliente.direccion,
                    comuna: this.formCliente.comuna,
                    region: this.formCliente.region,
                    fono: this.formCliente.fono,
                    mail: this.formCliente.mail,
                    banco_id: this.formCliente.banco_id,
                    numero_cuenta: this.formCliente.numero_cuenta,
                    representante_legal: this.formCliente.representante_legal,
                    apellido_representante: this.formCliente.apellido_representante,
                    rut_representante_legal: this.formCliente.rut_representante_legal,
                    mail_representante_legal: this.formCliente.mail_representante_legal,
                    fono_representante_legal: this.formCliente.fono_representante_legal,
                    nombre_gerente: this.formCliente.nombre_gerente,
                    direccion_gerente: this.formCliente.direccion_gerente,
                    comuna_gerente: this.formCliente.comuna_gerente,
                    region_gerente: this.formCliente.region_gerente,
                    fono_gerente: this.formCliente.fono_gerente,
                    mail_gerente: this.formCliente.mail_gerente,
                    fecha_nacimiento: this.formCliente.fecha_nacimiento, // Usar el formato de fecha que prefieras

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
