<template>
  <section class="row" v-if="posts.length > 0">
    <Card v-for="post in posts" :key="post.id" :post="post" />

    <div class="w-100 text-center my-3">
      <button
        v-show="current_page > 1"
        class="btn btn-sm btn-sm btn-secondary"
        @click="getPosts(current_page - 1)"
      >
        &lt;
      </button>

      <div class="btn-group" role="group" aria-label="pages">
        <button
          class="btn btn-sm"
          :class="n == current_page ? 'btn-secondary' : 'btn-light'"
          v-for="n in last_page"
          :key="n"
          @click="getPosts(n)"
        >
          {{ n }}
        </button>
      </div>

      <button
        v-show="current_page < last_page"
        class="btn btn-sm btn-secondary"
        @click="getPosts(current_page + 1)"
      >
        &gt;
      </button>
    </div>
  </section>
  <Loader v-else />
</template>

<script>
import Card from "../components/Card";
import Loader from "../components/Loader";


export default {
  name: "Blog",
  components: {
    Card,
    Loader
  },

  data() {
    return {
      srvApi: "http://127.0.0.1:8000",
      posts: [],
      current_page: 1,
      last_page: 1,
    };
  },
  methods: {
    subText(string, n = 100) {
      return string.length > n ? string.substr(0, n) + "..." : string;
    },
    getPosts(page = 1) {
      axios
        .get(`${this.srvApi}/api/posts?page=${page}`)
        .then((res) => {
          this.posts = res.data.data;
          this.current_page = res.data.current_page;
          this.last_page = res.data.last_page;

          this.posts.forEach((element) => {
            element.subText = this.subText(element.content);
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  created: function () {
    this.getPosts();
  },
};
</script>

<style lang="scss" scoped></style>
