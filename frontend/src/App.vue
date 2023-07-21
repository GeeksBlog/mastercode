<script>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import axios from 'axios'
import HomeView from './views/HomeView.vue';
export default {
  // layout: 
  props: {

  },
  data() {
    return {
      articles: [],
      asideopen: true,
      categories: [],
      user_manage: null
    }
  },

  components: {

  },

  methods: {
    datacrypt(data) {
      const KEYONE = atob("NEpfSjaHtFD1BgCTrDQkune4/rUkOuwP8zElOIcp3Vo=");
      const KEYTWO = atob("K2BlqR2D/rKyZZtVHben2DPid5Bua9IntX8tgD7eWmXjSrLYuhXRlNaUQ7MjRVYrlCOdbujjl9K25hBEKHG2Lw==");

      const method = "aes-256-cbc";
      const iv_length = 16; // AES-256-CBC utilise un vecteur d'initialisation (IV) de 16 octets
      const iv = new Uint8Array(iv_length);
      window.crypto.getRandomValues(iv);

      const encoder = new TextEncoder();
      const dataBytes = encoder.encode(data);

      const keyBytes = encoder.encode(KEYONE);
      const cryptoKey = window.crypto.subtle.importKey(
        "raw",
        keyBytes,
        { name: method },
        false,
        ["encrypt"]
      );

      const encryptedData = window.crypto.subtle.encrypt(
        { name: method, iv },
        cryptoKey,
        dataBytes
      );

      return encryptedData.then((encryptedBytes) => {
        const outputBytes = new Uint8Array(iv_length + encryptedBytes.byteLength);
        outputBytes.set(iv, 0);
        outputBytes.set(new Uint8Array(encryptedBytes), iv_length);

        const encodedOutput = btoa(String.fromCharCode.apply(null, outputBytes));
        const sanitizedOutput = encodedOutput.replace(/\+/g, "[plus]");

        // return sanitizedOutput;
        console.log(sanitizedOutput);
      });
    },

    asidetoogle() {
      this.asideopen = !this.asideopen
    },

    user_manage_toogle() {
      this.user_manage = !this.user_manage
    }

  },

  mounted() {

    axios.get('http://localhost/?goto=ArticleController&action=getAllArticles')
      .then((response) => {
        this.articles = response.data;
        console.log(response.data);
      })
      .catch((error) => {
        console.error(error);
      });

  },
};
</script>
<style>
.active {
  background-color: #f2f2f2;

  border-radius: 1rem;

}

