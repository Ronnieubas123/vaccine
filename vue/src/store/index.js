import axios from "axios";
import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state: {    
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
            type: sessionStorage.getItem("TYPE"),
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
        filterRegisterform: {
            loading: false,
            data: []
        },
        // filterDate: {
        //     loading: false,
        //     data: []
        // },
        // filterVaccine: {
        //     loading: false,
        //     data: []
        // },
        currentAnnouncement: {
            loading: false,
            data: []
        },
        // loggedinUser: {
        //     data: []
        // },
        currentUser: {
            loading: false,
            data: []
        },
        currentUsers: {
            loading: false,
            data: []
        },
        allUsers: {
            loading:false,
            data: []
        },
        vaccineType: {
            loading: false,
            data: []
        },
        vaccineTypeName: {
            loading: false,
            data: []
        },
        currentLogistic: {
            loading: false,
            data: []
        },
        logistic: {
            loading: false,
            data: []
        },
        currentSchedule: {
            loading: false,
            data: []
        },
        citizineSchedule: {
            loading: false,
            data: []
        },
        schedule: {
            loading: false,
            data: []
        },
        allBarangays: {
            data: []
        },
        filterVaccine: {
            data: []
        },
        currentVaccineUsed: {
            data: [],
            loading: false
        },
        vaccineUsed: {
            data: [],
            loading: false
        },
        vaccineLeft: {
            data: [],
            logistic: sessionStorage.getItem("LOGISTIC"),
            inventory: sessionStorage.getItem("INVENTORY"),
            loading: false
        },
        inventoryHistory: {
            loading: false,
            data: []
        },
        currentVaccineForm: {
            data: [],
            error: sessionStorage.getItem("ERROR")
        }
        
    },
    getters: {},
    actions: {
        getVacccineUseds({ commit }, id ) {
            return axiosClient
                .get(`inventory/${id}`)
                .then((res) => {
                    commit("setCurrentVaccineUseds", res.data);
                    // commit("setCurrentschedule", res.data);
                    return res;
                })
                .catch((err) => {
                    throw err;
                  });
        },
        getHistory({ commit }) {
                return axiosClient.get("/get-all-history").then((res) => {
                    commit('setInventoryHistory', res.data);
                    return res;
                });
        },
        // getHistory({ commit }) {
        //     return axiosClient.get("/inventory").then((res) => {
        //         commit('setInventoryHistory', res.data);    
        //         return res;
        //     });
        //  },
        getVaccineLeft({ commit }) {
            return axiosClient.get("/get-all-vaccine-left").then((res) => {
                commit('setVaccineleft', res.data);    
                return res;
            });
         },
        getAllVaccineUsed({ commit }) {
            return axiosClient.get("/get-all-vaccine-used").then((res) => {
                commit('setVaccineUsed', res.data);    
                return res;
            });
         },
        getAllLogisticListInventory({ commit }) {
            return axiosClient.get("/get-logistic-inventory").then((res) => {
                commit('setLogisticInventory', res.data);    
                return res;
            });
         },
        AddVaccineUsed({commit}, vaccineused ) {
            let response;
            if (vaccineused.id) {
                response = axiosClient
                    .put(`inventory/${vaccineused.id}`, vaccineused)
                    .then((res) => {
                        commit("setCurrentVaccineused", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/inventory", vaccineused).then((res) => {
                    commit("setCurrentVaccineused", res.data);
                    return res;
                })
            }
        },
        vaccineUsedGetLogistic({ commit }) {
            return axiosClient.get("/get-logistic-vaccine-used").then((res) => {
                commit('setLogisticVaccineUsed', res.data);    
                return res;
            });
         },
        getAllVaccineReports({ commit }) {
            return axiosClient.get("/get-all-vaccine-reports").then((res) => {
                commit('setAllVaccineReports', res.data);    
                return res;
            });
         },
        getAllScheduleReports({ commit }) {
            return axiosClient.get("/get-all-schedule-reports").then((res) => {
                commit('setAllScheduleReports', res.data);    
                return res;
            });
         },
        getAllBarangayReports({ commit }) {
            return axiosClient.get("/get-all-barangays-reports").then((res) => {
                commit('setAllBarangaysReports', res.data);    
                return res;
            });
         },
        getAllBarangayRegisterform({ commit }) {
            return axiosClient.get("/get-all-barangays").then((res) => {
                commit('setAllBarangays', res.data);    
                return res;
            });
         },
        getSchedules({ commit }, id ) {
            commit("currentScheduleLoading", true);
            return axiosClient
                .get(`schedule/${id}`)
                .then((res) => {
                    commit("setCurrentschedule", res.data);
                    commit("setCurrentScheduleLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setCurrentVaccineLoading", false);
                    throw err;
                  });
        },
        getSchedule({ commit }) {
            return axiosClient.get("/schedule").then((res) => {
                commit('setSchedule', res.data);    
                return res;
            });
         },
        citizineGetSchedule({ commit }) {
            return axiosClient.get("/citizine-get-sched").then((res) => {
                commit('setCitizineSchedule', res.data);    
                return res;
            });
         },
        AddSchedule({commit}, schedule ) {
            let response;
            console.log(schedule.id);
            if (schedule.id) {
                response = axiosClient
                    .put(`schedule/${schedule.id}`, schedule)
                    .then((res) => {
                        commit("setCurrentschedule", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/schedule", schedule).then((res) => {
                    commit("setCurrentschedule", res.data);
                    console.log(res.data);
                    return res;
                })
            }
        },
        getLogistic({ commit }) {
            return axiosClient.get("/logistic").then((res) => {
                commit('setLogistic', res.data);    
                return res;
            });
         },
        addVaccineLogistic({commit}, logistic ) {
            let response;
            if (logistic.id) {
                // response = axiosClient
                //     .put(`vaccine/${vaccine.id}`, vaccine)
                //     .then((res) => {
                //         commit("setCurrentVaccine", res.data);
                //         return res;
                //     });
            } else {
                response = axiosClient.post("/logistic", logistic).then((res) => {
                    commit("setCurrentLogistic", res.data);
                    return res;
                })
            }
        },
        
        getAllVaccineTypeName ({ commit }) {
            return axiosClient.get("/vaccine-type-name").then((res) => {
                commit('setVaccineTypeName', res.data);
                return res;
            });
        },
        getAllVaccineType ({ commit }) {
            return axiosClient.get("/vaccine-type").then((res) => {
                commit('setVaccineType', res.data);
                return res;
            });
        },
        completeStatus({ commit }, buttonValue) {
            let id = buttonValue;
            return axiosClient.get(`/complete-status/${id}`).then((res) => {
              return res;
            });
        },
        deleteUser({ dispatch }, id) {
            return axiosClient.delete(`/users/${id}`).then((res) => {
              dispatch('getUsers')
              return res;
            });
        },
        getUserss({ commit }, id ) {
            commit("setCurrentUserLoading", true);
            return axiosClient
                .get(`users/${id}`)
                .then((res) => {
                    commit("setCurrentUser", res.data);
                    commit("setCurrentUserLoading", false);
                    return res;
                })
                .catch((err) => {
                    commit("setCurrentVaccineLoading", false);
                    throw err;
                  });
        },
        getUsers({ commit }) {
                return axiosClient.get("/users").then((res) => {
                    commit('setUsers', res.data);
                    return res;
                });
        },
        saveUser({commit}, user ) {
            let response;
            if (user.id) {
                response = axiosClient
                    .put(`users/${user.id}`, user)
                    .then((res) => {
                        commit("setCurrentUser", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/users", user).then((res) => {
                    commit("setCurrentUser", res.data);
                    return res;
                })
            }
        },
        // getUser({commit }) {
        //     return axiosClient.get("/current-user").then((res) => {
        //         commit('setLogginenUser', res.data);
        //         return res;
        //     });
        // },
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
        // filterByVaccine({ commit }, vaccines) {
        //     let name = vaccines.vaccine;
        //     commit('setVaccineFilterLoading', true);
        //     return axiosClient
        //         .get(`filter-vaccine/${name}`)
        //         .then((res) => {
        //             commit("setVaccineFilterLoading", false);
        //             commit("setVaccineFilter", res.data);
        //             return res;
        //         })
        //         .catch((err) => {
        //             commit("setVaccineFilterLoading", false);
        //             throw err;
        //         })
        // },
        // filterByDate({ commit }, dates) {
        //     let date = dates.date;
        //     commit('setDateFilterLoading', true);
        //     return axiosClient
        //         .get(`filter-date/${date}`)
        //         .then((res) => {
        //             commit("setDateFilterLoading", false);
        //             commit("setDate", res.data);
        //             return res;
        //         })
        //         .catch((err) => {
        //             commit("setDateFilterLoading", false);
        //             throw err;
        //         })
        // },
        filterRegisterform({ commit }) {

            return axiosClient.get("/filter-registerform").then((res) => {
                commit('setRegisterformFilter', res.data);    
                return res;
            });
            // let vaccine_location = barangays.barangay;
            // commit('setBarangayFilterLoading', true);
            // return axiosClient
            //     .get(`filter-barangay/${vaccine_location}`)
            //     .then((res) => {
            //         commit("setBarangayFilter", res.data);
            //         commit("setBarangayFilterLoading", false);
            //         return res;
            //     })
            //     .catch((err) => {
            //         commit("setBarangayFilterLoading", false);
            //         throw err;
            //     })
        },
        trackRequest({ commit }, tracker) {
            let reference_id = tracker.reference_id;
             commit("setTrackerLoading", true);
            return axiosClient
                .get(`/track-request/${reference_id}`)
                .then((res) => {
                    commit("setTracker", res.data);
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
                .catch((err) => {
                    commit("setCurrentVaccineFormError", err.response.data);
                    throw err;
                  });
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
            state.user.type = userData.type;
            state.user.data = userData.user;
            sessionStorage.setItem('TOKEN', userData.token);
            sessionStorage.setItem('TYPE', userData.type);
        },
        setVaccines: (state, vaccines) => {
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
        setRegisterformFilterLoading: (state, loading) => {
            state.filterRegisterform.loading = loading;
        },
        setRegisterformFilter: (state, filterRegisterform) => {
            state.filterRegisterform.data = filterRegisterform;
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
        },
        // setUserLoading: (state, loading) => {
        //     state.allUsers.loading = loading;
        // },
      
        // setLogginenUser: (state, loggedinUser) => {
        //     state.loggedinUser.data = loggedinUser;
        // },
        setUsers: (state, allUsers) => {
            state.allUsers.data = allUsers.data;
        },
        setCurrentUserLoading: (state, loading) => {
            state.currentUser.loading = loading;
        },
        setCurrentUser: (state, currentUser) => {
            state.currentUser.data = currentUser.data;
        },
        setVaccineType: (state, vaccineType) => {
            state.vaccineType.data = vaccineType;
        },
        setVaccineTypeName: (state, vaccineTypeName) => {
            state.vaccineTypeName.data = vaccineTypeName.data;
        },
        setCurrentLogisticLoading: (state, loading) => {
            state.currentLogistic.loading = loading;
        },
        setCurrentLogistic: (state, CurrentLogistic) => {
            state.currentLogistic.data = CurrentLogistic.data;
        },
        setLogisticLoading: (state, loading) => {
            state.logistic.loading = loading;
        },
        setLogistic: (state, logistic) => {
            state.logistic.data = logistic.data;
        },
        currentScheduleLoading: (state, loading) => {
            state.currentSchedule.loading = loading;
        },
        setCurrentschedule: (state, currentSchedule) => {
            state.currentSchedule.data = currentSchedule.data;
        },
        setCitizineSchedule: (state, citizineSchedule) => {
            state.citizineSchedule.data = citizineSchedule.data;
        },
        setSchedule: (state, schedule) => {
            state.schedule.data = schedule.data;
        },
        setAllBarangays: (state , allBarangays) => {
            state.allBarangays.data = allBarangays.data;
        },
        setAllBarangaysReports: (state, allBarangays) => {
            state.allBarangays.data = allBarangays.data;
        },
        setAllScheduleReports: (state, schedule) => {
            state.schedule.data = schedule.data;
        },
        setAllVaccineReports: (state, filterVaccine) => {
            state.filterVaccine.data = filterVaccine.data;
        },
        setLogisticVaccineUsed: (state, logistic) => {
            state.logistic.data = logistic.data;
        },
        setCurrentVaccineused: (state, currentVaccineUsed) => {
            state.currentVaccineUsed.data = currentVaccineUsed.data;
        },
        setLogisticInventory: (state, logistic) => {
            state.logistic.data = logistic.data;
        },
        setVaccineUsed: (state, vaccineUsed) => {
            state.vaccineUsed.data = vaccineUsed;
        },
        setVaccineleft: (state, vaccineLeft) => {
            state.vaccineLeft.data = vaccineLeft;
            state.vaccineLeft.logistic = vaccineLeft.logistic;
            state.vaccineLeft.inventory = vaccineLeft.inventory;
            sessionStorage.setItem('LOGISTIC', vaccineLeft.logistic);
            sessionStorage.setItem('INVENTORY', vaccineLeft.inventory);
        },
        setInventoryHistory: (state, inventoryHistory) => {
            state.inventoryHistory.data = inventoryHistory;
        },
        setCurrentVaccineUseds: (state, currentVaccineUsed) => {
            state.currentVaccineUsed.data = currentVaccineUsed.data;
        },
        setCurrentVaccineForm: (state, currentVaccineForm) => {
            state.currentVaccineForm.data = currentVaccineForm.data;
            // state.currentVaccineForm.error = currentVaccineForm.error;
            // console.log(currentVaccineForm.error);
            // console.log(currentVaccineForm);
            // sessionStorage.setItem('ERROR', currentVaccineForm.error);
        },
        setCurrentVaccineFormError: (state, currentVaccineForm) => {
            state.currentVaccineForm.error = currentVaccineForm.error;
            sessionStorage.setItem('ERROR', currentVaccineForm.error);
        }
        
        
    },
    module: {}
})

export default store;