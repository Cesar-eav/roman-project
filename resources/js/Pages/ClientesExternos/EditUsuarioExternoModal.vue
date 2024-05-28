<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="m-4 p-4 bg-orange-500">
            <h2 class="flex flex-col text-white text-2xl font-semibold text-center leading-tight">
                <p>Editar Usuario Externo </p>
                <p class="text-2xl">{{ usuario_externo.nombres }}</p>
            </h2>
        </div>
        <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">

                <div>
                    <label for="nivel_ejecutivo">Nivel Ejecutivo:</label>
                    <input type="text" v-model="form.nivel_ejecutivo" :placeholder="usuario_externo.nivel_ejecutivo"
                        class="custom-input" />
                </div>
                <div>
                    <label for="nombres">Nombres:</label>
                    <input type="text" v-model="form.nombres" :placeholder="usuario_externo.nombres"
                        class="custom-input" />
                </div>
                <div>
                    <label for="apellido_paterno">Apellido Paterno:</label>
                    <input type="text" v-model="form.apellido_paterno" :placeholder="usuario_externo.apellido_paterno"
                        class="custom-input" />
                </div>
                <div>
                    <label for="apellido_materno">Apellido Materno:</label>
                    <input type="text" v-model="form.apellido_materno" :placeholder="usuario_externo.apellido_materno"
                        class="custom-input" />
                </div>
                <div>
                    <label for="rut">RUT:</label>
                    <input type="text" v-model="form.rut" :placeholder="usuario_externo.rut" class="custom-input" />
                </div>
                <div>
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="text" v-model="form.fecha_nacimiento" :placeholder="usuario_externo.fecha_nacimiento"
                        class="custom-input" />
                </div>
                <div>
                    <label for="fono">Fono:</label>
                    <input type="text" v-model="form.fono" :placeholder="usuario_externo.fono" class="custom-input" />
                </div>
                <div>
                    <label for="mail">Mail:</label>
                    <input type="text" v-model="form.mail" :placeholder="usuario_externo.mail" class="custom-input" />
                </div>
                <div>
                    <label for="direccion">Dirección:</label>
                    <input type="text" v-model="form.direccion" :placeholder="usuario_externo.direccion"
                        class="custom-input" />
                </div>
                <div>
                    <label for="comuna">Comuna:</label>
                    <input type="text" v-model="form.comuna" :placeholder="usuario_externo.comuna"
                        class="custom-input" />
                </div>
                <div>
                    <label for="region">Región:</label>
                    <input type="text" v-model="form.region" :placeholder="usuario_externo.region"
                        class="custom-input" />
                </div>
                <div>
                    <label for="isapre">Isapre:</label>
                    <input type="text" v-model="form.isapre" :placeholder="usuario_externo.isapre"
                        class="custom-input" />
                </div>
                <div>
                    <label for="afp">AFP:</label>
                    <input type="text" v-model="form.afp" :placeholder="usuario_externo.afp" class="custom-input" />
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
        usuario_externo: {
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
                id: this.usuario_externo.id,
                nivel_ejecutivo: this.usuario_externo.nivel_ejecutivo,
                nombres: this.usuario_externo.nombres,
                apellido_paterno: this.usuario_externo.apellido_paterno,
                apellido_materno: this.usuario_externo.apellido_materno,
                rut: this.usuario_externo.rut,
                fecha_nacimiento: this.usuario_externo.fecha_nacimiento,
                fono: this.usuario_externo.fono,
                mail: this.usuario_externo.mail,
                direccion: this.usuario_externo.direccion,
                comuna: this.usuario_externo.comuna,
                region: this.usuario_externo.region,
                isapre: this.usuario_externo.isapre,
                afp: this.usuario_externo.afp,
            }
        }

    },
    methods: {
        close() {
            this.$emit('close');
        },
        editUser() {
            axios
                .post("/crud/edit-usuario-externo", {
                    id: this.form.id,
                    nombres: this.form.nombres,
                    nivel_ejecutivo: this.form.nivel_ejecutivo,
                    apellido_paterno: this.form.apellido_paterno,
                    apellido_materno: this.form.apellido_materno,
                    rut: this.form.rut,
                    fecha_nacimiento: this.form.fecha_nacimiento,
                    fono: this.form.fono,
                    mail: this.form.mail,
                    direccion: this.form.direccion,
                    comuna: this.form.comuna,
                    region: this.form.region,
                    isapre: this.form.isapre,
                    afp: this.form.afp

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
