
<template>
  <div class="flex-1 px-2">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center gap-2">
        <a href="#"
          class="flex items-center text-gray-700 px-2 py-1 space-x-0.5 border border-gray-300 rounded-lg shadow hover:bg-gray-200 transition duration-100"
          title="Back">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
              clip-rule="evenodd"></path>
          </svg>
          <span class="text-sm font-bold">Back</span>
        </a>
        <a href="#"
          class="flex items-center text-gray-700 px-2 py-1 space-x-0.5 border border-gray-300 rounded-lg shadow hover:bg-gray-200 transition duration-100"
          title="Back">

          <span class="text-sm font-bold">Tout</span>
        </a>
        <a href="#" v-for="categorie in categories"
          class="flex items-center text-gray-700 px-2 py-1 space-x-0.5 border border-gray-300 rounded-lg shadow hover:bg-gray-200 transition duration-100"
          title="Back">
          <span class="text-sm font-bold">{{ categorie.category_name }}</span>
        </a>
        <!-- <div class="flex items-center">
          <span class="bg-gray-300 h-6 w-[.5px] mx-3"></span>
          <div class="flex items-center space-x-2">
            <button title="Archive"
              class="px-2 py-1 text-gray-700 transition duration-100 border border-gray-300 rounded-lg shadow hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20">
                </path>
              </svg>
            </button>
            <button title="Mark As Spam"
              class="px-2 py-1 text-gray-700 transition duration-100 border border-gray-300 rounded-lg shadow hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                </path>
              </svg>
            </button>
            <button title="Delete"
              class="px-2 py-1 text-gray-700 transition duration-100 border border-gray-300 rounded-lg shadow hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                </path>
              </svg>
            </button>
          </div>
          <span class="bg-gray-300 h-6 w-[.5px] mx-3"></span>
          <div class="flex items-center space-x-2">
            <button title="Mark As Unread"
              class="px-2 py-1 text-gray-700 transition duration-100 border border-gray-300 rounded-lg shadow hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
              </svg>
            </button>
            <button title="Add Star"
              class="px-2 py-1 text-gray-700 transition duration-100 border border-gray-300 rounded-lg shadow hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                </path>
              </svg>
            </button>
          </div>
        </div> -->
      </div>
      <div class="flex items-center px-2 space-x-4">
        <div class="flex items-center space-x-2">
          <button class="bg-gray-200 text-gray-400 p-1.5 rounded-lg" title="Previous Email">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
          <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 p-1.5 rounded-lg transition duration-150"
            title="Nex Email">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>




    <div>



<!-- This is an example component -->
<!-- <section class="flex flex-row flex-wrap mx-auto">

<div class="flex w-full px-4 py-6 transition-all duration-150 md:w-1/2 lg:w-[22%]" v-for="article in articles"
:key="article.id">
<div
  class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
  <div class="md:flex-shrink-0">
    <img v-bind:src="`http://localhost/ressources/images/images_principales/${article.article_image}`"
      alt="Blog Cover" class="object-fill w-full rounded-lg rounded-b-none md:h-52" />
  </div>
  <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
    <span class="text-xs font-medium text-blue-600 uppercase">
      {{ article["category_name"] }}
    </span>
    <div class="flex flex-row items-center">
      <div class="flex flex-row items-center mr-2 text-xs font-medium text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
          </path>
        </svg>
        <span>1.5k</span>
      </div>

      <div class="flex flex-row items-center mr-2 text-xs font-medium text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
          </path>
        </svg>
        <span>25</span>
      </div>

      <div class="flex flex-row items-center text-xs font-medium text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
          </path>
        </svg>
        <span>7</span>
      </div>
    </div>
  </div>
  <hr class="border-gray-300" />
  <div class="flex flex-wrap items-center flex-1 px-4 mx-auto text-center">
    <a v-bind:href="`/viewArticles?query=${encryptArticleId(article.article_id)}`" class="hover:underline">
      <h2 class="text-xl font-bold tracking-normal text-gray-800">
        {{ article["article_title"] }}
      </h2>
    </a>
  </div>

  <hr class="border-gray-300" />
  <section class="px-4 py-2 mt-2">
    <div class="flex items-center justify-between">
      <div class="flex items-center flex-1">
        <img class="object-cover h-10 rounded-full"
          src="https://thumbs.dreamstime.com/b/default-avatar-photo-placeholder-profile-icon-eps-file-easy-to-edit-default-avatar-photo-placeholder-profile-icon-124557887.jpg"
          alt="Avatar" />
        <div class="flex flex-col mx-2">
          <a href="" class="font-semibold text-gray-700 hover:underline">
            {{ article["user_pseudo"] }}
          </a>
          <span class="mx-1 text-xs text-gray-600">{{ article["created_at"] }}</span>
        </div>
      </div>
      <p class="mt-1 text-xs text-gray-600">9 minutes read</p>
    </div>
  </section>
