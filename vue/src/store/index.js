import axios from "axios";
import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN")
        },
        multiform: {
            stepData:[],
        },
        currentVaccine: {
            data: {},
            loading: false,
        },
        vaccines: {
            loading: false,
            data: []
        },
        vaccineRegistration: {
            data: []
        },
        allVaccinees: {
            loading: false,
            data: []
        },
        currentBarangay: {
            data: {},
            loading: false,
        },
        barangays: {
            loading: false,
            data: []
        },
        currentTrackerStatus: {
            loading: false,
            data: []
        },
        filterBarangay: {
            loading: false,
            data: []
        },
        filterDate: {
            loading: false,
            data: []
        },
        filterVaccine: {
            loading: false,
            data: []
        },
        currentAnnouncement: {
            loading: false,
            data: []
        }
        
        
    },
    getters: {},
    actions: {
        message({ commit }, message) {
            let vaccine_date = message;
            return axiosClient
                .get(`message/${vaccine_date}`)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    commit("setVaccineFilterLoading", false);
                    throw err;
                })
        },
        //Announcement
        
        getAnnouncement({ commit }, id) {
            commit("setCurrentAnnouncementLoading", true);
            return axiosClient
              .get(`/announcement/${id}`)
              .then((res) => {
                commit("setCurrentAnnouncementLoading", false);
                commit("setCurrentAnnouncement", res.data);
                return res;
              })
              .catch((err) => {
                commit("setCurrentAnnouncementLoading", false);
                throw err;
              });
        },
        getAllAnnouncements({ commit }) {
            commit('setCurrentAnnouncementLoading', true);
            return axiosClient.get("announcement").then((res) => {
                commit('setCurrentAnnouncementLoading', false);
                commit('setCurrentAnnouncement', res.data);
                return res;
            });

        },
        deleteAnnouncement({ dispatch }, id) {
            return axiosClient.delete(`/announcement/${id}`).then((res) => {
              dispatch('getAnnouncements')
              return res;
            });
        },
        saveAnnouncement({commit}, announcement ) {
            let response;
            if (announcement.id) {
                response = axiosClient
                    .put(`announcement/${announcement.id}`, announcement)
                    .then((res) => {
                        commit("setCurrentAnnouncement", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/announcement", announcement).then((res) => {
                    commit("setCurrentAnnouncement", res.data);
                    return res;
                })
            }
        },
        
        //Filter report
        filterByVaccine({ commit }, vaccines) {
            let name = vaccines.vaccine;
            console.log(name);
            commit('setVaccineFilterLoading', true);
            return axiosClient
                .get(`filter-vaccine/${name}`)
                .then((res) => {
                    commit("setVaccineFilterLoading", false);
                    commit("setVaccineFilter", res.data);
                    return res;
                })
                .catch((err) => {
                    commit("setVaccineFilterLoading", false);
                    throw err;
                })
        },
        filterByDate({ commit }, dates) {
            let date = dates.date;
            commit('setDateFilterLoading', true);
            return axiosClient
                .get(`filter-date/${date}`)
                .then((res) => {
                    commit("setDateFilterLoading", false);
                    commit("setDate", res.data);
                    return res;
                })
                .catch((err) => {
                    commit("setDateFilterLoading", false);
                    throw err;
                })
        },
        filterByBarangay({ commit }, barangays) {
            let vaccine_location = barangays.barangay;
            commit('setBarangayFilterLoading', true);
            return axiosClient
                .get(`filter-barangay/${vaccine_location}`)
                .then((res) => {
                    commit("setBarangayFilter", res.data);
                    commit("setBarangayFilterLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setBarangayFilterLoading", false);
                    throw err;
                })
        },
        trackRequest({ commit }, tracker) {
            let reference_id = tracker.reference_id;
             commit("setTrackerLoading", true);
            return axiosClient
                .get(`/track-request/${reference_id}`)
                .then((res) => {
                    commit("setTracker", res.data);
                    console.log(res.data);
                    commit("setTrackerLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setTrackerLoading", false);
                    throw err;
                })
        },
        getAllVaccinees({ commit }) {
            commit('setVaccineesLoading', true);
            return axiosClient.get("/getvaccine-registration").then((res) => {
                commit('setVaccineesLoading', false);
                commit('setVaccinees', res.data);
                return res;
            });
        },
        saveRegistrationForm({ commit }, registration) {
            let response;

            if(registration.id) {

            } else {
                response = axiosClient.post('/vaccine-registration', registration).then((res) =>{
                    commit("setCurrentVaccineForm", res.data);
                    return res;
                })
            }
        },
        //Barangay CRUD
        saveBarangay({ commit }, barangay) {
            let response;
            if (barangay.id) {

            }else {
                response = axiosClient.post('/barangay', barangay).then((res) => {
                    commit("setCurrentBarangay", res.data);
                    return res;
                })
            }
        },
        getBarangays({ commit }) {
            commit('setBarangaysLoading', true)
                return axiosClient.get("/barangay").then((res) => {
                    commit('setBarangaysLoading', false);
                    commit('setBarangays', res.data);
                    return res;
                });
        },
        getBarangay({ commit }, id ) {
            commit("setCurrentBarangayLoading", true);
            return axiosClient
                .get(`barangay/${id}`)
                .then((res) => {
                    commit("setCurrentBarangay", res.data);
                    commit("setCurrentBarangayLoading", false);
                    return res;
                })
        },
        deleteBarangay({ dispatch }, id) {
            return axiosClient.delete(`/barangay/${id}`).then((res) => {
                dispatch('getBarangays')
                return res;
            });
        },
        //END BARANGAY CRUD

        //VACCINE CRUD
        getVaccine({ commit }, id) {
            commit("setCurrentVaccineLoading", true);
            return axiosClient
              .get(`/vaccine/${id}`)
              .then((res) => {
                commit("setCurrentVaccine", res.data);
                commit("setCurrentVaccineLoading", false);
                return res;
              })
              .catch((err) => {
                commit("setCurrentVaccineLoading", false);
                throw err;
              });
          },
        saveVaccine({commit}, vaccine ) {
            delete vaccine.image_url;
            let response;
            if (vaccine.id) {
                response = axiosClient
                    .put(`vaccine/${vaccine.id}`, vaccine)
                    .then((res) => {
                        commit("setCurrentVaccine", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/vaccine", vaccine).then((res) => {
                    commit("setCurrentVaccine", res.data);
                    return res;
                })
            }
        },
        getVaccinesRegisterForm({ commit }) {
            return axiosClient.get("/getVaccineForRegistration").then((res) => {
                commit("setVaccines", res.data);        
                return res;
            });
        },
        getVaccines({ commit }) {
            commit('setVaccinesLoading', true)
                return axiosClient.get("/vaccine").then((res) => {
                    commit('setVaccinesLoading', false);
                    commit("setVaccines", res.data);
                    return res;
                })
        },
        
        deleteVaccine({ dispatch }, id) {
            return axiosClient.delete(`/vaccine/${id}`).then((res) => {
              dispatch('getVaccines')
              return res;
            });
        },
        //END VACCINE CRUD
        register({ commit }, user ) {
            return axiosClient.post('/register',user)
                .then(({data}) => {
                    commit('setUser', data);
                    return data;
            })
        },
        login({ commit }, user) {
            return axiosClient.post('/login',user)
                .then(({data}) => {
                    commit('setUser', data);
                    return data;
                })
        },
    },
    mutations: {
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.data = userData.user;
            sessionStorage.setItem('TOKEN', userData.token);
        },
        setVaccines: (state, vaccines) => {
            console.log(vaccines.data);
            state.vaccines.data = vaccines.data;
        },
        setVaccinesLoading: (state, loading) => {
            state.vaccines.loading = loading;
        },
        setCurrentVaccineLoading: (state, loading) => {
            state.currentVaccine.loading = loading;
        },
        setCurrentVaccine: (state, vaccine) => {
            state.currentVaccine.data = vaccine.data;
        },
        setCurrentBarangayLoading: (state, loading) => {
            state.currentBarangay.loading = loading;
        },
        setCurrentBarangay: (state, barangay) => {
            state.currentBarangay.data = barangay.data;
        },
        setBarangaysLoading: (state, loading) => {
            state.barangays.loading = loading;
        },
        setBarangays: (state, barangays) => {
            state.barangays.data = barangays.data;
        },
        setVaccineesLoading: (state, loading) => {
            state.allVaccinees.loading = loading;
        },
        setVaccinees: (state, allVaccinees) => {
            state.allVaccinees.data = allVaccinees;
        },
        setTrackerLoading: (state, loading) => {
            state.currentTrackerStatus.loading = loading;
        },
        setTracker: (state, currentTrackerStatus) => {
            state.currentTrackerStatus.data = currentTrackerStatus;
        },
        setBarangayFilterLoading: (state, loading) => {
            state.filterBarangay.loading = loading;
        },
        setBarangayFilter: (state, filterBarangay) => {
            state.filterBarangay.data = filterBarangay.data;
        },
        setDateFilterLoading: (state, loading) => {
            state.filterDate.loading = loading;
        },
        setDate: (state, filterDate) => {
            state.filterDate.data = filterDate.data;
        },
        setVaccineFilterLoading: (state, loading) => {
            state.filterVaccine.loading = loading;
        },
        setVaccineFilter: (state, filterVaccine) => {
            state.filterVaccine.data = filterVaccine;
        },
        setCurrentAnnouncementLoading: (state, loading) => {
            state.currentAnnouncement.loading = loading;
        },
        setCurrentAnnouncement: (state, currentAnnouncement) => {
            state.currentAnnouncement.data = currentAnnouncement.data;
        }
        
        
    },
    module: {}
})

export default store;