.active>a {
  color: black;
}
.active>a span svg {
  fill: black;
}
</style>
<template>
  <header class="w-full mt-2 text-gray-700 bg-white border-t border-gray-100 shadow-sm body-font">
    <div class="flex items-center justify-between py-1 mr-4 md:flex-row">

      <nav class="fixed z-30 w-full pt-3 bg-white border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
          <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
              <button id="toggleSidebarMobile" @click="asidetoogle" aria-expanded="true" aria-controls="sidebar"
                class="p-2 text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

              </button>
              <a href="#" class="text-xl font-bold flex items-center gap-1 lg:ml-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256"
                  width="35px" height="35px" fill-rule="nonzero">
                  <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                    style="mix-blend-mode: normal">
                    <g transform="scale(3.2,3.2)">
                      <path
                        d="M42,75.5c-19.575,0 -35.5,-15.925 -35.5,-35.5c0,-19.575 15.925,-35.5 35.5,-35.5c19.575,0 35.5,15.925 35.5,35.5c0,19.575 -15.925,35.5 -35.5,35.5zM42,15.5c-13.509,0 -24.5,10.991 -24.5,24.5c0,13.509 10.991,24.5 24.5,24.5c13.509,0 24.5,-10.991 24.5,-24.5c0,-13.509 -10.991,-24.5 -24.5,-24.5z"
                        fill="#3798A6"></path>
                      <path
                        d="M42,5c19.299,0 35,15.701 35,35c0,19.299 -15.701,35 -35,35c-19.299,0 -35,-15.701 -35,-35c0,-19.299 15.701,-35 35,-35M42,65c13.785,0 25,-11.215 25,-25c0,-13.785 -11.215,-25 -25,-25c-13.785,0 -25,11.215 -25,25c0,13.785 11.215,25 25,25M42,4c-19.882,0 -36,16.118 -36,36c0,19.882 16.118,36 36,36c19.882,0 36,-16.118 36,-36c0,-19.882 -16.118,-36 -36,-36zM42,64c-13.255,0 -24,-10.745 -24,-24c0,-13.255 10.745,-24 24,-24c13.255,0 24,10.745 24,24c0,13.255 -10.745,24 -24,24z"
                        fill="#3798A6"></path>
                      <path
                        d="M58,27.5c-6.341,0 -11.5,-5.159 -11.5,-11.5c0,-6.341 5.159,-11.5 11.5,-11.5c6.341,0 11.5,5.159 11.5,11.5c0,6.341 -5.159,11.5 -11.5,11.5z"
                        fill="#3798A6"></path>
                      <path
                        d="M58,5c6.065,0 11,4.935 11,11c0,6.065 -4.935,11 -11,11c-6.065,0 -11,-4.935 -11,-11c0,-6.065 4.935,-11 11,-11M58,4c-6.627,0 -12,5.373 -12,12c0,6.627 5.373,12 12,12c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12z"
                        fill="#3798A6"></path>
                      <g>
                        <path
                          d="M60,75.5c-6.341,0 -11.5,-5.159 -11.5,-11.5c0,-6.341 5.159,-11.5 11.5,-11.5c6.341,0 11.5,5.159 11.5,11.5c0,6.341 -5.159,11.5 -11.5,11.5z"
                          fill="#3798A6"></path>
                        <path
                          d="M60,53c6.065,0 11,4.935 11,11c0,6.065 -4.935,11 -11,11c-6.065,0 -11,-4.935 -11,-11c0,-6.065 4.935,-11 11,-11M60,52c-6.627,0 -12,5.373 -12,12c0,6.627 5.373,12 12,12c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12z"
                          fill="#3798A6"></path>
                      </g>
                      <g>
                        <path
                          d="M14,51.5c-6.341,0 -11.5,-5.159 -11.5,-11.5c0,-6.341 5.159,-11.5 11.5,-11.5c6.341,0 11.5,5.159 11.5,11.5c0,6.341 -5.159,11.5 -11.5,11.5z"
                          fill="#3798A6"></path>
                        <path
                          d="M14,29c6.065,0 11,4.935 11,11c0,6.065 -4.935,11 -11,11c-6.065,0 -11,-4.935 -11,-11c0,-6.065 4.935,-11 11,-11M14,28c-6.627,0 -12,5.373 -12,12c0,6.627 5.373,12 12,12c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12z"
                          fill="#3798A6"></path>
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="self-center whitespace-nowrap">MasterCode</span>
              </a>


            </div>
            <div class="flex items-center justify-start">
              <form>
                <label for="default-search"
                  class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                  </div>
                  <input type="search" id="default-search"
                    class="block p-4 pl-10 text-sm text-gray-900 rounded-tl-full rounded-tr-full rounded-bl-full rounded-br-full border-2 border-gray-300 rounded-lg w-[35rem] bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Rechercher un article..." required>
                  <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-[#3798A6] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
              </form>
            </div>
            <div class="flex items-center gap-2">
              <button id="toggleSidebarMobileSearch" type="button"
                class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100">
                <span class="sr-only">Search</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
              <div class="items-center hidden lg:flex">
                <button class="relative z-10 block p-1 bg-white border-2 rounded-xl focus:outline-none">
                  <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                  </svg>
                </button>
              </div>
              <div class="relative">
                <button @click="user_manage_toogle()"
                  class="relative z-10 block p-2 bg-white rounded-md focus:outline-none">
                  <img class="relative object-cover w-8 h-8 rounded-full"
                    src="https://thumbs.dreamstime.com/b/default-avatar-photo-placeholder-profile-icon-eps-file-easy-to-edit-default-avatar-photo-placeholder-profile-icon-124557887.jpg"
                    alt="">
                </button>
                <div class="absolute right-0 z-20 mt-2 overflow-hidden bg-white rounded-md shadow-lg"
                  style="width:fit-content;" v-if="user_manage">
                  <div class="py-2">
                    <a href="#"
                      class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                      <div class="mx-1">
                        <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Marcos MEDENOU</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">marcosmedenou@gmail.com.com</p>
                      </div>
                    </a>
                    <a href="/register" class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100">
                      <p class="mx-2 text-sm text-gray-600">
                        <span class="font-bold">Inscription</span>
                      </p>
                    </a>
                    <a href="/login" class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100">
                      <p class="mx-2 text-sm text-gray-600">
                        <span class="font-bold text-center" href="#">Connexion</span>
                      </p>
                    </a>
                    <a href="/dashboard" class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100">
                      <p class="mx-2 text-sm text-gray-600">
                        <span class="font-bold text-center" href="#">Dashboard</span>
                      </p>
                    </a>

                  </div>
                  <a href="#" class="flex justify-center gap-1 py-2 font-bold text-center text-white bg-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    <span>Deconnexion</span></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </nav>
      <form class="flex items-center">
        <label for="voice-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" id="voice-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search Mockups, Logos, Design Templates..." required="">
          <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg aria-hidden="true"
              class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
        <button type="submit"
          class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>Search
        </button>
      </form>

      <div class="inline-flex items-center h-full ml-5 lg:w-2/5 lg:justify-end lg:ml-0">
        <a href="#_" class="mr-5 font-medium hover:text-gray-900">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </a>
        <a href="#_" class="mr-5 font-medium hover:text-gray-900">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </a>
        <a href="/register"
          class="text-xs font-bold text-white uppercase transition-all duration-150 rounded-full shadow-sm outline-none active:bg-teal-600 hover:shadow-md focus:outline-none ease">
          <div>
            <img class="relative object-cover w-8 h-8 rounded-full"
              src="https://thumbs.dreamstime.com/b/default-avatar-photo-placeholder-profile-icon-eps-file-easy-to-edit-default-avatar-photo-placeholder-profile-icon-124557887.jpg"
              alt="">
          </div>
        </a>
      </div>
    </div>
  </header>

  <div class="flex w-full h-[93vh] mt-4 overflow-x-auto bg-white rounded-lg shadow-xl">
    <div class="w-64" v-if="asideopen">
      <div class="px-2 pt-4 pb-8 border-gray-300">
        <ul class="flex flex-col gap-2 space-y-2">
          <li :class="{ 'active': $route.path === '/' }">
            <router-link to="/" exact
              class="bg-opacity-30 text-[#0d2a2e] flex items-center justify-between py-1.5 cursor-pointer">
              <span class="flex items-center p-2 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>
                  Accueil
                </span>
              </span>
            </router-link>
          </li>
          <li>
            <a
              class="hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 flex items-center text-gray-700 py-1.5 px-2 rounded space-x-2 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                </path>
              </svg>
              <span>Tendance</span>
            </a>
          </li>
          <li :class="{ 'active': $route.path === '/abonnement' } ">
            <router-link to="/abonnement" exact
              class="bg-opacity-30 text-[#0d2a2e] flex items-center justify-between py-1.5  cursor-pointer">
              <span class="flex items-center p-2 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                </svg>

                <span>
                  Abonnement
                </span>
              </span>
            </router-link>
          </li>
          <li>
            <a
              class="hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 flex items-center text-gray-700 py-1.5 px-4 rounded space-x-2 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
              </svg>
              <span>Sauvegarde</span>
            </a>
          </li>
          <li>
            <a
              class="hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 flex items-center text-gray-700 py-1.5 px-4 rounded space-x-2 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rotate-90" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
              </svg>
              <span>Articles liker</span>
            </a>
          </li>
          <hr>
          <li>
            <a
              class="hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 flex items-center justify-between text-gray-700 py-1.5 px-4 rounded space-x-2 cursor-pointer">
              <span class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                  </path>
                </svg>
                <span>Sujections</span>
              </span>
              <span class="bg-[#3798A6] text-gray-100 font-bold px-2 py-0.5 text-xs rounded-lg">1</span>
            </a>
          </li>
          <li>
            <a
              class="hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 flex items-center text-gray-700 py-1.5 px-4 rounded space-x-2 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                </path>
              </svg>
              <span>Messages</span>
            </a>
          </li>
          <li>
            <a
              class="hover:bg-gray-500 hover:bg-opacity-10 hover:text-blue-600 flex items-center text-gray-700 py-1.5 px-4 rounded space-x-2 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                </path>
              </svg>
              <span>Corbeille</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <router-view></router-view>

  </div>
</template>
