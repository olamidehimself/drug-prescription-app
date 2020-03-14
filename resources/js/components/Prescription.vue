<template>
    <div>
        <div class="card mt-5">
            <div class="card-header">Patient's details</div>
            <div class="card-body" v-if="patientPrescription < 1">
                Select a patient to view his/her prescriptions.
            </div>
            <div class="card-body">
                <ul>
                    <li v-for="detail in patientPrescription" :key="detail.id" class="mb-3">
                        <b>{{detail.prescription}}</b>
                        <br>
                        <b>Notes</b>: {{detail.notes}}
                        <br>
                        <b>Dosage</b>: {{detail.usage}} time(s) daily for a duration of {{detail.duration}} days.
                        <i class="material-icons" style="float:right" @click="deletePrescription(detail)">delete</i>
                    </li>
                </ul>
            </div>
        </div>
        <AddForm/>
    </div>
</template>

<script>
import AddForm from './AddForm.vue';
import {mapGetters, mapActions} from 'vuex';
export default {
    methods:{
        ...mapActions(['fetchDetails', 'deletePrescription'])
    },
    mounted() {
        this.fetchDetails();
        // console.log(this.fetchDetails());
    },
    computed:mapGetters(['patientPrescription']),
    components: {AddForm},
    
}
</script>

<style scoped>
i {
    float: right;
    color:darkred;
    cursor: pointer;
}
</style>