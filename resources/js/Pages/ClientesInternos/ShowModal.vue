<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight rounded-lg">
                {{ cliente.name }} {{ cliente.last_name }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-slate-900 mx-4 text-sm">

            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Nivel Ejecutivo</strong></p>
                <p>{{ cliente.cargo }}</p>
            </div>

            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Nombre Completo</strong></p>
                <p>{{ cliente.name }} {{ cliente.last_name }}</p>
            </div>

            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>RUT:</strong></p>
                <p>{{ cliente.rut }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Fecha de Nacimiento:</strong></p>
                <p>{{ cliente.fecha_nacimiento }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Fono:</strong></p>
                <p>{{ cliente.telefono }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Mail:</strong></p>
                <p>{{ cliente.email }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Dirección:</strong></p>
                <p>{{ cliente.address }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Comuna:</strong></p>
                <p>{{ cliente.ciudad }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Región:</strong></p>
                <p>{{ cliente.region }}</p>
            </div>
            <div class="flex flex-col bg-slate-200 rounded-lg p-2">
                <p><strong>Isapre:</strong></p>
                <p>{{ cliente.isapre }}</p>
            </div>
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
