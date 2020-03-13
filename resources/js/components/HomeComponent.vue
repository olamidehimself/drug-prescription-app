<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Of Patients</div>

                    <div class="card-body">
                        <select name="" id="">
                            <option value="" v-for="patient in patients" :key="patient.id">{{patient.name}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                patients: [],
            };
        },
        methods: {
            getPatients(){
                axios('/get/patients').then( response => this.patients = response.data );
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getPatients();
        }
        
    }
</script>
