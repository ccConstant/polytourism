import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useUserStore = defineStore('user', () => {
    let data  =localStorage.getItem('user')
    const user = ref(user ? user : {});
    function getUser () {
        return user.value
    }
    function setUser(newUser) {
        user.value = newUser
    }
    return { count, increment }
})