<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
                Editar {{ cliente.name }} {{ cliente.last_name }} {{ cliente.id }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">
            <input type="text" v-model="formCliente.cargo" :placeholder="formCliente.cargo"> </input>
            <p><strong>Nombres:</strong> {{ cliente.name }}</p>
            <p><strong>Apellidos:</strong> {{ cliente.last_name }}</p>
            <p><strong>RUT:</strong> {{ cliente.rut }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ cliente.fechaNacimiento }}</p>
            <p><strong>Fono:</strong> {{ cliente.telefono }}</p>
            <p><strong>Mail:</strong> {{ cliente.email }}</p>
            <p><strong>Dirección:</strong> {{ cliente.address }}</p>
            <p><strong>Comuna:</strong> {{ cliente.ciudad }}</p>
            <p><strong>Región:</strong> {{ cliente.region }}</p>
            <p><strong>Isapre:</strong> {{ cliente.isapre }}</p>
            <p><strong>AFP:</strong> {{ cliente.afp }}</p>
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
                cargo: this.cliente.cargo
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

                })
                .then((response) => {
                    console.log("RESPUESTA EDICION BACK: ", response.data);

                    if (response.data) {
                        console.log("DATOS BACK: ", response.data);
                    } else {
                        console.log("NO FUNCIONA, DATA VACIO");
                    }
                });
            //window.location.href = "/crud/index";
        },

    }
}

</script>
