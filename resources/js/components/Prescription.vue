<template>
    <div>
        <div class="card mt-5">
            <div class="card-header">Patient's details</div>
            <div class="card-body" v-if="patientPrescription < 1">
                Select a patient to view his/her prescriptions.
            </div>
            <div class="card-body">
                <ul>
                    <li v-for="detail in patientPrescription" :key="detail.id" class="mb-3" :class="{'completed': detail.completed}">
                        <b>{{detail.prescription}}</b>
                        <br>
                        <b>Notes</b>: {{detail.notes}}
                        <br>
                        <b>Dosage</b>: {{detail.usage}} time(s) daily for a duration of {{detail.duration}} days.
                        <i class="material-icons" style="float:right" @click="deletePres(detail)" v-if="detail.completed == false">delete</i>
                        <br>
                        <b v-if="detail.completed == true">Completed: Yes</b> 
                        <b v-else-if="detail.completed == false">Completed: No</b>
                        <br>
                        <b v-if="detail.completed == true">Date Completed: {{detail.updated_at | moment("dddd, MMMM Do YYYY")}}</b> 
                    </li>
                </ul>
            </div>
        </div>
        <AddForm/>
    </div>
</template>

<script>
Vue.use(require('vue-moment'));
import Swal from 'sweetalert2';
import AddForm from './AddForm.vue';
import {mapGetters, mapActions} from 'vuex';
export default {
    methods:{
        ...mapActions(['fetchDetails', 'deletePrescription']),
        deletePres(detail){
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                console.log(detail);
                this.deletePrescription(detail);
                if (result.value) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        }

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
    transition: 1s;
}

i:hover{
    /* transform:scale(1.2,1.2);
    transform: translateY(-6px); */
    transform: matrix(1.2, 0, 0, 1.2, 0, -3);
}

.completed{
    text-decoration: line-through;
}
</style>