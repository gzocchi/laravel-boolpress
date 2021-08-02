<template>
  <section v-if="!loading && post">
    <h1 class="text-center mb-5">{{ post.title }}</h1>

    <h5 :class="[post.tags.length > 0 ? 'mb-3' : 'mb-5']">
      Categoria:
      <span v-if="post.category" class="badge badge-info">{{
        post.category.name
      }}</span>
      <span v-else class="badge badge-secondary">N/D</span>
    </h5>

    <div class="mb-5" v-if="post.tags.length > 0">
      <span
        v-for="tag in post.tags"
        :key="tag.id"
        class="badge badge-pill mr-2"
        :class="[tag.id % 2 ? 'badge-dark' : 'badge-secondary']"
      >
        {{ tag.name }}
      </span>
    </div>

    <p class="text-justify">{{ post.content }}</p>
  </section>
  <Loader v-else />
</template>

<script>
import Loader from "../components/Loader";

export default {
  name: "SinglePost",
  components: { Loader },
  data() {
    return {
      srvApi: "http://127.0.0.1:8000",
      post: null,
      loading: true,
    };
  },
  methods: {
    getPost(slug) {
      axios
        .get(`${this.srvApi}/api/posts/${slug}`)
        .then((res) => {
          this.post = res.data;
          if (this.post.slug) {
            this.loading = false;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    redirectPost() {
      this.$router.push({ name: "not-found" });
    },
  },
  created() {
    this.getPost(this.$route.params.slug);
  },
  mounted() {
    setTimeout(() => {
      if (this.loading) {
        this.redirectPost();
      }
    }, 3000);
  },
};
</script>

<style lang="scss" scoped></style>
