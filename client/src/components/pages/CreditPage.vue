<template>
    <div>
        <div @keydown.enter="calculateCredit">
            <label>
                {{labels.sum}}:
                <div><input type="sum" v-model="creditRequest.sum"/></div>
            </label>
            <label>
                {{labels.period_months}}:
                <div><input type="period_months" v-model="creditRequest.period_months"/></div>
            </label>
            <label>
                {{labels.rate}}:
                <div><input type="rate" v-model="creditRequest.rate"/></div>
            </label>
            <label>
                {{labels.first_payment_date}}:
                <datepicker type="first_payment_date" v-model="creditRequest.first_payment_date"></datepicker>
            </label>
            <button @click="calculateCredit">Calculate</button>
        </div>
        <ul v-if="responseContent.hints && responseContent.hints.length">
            <li v-for="hint of responseContent.hints">{{ labels[hint.identifier] }}: {{ hint.message }}</li>
        </ul>
        <div v-if="responseContent.payments && responseContent.payments.length">
            <table border="1">
                <tr>
                    <td>N</td>
                    <td>Date</td>
                    <td>Sum</td>
                    <td>Debt</td>
                    <td>Percents</td>
                    <td>Reminder</td>
                </tr>
                <tr v-for="payment of responseContent.payments">
                    <td>{{ payment.payment_number }}</td>
                    <td>{{ new Date(payment.payment_date).toLocaleDateString() }}</td>
                    <td>{{ payment.sum }}</td>
                    <td>{{ payment.debt_sum }}</td>
                    <td>{{ payment.percents_sum }}</td>
                    <td>{{ payment.remainder }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    import CreditService from '@/services/CreditService'
    import Datepicker from 'vuejs-datepicker'

    export default {
        components: {
            Datepicker
        },
        data() {
            return {
                creditRequest:
                    {
                        sum: "",
                        period_months: "",
                        rate: "",
                        first_payment_date: ""
                    },
                responseContent: {
                    payments: [],
                    hints: []
                },
                labels: {
                    sum: "Credit sum",
                    period_months: "Count of months",
                    rate: "Annual rate",
                    first_payment_date: "First payment date"
                }
            }
        },

        methods: {
            async calculateCredit () {
                var resultResponse
                await CreditService.calculateCredit(this.creditRequest)
                    .then(function(response) {
                        resultResponse = response.data;
                    })
                    .catch(function(err) {
                        resultResponse = err.response.data
                    })
                this.responseContent = []
                this.responseContent = resultResponse
            }
        }
    }
</script>
