import { ref, onMounted } from 'vue'
import http from '@/services/http'

export default function useConsulta() {

    const data = ref([])
    const byIdData = ref({})
    const getRequestIsRunning = ref(false)
    const putRequestIsRunning = ref(false)

    async function buscarConsultas() {
        try {
            getRequestIsRunning.value = true
            const response = await http.get('/consultas')
            getRequestIsRunning.value = false

            console.log(response.data.data)

            data.value = response.data.data
        } catch (error) {
            data.value = []
            getRequestIsRunning.value = false
        }
    }

    async function buscarConsultaPorId(id) {
        try {
            getRequestIsRunning.value = true
            const response = await http.get('/consultas/'.concat(id))
            getRequestIsRunning.value = false

            byIdData.value = response.data.data
        } catch (error) {
            byIdData.value = {}
            getRequestIsRunning.value = false
        }

    }

    async function atualizar() {
        try {
            const payload = {
                data: byIdData.data,
                periodo: byIdData.periodo,
                sintomas: byIdData.sintomas,
                medico_id: byIdData.medico_id,
                pet_id: byIdData.pet_id,
                status: byIdData.status
            }

            console.log(payload)

            // putRequestIsRunning.value = true
            // const response = await http.put('/consultas/'.concat(id), payload)
            // putRequestIsRunning.value = false

            // byIdData.value = response.data.data
        } catch (error) {
            // byIdData.value = {}
            putRequestIsRunning.value = false
        }

    }

    async function deletarConsulta(id) {

    }

    async function editarConsulta(id) {

    }

    // onMounted(async () => {
        buscarConsultas()
    // })

    return {
        getRequestIsRunning,
        buscarConsultas,
        buscarConsultaPorId,
        deletarConsulta,
        editarConsulta,
        data,
        atualizar,
        putRequestIsRunning,
        byIdData
    }
}
