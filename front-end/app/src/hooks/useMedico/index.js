import { ref } from 'vue'
import http from '@/services/http'

export default function useMedico() {
    const getRequestIsRunning = ref(false)
    const medicos = ref([])

    async function getMedicos() {
        try {
            getRequestIsRunning.value = true
            const { data } = await http.get('/usuarios', {
                params: {
                    medico: 1
                }
            })
            getRequestIsRunning.value = false

            medicos.value = data.data
        } catch (error) {
            getRequestIsRunning.value = false
            medicos.value = {}
        }
    }

    return {
        medicos,
        getMedicos,
        getRequestIsRunning
    }
}
