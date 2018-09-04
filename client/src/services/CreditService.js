import api from '@/services/api'

export default {
    calculateCredit (data) {
        return api().post('credit', data)
    }
}