</div>
</div>

</section> -->
<div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
  <div class="relative w-full mx-auto" v-for="article in articles" :key="article.id">
    <a v-bind:href="`/viewArticles?query=${encryptArticleId(article.article_id)}`"
      class="relative inline-block w-full transition-transform duration-300 ease-in-out transform hover:-translate-y-2">
      <div class="p-4 bg-white rounded-lg shadow">
        <div class="relative flex justify-center overflow-hidden rounded-lg h-52">
          <div class="w-full transition-transform duration-500 ease-in-out transform hover:scale-110">
            <div class="absolute inset-0 bg-black opacity-100">
              <img v-bind:src="`http://localhost/ressources/images/images_principales/${article.article_image}`"
                alt="Blog Cover" class="object-fill w-full rounded-lg rounded-b-none md:h-52" />
            </div>
          </div>

          <!-- <div class="absolute bottom-0 flex justify-center mb-3">
        <div class="flex px-4 py-1 space-x-5 overflow-hidden bg-white rounded-lg shadow">
          <p class="flex items-center font-medium text-gray-800">
            <svg class="w-5 h-5 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                d="M480,226.15V80a48,48,0,0,0-48-48H80A48,48,0,0,0,32,80V226.15C13.74,231,0,246.89,0,266.67V472a8,8,0,0,0,8,8H24a8,8,0,0,0,8-8V416H480v56a8,8,0,0,0,8,8h16a8,8,0,0,0,8-8V266.67C512,246.89,498.26,231,480,226.15ZM64,192a32,32,0,0,1,32-32H208a32,32,0,0,1,32,32v32H64Zm384,32H272V192a32,32,0,0,1,32-32H416a32,32,0,0,1,32,32ZM80,64H432a16,16,0,0,1,16,16v56.9a63.27,63.27,0,0,0-32-8.9H304a63.9,63.9,0,0,0-48,21.71A63.9,63.9,0,0,0,208,128H96a63.27,63.27,0,0,0-32,8.9V80A16,16,0,0,1,80,64ZM32,384V266.67A10.69,10.69,0,0,1,42.67,256H469.33A10.69,10.69,0,0,1,480,266.67V384Z">
              </path>
            </svg>
            3 + 1
          </p>

          <p class="flex items-center font-medium text-gray-800">
            <svg class="w-5 h-5 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 512">
              <path
                d="M423.18 195.81l-24.94-76.58C387.51 86.29 356.81 64 322.17 64H157.83c-34.64 0-65.34 22.29-76.07 55.22L56.82 195.8C24.02 205.79 0 235.92 0 271.99V400c0 26.47 21.53 48 48 48h16c26.47 0 48-21.53 48-48v-16h256v16c0 26.47 21.53 48 48 48h16c26.47 0 48-21.53 48-48V271.99c0-36.07-24.02-66.2-56.82-76.18zm-310.99-66.67c6.46-19.82 24.8-33.14 45.64-33.14h164.34c20.84 0 39.18 13.32 45.64 33.13l20.47 62.85H91.72l20.47-62.84zM80 400c0 8.83-7.19 16-16 16H48c-8.81 0-16-7.17-16-16v-16h48v16zm368 0c0 8.83-7.19 16-16 16h-16c-8.81 0-16-7.17-16-16v-16h48v16zm0-80.01v32H32v-80c0-26.47 21.53-48 48-48h320c26.47 0 48 21.53 48 48v48zM104.8 248C78.84 248 60 264.8 60 287.95c0 23.15 18.84 39.95 44.8 39.95l10.14.1c39.21 0 45.06-20.1 45.06-32.08 0-24.68-31.1-47.92-55.2-47.92zm10.14 56c-3.51 0-7.02-.1-10.14-.1-12.48 0-20.8-6.38-20.8-15.95S92.32 272 104.8 272s31.2 14.36 31.2 23.93c0 7.17-10.53 8.07-21.06 8.07zm260.26-56c-24.1 0-55.2 23.24-55.2 47.93 0 11.98 5.85 32.08 45.06 32.08l10.14-.1c25.96 0 44.8-16.8 44.8-39.95 0-23.16-18.84-39.96-44.8-39.96zm0 55.9c-3.12 0-6.63.1-10.14.1-10.53 0-21.06-.9-21.06-8.07 0-9.57 18.72-23.93 31.2-23.93s20.8 6.38 20.8 15.95-8.32 15.95-20.8 15.95z">
              </path>
            </svg>
            2
          </p>

          <p class="flex items-center font-medium text-gray-800">
            <svg class="w-5 h-5 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                d="M504,256H64V61.25a29.26,29.26,0,0,1,49.94-20.69L139.18,65.8A71.49,71.49,0,0,0,128,104c0,20.3,8.8,38.21,22.34,51.26L138.58,167a8,8,0,0,0,0,11.31l11.31,11.32a8,8,0,0,0,11.32,0L285.66,65.21a8,8,0,0,0,0-11.32L274.34,42.58a8,8,0,0,0-11.31,0L251.26,54.34C238.21,40.8,220.3,32,200,32a71.44,71.44,0,0,0-38.2,11.18L136.56,18A61.24,61.24,0,0,0,32,61.25V256H8a8,8,0,0,0-8,8v16a8,8,0,0,0,8,8H32v96c0,41.74,26.8,76.9,64,90.12V504a8,8,0,0,0,8,8h16a8,8,0,0,0,8-8V480H384v24a8,8,0,0,0,8,8h16a8,8,0,0,0,8-8V474.12c37.2-13.22,64-48.38,64-90.12V288h24a8,8,0,0,0,8-8V264A8,8,0,0,0,504,256ZM228.71,76.9,172.9,132.71A38.67,38.67,0,0,1,160,104a40,40,0,0,1,40-40A38.67,38.67,0,0,1,228.71,76.9ZM448,384a64.07,64.07,0,0,1-64,64H128a64.07,64.07,0,0,1-64-64V288H448Z">
              </path>
            </svg>
            3
          </p>
        </div>
      </div> -->

          <span
            class="absolute top-0 left-0 z-10 inline-flex px-3 py-2 mt-3 ml-3 text-sm font-medium text-white bg-red-500 rounded-lg select-none">
            Nouveau!
          </span>
        </div>

        <div class="mt-4">
          <h2 class="text-base font-medium text-gray-800 md:text-lg line-clamp-1" title="New York">
            {{ article["article_title"] }}
          </h2>
          <p class="mt-2 text-sm text-gray-800 line-clamp-1" title="New York, NY 10004, United States">
            Publié {{ article["created_at"] }} dans <span class="text-xs font-medium text-blue-600 uppercase">
              {{ article["category_name"] }}
            </span>
          </p>
        </div>



        <div class="grid grid-cols-2 mt-8">
          <div class="flex items-center">
            <div class="relative">
              <div class="w-6 h-6 bg-gray-200 rounded-full md:w-8 md:h-8"></div>
              <span class="absolute top-0 right-0 inline-block w-3 h-3 rounded-full bg-primary-red"></span>
            </div>

            <p class="ml-2 text-gray-800 line-clamp-1">
              {{ article["user_pseudo"] }}
            </p>
          </div>

          <div class="flex justify-end">
            <p class="inline-block font-semibold leading-tight text-primary whitespace-nowrap rounded-xl">
              <span class="text-sm uppercase">
                9
              </span>
              <span class="text-lg">min</span> de lecture
            </p>
          </div>
        </div>
      </div>
    </a>
  </div>


</div>
</div>

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
      categories:[]
    }
  },

  components: {

  },

  methods: {
    encryptArticleId(articleId) {
      // Convertir l'ID de l'article en chaîne de caractères
      const idString = String(articleId);

      // Convertir chaque caractère en son code Unicode et les concaténer
      const unicodeString = idString.split('').map((char) => char.charCodeAt(0)).join('');

      // Inverser la chaîne de caractères
      const reversedString = unicodeString.split('').reverse().join('');

      // Retourner la chaîne de caractères cryptée
      return reversedString;
    }
  },

  mounted() {
    axios.get('http://localhost/?goto=ArticleController&action=apigetAllArticles')
      .then((response) => {
        this.articles = response.data;
        console.log(response.data);
      })
      .catch((error) => {
        console.error(error);
      });

      axios.get('http://localhost/?goto=CategoryController&action=apiallCategories')
      .then((response) => {
        this.categories = response.data;
        console.log(this.categories);
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>