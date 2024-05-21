<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-6 py-4">
            <div class="text-lg">
                <slot name="title"> </slot>
            </div>

            <div class="mt-4">
                <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
                <h2 class="text-xl font-semibold text-center leading-tight">
                    Crear Usuario Interno
                </h2>
            </div>

            <form @submit.prevent="submit">
                <div class="p-4 justify-center text-slate-900">


                    <div class="flex text-slate-900">

                        <input type="text" v-model="form.name" required placeholder="Nombres"
                            class="mt-1 mr-1 w-1/2 block  border-gray-300  rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.last_name" placeholder="Apellidos"
                            class="mt-1 block w-1/2 border-gray-300   rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex text-slate-900">
                        <input type="text" v-model="form.rut" placeholder="RUT"
                            class="mt-1 mr-1 w-1/2 block  border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <div class="flex flex-col mt-1 w-1/2">
                            <select v-model="form.selectedCargo" id="cargo" name="cargo"
                                class="block  border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Seleccionar Nivel Ejecutivo</option>
                                <option value="cobranza">Comercial</option>
                                <option value="contador">Cobranza</option>
                                <option value="gestor_siniestro">Gestor de Siniestros</option>
                            </select>
                        </div>


                    </div>
                    <label class="block text-sm font-medium mt-4">Fecha Nacimiento:</label>
                    <div class="flex">
                        <input type="date" v-model="form.fecha_nacimiento" placeholder="Nombres"
                            class="mt-1 mr-1 w-1/2 block  border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <input type="text" v-model="form.telefono" placeholder="Telefono"
                            class="mt-1 block w-1/2 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <input type="email" v-model="form.email" required placeholder="Correo"
                            class="mt-1 mr-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                        <input type="text" v-model="form.address" placeholder="Dirección"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <input type="text" v-model="form.ciudad" placeholder="Comuna"
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
                    <div class="flex">

                        <label class="block w-1/4 text-sm font-medium mt-4">Contraseña:</label>
                        <input type="password" v-model="form.password"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex">
                        <label class="block w-1/4 text-sm font-medium mt-4">Confirmar Contraseña:</label>
                        <input type="password" v-model="form.password_confirmation"
                            class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>


                    <div class="py-4 w-60 justify-items-end">
                        <Button class="w-full justify-center gap-2">
                            <span>Registrar Usuario</span>
                        </Button>
                    </div>

                </div>
            </form>

            
        </div>

        <div class="px-6 py-4 text-right bg-gray-100 dark:bg-dark-eval-3">
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
        selectedCargo: '',
        name: 'cesar',
        last_name: '',
        rut: '',
        fecha_nacimiento: '',
        telefono: '',
        email: '1@2.cl',
        address: '',
        ciudad: '',
        region: '',
        rol_id: 2,
        password: 'qwedsar1ASD',
        password_confirmation: 'qwedsar1ASD',
      })
    };
  },
  methods: {
    submit() {
    //   this.form.post('/crear-usuario-interno')

axios.post('/crear-usuario-interno',{
'selectedCargo': this.form.selectedCargo,
  'name': this.form.name || '', // Ejemplo
  'last_name': this.form.last_name || '', // Ejemplo
  'rut': this.form.rut || '', // Ejemplo
  'fecha_nacimiento': this.form.fecha_nacimiento || '', // Ejemplo
  'telefono': this.form.telefono || '', // Ejemplo
  'email': this.form.email,
  'address': this.form.address || '', // Ejemplo
  'ciudad': this.form.ciudad || '', // Ejemplo
  'region': this.form.region || '', // Ejemplo
  'rol_id': 2,
  'password': 'qwedsar1ASD',
  'password_confirmation': 'qwedsar1ASD',
}).then(response=>{
    console.log(response.data);
    this.close()
}) ;
    },
    close() {
      this.$emit('close');
    }
  }
};
</script>

