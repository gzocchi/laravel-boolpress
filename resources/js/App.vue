<template>
    <div class="container">
        <Header />

        <main class="container my-3">
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from "./components/Header";
import Footer from "./components/Footer";

export default {
    name: "App",
    components: {
        Header,
        Footer
    }
};
</script>

<style lang="scss">
body {
    background-color: #f8f9fa;
}
</style>
