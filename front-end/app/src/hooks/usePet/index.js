import { useToast } from "vue-toastification";
import { ref } from "vue";
import http from "@/services/http.js";


export default function usePet() {
    const toast = useToast();
    const getRequestIsRunning = ref(false)
    const tiposDePets = ref([])

    async function getTiposDePets() {
        try {
            getRequestIsRunning.value = true
            const { data } = await http.get('/pettipos')
            getRequestIsRunning.value = false

            tiposDePets.value = data.data
        } catch (error) {
            getRequestIsRunning.value = false
        }

    }

    return {
        getRequestIsRunning,
        tiposDePets,
        getTiposDePets
    }
}
