<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight uppercase">
                {{ companies.razon_social }}
            </h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-900 mx-4 text-sm ">

            <div class="mt-4 col-span-2">
                <h2 class="text-lg font-semibold text-left leading-tight">
                    Datos Generales
                </h2>
            </div>

            <div class="section col-span-2">
                <p><strong>Nombre Fantasía: </strong>{{ companies.nombre_fantasia }}</p>
                <p><strong>Razón Social: </strong> {{ companies.razon_social }}</p>
                <p><strong>Nombre Fantasía:</strong> {{ companies.nombre_fantasia }}</p>
                <p><strong>RUT Empresa:</strong> {{ companies.rut_empresa }}</p>
                <p><strong>Dirección:</strong> {{ companies.direccion }}</p>
                <p><strong>Comuna:</strong> {{ companies.comuna }}</p>
                <p><strong>Región:</strong> {{ companies.region }}</p>
                <p><strong>Fono:</strong> {{ companies.fono }}</p>
                <p><strong>Email:</strong> {{ companies.mail }}</p>
                <p><strong>Nombre Banco:</strong> {{ companies.banco.nombre }}</p>
                <p><strong>Número Cuenta:</strong> {{ companies.num_cuenta }}</p>
            </div>

            <div class="mt-4 col-span-2">
                <h2 class="text-lg font-semibold text-left leading-tight">
                    Representante legal
                </h2>
            </div>

            <div class="section col-span-2">
                <p><strong>Representante Legal:</strong> {{ companies.representante_legal }} {{
                    companies.apellidos_representante_legal }} </p>
                <p><strong>RUT Representante:</strong> {{ companies.rut_representante }}</p>
                <p><strong>Email Representante:</strong> {{ companies.mail_representante }}</p>
                <p><strong>Fono Representante:</strong> {{ companies.fono_representante }}</p>
                <p><strong>Nombre Gerente:</strong> {{ companies.nombre_gerente }}</p>
                <p><strong>Dirección Gerente:</strong> {{ companies.direccion_gerente }}</p>
                <p><strong>Comuna Gerente:</strong> {{ companies.comuna_gerente }}</p>
                <p><strong>Región Gerente:</strong> {{ companies.region_gerente }}</p>
                <p><strong>Fono Gerente:</strong> {{ companies.fono_gerente }}</p>
                <p><strong>Email Gerente:</strong> {{ companies.mail_gerente }}</p>
                <p><strong>Fecha Nacimiento Gerente:</strong> {{ companies.fecha_nacimiento_gerente }}</p>
            </div>


            <div class="mt-4 col-span-2">
                <h2 class="text-lg font-semibold text-left leading-tight">
                    Ejecutivas/os
                </h2>
            </div>

            <div class="section col-span-2">
                <div>
                    <p><strong> {{ companies.ejecutiva_1 }}</strong></p>
                    <p> {{ companies.fono_ejecutiva_1 }}</p>
                    <p>{{ companies.mail_ejecutiva_1 }}</p>
                </div>
            </div>

            <div class="section col-span-2">
                <div>
                    <p><strong>{{ companies.ejecutiva_2 }}</strong> </p>
                    <p>{{ companies.fono_ejecutiva_2 }}</p>
                    <p>{{ companies.mail_ejecutiva_2 }}</p>
                </div>
            </div>


            <!-- EDITAR EJECUTIVA -->
            <div v-for="ejecutiva in ejecutivasData" :key="ejecutiva.id" class="section col-span-2">
                <div>
                    <template v-if="editableId === ejecutiva.id">
                        <p>
                            <input v-model="editableEjecutiva.name" class="editable-input font-bold	" />
                            <input v-model="editableEjecutiva.last_name" class="editable-input" />
                        </p>
                        <p><input v-model="editableEjecutiva.email" class="editable-input" /></p>
                        <p><input v-model="editableEjecutiva.telefono" class="editable-input" /></p>
                        <p><input v-model="editableEjecutiva.fecha_nacimiento" type="date" class="editable-input" /></p>
                        <div>
                            <button @click="saveChanges(ejecutiva.id)" class="mr-2 bg-gray-300">Guardar</button>
                            <button @click="cancelEdit()" class=" bg-gray-300">Cancelar</button>
                        </div>
                    </template>
                    <template v-else>
                        <p><strong>{{ ejecutiva.name }} {{ ejecutiva.last_name }}</strong></p>
                        <p>{{ ejecutiva.email }}</p>
                        <p>{{ ejecutiva.telefono }}</p>
                        <p>{{ ejecutiva.fecha_nacimiento }}</p>
                        <div>
                            <button @click="editEjecutiva(ejecutiva)" class="btn-edit p-1 mr-2">Editar</button>
                            <button @click="deleteEjecutiva(ejecutiva.id)" class="btn-delete p-1">Eliminar</button>
                        </div>
                    </template>
                </div>
            </div>


        <!-- EJECUTIVO NUEVO -->

            <div v-for="(ejecutiva, index) in ejecutivas" :key="index" class="section col-span-2">
                <p><strong>Datos Ejecutiva/o Nuevo</strong></p>
                <div></div>
                <input type="text" v-model="ejecutiva.name" placeholder="Nombre">
                <input type="text" v-model="ejecutiva.last_name" placeholder="Apellido">
                <input type="email" v-model="ejecutiva.email" placeholder="Correo">
                <input type="tel" v-model="ejecutiva.telefono" placeholder="Teléfono">
                <input type="date" v-model="ejecutiva.fecha_nacimiento" placeholder="Fecha Nacimiento">
                <input type="hidden" v-model="ejecutiva.cia_id">
                <button @click="removeEjecutiva(index)"
                    class="bg-red-500 text-white px-2 py-1 rounded mt-2">Eliminar</button>

            </div>

            <button class="bg-orange-500 text-white px-4 py-2 rounded" @click="addEjecutiva">Agregar Ejecutiva</button>
            <button class="bg-green-500 text-white px-4 py-2 rounded" @click="saveEjecutivas">Guardar
                Ejecutivas</button>



            <div class="px-6 py-4 text-right bg-white dark:bg-dark-eval-3">
                <slot name="footer"> </slot>
            </div>
        </div>
    </Modal>
