<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
                {{ cliente.name }} {{ cliente.last_name }}
            </h2>
        </div>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">

                <div class="flex flex-col mt-1 w-full">
                    <label for="nivel_ejecutivo">Nivel Ejecutivo:</label>
                    <select v-model="formCliente.cargo" class="rounded-md ">
                        <option value="Cobranza">Comercial</option>
                        <option value="Contador">Cobranza</option>
                        <option value="Gestor de Siniestros">Gestor de Siniestros</option>
                    </select>
                </div>
                <div>
                    <label for="name">Nombre:</label>
                    <input type="text" v-model="formCliente.name" :placeholder="formCliente.name"
                        class="custom-input" />
                </div>
                <div>
                    <label for="last_name">Apellido:</label>
                    <input type="text" v-model="formCliente.last_name" :placeholder="formCliente.last_name"
                        class="custom-input" />
                </div>
                <div>
                    <label for="rut">RUT:</label>
                    <input type="text" v-model="formCliente.rut" :placeholder="formCliente.rut" class="custom-input" />
                </div>
                <div>
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" v-model="formCliente.fecha_nacimiento"
                        :placeholder="formCliente.fecha_nacimiento" class="custom-input" />
                </div>
                <div>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" v-model="formCliente.telefono" :placeholder="formCliente.telefono"
                        class="custom-input" />
                </div>
                <div>
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" v-model="formCliente.email" :placeholder="formCliente.email"
                        class="custom-input" />
                </div>
                <div>
                    <label for="address">Dirección:</label>
                    <input type="text" v-model="formCliente.address" :placeholder="formCliente.address"
                        class="custom-input" />
                </div>
                <div>
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" v-model="formCliente.ciudad" :placeholder="formCliente.ciudad"
                        class="custom-input" />
                </div>
                <div>
                    <label for="region">Región:</label>
                    <input type="text" v-model="formCliente.region" :placeholder="formCliente.region"
                        class="custom-input" />
                </div>
                <div>
                    <label for="isapre">Isapre:</label>
                    <input type="text" v-model="formCliente.isapre" :placeholder="formCliente.isapre"
                        class="custom-input" />
                </div>
                <div>
                    <label for="afp">AFP:</label>
                    <input type="text" v-model="formCliente.afp" :placeholder="formCliente.afp" class="custom-input" />
                </div>
                <div>
                    <label>Nueva contraseña:</label>
                    <input type="password" v-model="formCliente.password" :placeholder="formCliente.password"
                        class="custom-input" />
                </div>
                <div>
                    <label>Confirmar contraseña:</label>
                    <input type="password" v-model="formCliente.password_confirm" :placeholder="formCliente.password_confirm"
                        class="custom-input" />
                </div>
                <div class="flex justify-end mt-2 mr-10">
                    <Button type="button" @keydown.enter="editUser()">
                        <input type="submit" value="Guardar" title="Guardar" @click="editUser()"
                            @keydown.enter="editUser()" />
                    </Button>
                </div>
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
        cliente: {
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
                id: this.cliente.id,
                cargo: this.cliente.cargo,
                name: this.cliente.name,
                last_name: this.cliente.last_name,
                rut: this.cliente.rut,
                fecha_nacimiento: this.cliente.fecha_nacimiento,
                telefono: this.cliente.telefono,
                email: this.cliente.email,
                address: this.cliente.address,
                ciudad: this.cliente.ciudad,
                region: this.cliente.region,
                isapre: this.cliente.isapre,
                afp: this.cliente.afp,
                password: null,
                password_confirm: null,
                rol_id: 2,
            }
        }

    },
    methods: {
        close() {
            this.$emit('close');
        },
        editUser() {
            axios
                .post("/crud/edit-cliente-back", {
                    id: this.formCliente.id,
                    cargo: this.formCliente.cargo,
                    name: this.formCliente.name,
                    last_name: this.formCliente.last_name,
                    rut: this.formCliente.rut,
                    fecha_nacimiento: this.formCliente.fecha_nacimiento,
                    telefono: this.formCliente.telefono,
                    email: this.formCliente.email,
                    address: this.formCliente.address,
                    ciudad: this.formCliente.ciudad,
                    region: this.formCliente.region,
                    isapre: this.formCliente.isapre,
                    afp: this.formCliente.afp,
                    password: this.formCliente.password,
                    password_confirm: this.formCliente.password_confirm,
                    rol_id: this.formCliente.rol_id

                })
                .then((response) => {
                    console.log("RESPUESTA EDICION BACK: ", response);
                    this.$emit('close');

                    if (response.data) {
                        console.log("DATOS BACK: ", response.data);
                    } else {
                        console.log("NO FUNCIONA, DATA VACIO");
                    }
                })
                .catch(error => {
                    console.error('Hubo un error:', error);
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
