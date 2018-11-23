import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    title: 'My title from VUEX',
    //Google applicaion Cllient ID, required for authentication (client ID created for backend api located in 'intraportal.net')
    googleSignInParams: {
        client_id: '1055476069803-mudpnjdhi6d7es9tuosavl5sn4nd08ip.apps.googleusercontent.com'
    },
    //Google user - use data fetched from Google after Google authentication
    guser: {
      email: '',
      token: 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjYwY2QzNzcxYzExMjVjOWY3N2U4MmUzOTk3NGUxNjNhOGM3M2IzYzQiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiMTA1NTQ3NjA2OTgwMy1tdWRwbmpkaGk2ZDdlczl0dW9zYXZsNXNuNG5kMDhpcC5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImF1ZCI6IjEwNTU0NzYwNjk4MDMtbXVkcG5qZGhpNmQ3ZXM5dHVvc2F2bDVzbjRuZDA4aXAuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDAxNDAzMzkwMTkzMzE4ODM2MzUiLCJoZCI6InRyYW5zY29tLmNvbSIsImVtYWlsIjoicGlvdHIuenlza0B0cmFuc2NvbS5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXRfaGFzaCI6IlhGeUZQcEhnZHpuOVVNZnB6S2dvdEEiLCJuYW1lIjoiUGlvdHIgWnlzayIsInBpY3R1cmUiOiJodHRwczovL2xoNC5nb29nbGV1c2VyY29udGVudC5jb20vLUFnNjJpUTc3TGhzL0FBQUFBQUFBQUFJL0FBQUFBQUFBQUlBLzNWMmN5VDlTR084L3M5Ni1jL3Bob3RvLmpwZyIsImdpdmVuX25hbWUiOiJQaW90ciIsImZhbWlseV9uYW1lIjoiWnlzayIsImxvY2FsZSI6ImVuIiwiaWF0IjoxNTQyNTc0Mjk5LCJleHAiOjE1NDI1Nzc4OTksImp0aSI6IjI1ZmVjYTkxOGJmMDQ5ZDE4YzFkMDljMmJhZmUwNzM5ZWU3NTMxZjYifQ.I7zcv8qt5foz8sr14USVKOdNUpQ3SbuRL3ZErEJ0CFZ6k8Ld_iZzX71E990D-dqC21pLoymXzowfooc27P_uuezJkdjexPDxuK-civ-V7cDg9zSyvFmlfJ0KCPilR8o9zkvFtKoGsBZKhqNnIgJX_HZGbO6oJprSakY4X8pvDtAPMEvt47fK3Vsy1NPaqkYZx9VjjFUqntXGOahDyDKOWEq6kWl6c6yaPdnr-Be2qT7pS0tCKabO2jWRdVprt_O_fLrcz_ZEPNH1IxraJVetYCo9F_a4xj20_pNhET93hwSUGyDZz3wrbLMcyHE0CIXsSuCGiOHEEbMXb2lFL42y7w'
    }
  },
  mutations: {
    setGuser (state, guser) {
      state.guser=guser;
    }
  },
  actions: {

  }
})
