<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Of Patients</div>

                    <div class="card-body">
                        <select name="" id="" class="col-6 offset-3" @change="fetchDetails($event)">
                            <option v-for="patient in myPatients" :key="patient.id" :value="patient.id">{{patient.name}}</option>
                        </select>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">Patient's details</div>
                    <div class="card-body">
                        <Prescription/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Prescription from './Prescription.vue';
    import { mapGetters, mapActions} from 'vuex';
    export default {
        data(){
            return {
                // patients: [],
            };
        },
        methods: {
            // getPatients(){
            //     axios('/get/patients').then( response => this.patients = response.data );
            // }
            ...mapActions(['getPatients', 'fetchDetails']),
            // ...mapActions([])
        },
        mounted() {
            console.log('Component mounted.')
            this.getPatients();
        },
        components: {
            Prescription
        },
        computed: mapGetters(['myPatients'])
        
    }
</script>
