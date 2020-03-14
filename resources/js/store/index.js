import axios from 'axios';

const state = {
    patients: [],
    prescription: [],
    patient:[]
};

const getters = {
    myPatients: state => state.patients,
    patientPrescription: state => state.prescription,
    patient: state => state.patient
};

const actions = {
    async getPatients({ commit }) {
        const response = await axios.get('/get/patients');

        console.log(response.data);
        commit('setPatients', response.data);
    },

    async fetchDetails({commit}, e){
        // console.log(e);
        const id = e ? parseInt(e.target.value): null;
        const response = await axios.get(`/get/prescription/${id}`);
        const info = await axios.get(`/get/patient/${id}`);

        // console.log(response.data.prescription);
        commit('getPrescription', response.data);
        commit('patientInfo', info.data)
    },

    async addPrescription({commit}, formData){
        const response = await axios.post('/home', formData);

        commit('newPrescription', response.data);
    },

    async deletePrescription({ commit}, id){
        // console.log(id.id);
        await axios.delete(`/delete/prescription/${id.id}`);
        const prescription = await axios.get(`/get/prescription/${id.patient_id}`);

        
        commit('getPrescription', prescription.data)
    }
};

const mutations = {
    setPatients: (state, patients) => state.patients = patients,
    getPrescription: (state, prescription) => state.prescription = prescription,
    patientInfo: (state, info) => state.patient = info,
    newPrescription: (state, pres) => state.prescription.push(pres),
    updatedPrescription: (state, prescription) => state.prescription = prescription,
};

export default {
    state,
    getters,
    actions,
    mutations
};