</template>


<script>

import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue';
import axios from 'axios';



export default {
    components: {
        Modal,
        Button,
    },
    props: {
        ejecutivasData: {
            type: Array,
            default: true
        },
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
            showEjecutiva: false,
            ejecutivas: [],
            editableId: null,
            editableEjecutiva: {
                name: '',
                last_name: '',
                email: '',
                telefono: '',
                fecha_nacimiento: ''
            }

        }
    },

    methods: {
        addEjecutiva() {
            this.ejecutivas.push({
                name: '',
                last_name: '',
                email: '',
                telefono: '',
                fecha_nacimiento: '',
                cia_id: this.companies.id
            });

        },
        removeEjecutiva(index) {
            this.ejecutivas.splice(index, 1);
        },

        saveEjecutivas() {
            axios.post('/guardar-ejecutivas', {
                ejecutivas: this.ejecutivas,

            })
                .then(response => {
                    console.log("RESPUESTA: ", response.data);
                    this.close();
                })
                .catch(error => {
                    // manejar el error
                });

        },
        editEjecutiva(ejecutiva) {
            this.editableId = ejecutiva.id;
            this.editableEjecutiva = { ...ejecutiva };
        },
        saveChanges(id) {
            console.log("Guardando..")
            const index = this.ejecutivasData.findIndex(ejecutiva => ejecutiva.id === id);
            if (index !== -1) {
                this.ejecutivasData[index] = { ...this.editableEjecutiva };
                axios.
                    post("/edit-save-ejecutiva-modal", {
                        id: id,
                        name: this.editableEjecutiva.name,
                        last_name: this.editableEjecutiva.last_name,
                        email: this.editableEjecutiva.email,
                        telefono: this.editableEjecutiva.telefono,
                        fecha_nacimiento: this.editableEjecutiva.fecha_nacimiento,

                    })

                    .then(response => {
                        // Manejar la respuesta del servidor
                        console.log("Cambios guardados correctamente:", response.data);
                        // Aquí puedes actualizar ejecutivasData si la respuesta contiene datos actualizados
                        // this.ejecutivasData[index] = response.data;
                    })
                    .catch(error => {
                        // Manejar errores
                        console.error("Error al guardar los cambios:", error);
                        // Aquí puedes mostrar un mensaje de error al usuario
                    });
            }
            this.editableId = null;
        },
        cancelEdit() {
            this.editableId = null;
            this.editableEjecutiva = {
                name: '',
                last_name: '',
                email: '',
                telefono: '',
                fecha_nacimiento: ''
            };
        },
        deleteEjecutiva(id) {
            console.log('Eliminar ejecutiva con ID:', id);
            this.ejecutivas = this.ejecutivas.filter(ejecutiva => ejecutiva.id !== id);

            axios.delete("/delete/ejecutiva-modal/" + id)
                .then(response => {
                    // Manejar la respuesta del servidor
                    console.log("Ejecutiva eliminada correctamente:", response.data);
                    // Aquí puedes manejar una respuesta exitosa, por ejemplo, mostrar un mensaje de éxito al usuario
                })
                .catch(error => {
                    // Manejar errores
                    console.error("Error al eliminar la ejecutiva:", error);
                    // Aquí puedes manejar un error, por ejemplo, mostrar un mensaje de error al usuario
                });

        }
    },
    close() {
        this.$emit('close');
    }

}




</script>
<style>
.section {
    background-color: #f5f5f5;
    /* Fondo rojo claro */
    padding: 16px;
    /* Espacio interno */
    margin-bottom: 16px;
    /* Espacio entre secciones */
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    border-radius: 8px;
    /* Bordes redondeados */
}

.btn-edit {
    background-color: #4CAF50;
    /* Verde */
    color: white;
}

.btn-delete {
    background-color: #f44336;
    /* Rojo */
    color: white;
}

.editable-input {
    border: 1px solid #d1d5db;
    /* Borde gris claro */
    border-radius: 4px;
    /* Bordes redondeados */
    background: none;
    padding: 0.2rem 0.4rem;
    /* Padding ligero */
    font-size: inherit;
    color: inherit;
    outline: none;
}
</style>
