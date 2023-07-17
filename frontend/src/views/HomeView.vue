
<template>
  <div class="flex-1 px-2">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
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
        <div class="flex items-center">
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
        </div>
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
      <section class="flex flex-row flex-wrap mx-auto">
        <!-- Card Component -->
        <div class="flex w-full px-4 py-6 transition-all duration-150 md:w-1/2 lg:w-1/4" v-for="article in articles"
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
            <p class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, magni
              fugiat, odit
            </p>
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

      </section>
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