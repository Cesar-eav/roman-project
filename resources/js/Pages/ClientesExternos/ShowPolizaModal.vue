<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
            Nª POLIZA: {{ poliza.numero_poliza }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">
            <p><strong>Cliente ID:</strong> {{ poliza.cliente_id }}</p>
            <p><strong>Número de Póliza:</strong> {{ poliza.numero_poliza }}</p>
            <p><strong>Tipo de Póliza:</strong> {{ poliza.tipo_poliza }}</p>
            <p><strong>Monto Asegurado:</strong> {{ poliza.monto_asegurado }}</p>
            <p><strong>Prima:</strong> {{ poliza.prima }}</p>
            <p><strong>Valor Neto:</strong> {{ poliza.valor_neto }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ poliza.fecha_inicio }}</p>
            <p><strong>Fecha de Vencimiento:</strong> {{ poliza.fecha_vencimiento }}</p>
            <p><strong>Día de Pago:</strong> {{ poliza.dia_pago }}</p>
            <p><strong>Método de Pago:</strong> {{ poliza.metodo_pago }}</p>
            <p><strong>Aseguradora:</strong> 12 {{ poliza.aseguradora }}</p>
        </div>



        <div class="px-6 py-4 text-right bg-white dark:bg-dark-eval-3">
            <slot name="footer"> </slot>
        </div>
    </Modal>
</template>


<script>

import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue';



export default {
    components: {
        Modal,
        Button,
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
    methods: {
        close() {
            this.$emit('close');
        }

    }
}



</script>
