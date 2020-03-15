<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Prescriptions</div>
                        
                    <div class="card-body">
                        <div class="pres mb-3" v-for="detail in pres" :key="detail.id" @dblclick="toComplete(detail)" :class="{'completed': detail.completed}">
                            <b>{{detail.prescription}}</b>
                            <br>
                            <b>Notes</b>: {{detail.notes}}
                            <br>
                            <b>Dosage</b>: {{detail.usage}} time(s) daily for a duration of {{detail.duration}} days.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    data(){
        return{

        }
    },
    computed:mapGetters(['pres']),
    methods:{
        ...mapActions(['myPres', 'update']),
        toComplete(detail){
            const edited = {
                id: detail.id,
                completed: 1
            }

            this.update(edited);
        }
    },
    mounted(){
        this.myPres()
    }
    
}
</script>

<style scoped>
.pres{
    background: black;
    color: white;
    padding: 1rem;
    height: 100px;
    border-radius: 5px;
    cursor: pointer;
}

.completed{
    background: red;
}
</style>