<template>
    <div class="container py-8 mx-auto">

        <form class="w-full max-w-sm p-8 mx-auto bg-white rounded-md shadow-md">
            <div class="flex items-center justify-center py-4 mx-auto">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256"
                    width="45px" height="45px" fill-rule="nonzero" class="">
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
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">Nom d'utilisateur</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="name" name="name" placeholder="John Doe">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="email">Email</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="email" id="email" name="email" placeholder="john@example.com">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">Mot de passe</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="password" id="password" name="password" placeholder="********">
            </div>
            <div class="mb-4">
                
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="password" id="confirm-password" name="confirm-password" placeholder="mot de passe a nouveau">
            </div>
            <button class="w-full px-4 py-2 text-sm font-bold text-white transition duration-300 bg-[#3798A6] rounded-md"
                type="submit">S'inscrire</button>
        </form>
        
    </div>
</template>
<script>
import { RouterLink, RouterView } from 'vue-router'
import axios from 'axios'
export default {
    // layout: 
    props: {

    },
    data() {
        return {
            articles: [],
        }
    },

    components: {

    },

    methods: {

    },

    mounted() {

    },
};
</script>