import http from '@/services/http'
import { useRouter } from 'vue-router'

export default function useAuth() {
    const tokenName = 'opatuscoAuth'

    function hasAuthToken() {
        try {
            return !!localStorage.getItem(tokenName)
        } catch (error) {
            return false
        }
    }

    function getToken() {
        return JSON.parse(localStorage.getItem(tokenName))
    }

    function storeToken(tokenValue) {
        localStorage.setItem(tokenName, JSON.stringify(tokenValue))
    }

    async function guardApp(to, from) {
        try {
            const redirect = { name: 'login' }
            const { meta } = to

            if (!hasAuthToken()) {
              return redirect
            }

            // const validateAuth = await http.post()

            return true
          } catch (error) {
            console.log('🚀 ~ useAuth ~ guardApp ~ error', error);
            return redirect
          }
    }

    function logOut() {
        localStorage.removeItem(tokenName)
        window.location.reload()
    }

    return {
        hasAuthToken,
        getToken,
        storeToken,
        guardApp,
        logOut
    }
}
