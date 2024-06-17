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
                <p><strong>Representante Legal:</strong> {{ companies.representante_legal }}</p>
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
                    Ejecutivas
                </h2>
            </div>

            <div class="section col-span-2">
                <p><strong>Ejecutiva 1:</strong> {{ companies.ejecutiva_1 }}</p>
                <p><strong>Fono Ejecutiva 1:</strong> {{ companies.fono_ejecutiva_1 }}</p>
                <p><strong>Email Ejecutiva 1:</strong> {{ companies.mail_ejecutiva_1 }}</p>
                <p><strong>Fecha Nacimiento Ejecutiva 1:</strong> {{ companies.fecha_nacimiento_ejecutiva_1 }}</p>
                <p><strong>Ejecutiva 2:</strong> {{ companies.ejecutiva_2 }}</p>
                <p><strong>Fono Ejecutiva 2:</strong> {{ companies.fono_ejecutiva_2 }}</p>
                <p><strong>Email Ejecutiva 2:</strong> {{ companies.mail_ejecutiva_2 }}</p>
                <p><strong>Fecha Nacimiento Ejecutiva 2:</strong> {{ companies.fecha_nacimiento_ejecutiva_2 }}</p>
            </div>
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
    methods: {
        close() {
            this.$emit('close');
        }

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
</style>
