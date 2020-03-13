import axios from 'axios';

const state = {
    patients: [],
    prescription: [],
};

const getters = {
    myPatients: state => state.patients,
    patientPrescription: state => state.prescription
};

const actions = {
    async getPatients({ commit }) {
        const response = await axios.get('/get/patients');

        console.log(response.data);
        commit('setPatients', response.data);
    },

    async fetchDetails({commit}, e){
        // console.log(e);
        const id = parseInt(e.target.value);
        const response = await axios.get(`/get/prescription/${id}`);

        console.log(response.data);
        // commit('getPrescription', )
    },

    async getPrescription({commit}, e) {
        // const reponse = await axios.get('/get/prescription');
        console.log(e);
    }
};

const mutations = {
    setPatients: (state, patients) => state.patients = patients
};

export default {
    state,
    getters,
    actions,
    mutations
};