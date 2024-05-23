<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="mt-4">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-xl font-semibold text-center leading-tight">
                {{ cliente.name }} {{ cliente.last_name }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">
                    <p><strong>Nivel Ejecutivo:</strong> {{ cliente.cargo }}</p>
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
    methods: {
        close() {
            this.$emit('close');
        }

    }
}



</script>
