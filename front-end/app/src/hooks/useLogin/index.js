import { useToast } from "vue-toastification";
import { ref } from "vue";
import http from "@/services/http.js";
import { useRouter } from 'vue-router'

export default function useLogin() {
    const requestIsRunning = ref(false);
    const email = ref('recepcionista@opatusco.com');
    const senha = ref('recepcionista');
    const toast = useToast();
    const router = useRouter()

    async function handleSubmit() {
        try {
            if (requestIsRunning.value) {
                return;
            }

            requestIsRunning.value = true
            const request = await http.post('/auth', {
                email: email.value,
                senha: senha.value
            })
            requestIsRunning.value = false

            saveCredentials(request.data.data)
            router.push({ name: 'app_root' })
        } catch (error) {
            requestIsRunning.value = false
            console.log(error)

            let { response } = error
            toast.error(response.data?.data?.error ?? 'Erro ao tentar fazer login')
        }
    }

    function saveCredentials(credentials) {
        localStorage.opatuscoAuth = JSON.stringify(credentials)
    }

    return {
        email,
        senha,
        requestIsRunning,
        handleSubmit,
        saveCredentials
    }
}
