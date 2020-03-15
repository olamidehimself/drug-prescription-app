<template>
    <div>
        <div class="card mt-5" v-if="patient.id != null">
            <div class="card-header">Add New Dosage</div>
            <form action="" method="post" @submit.prevent="submit(patient)">
                <div class="card-body">
                    <div class="form-group">
                        <label>Patient's name</label>
                        <input type="text" class="form-control" v-model="patient.name" readonly>
                        <input type="hidden" name="" v-model="patient.id">
                    </div>
                    <div class="form-group">
                        <label>Prescription</label>
                        <textarea class="form-control" cols="30" v-model="prescription" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Dosage</label>
                        <input type="text" class="form-control" v-model="usage">
                    </div>
                    <div class="form-group">
                        <label>Days</label>
                        <input type="text" class="form-control" v-model="duration">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <input type="text" class="form-control" v-model="notes">
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit"
                            class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</template>

<script>
import { mapGetters, mapActions} from 'vuex';
export default {
    computed: mapGetters(['patient']),
    data(){
        return{
            patient_id: "",
            prescription: "",
            usage: "",
            duration: "",
            notes: "",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        }
    },
    methods:{
        ...mapActions(['addPrescription']),
        submit(patient){
            
            let formData = new FormData();
            formData.append('patient_id', patient.id),
            formData.append('prescription', this.prescription),
            formData.append('usage', this.usage),
            formData.append('duration', this.duration),
            formData.append('notes', this.notes),
            formData.append('token', this.csrf)
            this.addPrescription(formData)

            this.prescription = "";
            this.usage = "";
            this.notes = "";
            this.duration = "";
        }
    }
}
</script>