<template>
<section class="text-info my-5 py-5">
    <h1>Loading</h1>
    <div class="loader"></div>
</section>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style lang="scss" scoped>
section{
  display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
}

.loader {
  border: 16px solid #f3f3f3;
  border-top: 16px solid #17a2b8;
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
