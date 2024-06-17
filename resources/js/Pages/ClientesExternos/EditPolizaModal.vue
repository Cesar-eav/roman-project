<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <h2 class="flex flex-col text-white text-2xl font-semibold text-center leading-tight">
                <p>Editar Poliza </p>
            </h2>
        </div>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">

                <div>
                    <label><strong>Número de Póliza:</strong></label>
                    <input type="text" v-model="form.numero_poliza" 
                        class="custom-input" />
                </div>
                <div>
                    <label><strong>Tipo de Póliza:</strong></label>
                    <input type="text" v-model="form.tipo_poliza"  class="custom-input"
                        />
                </div>
                <div>
                    <label><strong>Monto Asegurado:</strong></label>
                    <input type="text" v-model="form.monto_asegurado" 
                        class="custom-input" />
                </div>
                <div>
                    <label><strong>Prima:</strong></label>
                    <input type="text" v-model="form.prima"  class="custom-input" />
                </div>
                <div>
                    <label><strong>Valor Neto:</strong></label>
                    <input type="text" v-model="form.valor_neto"  class="custom-input"
                        />
                </div>
                <div>
                    <label><strong>Fecha de Inicio:</strong></label>
                    <input type="text" v-model="form.fecha_inicio"  class="custom-input"
                        />
                </div>
                <div>
                    <label><strong>Fecha de Vencimiento:</strong></label>
                    <input type="text" v-model="form.fecha_vencimiento" 
                        class="custom-input" />
                </div>
                <div>
                    <label><strong>Día de Pago:</strong></label>
                    <input type="text" v-model="form.dia_pago"  class="custom-input"
                        />
                </div>
                <div>
                    <label><strong>Método de Pago:</strong></label>
                    <input type="text" v-model="form.metodo_pago"  class="custom-input"
                        />
                </div>
                <div>
                    <label><strong>Aseguradora:</strong></label>
                    <input type="text" v-model="form.aseguradora"  class="custom-input"
                        />
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
        poliza: {
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
            form: {
                id: this.poliza.id,
                numero_poliza: this.poliza.numero_poliza,
                tipo_poliza: this.poliza.tipo_poliza,
                monto_asegurado: this.poliza.monto_asegurado,
                prima: this.poliza.prima,
                valor_neto: this.poliza.valor_neto,
                fecha_inicio: this.poliza.fecha_inicio,
                fecha_vencimiento: this.poliza.fecha_vencimiento,
                dia_pago: this.poliza.dia_pago,
                metodo_pago: this.poliza.metodo_pago,
                aseguradora: this.poliza.aseguradora,
            }
        }

    },
    methods: {
        close() {
            this.$emit('close');
        },
        editUser() {
            axios
                .post("/crud/edit-poliza", {
                    id: this.form.id,
                    numero_poliza: this.form.numero_poliza,
                    tipo_poliza: this.form.tipo_poliza,
                    monto_asegurado: this.form.monto_asegurado,
                    prima: this.form.prima,
                    valor_neto: this.form.valor_neto,
                    fecha_inicio: this.form.fecha_inicio,
                    fecha_vencimiento: this.form.fecha_vencimiento,
                    dia_pago: this.form.dia_pago,
                    metodo_pago: this.form.metodo_pago,
                    aseguradora: this.form.aseguradora,

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
