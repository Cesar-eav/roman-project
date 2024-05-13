import './bootstrap'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Toast from 'vue-toastification'

import DataTablesLib from 'datatables.net'; 
import DataTable from 'datatables.net-vue3';
DataTable.use(DataTablesLib);


const appName =
    window.document.getElementsByTagName('title')[0]?.innerText || 'K UI'

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Toast, {
                hideProgressBar: true,
                closeOnClick: false,
                closeButton: false,
                icon: false,
                timeout: 5000,
                transition: 'Vue-Toastification__fade',
            })
            .component('DataTable', DataTable)
            .mixin({ methods: { route } })
            .mount(el)
    },
})

InertiaProgress.init({ color: '#e88c13' })
