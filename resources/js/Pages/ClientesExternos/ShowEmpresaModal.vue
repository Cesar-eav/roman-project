<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">

        <div class="m-4 p-4 bg-orange-500">
            <!-- <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between"> -->
            <h2 class="text-white text-2xl font-semibold text-center leading-tight">
                EMPRESA: {{ empresas.razon_social }}
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-slate-900 mx-4">
                     <p><strong>Nombre Fantasía:</strong> {{ empresas.nombre_fantasia }}</p>
                     <p><strong>Razón Social:</strong> {{ empresas.razon_social }}</p>
                        <p><strong>Nombre Fantasía:</strong> {{ empresas.nombre_fantasia }}</p>
                        <p><strong>RUT Empresa:</strong> {{ empresas.rut_empresa }}</p>
                        <p><strong>Dirección:</strong> {{ empresas.direccion }}</p>
                        <p><strong>Comuna:</strong> {{ empresas.comuna }}</p>
                        <p><strong>Región:</strong> {{ empresas.region }}</p>
                        <p><strong>Fono:</strong> {{ empresas.fono }}</p>
                        <p><strong>Email:</strong> {{ empresas.mail }}</p>
                        <p><strong>Nombre Banco:</strong> {{ empresas.nombre_banco }}</p>
                        <p><strong>Número Cuenta:</strong> {{ empresas.num_cuenta }}</p>
                        <p><strong>Representante Legal:</strong> {{ empresas.representante_legal }}</p>
                        <p><strong>RUT Representante:</strong> {{ empresas.rut_representante }}</p>
                        <p><strong>Email Representante:</strong> {{ empresas.mail_representante }}</p>
                        <p><strong>Fono Representante:</strong> {{ empresas.fono_representante }}</p>
                        <p><strong>Nombre Gerente:</strong> {{ empresas.nombre_gerente }}</p>
                        <p><strong>Dirección Gerente:</strong> {{ empresas.direccion_gerente }}</p>
                        <p><strong>Comuna Gerente:</strong> {{ empresas.comuna_gerente }}</p>
                        <p><strong>Región Gerente:</strong> {{ empresas.region_gerente }}</p>
                        <p><strong>Fono Gerente:</strong> {{ empresas.fono_gerente }}</p>
                        <p><strong>Email Gerente:</strong> {{ empresas.mail_gerente }}</p>
                        <p><strong>Fecha Nacimiento Gerente:</strong> {{ empresas.fecha_nacimiento_gerente }}</p>
                        <p><strong>Ejecutiva 1:</strong> {{ empresas.ejecutiva_1 }}</p>
                        <p><strong>Fono Ejecutiva 1:</strong> {{ empresas.fono_ejecutiva_1 }}</p>
                        <p><strong>Email Ejecutiva 1:</strong> {{ empresas.mail_ejecutiva_1 }}</p>
                        <p><strong>Fecha Nacimiento Ejecutiva 1:</strong> {{ empresas.fecha_nacimiento_ejecutiva_1 }}</p>
                        <p><strong>Ejecutiva 2:</strong> {{ empresas.ejecutiva_2 }}</p>
                        <p><strong>Fono Ejecutiva 2:</strong> {{ empresas.fono_ejecutiva_2 }}</p>
                        <p><strong>Email Ejecutiva 2:</strong> {{ empresas.mail_ejecutiva_2 }}</p>
                        <p><strong>Fecha Nacimiento Ejecutiva 2:</strong> {{ empresas.fecha_nacimiento_ejecutiva_2 }}</p>
                        <p><strong>Ejecutiva 3:</strong> {{ empresas.ejecutiva_3 }}</p>
                        <p><strong>Fono Ejecutiva 3:</strong> {{ empresas.fono_ejecutiva_3 }}</p>
                        <p><strong>Email Ejecutiva 3:</strong> {{ empresas.mail_ejecutiva_3 }}</p>
                        <p><strong>Fecha Nacimiento Ejecutiva 3:</strong> {{ empresas.fecha_nacimiento_ejecutiva_3 }}</p>
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
        empresas: {
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
