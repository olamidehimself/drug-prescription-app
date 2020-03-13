<template>
    <div>
        Select a patient to view his/her prescriptions.
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    methods:{
        // ...mapActions(['getPrescription'])
    },
    mounted() {
        // this.getPresciption();
    },
    computed:mapGetters(['patientPrescription']),
    
}
</script>