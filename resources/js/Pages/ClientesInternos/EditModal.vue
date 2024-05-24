<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
                Editar {{ cliente.name }} {{ cliente.last_name }} {{ cliente.id }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">
            <div>
                <p>Nivel Ejecutivo:</p>
                <input type="text" v-model="formCliente.cargo" :placeholder="formCliente.cargo"> </input>
            </div>

            <div>
                <label for="name">Nombre:</label>
                <input type="text" v-model="formCliente.name" :placeholder="formCliente.name" />
            </div>

            <div>
                <label for="last_name">Apellido:</label>
                <input type="text" v-model="formCliente.last_name" :placeholder="formCliente.last_name" />
            </div>

            <div>
                <label for="rut">RUT:</label>
                <input type="text" v-model="formCliente.rut" :placeholder="formCliente.rut" />
            </div>

            <div>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" v-model="formCliente.fecha_nacimiento" :placeholder="formCliente.fecha_nacimiento" />
            </div>

            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" v-model="formCliente.telefono" :placeholder="formCliente.telefono" />
            </div>

            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" v-model="formCliente.email" :placeholder="formCliente.email" />
            </div>

            <div>
                <label for="address">Dirección:</label>
                <input type="text" v-model="formCliente.address" :placeholder="formCliente.address" />
            </div>

            <div>
                <label for="ciudad">Ciudad:</label>
                <input type="text" v-model="formCliente.ciudad" :placeholder="formCliente.ciudad" />
            </div>

            <div>
                <label for="region">Región:</label>
                <input type="text" v-model="formCliente.region" :placeholder="formCliente.region" />
            </div>

            <div>
                <label for="isapre">Isapre:</label>
                <input type="text" v-model="formCliente.isapre" :placeholder="formCliente.isapre" />
            </div>

            <div>
                <label for="afp">AFP:</label>
                <input type="text" v-model="formCliente.afp" :placeholder="formCliente.afp" />
            </div>

        </div>
        <button type="button"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            <input type="submit" value="Guardar" title="Guardar" @click="editUser()" />
        </button>


        <div class="px-6 py-4 text-right bg-white dark:bg-dark-eval-3">
            <slot name="footer"> </slot>
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
                fechaNacimiento: this.cliente.fecha_nacimiento,
                telefono: this.cliente.telefono,
                email: this.cliente.email,
                address: this.cliente.address,
                ciudad: this.cliente.ciudad,
                region: this.cliente.region,
                isapre: this.cliente.isapre,
                afp: this.cliente.afp
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
                    fechaNacimiento: this.formCliente.fecha_nacimiento,
                    telefono: this.formCliente.telefono,
                    email: this.formCliente.email,
                    address: this.formCliente.address,
                    ciudad: this.formCliente.ciudad,
                    region: this.formCliente.region,
                    isapre: this.formCliente.isapre,
                    afp: this.formCliente.afp

                })
                .then((response) => {
                    console.log("RESPUESTA EDICION BACK: ", response.data);

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
