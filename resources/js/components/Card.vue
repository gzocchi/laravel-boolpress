<template>
    <div class="col-md-4 my-2">
        <div class="card h-100">
            <img :src="post.cover" class="card-img-top" :alt="post.slug" />
            <div class="card-body">
                <h5 class="card-title">{{ post.title }}</h5>
                <p class="card-text">{{ post.subText }}</p>
                <router-link
                    :to="{ name: 'post', params: { slug: post.slug } }"
                    class="btn btn-info"
                    >Leggi</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        post: {
            type: Object,
            required: true
        }
    }
};
</script>

<style lang="scss" scoped></style>
