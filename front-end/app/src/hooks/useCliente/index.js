import http from '@/services/http'
import { ref } from 'vue'

export default function useCliente() {

    const clientes = ref([])
    const cliente = ref({})
    const getRequestIsRunnig = ref(false)
    const postRequestIsRunnig = ref(false)
    const putRequestIsRunnig = ref(false)
    const deleteRequestIsRunnig = ref(false)

    async function getClientes() {
        try {
            getRequestIsRunnig.value = true
            const { data } = await http.get('/clientes')
            getRequestIsRunnig.value = false

            clientes.value = data.data
        } catch (error) {
            getRequestIsRunnig.value = false
            clientes.value = {}
        }
    }

    async function getCliente(id) {
        try {
            getRequestIsRunnig.value = true
            const { data } = await http.get('/clientes/'.concat(id))
            getRequestIsRunnig.value = false

            cliente.value = data.data
        } catch (error) {
            getRequestIsRunnig.value = false
            cliente.value = {}
        }
    }

    async function postCliente() {

    }

    async function putCliente() {

    }

    async function deleteCliente() {

    }

    async function abrirConsuta() {

    }

    return {
        clientes,
        cliente,

        getClientes,
        getCliente,
        getRequestIsRunnig,

        postCliente,
        postRequestIsRunnig,

        putCliente,
        putRequestIsRunnig,

        deleteCliente,
        deleteRequestIsRunnig,

        abrirConsuta
    }
}
