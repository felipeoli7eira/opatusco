import { ref, onMounted } from 'vue'
import http from '@/services/http'
import { useToast } from 'vue-toastification'

export default function useConsulta() {

    const data = ref([])
    const byIdData = ref({})
    const novaConsultaPayload = ref({})
    const getRequestIsRunning = ref(false)
    const putRequestIsRunning = ref(false)
    const postRequestIsRunning = ref(false)

    const toast = useToast()

    async function buscarConsultas() {
        try {
            getRequestIsRunning.value = true
            const response = await http.get('/consultas')
            getRequestIsRunning.value = false

            data.value = response.data.data
        } catch (error) {
            data.value = []
            getRequestIsRunning.value = false
            toast.error('Erro ao listar os agendamentos');
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
                data: byIdData.value.data.replace('T', ' '),
                periodo: byIdData.value.periodo,
                sintomas: byIdData.value.sintomas,
                medico_id: byIdData.value.medico_id,
                pet_id: byIdData.value.pet_id,
                status: byIdData.value.status
            }

            putRequestIsRunning.value = true
            const response = await http.put('/consultas/'.concat(byIdData.value.id), payload)
            putRequestIsRunning.value = false

            await buscarConsultaPorId(byIdData.value.id)

            console.clear()
            console.log(response)
        } catch (error) {
            // byIdData.value = {}
            console.log(error)
            putRequestIsRunning.value = false
        }

    }

    async function deletarConsulta(id) {

    }

    async function editarConsulta(id) {

    }

    async function abrirConsuta() {
        try {
            const payload = novaConsultaPayload.value

            payload.data = payload.data.replace('T', ' ')

            postRequestIsRunning.value = true
            await http.post('/consultas', payload)
            postRequestIsRunning.value = false

            toast.success('Consulta adicionada com sucesso', { timeout: 2000 });
            novaConsultaPayload.value = {}
        } catch (error) {
            console.log(error)
            postRequestIsRunning.value = false
            toast.error('Erro ao cadastrar! verifique os campos e tente novamente', { timeout: 4000 });

        }
    }

    // onMounted(async () => {
        // buscarConsultas()
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
        byIdData,

        abrirConsuta,
        postRequestIsRunning,
        novaConsultaPayload
    }
}
