<template>
   
   <div class="py-2 mx-auto ">
        <section class="container grid gap-2 mt-2 md:grid-cols-3">

            <main class="relative col-span-2 md:mr-2">
                

                <div class="flex justify-center border">
                    <img v-bind:src="`http://localhost/ressources/images/images_principales/${article.article_image}`" class="cursor-pointer" alt="placeholder tag" />
                </div>
                <h1 class="mt-3 text-3xl font-bold text-gray-800">{{ article.article_title }}</h1>
                <div class="flex items-center gap-4 my-2 mt-2">
                    <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                    <div class="text-gray-500">
                        Par <span class="text-gray-800 cursor-pointer">{{ article.user_pseudo }}</span> le {{ article.created_at }}
                    </div>
                </div>
                <div v-html="article.code_html">
                </div>
                <form id="comment">
                    <textarea placeholder="your comment" cols="5" rows="6"
                        class="w-full p-4 text-xl font-semibold text-gray-800 bg-gray-100 rounded outline-none focus:outline-none"></textarea>
                    <input type="email"
                        class="w-full p-2 px-4 my-2 text-xl text-gray-800 bg-gray-100 rounded focus:outline-none"
                        placeholder="your email" required="true " />
                    <input type="text"
                        class="w-full p-2 px-4 text-xl text-gray-800 bg-gray-100 rounded focus:outline-none"
                        placeholder="your name" required="true " />
                    <button
                        class="w-full py-2 my-2 text-xl text-center bg-blue-700 rounded text-gray-50 hover:bg-blue-600 focus:outline-none"
                        type="submit">Comment</button>
                </form>
            </main>

            <aside class="col-span-2 mt-4 md:col-span-1 md:mt-0">
                
                <!-- <div id="author-card" class="flex flex-col items-center my-8">
                    <p class="self-start pl-2 my-8 text-3xl font-semibold text-gray-700 border-l-4 border-gray-800">
                        About Author</p>

                    <div>
                        <div class="w-48 h-48 bg-gray-900 bg-center bg-no-repeat bg-contain rounded-full bg-author-img">
                        </div>
                    </div>
                    <div>
                        <p id="author-name" class="my-4 text-2xl font-medium text-center text-gray-800">Sarthak Kaushik
                        </p>
                        <p class="my-1 text-center text-gray-600">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non libero nam sit! Maxime omnis
                            expedita sequi sapiente consequatur praesentium quae voluptates explicabo deleniti
                            asperiores. Nemo id soluta fuga tenetur ex?
                        </p>
                        <div class="flex justify-center gap-8">
                            <div class="flex justify-center w-16 h-16 rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="-204.79995 -341.33325 1774.9329 2047.9995">
                                    <path
                                        d="M1365.333 682.667C1365.333 305.64 1059.693 0 682.667 0 305.64 0 0 305.64 0 682.667c0 340.738 249.641 623.16 576 674.373V880H402.667V682.667H576v-150.4c0-171.094 101.917-265.6 257.853-265.6 74.69 0 152.814 13.333 152.814 13.333v168h-86.083c-84.804 0-111.25 52.623-111.25 106.61v128.057h189.333L948.4 880H789.333v477.04c326.359-51.213 576-333.635 576-674.373"
                                        fill="#1877f2" />
                                    <path
                                        d="M948.4 880l30.267-197.333H789.333V554.609C789.333 500.623 815.78 448 900.584 448h86.083V280s-78.124-13.333-152.814-13.333c-155.936 0-257.853 94.506-257.853 265.6v150.4H402.667V880H576v477.04a687.805 687.805 0 00106.667 8.293c36.288 0 71.91-2.84 106.666-8.293V880H948.4"
                                        fill="#fff" />
                                </svg>
                            </div>
                            <div class="flex justify-center w-16 h-16 rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-36.45 -60.8 315.9 364.8">
                                    <circle r="121.5" cy="121.5" cx="121.5" fill="#fff" />
                                    <path
                                        d="M121.5 0C54.4 0 0 54.4 0 121.5 0 173 32 217 77.2 234.7c-1.1-9.6-2-24.4.4-34.9 2.2-9.5 14.2-60.4 14.2-60.4s-3.6-7.3-3.6-18c0-16.9 9.8-29.5 22-29.5 10.4 0 15.4 7.8 15.4 17.1 0 10.4-6.6 26-10.1 40.5-2.9 12.1 6.1 22 18 22 21.6 0 38.2-22.8 38.2-55.6 0-29.1-20.9-49.4-50.8-49.4-34.6 0-54.9 25.9-54.9 52.7 0 10.4 4 21.6 9 27.7 1 1.2 1.1 2.3.8 3.5-.9 3.8-3 12.1-3.4 13.8-.5 2.2-1.8 2.7-4.1 1.6-15.2-7.1-24.7-29.2-24.7-47.1 0-38.3 27.8-73.5 80.3-73.5 42.1 0 74.9 30 74.9 70.2 0 41.9-26.4 75.6-63 75.6-12.3 0-23.9-6.4-27.8-14 0 0-6.1 23.2-7.6 28.9-2.7 10.6-10.1 23.8-15.1 31.9 11.4 3.5 23.4 5.4 36 5.4 67.1 0 121.5-54.4 121.5-121.5C243 54.4 188.6 0 121.5 0z"
                                        fill="#e60023" />
                                </svg>
                            </div>
                            <div class="flex justify-center w-16 h-16 rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-44.7006 -60.54775 387.4052 363.2865">
                                    <path fill="#1da1f2"
                                        d="M93.719 242.19c112.46 0 173.96-93.168 173.96-173.96 0-2.646-.054-5.28-.173-7.903a124.338 124.338 0 0030.498-31.66c-10.955 4.87-22.744 8.148-35.11 9.626 12.622-7.57 22.313-19.543 26.885-33.817a122.62 122.62 0 01-38.824 14.841C239.798 7.433 223.915 0 206.326 0c-33.764 0-61.144 27.381-61.144 61.132 0 4.798.537 9.465 1.586 13.941-50.815-2.557-95.874-26.886-126.03-63.88a60.977 60.977 0 00-8.279 30.73c0 21.212 10.794 39.938 27.208 50.893a60.685 60.685 0 01-27.69-7.647c-.009.257-.009.507-.009.781 0 29.61 21.075 54.332 49.051 59.934a61.218 61.218 0 01-16.122 2.152 60.84 60.84 0 01-11.491-1.103c7.784 24.293 30.355 41.971 57.115 42.465-20.926 16.402-47.287 26.171-75.937 26.171-4.929 0-9.798-.28-14.584-.846 27.059 17.344 59.189 27.464 93.722 27.464" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div> -->
                <div id="related-posts" class="grid gap-2">
                    <p class="pl-2 my-8 text-3xl font-semibold text-gray-700 border-l-4 border-gray-800">
                    </p>
                    <div class="grid grid-cols-2 border rounded-lg">
                        <div class=" md:col-span-2 lg:col-span-1">
                            <img src="img/aaa.png" class="w-full h-auto">
                        </div>
                        <div class="flex flex-col justify-center col-span-1 px-2 md:col-span-2 lg:col-span-1">
                            <p class="text-xl cursor-pointer">
                                <a href="single.html">
                                    While Loop in Javascript
                                </a>
                            </p>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. m,
                                sapiente explicabo!</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border rounded-lg">
                        <div class=" md:col-span-2 lg:col-span-1">
                            <img src="img/aaa.png" class="w-full h-auto">
                        </div>
                        <div class="flex flex-col justify-center col-span-1 px-2 md:col-span-2 lg:col-span-1">
                            <p class="text-xl cursor-pointer">
                                <a href="single.html">
                                    Foreach Loop in Javascript
                                </a>
                            </p>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. m,
                                sapiente explicabo!</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border rounded-lg">
                        <div class=" md:col-span-2 lg:col-span-1">
                            <img src="img/aaa.png" class="w-full h-auto">
                        </div>
                        <div class="flex flex-col justify-center col-span-1 px-2 md:col-span-2 lg:col-span-1">
                            <p class="text-xl cursor-pointer">
                                <a href="single.html">
                                    Map Loop in Javascript
                                </a>
                            </p>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. m,
                                sapiente explicabo!</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border rounded-lg">
                        <div class=" md:col-span-2 lg:col-span-1">
                            <img src="img/aaa.png" class="w-full h-auto">
                        </div>
                        <div class="flex flex-col justify-center col-span-1 px-2 md:col-span-2 lg:col-span-1">
                            <p class="text-xl cursor-pointer">
                                <a href="single.html">
                                    Map Loop in Javascript
                                </a>
                            </p>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. m,
                                sapiente explicabo!</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 border rounded-lg">
                        <div class=" md:col-span-2 lg:col-span-1">
                            <img src="img/aaa.png" class="w-full h-auto">
                        </div>
                        <div class="flex flex-col justify-center col-span-1 px-2 md:col-span-2 lg:col-span-1">
                            <p class="text-xl cursor-pointer">
                                <a href="single.html">
                                    Map Loop in Javascript
                                </a>
                            </p>
                            <p class="text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. m,
                                sapiente explicabo!</p>
                        </div>
                    </div>



                </div>

            </aside>
        </section>
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
            article: [],
            realID: null,
        }
    },

    components: {

    },

    methods: {
        decryptArticleId(encryptedId) {
            // Inverser la chaîne de caractères
            const reversedString = encryptedId.split('').reverse().join('');

            // Diviser la chaîne de caractères en groupes de deux caractères
            const charCodes = reversedString.match(/.{1,2}/g);

            // Convertir chaque groupe de deux caractères en son code Unicode et les concaténer
            const unicodeString = charCodes.map((code) => String.fromCharCode(parseInt(code, 10))).join('');

            // Retourner l'ID de l'article décrypté
            return parseInt(unicodeString, 10);
        }
    },

    mounted() {
        console.log(this.realID);
        //un axios qui recupere la data dans la bdd en fonction de l'id qui lui est fourni
        // Effectuer la requête GET à l'API PHP
        axios.get(`http://localhost/?goto=ArticleController&action=apigetOneArticleById&articleid=${this.realID}`)
            .then(response => {
                // Traiter la réponse de l'API
                const data = response.data;
                this.article=data[0];
                console.log(data);
                console.log(this.article);
            })
            .catch(error => {
                // Gérer les erreurs de la requête
                console.error(error);
            });
    },

    //Avant que le composant ne soit monter
    beforeMount() {
        const querry = window.location.href
        // Récupérer la valeur de la query string "query"
        const url = new URL(querry);
        const queryValue = url.searchParams.get("query");
        //décrypter la querry pour lancer une recherche dans la base de donnée et stocker l'id de l'article a afficher dans une variable
        this.realID = this.decryptArticleId(queryValue);
        console.log(this.realID);
    }


};
</script>